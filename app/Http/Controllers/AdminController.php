<?php

namespace App\Http\Controllers;

use App\Models\Location;
use App\Models\PropertyDesc;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Villa;

class AdminController extends Controller
{
    function manageUserView(){
        $users = User::whereIn('role_id', [1, 2])->get();
   
        return view('admin.manage-users',compact('users'));
    } 
    function approveUser(Request $req){
        $id = $req->id;
        $user = User::find($id);
        $user->isApproved = 1;
        $user->save();
        return response()->json(['success'=>'Approved User']); 
    }
    function disapproveUser(Request $req){
        $id = $req->id;
        $user = User::find($id);
        $user->isApproved = 0;
        $user->save();
        return response()->json(['success'=>'Disapproved User']); 

    }

    function addVillaView(){
        return view('admin.add-villa');
    }
    function addVilla(Request $request){
        $valid = $request->validate([
            'villaname'=>'required',
            'desc'=>'required',
            'amenities.*'=>'required',
            'owner'=>'required',
            'guests'=>'required|numeric',
            'price'=>'required|numeric',
            'bedrooms'=>'required',
            'bathrooms'=>'required',
            'kitchens'=>'required',
            'images.*'=>'required|mimes:jpeg,png,jpg,gif|max:2048',
            'address'=>'required',
            'landmark'=>'required',
            'city'=>'required',
            'zipcode'=>'required|numeric',
            'country'=>'required',
        ]);
        if($request->hasFile('images')){
            $files = $request->file('images');
            $filenamesDB = [];
            $path = public_path('assets/villa_images');
            foreach($files as $key => $item){
              $filename = $item->getClientOriginalName();
              $item->move($path,$filename);
              $filenamesDB[] = $filename;
            }   
            $implodedImages = implode(',',$filenamesDB);
        }
        if($valid){
            //// VILLA DESC ////
            $villa = new Villa;
            $villa->name = $request->villaname; 
            $villa->description = $request->desc;
            $villa->images = $implodedImages;
            $villa->guests = $request->guests;
            $villa->amenities = implode(',',$request->amenities);
            $villa->owner = $request->owner;
            $villa->price_per_night = $request->price;
            $villa->save();
            $villaId = $villa->id;
            //// PROPERTY LAYOUT ////
            $villa_layout = new PropertyDesc;
            $villa_layout->property_id = $villaId ;
            $villa_layout->bedrooms =  $request->bedrooms;
            $villa_layout->bathrooms = $request->bathrooms;
            $villa_layout->kitchen = $request->kitchens;
            $villa_layout->save();
            //// LOCATION /////
            $villa_location = new Location;
            $villa_location->property_id = $villaId;
            $villa_location->address = $request->address;
            $villa_location->landmark = $request->landmark;
            $villa_location->city = $request->city;
            $villa_location->state = $request->state;
            $villa_location->zip_code = $request->zipcode;
            $villa_location->country = $request->country;
            $villa_location->save();
            return redirect()->back()->with('success','Villa added Successfully');
        }
        return redirect()->back()->with('error','Error Occured');
    }
}
