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

        $image = $request->file('img');
        $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
        Image::make($image)->save('upload/product/'.$name_gen);
        $save_url = 'upload/product/'.$name_gen;

        Product::insert([
        'heading'           => $request->heading,
        'desp'              => $request->desp,
        'img'               => $save_url,
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

        
        $old_image = $request->old_img;

        if($request->file('img')){

            unlink($old_image);
               
                $image = $request->file('img');
                $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
                Image::make($image)->save('upload/product/'.$name_gen);
                $save_url = 'upload/product/'.$name_gen;


                Product::FindOrFail($id)->update([
                    'img'               => $save_url,
                ]);
                $notification = array(
                    'message' => 'Product Updated Successfully',
                    'alert-type' => 'success'
                        );
                return redirect()->route('all.product')->with($notification);


        }else{
                Product::FindOrFail($id)->update([
                        'heading'              => $request->heading,
                        'desp'              => $request->desp,
                     
                       
                        
                    ]);
                    $notification = array(
                        'message' => 'Product Updated Successfully',
                        'alert-type' => 'success'
                            );
                    return redirect()->route('all.product')->with($notification);

        }

    }

    public function ProductDelete($id){
        $product = Product::FindOrFail($id);
        $img = $product->img;
        unlink($img);

       Product::FindOrFail($id)->delete();

         $notification = array(
                        'message' => 'Product Delete Successfully',
                        'alert-type' => 'info'
                            );
                    return redirect()->back()->with($notification);
    }
}
