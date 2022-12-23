<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Product;
use App\Models\User;
use App\Models\Order;
use App\Models\Comment;
use App\Models\Reply;


use Illuminate\Support\Facades\File;
use \PDF;
use Notification;
use App\Notifications\SendEmailNotification;
use Illuminate\Support\Facades\DB;


class AdminController extends Controller
{




    //

public function view_category()
{
        $cat =Category::all();

        // if(session()->has("index"))
        // {
        //     session()->forget("index");
        // }
        return view("Admin.category",["category"=>$cat]);
}

public function add_catagory(Request $req)
{
$cat =new Category;
// dd($req->all());
$cat->catagory_name=$req->catagory;
$cat->save();
return redirect()->back()->with(["msg"=>$cat->catagory . "Category Saved Successfully","type"=>"success"]);


}

function view_product()
{

    // if(session()->has("index"))
    // {
    // session()->forget("index");

    // }
        $cat=Category::all();
            return view("admin.product",["category"=>$cat]);
}

function add_product(Request $req)
{

$req->validate([
'image'=> 'mimes:jpeg,jpg,png,gif'
]);
$image_path="Images/";

$image=$req->image;

    $product=new Product();
    $product->title=$req->title;
    $product->description=$req->description;
    $product->image=$this->custom_upload_single_image_file($image,$image_path);;
    $product->catagory=$req->category;
    $product->quantity=$req->quantity;
    $product->price=$req->price;
    $product->discount_price=$req->dis_price;
$product->save();

        return redirect()->back()->with(["msg"=>"Prodcut Add Succssfully","type"=>"success"]);
    }

function show_product()
{
    $products=Product::all();
    $categories=Category::all();

    // if(session()->has("index"))
    // {
    //     session()->forget("index");
    // }
    return view("Admin.show_product",["products"=>$products,"category"=>$categories]);
}

function update_product(Request $req)
{

    $product=Product::find($req->id);
    $image=$req->image;
    $filename="";
    $url="Images/";
    //if image change with old image which is saved in database
    if(isset($image))
    {
        //delete old image from Images folder in to server
        $this->delete_file_if_exist($url. $req->old_image_name);

        //upload change image into Images folder and get uploaded filename to save into database
        $filename=$this->custom_upload_single_image_file($image, $url);
    }
    else
    {
        //Store old image if new image not found
        $filename=$req->old_image_name;
    }

    $product->title=$req->title;
    $product->description=$req->description;
    $product->image=$filename;
    $product->catagory=$req->category;
    $product->quantity=$req->quantity;
    $product->price=$req->price;
    $product->discount_price=$req->discount_price;
$product->save();

return redirect()->back()->with(["msg"=>"Product Update Successfully","type"=>"success"]);

}



function order()
{
    // dd("ok");
    $orders=Order::all();
// if(session()->has("index"))
// {
//     session()->forget("index");
// }

    return view("admin.order",["orders"=>$orders]);
}


function delivered(Request $req)
{

    $id=$req->orderid;
   $order=Order::find($id);
   $order->payment_status="Paid";
      $order->delivery_status="delivered";
   $order->save();

    return redirect()->back()->with(["msg"=>"Order status change processing to deliverd","type"=>"success"]);
}



function print_pdf($id)
{
$order=Order::find($id);

    // $pdf=PDF::loadView('admin.print_PDF',["order"=>$order]);

    // return $pdf->download("Print_details_" . Time() . ".pdf");
    return view("admin.print_PDF",["order"=>$order]);

}


function send_email($id)
{

    $order=Order::find($id);

return view("admin.email_info",["order"=>$order]);
}


function send_user_email(Request $req)
{

    $order=Order::find($req->id);
    $details=[
        'greeting'=>$req->greeting,
        "firstline"=>$req->firstline,
        "body"=>$req->body,
        "button"=>$req->button,
        "url"=>$req->url,
        "lastline"=>$req->lastline

    ];

Notification::send($order,new SendEmailNotification($details));
    return redirect()->back();

}



function search_order(Request $req)
{

$search=$req->search_order;
if(!empty($search)){
{
    $orders=Order::where('name','LIKE',"%$search%")->orWhere('email','LIKE',"%$search%")
    ->orWhere('phone','LIKE',"%$search%")
    ->orWhere('address','LIKE',"%$search%")
    ->orWhere('product_title','LIKE',"%$search%")
    ->orWhere('price','LIKE',"%$search%")
    ->orWhere('quantity','LIKE',"%$search%")
    ->orWhere('payment_status','LIKE',"%$search%")
    ->orWhere('delivery_status','LIKE',"%$search%")
    ->get();
}
}
else
{
    $orders=Order::all();
}

return view("admin.order",["orders"=>$orders]);

}

function show_body()
{
    $ttlproducts=Product::all()->count();
    $customers=user::where(["usertype"=>"0"])->count();
    $orders=Order::all()->count();
    $sold=Order::sum(\DB::raw("quantity*price"));
    $delivered=Order::where(["delivery_status"=>"delivered"])->count();
    $processing=Order::where(["delivery_status"=>"processing"])->count();

    $products=[
                "ttlproducts"=>$ttlproducts,
                "customers"=>$customers,
                "orders"=>$orders,
                "sold"=>$sold,
                "delivered"=>$delivered,
                "processing"=>$processing
    ];
    // $sold=DB::select("select sum(quantity*price) as price from orders");


    // dd("products ". $products . " customers ". $customers . " Orders " . $orders . " sold " . $sold);


    return view("admin.body",["products"=>$products ]);

}


//Custom Function

//for single document file uploads like *.docs; *.pdf; *.xls; *.xlsx  and $files=array and $savepath =Directory You want upload your files
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


function show_comment()
{

    $comments=Comment::with("users")->get();
    $comment=Comment::with("replies")->get();

    // if(session()->has("index"))
    // {
    //     session()->forget("index");
    // }

    return view("Admin.show_comments",["comments"=>$comments]);
}


function shwo_reply_on_comment()
{
    // $replies=Reply::with("users")->get();
    // $replies_comment=Reply::with("comments")->get();
    $replies=DB::select(DB::raw("Select users.name, users.email,comments.comment as comments,replies.id,replies.comment  from Users inner
    join comments on users.id=comments.user_id inner join replies on comments.id=replies.comment_id"));

    return view("admin.show_reply",["replies"=>$replies]);

}

function delete_comment(Request $req)
{

    DB::beginTransaction();
    try{
        // dd("ok");

        $comment=Comment::find($req->commentid);
        $comment->delete();
        $replies=Reply::where(["comment_id"=>$comment->id])->get();

        foreach($replies as $rep)
        {
            $reply=Reply::find($rep->id);
            $reply->delete();
        }

        DB::commit();
    return redirect()->back();

    }
    catch(\Exception $e)
    {
        DB::rollback();
        throw $e;

    }

}

function update_comment(Request $req)
{

$comment_id=$req->comment_id;
$comment=Comment::find($comment_id);
$comment->comment=$req->edit_comment;
$comment->save();

return redirect()->back()->with(["msg"=>"Comment Update Successfully","type"=>"success"]);

}

function update_reply(Request $req)
{

    $id=$req->reply_id;
    $reply=Reply::find($id);

    if(isset($reply))
    {
        $reply->comment= $req->edit_reply;
        $reply->save();
    }


    return redirect()->back()->with(["msg"=>"Reply Update Successfully","type"=>"success"]);
}


function delete_reply(Request $req)
{

    try{
    $id=$req->reply_id;
    $reply=Reply::find($id);
    $reply->delete();
    return redirect()->back()->with(["msg"=> "Reply Deleted Successfully","type"=>"success"]);
}
catch(\Exception $e)
{
    throw $e;
}

}



}
