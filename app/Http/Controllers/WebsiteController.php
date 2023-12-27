<?php

namespace App\Http\Controllers;

use App\Models\Location;
use App\Models\Villa;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Date;

class WebsiteController extends Controller
{
    public function singleVilla(Request $req){
        
        $property_id = $req->property_id;
        $villa = Villa::with(['location', 'layout'])->where('id', $property_id)->first();
        $checkin = $req->checkin;
        $checkout = $req->checkout;
        $checkind = Carbon::parse($req->checkin);
        $checkoutd = Carbon::parse($req->checkout);
        $nights = $checkind->diffInDays($checkoutd);
        $adults = $req->adults;
        $children =  $req->children;
        $guests = $req->adults + $req->children;
        if($nights == 0){
            $nights = 1;
        };
        return view('website.villa-single',compact('villa','checkin','checkout','nights','guests','adults','children'));
    }
    function searchLocation(Request $req){
        $searchLocation = $req->travel_location;
        $villaLocations = Location::where('city', 'like', '%' . $searchLocation . '%')
        ->orWhere('state', 'like', '%' . $searchLocation . '%')
        ->orWhere('country', 'like', '%' . $searchLocation . '%')
        ->get();
        return $villaLocations;
    }

    function searchVilla(Request $req){
        $req->validate([
            'travel_location'=>'required',
            // 'checkindate'=>'required',
            // 'checkoutdate'=>'required',
            'adults'=>'required',
            'children'=>'required',
        ]);
   
        $searchLocation = explode(', ',$req->travel_location);
        $checkin = $req->checkindate;
        $checkout = $req->checkoutdate;
        $adults = $req->adults;
        $children = $req->children;
        $guests = $adults + $children;
       
        // VILLA LOCATION SEARCH //
        if(count($searchLocation ) == 1 ){
            $villa_location = Location::where('city', 'like', '%' . $searchLocation[0] . '%')
            ->orWhere('state', 'like', '%' . $searchLocation[0] . '%')
            ->get();
        }
        else{
            $villa_location = Location::where('city', 'like', '%' . $searchLocation[0] . '%')
            ->orWhere('state', 'like', '%' . $searchLocation[1] . '%')
            ->get();
        }
        $properties = [];
        foreach($villa_location as $p){
            $properties[] = $p->property_id;
        }
        // NIGHTS //
        $urlData =$_GET;
        
        $datein = Carbon::parse($checkin);
        $dateout = Carbon::parse($checkout);
        $nights = $datein->diffInDays($dateout);
 
        $villa = Villa::with(['layout','location'])->whereIn('id',$properties)->where('guests','>=',$guests)->get();
        if($villa){
            return view('website.villas',compact('villa','urlData','nights','adults','children'));
        }

    }
    function bookVillaView(Request $req){
        $requests =$req->validate([
            'checkIndate'=>'required',
            'checkOutdate'=>'required',
            'email'=>'required|email',
            'phone'=>'required',
            'guests'=>'required',
            'totalbeforetax'=>'required',
        ]);
        $datein = Carbon::parse($requests['checkIndate']);
        $dateout = Carbon::parse($requests['checkOutdate']);
        $nights = $datein->diffInDays($dateout);
        if($requests){
            return view('website.booking',compact('requests','nights'));
        }
        
    }

}
