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

    /* return string */
    public function queryToURL($queries=[], $new=[]){
        if($new){
            $replaced = array_replace($queries, $new);
            $url = '?'.http_build_query($replaced);
        }else{
            if($queries){
                $url = '?'.http_build_query($queries);
            }else{
                $url = '';
            }
        }
        return $url;
    }
}