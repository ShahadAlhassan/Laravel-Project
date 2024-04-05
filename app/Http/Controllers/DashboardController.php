<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\ProductDetails;
use Illuminate\Support\Facades\DB;
use Redirect;
use Illuminate\Support\Facades\Session;
use illuminate\Support\Facades\Cookie ;

use illuminate\Support\Facades\Auth;
class DashboardController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }

    public function Index()
    {
        return view('dashboard.index');
    }

    public function UpdateProducts(Request $request)
    {
        $products=Product::where('id',$request->id)->update([
            'proudctname'=>$request->proudctname,
        ]);
       return Redirect('/dashboard/products') ;    
    }

    public function UpdateProductsdetails(Request $request)
    {
        $productdetails=ProductDetails::where('id',$request->id)->update([
            'color'=>$request->color,
            'price'=>$request->price,
            'qty'=>$request->qty,
            'description'=>$request->description
        ]);
       return Redirect('/dashboard/getproductsdetails') ;    
    }

    public function Showall(){
        $products=Product::all();
        return view('dashboard.products',['products'=>$products]);
    }

    public function Search(Request $request)
    {
        $product=Product::where('proudctname',$request->name)->get();
        return view('dashboard.products',['products'=>$product]) ;  
    }

    public function Searchdetails(Request $request)
    {
        $product=Product::where('proudctname',$request->name)->get();
        return view('dashboard.productdetails',['products'=>$product]) ;  
    }
    public function EditProducts($id)
    {
        $products=Product::find($id);
        return view('dashboard.edit' ,['products'=>$products]);
    }

    public function EditProductdetails($id)
    {
        $productdetails=ProductDetails::find($id);
        return view('dashboard.editdetails' ,['product_details'=>$productdetails]);
    }

    public function GetProductdetails()
    {

        // $productsdetails=ProductDetails::all();
        $products=Product::all();
        $productsdetails=DB::table('products')
        ->join('product_details','products.id','=','product_details.productid')
        ->get();
        return view('dashboard.productdetails',['productsdetails'=>$productsdetails,'products'=>$products]);
       
        
    }

    public function GetProducts()
    {
        $products=Product::all();
        return view('dashboard.products',['products'=>$products]);
       
        
    }


    public function Creatproductsdetails(Request $request)
    {
        $validated=$request->validate([
            'color'=>'required|string|max:20',
            'price'=>'required',
            'qty'=>'required|numeric',
            'description'=>'required|string|max:225'

        ]);

        $productsdetails=ProductDetails::create([
            'color'=>$request->color,
            'price'=>$request->price,
            'qty'=>$request->qty,
            'description'=>$request->description,
            'productid'=>$request->product


        ]);
        $productsdetails->save();

        return Redirect('/dashboard/getproductsdetails');

    }
   
    public function Creatproducts(Request $request)
    {
        $products=Product::create([
            'proudctname'=>$request->proudctname

        ]);
        $products->save();
        return Redirect('/dashboard/products');

    }
   public function Del($id)
   {
    Session::put('data', 'Delete Done');
    $products=Product::find($id);
    $products->delete();

    return Redirect('/dashboard/products');
}

public function Delpdetails($id)
   {
    $products=ProductDetails::find($id);
    $products->delete();

    return Redirect('/dashboard/getproductsdetails');
}

public function logout(Request $request)
{
    Auth::logout();
    return redirect('/login');
}
   

}
