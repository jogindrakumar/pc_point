<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
    //
     public function ProductView(){
        $products = Product::latest()->get();
        return view('backend.product.product_view',compact('products'));
    }
    public function ProductAdd(){
        $products = Product::latest()->get();
        return view('backend.product.add_product',compact('products'));
    }

    public function ProductStore(Request $request){
        $request->validate([
            
        'heading1'         => 'required',
        'heading2'         => 'required',
        'desp'            => 'required',
       
        ]);

        Product::insert([
        'heading1'           => $request->heading1,
        'heading2'           => $request->heading2,
        'desp'              => $request->desp,
        ]);
         $notification = array(
            'message' => 'Product Inserted Successfully',
            'alert-type' => 'success'
                );
        return redirect()->route('all.product')->with($notification);
    }

    public function ProductEdit($id){

       
        $products = Product::findOrFail($id);
        return view('backend.product.product_edit',compact('products'));

    }

    public function ProductUpdate(Request $request,$id){

    Product::FindOrFail($id)->update([
            'heading1'           => $request->heading1,
            'heading2'           => $request->heading2,
            'desp'              => $request->desp,  
            
        ]);
        $notification = array(
            'message' => 'Product Updated Successfully',
            'alert-type' => 'success'
                );
        return redirect()->route('all.product')->with($notification);

    }

    public function ProductDelete($id){
       Product::FindOrFail($id)->delete();

         $notification = array(
                        'message' => 'Product Delete Successfully',
                        'alert-type' => 'info'
                            );
                    return redirect()->back()->with($notification);
    }
}
