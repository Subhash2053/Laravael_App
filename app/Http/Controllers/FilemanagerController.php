<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class FilemanagerController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * @param Request $request
     * @param $fieldId
     * @param int $type
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function standalone(Request $request, $fieldId, $type = 1)
    {
        $extensions = $request->get('extensions');
        $redirectPath = 'assets/lib/filemanager/dialog.php?type=' . $type . '&field_id=' . $fieldId . '&akey=' . env('FILE_MANAGER_KEY') . '&extensions=' . $extensions;
        return redirect($redirectPath);
    }

    public function uploadImage(Request $request)
    {
        $file = $request->file('file');
        return $file->getClientOriginalName();
    }
}
