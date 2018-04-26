<?php

namespace App\Modules\User\Http\Controllers {

    use App\Http\Controllers\Controller;
    use App\Http\Requests;
    use App\Modules\User\Http\Requests\ChangePasswordFormRequest;
    use App\Modules\User\Http\Requests\LoginFormRequest;
    use App\Modules\User\Http\Requests\SignupFormRequest;
    use App\Modules\User\Repositories\UserInterface as UserInterface;
    use Illuminate\Support\Facades\Auth;
    use Illuminate\Http\Request;
    use Illuminate\Support\Facades\Hash;
    use Laracasts\Flash\Flash as Flash;
    use Socialite;


    class AuthController extends Controller
    {

        protected $user;

        public function __construct(UserInterface $user)
        {
            $this->user = $user;
        }

        public function login()
        {

            if (Auth::check()) {
                return redirect()->intended(route('dashboard'));
            } else {
                return view('user::auth.login');
            }

        }


        public function signUp()
        {
            return view('user::auth.sign-up');
        }

        public function userRegister(SignupFormRequest $request)
        {

            $data = $request->all();


            $data['password'] = Hash::make($data['password']);
            $data['user_type'] = 'web';




            try {
                $this->user->create($data);

                Flash::success("Successfully Sign Up");
            } catch (\Throwable $t) {
                Flash::error($t->getMessage());

            }

            return view('user::auth.login');

        }



        public function authenticate(LoginFormRequest $request)
        {
            // get our login input
            $login = $request->input('login');
            // check login field
            $login_type = filter_var($login, FILTER_VALIDATE_EMAIL) ? 'email' : 'username';

            // merge our login field into the request with either email or username as key
            $request->merge([$login_type => $login]);
            // let's validate and set our credentials

            if ($login_type == 'email') {

                $credentials = $request->only('email', 'password');

            } else {
                $credentials = $request->only('username', 'password');
            }



            if (Auth::attempt($credentials)) {

                if(Auth::user()->user_type=='super_admin') {
                    return redirect()->intended(route('dashboard'));
                }else{
                    return redirect()->intended(route('home'));
                }

            } else {

                Flash::warning('Invalid Access');

                return view('user::auth.login');

            }

        }


        public function socialLogin($provider)
        {
            return Socialite::driver($provider)->redirect();
        }


        public function socialCallback($provider)
        {
            $socialLite = Socialite::driver($provider)->user();

            $data['social_id'] = $socialLite->getId();
            $data['name'] = $socialLite->getName();
            $data['email'] = $socialLite->getEmail();
            $data['profile_image'] = $socialLite->getAvatar();
            $data['media'] = $provider;
            $data['user_field'] = 'web';

            $user = $this->user->saveSocialUser($data, $data['social_id']);

            Auth::login($user);

            return redirect(route('order.your-shopping-cart'));
        }


        public function logout()
        {
            Auth::logout();

            return redirect(route('login'));
        }

        public function permissionDenied()
        {
            return view('user::auth.permission-denied');
        }


        public function changePassword()
        {

            return view('user::password.change-password');
        }

        public function updatePassword(ChangePasswordFormRequest $request)
        {


            $oldPassword = $request->get('old_password');
            $newPassword = $request->get('password');


            $id = Auth::user()->id;
            $users = Auth::user()->find($id);

            if (!(Hash::check($oldPassword, $users->password))) {
                Flash::error("Old Password Do Not Match !");

                return redirect(route('setting.change.password'));
            } else {
                $data['password'] = Hash::make($newPassword);

                $this->user->update($id, $data);

                Flash::success("Password Successfully Updated!");
            }

            return redirect(route('setting.change.password'));
        }


    }
}
