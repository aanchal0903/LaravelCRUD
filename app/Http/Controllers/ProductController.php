<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index(){
        return view('products.index',[
            'products'=>Product::get()
        ]);
    }
    public function CreateProduct(){
        return view('products.new');
    }
    public function StoreProduct(Request $request){

    //validation
    $request->validate([
        'name'=>'required',
        'image'=>'required',
        'description'=>'required'
    ]);
    //   dd($request->all());
    $imageName = time().'.'.$request->image->extension();
    $request->image->move(public_path('products'), $imageName);
    //to store in database
    $product = new Product();
    $product->image = $imageName;
    $product->name = $request->name;
    $product->description = $request->description;

    //value jo upar dali   h usko save krna h
    $product->save();
    return back()->withSuccess('product created successfully');
    }
    public function EditProduct($id){
        //dd($id);
        $product = Product::where('id',$id)->first();
        return view('products.edit', ['product'=>$product]);

    }
    public function UpdateProduct( Request $request, $id){
        //validation
    $request->validate([
        'name'=>'required',
        'image'=>'nullable',
        'description'=>'required'
    ]);
    $product = Product::where('id',$id)->first();
    //   dd($request->all());
    if(isset($request->image)){
        $imageName = time().'.'.$request->image->extension();
    $request->image->move(public_path('products'), $imageName);
    $product->image = $imageName;
    }
   
    
    $product->name = $request->name;
    $product->description = $request->description;

    //value jo upar dali   h usko save krna h
    $product->save();

        return back()->withSuccess('product updated successfully!');    
    }

    public function DeleteProduct($id){
        $product = Product::where('id',$id)->first();  
        $product->delete();
        return back()->withSuccess('Product deleted successfully');
    }

    public function ShowProduct($id)
    {
        $product = Product::where('id',$id)->first();  
        return view('products.show',['product'=>$product]);
    }
}



