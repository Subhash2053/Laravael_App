<?php

namespace App\Modules\User\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests;
use App\Modules\User\Http\Requests\ChangePasswordFormRequest;
use App\Modules\User\Http\Requests\MobileVerifyFormRequst;
use App\Modules\User\Http\Requests\SendVerificationCodeFormRequst;
use App\Modules\User\Http\Requests\UserFormRequest;
use App\Modules\User\Repositories\RoleInterface;
use App\Modules\User\Repositories\UserInterface;
use Auth;
use Illuminate\Http\Request;
use Laracasts\Flash\Flash as Flash;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{

    protected $user;

    protected $branch;

    protected $country;

    protected $role;

    protected $university;

    protected $testPreparationClass;

    public function __construct(
        UserInterface $user,
        RoleInterface $role

    ) {
        $this->user = $user;
        $this->role = $role;
    }

    public function profile()
    {
        $userId = Auth::User()->id;
        $data['user'] = $this->user->find($userId);

        return view('user::profile.profile', $data);

    }

    public function changePassword()
    {
        return view('user::auth.changePassword');
    }

    public function changePasswordPost(ChangePasswordFormRequest $request)
    {
        $oldPassword = Auth::User()->password;
        $currentPassword = $request->input('current_password');
        if (Hash::check($currentPassword, $oldPassword)) {
            $data['password'] = bcrypt($request->input('password'));
            $this->user->update(Auth::user()->id, $data);
            Flash::success("Password Change Successfully ");

            return redirect(route('dashboard'));

        } else {
            Flash::error("Current Password Not Match");

            return redirect(route('user.changePassword'));
        }
    }

    public function sendVerificationCodeToMobile()
    {
        return view('site::user.user-mobile-send-verification-code');
    }

    public function sendVerificationCodeToMobilePost(SendVerificationCodeFormRequst $request)
    {
        $all = $request->all();
        $userId = Auth::User()->id;

        $code = strtolower(str_random(4));
        $all['mobile_verification_code'] = $code;

        $this->user->update($userId, $all);

        $res = $this->smsVerify($all['mobile'], $code);

        if ($res) {

            Flash::success("Verification code sent Successfully. Please view your sms.");

            return redirect(route('mobile.verify'));
        }

    }

    public function smsVerify($mobile, $code)
    {

        $client = new GuzzleClient();

        $response = $client->get(
            'http://smsprima.com/api/api/index',
            [
                'query' => [
                    'username' => 'bidhee',
                    'password' => 'sms@12345',
                    'sender' => 'SMSservice',
                    'destination' => $mobile,
                    'type' => 1,
                    'message' => "Verification Code::  " . $code,
                ]
            ]
        );

        $statusCode = $response->getStatusCode();

        if ($statusCode == 200) {
            return true;
        }

        return false;
    }

    public function verifyMobile()
    {
        return view('site::user.verify-mobile');
    }

    public function verifyMobilePost(MobileVerifyFormRequst $request)
    {
        $code = $request->get('code');
        $mobile = Auth::User()->mobile;

        $res = $this->user->checkMobile($mobile, $code);

        if ($res) {

            Flash::success("Mobile verified successfully");

            return redirect(route('order.your-shopping-cart'));

        } else {

            Flash::error("Verification code mismatch");

            return redirect(route('mobile.verify'));
        }
    }


    public function index()
    {
        $data['users'] = $this->user->findAllWithAdmin();


        return view('user::user.index', $data);
    }

    public function create()
    {

        return view('user::user.create');
    }

    public function store(UserFormRequest $request)
    {
        $input = $request->all();
        $input['user_type'] = 'web';
        $input['status'] = 1;

        $profileFile = $request->file('profile_image');


        try{
            $input['profile_image']=$this->user->upload($profileFile);
            $this->user->create($input);

        }catch (\Throwable $t){
            Flash::error($t->getMessage());

        }

        Flash::success("User Created  successfully");

        return redirect(route('user.index'));

    }

    public function edit($id)
    {
        $data['user'] = $this->user->find($id);

        return view('user::user.edit', $data);
    }

    public function update(UserFormRequest $request, $id)
    {
        $input = $request->all();

        $user=$this->user->find($id);

        if (!empty($input['profile_image'])){
            if($user->profile_image){
                unlink("app/userProfile/$user->profile_image");
            }

            $profileFile = $request->file('profile_image');
            $input['profile_image']=$this->user->upload($profileFile);
        }

        $this->user->update($id, $input);



        Flash::success("User Updated  successfully");

        return redirect(route('user.edit', ['id' => $id]));

    }


    public function status(Request $request)
    {

        try {
            if ($request->ajax()) {
                $stat = null;
                $id = $request->input('id');

                $status = $this->user->changeStatus($id);
                if ($status == 0) {
                    $stat = '<i class="fa fa-toggle-off fa-2x text-danger-800"></i>';
                } elseif ($status == 1) {
                    $stat = '<i class="fa fa-toggle-on fa-2x text-success-800"></i>';
                }
                $data['tgle'] = $stat;
            }

        } catch (\Throwable $e) {

            $data['error'] = $e->getMessage();
        }

        return response()->json($data);
    }

    public function destroy($id)
    {
        try {
            $this->user->delete($id);
            Flash::success("User deleted Successfully");
        } catch (\Throwable  $t) {

            Flash::error($t->getMessage());
        }

        return redirect(route('user.index'));
    }
}
