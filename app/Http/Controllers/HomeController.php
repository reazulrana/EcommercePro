<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Product;
use App\Models\Cart;
use App\Models\Order;
use App\Models\Comment;
use App\Models\Reply;


use Session;
use Stripe;
use Carbon\Carbon;
class HomeController extends Controller
{
    //


public function index()
{
    $products=Product::paginate(3);
    $comments=Comment::with("replies")->get();
    // dd($comments);
    // session::flash("index","index");

    if(!empty(Auth::user()))
    {
        $usertype=Auth::user()->usertype;
    }
    else
    {
        return view("home.userpage",["products"=>$products,"comments"=>$comments]);

    }

       if($usertype==1)
       {
        return view("admin.home");
       }
       else
       {

        return view("home.userpage",["products"=>$products,"comments"=>$comments]);

       }


}

    public function redirect()
    {
       $usertype=Auth::user()->usertype;
       $products=Product::paginate(3);
       $comments=Comment::all();

        // session::flash("index","index");
// $id=Auth::id();
// $user=user::with("orders");
// dd($user);
       if($usertype==1)
       {
        return view("admin.home");
       }
       else
       {
        return view("home.userpage",["products"=>$products,"comments"=>$comments]);

       }
    }

    public function product_details($id)
    {
        $product=Product::find($id);
        return view("home.product_details",["product"=>$product]);

    }

function add_cart(Request $req)
{
if(Auth::id())
{
$user=Auth::user();
$product=Product::find($req->id);
$cart=new Cart();
$cart->name=$user->name;
$cart->email=$user->email;
$cart->phone=$user->phone;
$cart->address=$user->address;
$cart->user_id=$user->id;
$cart->product_title=$product->title;
if($product->discount_price!="0")
{
$cart->price=$product->discount_price;

}
else
{
    $cart->price=$product->price;

}
$cart->quantity=$req->quantity;
$cart->image=$product->image;
$cart->product_id=$product->id;
$cart->save();
return redirect()->back();
}
else
{
return redirect("login");
}
}

function show_cart()
{

    if(Auth::user())
    {
        $id=Auth::id();
// dd($id);
        $carts=Cart::where(["user_id"=>$id])->get();
        return view("home.showcart",["carts"=>$carts]);
    }
    else
    {
    return redirect("login");
    }
}

function order_cash()
{
    $id=Auth::id();
    $carts=Cart::where(["user_id"=>$id])->get();

    if($carts->count()>0)
    {
        foreach($carts as $cart)
        {
            $order=new Order;
            $order->name=$cart->name;
            $order->email=$cart->email;
            $order->phone=$cart->phone;
            $order->address=$cart->address;
            $order->product_title=$cart->product_title;
            $order->price=$cart->price;
            $order->quantity=$cart->quantity;
            $order->image=$cart->image;
            $order->product_id=$cart->product_id;
            $order->user_id=$cart->user_id;
            $order->user_id=$cart->user_id;
            $order->payment_status="cash on delivery";
            $order->delivery_status="processing";

            $order->save();
            $cartid=$cart->id;
            $delcart=Cart::find($cartid);
            $delcart->delete();

        }

    }
    else
    {
    return redirect()->back()->with(["msg"=>"no product found into the cart","type"=>"info"]);

    }


    return redirect()->back()->with(["msg"=>"Your Order Completed Successfully We will contact you as soon","type"=>"success"]);



}

function stripe($totalprice)
{
    $id=Auth::id();
    $carts=Cart::where(["user_id"=>$id])->get();

    if($carts->count()==0)
    {
        return redirect()->back()->with(["msg"=>"no product found into the cart","type"=>"info"]);

    }

    return view("home.stripe",["totalprice"=>$totalprice]);
}

//for stripe payment

public function stripePost(Request $request)
{
    $totalprice=$request->totalprice;

    Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));
    Stripe\Charge::create ([
            "amount" =>  $totalprice * 100,
            "currency" => "usd",
            "source" => $request->stripeToken,
            "description" => "Test payment from itsolutionstuff.com."
    ]);


    $id=Auth::id();
    $carts=Cart::where(["user_id"=>$id])->get();

    if($carts->count()>0)
    {
        foreach($carts as $cart)
        {
            $order=new Order;
            $order->name=$cart->name;
            $order->email=$cart->email;
            $order->phone=$cart->phone;
            $order->address=$cart->address;
            $order->product_title=$cart->product_title;
            $order->price=$cart->price;
            $order->quantity=$cart->quantity;
            $order->image=$cart->image;
            $order->product_id=$cart->product_id;
            $order->user_id=$cart->user_id;
            $order->user_id=$cart->user_id;
            $order->payment_status="Paid";
            $order->delivery_status="processing";

            $order->save();
            $cartid=$cart->id;
            $delcart=Cart::find($cartid);
            $delcart->delete();

        }

    }



    Session::flash('success', 'Payment successful!');

    return back();
}



function show_user_order()
{

    $id=Auth::id();


    $orders=Order::where(["user_id"=>$id])->get();

// dd($orders);
    return view("home.order",["orders"=>$orders]);
}

function cancel_order(Request $req)
{

// if(isset($req->rollback))
// {
// return "Rollback";
// }
// elseif(isset($req->cancelorder))
// {
//     return "cancelorder";

// }
// dd($req->all());



    $id=$req->id;
    $order=Order::find($id);
    $msg="Order Cancel";
    if(isset($req->cancelorder))
    {
        $order->delivery_status="cancel order";

    }
    elseif(isset($req->rollback))
    {
        $order->delivery_status="processing";
        $msg="Order Cancel Rollback";

    }

    $order->save();
   return redirect()->back()->with(["msg"=>$msg . " Successfully","type"=>"success"]);
}

function rollback_cancel(Request $req)
{

    $id=$req->id;
    $order=Order::find($id);
    $order->delivery_status="processing";
    $order->save();
   return redirect()->back()->with(["msg"=>"Order Cancel Successfully","type"=>"success"]);
}

function reply_comment(Request $req)
{

    if(Auth::id())
    {
        $reply=new Reply;
        $user=Auth::user();
        $dt=Carbon::now();
        $date=$dt->toDateString();
        $time=$dt->format("g:i A");

        $reply->user_id=$user->id;
        $reply->user_name=$user->name;
        $reply->comment_id=$req->commentid;
        $reply->comment=$req->reply_on_comment;
        $reply->date=$date;
        $reply->time=$time;
        $reply->save();

        return redirect()->back();
    }
    else
    {
        return redirect("login");
    }
}

function add_comment(Request $req)
{
    if(Auth::id())
    {
        $comment=new Comment;
        $user=Auth::user();


        $dt=Carbon::now();
        $date=$dt->toDateString();
        $time=$dt->format("g:i A");

        $comment->user_id=$user->id;
        $comment->user_name=$user->name;
        $comment->comment=$req->comment;
        $comment->date=$date;
        $comment->time=$time;
        $comment->save();
        return  redirect()->back();

    }
    else
    {
        return redirect("login");
    }

}

}
