<?php

namespace App\Modules\User\Services;


class MenuService
{

//    protected $currentRoute;
//
//    public function __construct($currentRoute)
//    {
//        $this->currentRoute = $currentRoute;
//    }


    public function activeMenu($currentRoute, $selectedRoute)
    {
        $active = "";
        if ($currentRoute == $selectedRoute) {
            $active = 'class="active"';
        }

        echo $active;
    }


}
