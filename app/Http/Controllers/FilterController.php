<?php

namespace App\Http\Controllers;

use App\Models\Location;
use App\Models\Villa;
use Illuminate\Http\Request;

class FilterController extends Controller
{
    function filterAmenity(Request $req){
        $amenities = $req->amenity;
        $location = $req->location;
        $searchLocation = explode(', ',$location);
                                                              
        if ($amenities == null) {
            if(count($searchLocation ) == 1 ){
                $filteredVillaLoc =Location::where('city', 'like', '%' . $searchLocation[0] . '%')
                    ->orWhere('state', 'like', '%' . $searchLocation[0] . '%')
                    ->get();
                    
                }else{
                    $filteredVillaLoc =Location::where('city', 'like', '%' . $searchLocation[0] . '%')
                    ->orWhere('state', 'like', '%' . $searchLocation[1] . '%')
                    ->get();
                }
            $villaLocs = [];
            foreach ($filteredVillaLoc as $loc) {
                $villaLocs[] = $loc->property_id;
            }
    
            $filteredVillaModels = Villa::whereIn('id', $villaLocs)->get();
            return response()->json(['success' => $filteredVillaModels]);
        } else {
            if(count($searchLocation ) == 1 ){
            $filteredVillaLoc =Location::where('city', 'like', '%' . $searchLocation[0] . '%')
                ->orWhere('state', 'like', '%' . $searchLocation[0] . '%')
                ->get();
                
            }else{
                $filteredVillaLoc =Location::where('city', 'like', '%' . $searchLocation[0] . '%')
                ->orWhere('state', 'like', '%' . $searchLocation[1] . '%')
                ->get();
            }
            $villaLocs = [];
            foreach ($filteredVillaLoc as $loc) {
                $villaLocs[] = $loc->property_id;
            }
            $villa = Villa::whereIn('id', $villaLocs)->get();
            
            $filteredVillas = [];
            foreach ($villa as $v) {
                $v_amenities = explode(',', $v->amenities);
                    foreach ($amenities as $a) {
                        if (count(array_intersect($amenities, $v_amenities)) === count($amenities)) {
                            $filteredVillas[] = $v->id;
                        }
                    }
                }
    
            $filteredVillas = array_unique($filteredVillas); // Remove duplicate IDs
            $filteredVillas = array_values($filteredVillas); // Reset array keys
            $filteredVillaModels = Villa::whereIn('id', $filteredVillas)->get();
            return response()->json(['success' => $filteredVillaModels]);
        }
    
    }
}