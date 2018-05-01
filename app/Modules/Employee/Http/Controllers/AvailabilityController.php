<?php

namespace App\Modules\Employee\Http\Controllers;

use Illuminate\Http\Request;
Use App\Modules\Employee\Models\Availability;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Laracasts\Flash\Flash;

class AvailabilityController extends Controller
{
    protected $availability;

    public function delete($id)
    {

        try {
            if ($id) {
                Availability::destroy($id);
                Flash::success("Availability deleted Successfully");
            } else {
                Flash::error("Please check at least one to delete");
            }
        } catch (\Throwable $e) {
            Flash::error($e->getMessage());
        }

        return back();
    }

}
