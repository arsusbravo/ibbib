<?php
namespace App\Helpers;

class AppHelper
{
    public function hasAccess($allows){
        $allowed = false;
        $user = \Auth::user();
        if(is_array($allows)){
            if(in_array($user->role->slug, $allows)){
                $allowed = true;
            }
        }

        return $allowed;
    }
}