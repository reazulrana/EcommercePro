<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Product;
use App\Models\Cart;

use Illuminate\Support\Facades\File;
class DeleteController extends Controller
{
    public function delete_data(Request $req)
    {
         $this->del_rec($req);
        return redirect()->back()->with(["msg"=>$req->table ." Deleted Successfully","type"=>"danger"]);
    }

    function del_rec($req):void
    {
        $type=strtolower($req->type);
        if( $type=="category")
        {
           $this->delete_category($req->id);
        }
        elseif($type=="product")
        {
            $this->delete_product($req->id);
        }
        elseif($type=="cart")
        {
           $this->delete_cart($req->id);
        }

    }

    function delete_cart($id):void
    {
        $cart=Cart::find($id);

        $cart->delete();

    }

    function delete_category($id):void
    {
        $cat=Category::find($id);
        $cat->delete();
    }
    function delete_product($id):void
    {
        $product=Product::find($id);
        $filepath="images/" . $product->image;

        //Delete Image File From Images Folder If Exist
        $this->delete_file_if_exist($filepath);
        $product->delete();

    }

    function delete_file_if_exist($filepath)
    {
        if(file_exists($filepath))
        {
            File::delete($filepath);
        }

    }
}
