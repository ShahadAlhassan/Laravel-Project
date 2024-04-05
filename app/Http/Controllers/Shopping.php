<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Product;
use App\Models\ProductDetails;
// use App\Models\Cart;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;

class Shopping extends Controller
{
    public function ShowListItemsPhone(Request $request)
    {
        $data=DB::table('products')
        ->join('product_details','products.id','=','product_details.productid')
        ->get();

        $tax=0.15;
        $descount=10;
        foreach($data as $key=> $row)
        {
            $data[$key]->total=($data[$key]->price*$tax)+$data[$key]->price;
            $data[$key]->descount=$descount;
            $data[$key]->tax=$tax;
            $data[$key]->net= $data[$key]->total- $data[$key]->descount;
        }
        return view('shopping.list-items',['data'=>$data]);
    }

    public function Add_to_cart(Request $request, $id)
    {
    $userid=$request->user()->id; //get current user id
    $data=DB::table('products')
    ->join('product_details','products.id','=','product_details.productid')
    ->where('product_details.id','=',$id)
    ->first();

    $tax=0.15;
    $descount=10;
    $data->total=($data->price*$tax)+$data->price;
    $data->descount=$descount;
    $data->tax=$tax;
    $data->net= $data->total- $data->descount;
    // dd($data);
    $row=[
        'productid'=>$data->id,
        'price'=>$data->price,
        'qty'=>$data->qty,
        'tax'=>$data->tax,
        'total'=>$data->total,
        'desc'=>$data->descount,
        'net'=>$data->net,
        'userid'=>$userid
        	
        
    ];

    DB::table('carts')->insert($row);

    $count=DB::table('carts')
    ->where('userid','=',$userid)
    ->count();

    Session::put('count',$count);
    return redirect()->back();
   
}



    public function ShowDetailsPhone($id)
    {
        $data=DB::table('products')
        ->join('product_details','products.id','=','product_details.productid')
        ->where('product_details.id','=',$id)
        ->first();
        $tax=0.15;
        $descount=10;
        $data->total=($data->price*$tax)+$data->price;
        $data->descount=$descount;
        $data->tax=$tax;
        $data->net= $data->total- $data->descount;

        return view('shopping.details',['data'=>$data]);
    }


  
    public function cartdetails(Request $request, $id)
    {
        // $userid=$request->user()->id; //get current user id
        // $data=Cart::all();
        $data=DB::table('products')
        ->join('product_details','products.id','=','product_details.productid')
        ->where('product_details.id','=',$id)
        ->get();
        $tax=0.15;
        $descount=10;
        foreach($data as $key=> $row)
        {
            $data[$key]->total=($data[$key]->price*$tax)+$data[$key]->price;
            $data[$key]->descount=$descount;
            $data[$key]->tax=$tax;
            $data[$key]->net= $data[$key]->total- $data[$key]->descount;
        }


        return view('shopping.cart-details',['data'=>$data]);
     
    }
}
