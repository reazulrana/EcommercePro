<?php

namespace App\Lib;
use Illuminate\Support\Facades\File;


class customclass
{
    function custom_upload_single_image_file($file,$savepath)
    {
    //Upload file
    $tfile="";
    // if(isset($file))
    // {
    // //check is file in valid format
    // $c=is_file_image($file);
    // if(!isset($c))
    // {
    // return null;
    // }
    $originalFilename=$file->getClientOriginalName();
    $originalFilename=substr($originalFilename,0, strlen($originalFilename)-4);
    $originalFilename=$originalFilename . "_" . round(microtime(true)*1000,0) . "." .$file->extension();
    $file->move($savepath,$originalFilename);
    $tfile=$originalFilename;
    // }
        return $tfile;
    }





    function delete_file_if_exist($filepath)
    {
        if(file_exists($filepath))
        {
            File::delete($filepath);
        }

    }


    static function upload_path_testimonial_photo()
    {
        return "images/testimonial/";
    }

    static function upload_path_product_photo()
    {
        return "images/";
    }
    static function url_product_photo($filename)
    {
        return "/images/".$filename;
    }

    static function url_testimonial_photo($filename)
    {
        return "/images/testimonial/".$filename;
    }
    static function url_blank_photo()
    {
        return "/images/blank_photo/blank_photo.webp";
    }

}
