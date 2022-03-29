<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Hero;
use Image;

class HeroController extends Controller
{
public function HeroView(){
        $heros = Hero::latest()->get();
        return view('backend.hero.hero_view',compact('heros'));
    }
    public function HeroAdd(){
        $heros = Hero::latest()->get();
        return view('backend.hero.add_hero',compact('heros'));
    }

    public function HeroStore(Request $request){
        $request->validate([
            
        'heading1'         => 'required',
        'heading2'         => 'required',
        'heading3'         => 'required',
        'heading4'         => 'required',
        'img'             => 'required',
        ]);

        $image = $request->file('img');
        $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
        Image::make($image)->resize(820,567)->save('upload/hero/'.$name_gen);
        $save_url = 'upload/hero/'.$name_gen;

        Hero::insert([
        'heading1'           => $request->heading1,
        'heading2'           => $request->heading2,
        'heading3'           => $request->heading3,
        'heading4'           => $request->heading4,
        'img'               => $save_url,
        ]);
         $notification = array(
            'message' => 'Hero Inserted Successfully',
            'alert-type' => 'success'
                );
        return redirect()->route('all.hero')->with($notification);
    }

    public function HeroEdit($id){

        // $Heros = Hero::find($id);
        $heros = Hero::findOrFail($id);
        return view('backend.hero.hero_edit',compact('heros'));

    }

    public function HeroUpdate(Request $request,$id){

        
        $old_image = $request->old_img;

        if($request->file('img')){

            unlink($old_image);
           
                $image = $request->file('img');
                $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
                Image::make($image)->resize(820,567)->save('upload/hero/'.$name_gen);
                $save_url = 'upload/hero/'.$name_gen;


                Hero::FindOrFail($id)->update([
                    'img'               => $save_url,
                ]);
                $notification = array(
                    'message' => 'Hero Updated Successfully',
                    'alert-type' => 'success'
                        );
                return redirect()->route('all.hero')->with($notification);


        }else{
                Hero::FindOrFail($id)->update([
                       'heading1'           => $request->heading1,
                        'heading2'           => $request->heading2,
                        'heading3'           => $request->heading3,
                        'heading4'           => $request->heading4,
                    
                    ]);
                    $notification = array(
                        'message' => 'Hero Updated Successfully',
                        'alert-type' => 'success'
                            );
                    return redirect()->route('all.hero')->with($notification);

        }

    }

    public function HeroDelete($id){
        $hero = Hero::FindOrFail($id);
        $img = $hero->img;
        unlink($img);

       Hero::FindOrFail($id)->delete();

         $notification = array(
                        'message' => 'Hero Delete Successfully',
                        'alert-type' => 'info'
                            );
                    return redirect()->back()->with($notification);
    }
}
