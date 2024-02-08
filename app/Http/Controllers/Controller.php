<?php

namespace App\Http\Controllers;

use Illuminate\Support\Str;
use Illuminate\Support\Facades\File;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Nette\Utils\Image;

class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;

    protected function file_upload($folder,$file){
        $product_file=$file;
        $file_extension=$product_file->getClientOriginalExtension();
        $file_image_name=rand().time().'.'.$file_extension;
        $product_file->move($folder,$file_image_name);
        return $file_image_name;
    }

    protected function file_update($file,$folder,$old_file){
            if($old_file !=null){
                file_exists($folder.$old_file) ? unlink($folder.$old_file):false;
            };
            $product_file=$file;
            $file_extension=$product_file->getClientOriginalExtension();
            $file_image_name=rand().time().'.'.$file_extension;
            $product_file->move($folder,$file_image_name);
            return $file_image_name;
    }

    protected function file_remove($folder,$old_file){
        file_exists($folder.$old_file) ? unlink($folder.$old_file):false;
    }
}
