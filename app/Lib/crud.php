<?php

namespace App\Lib;
use Illuminate\Support\Facades\File;


class crud
{

function save_testimonial($model,$request,$image_file_name):void
{

    $req=$request;
    $data=$model;
if(isset($data->id))
{
    $data->title=$req->title;
    $data->sub_title=$req->sub_title;
    $data->description=$req->description;
    $data->image=$image_file_name;
}
else{
    $data->title=$req->carousel_header_h5;
    $data->sub_title=$req->carousel_header_h6;
    $data->description=$req->description;
    $data->image=$image_file_name;
}

$data->save();
}

}
