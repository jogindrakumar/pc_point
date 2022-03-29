<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class TestimoniController extends Controller
{
    //
      public function TestimoniView(){
        $testimonis = Testimoni::latest()->get();
        return view('backend.testimoni.testimoni_view',compact('testimonis'));
    }
    public function TestimoniAdd(){
        $testimonis = Testimoni::latest()->get();
        return view('backend.testimoni.add_testimoni',compact('testimonis'));
    }

    public function TestimoniStore(Request $request){
        $request->validate([
            
        'name'         => 'required',
        'desp'            => 'required',
       
        ]);

        Testimoni::insert([
        'name'           => $request->name,
        'desp'              => $request->desp,
        ]);
         $notification = array(
            'message' => 'Testimoni Inserted Successfully',
            'alert-type' => 'success'
                );
        return redirect()->route('all.testimoni')->with($notification);
    }

    public function TestimoniEdit($id){

       
        $testimonis = Testimoni::findOrFail($id);
        return view('backend.testimoni.testimoni_edit',compact('testimonis'));

    }

    public function TestimoniUpdate(Request $request,$id){

    Testimoni::FindOrFail($id)->update([
            'name'           => $request->name,
            'desp'              => $request->desp,  
            
        ]);
        $notification = array(
            'message' => 'Testimoni Updated Successfully',
            'alert-type' => 'success'
                );
        return redirect()->route('all.testimoni')->with($notification);

    }

    public function TestimoniDelete($id){
       Testimoni::FindOrFail($id)->delete();

         $notification = array(
                        'message' => 'Testimoni Delete Successfully',
                        'alert-type' => 'info'
                            );
                    return redirect()->back()->with($notification);
    }
}
