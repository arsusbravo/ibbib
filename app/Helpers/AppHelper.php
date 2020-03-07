<?php
namespace App\Helpers;

use Illuminate\Support\Facades\Validator;
use Intervention\Image\ImageManagerStatic as Image;

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

    public function isInvalid($input, $validated){
        $validator = Validator::make($input, $validated);
        if ($validator->fails()) {
            return $validator;
        }else{
            return false;
        }
    }

    public function resizeSquare($image, $size, $filename){
        $img = Image::make($image);
        $img->resize($size, null, function ($constraint) {
            $constraint->aspectRatio();
        });

        $img->resizeCanvas($size, $size, 'center', false, [0, 0, 0, 0]);
        $img->save($filename, 60);
    }
}