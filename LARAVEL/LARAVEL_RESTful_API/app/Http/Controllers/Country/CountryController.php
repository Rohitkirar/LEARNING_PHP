<?php

namespace App\Http\Controllers\Country;

use App\Http\Controllers\Controller;
use App\Http\Requests\CreateCountryRequest;
use App\Models\Country;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CountryController extends Controller
{
    public function country(){
        try{
            $country = Country::get();
            
            if($country)
                return response()->json(Country::get() , 200);
            
            return response()->json(["message" => "Records not found"] , 404);
        }
        catch(Exception $e){
            return response()->json(["message" => $e->getMessage()] , 404);
        }
    }

    public function countryById($id){
        try{
            $country = Country::find($id);
            
            if($country)
                return response()->json($country , 200);

            return response()->json([ "message" => "No Record Found" ] , 404);
        }
        catch(Exception $e){
            return response()->json(["message" => $e->getMessage()] , 404);
        }
    }

    //! public function createCountry(CreateCountryRequest $request){ //request not working
    public function createCountry(Request $request){
        try{
            
            $rules = [
                "name" => "required|min:3",
                "dname" => "required|min:3"
            ];

            $validator = Validator::make($request->all() , $rules);

            if($validator->fails())
                return response()->json( $validator->errors() , 400);

            $country = Country::create($request->all());
            
            if($country)
                return response()->json($country , 201); //by default it send 200
            
            return response()->json([ "message" => "Failed to create record" ] , 404);
        }
        catch(Exception $e){
            return response()->json(["message" => $e->getMessage()] , 404);
        }
    }

    public function updateCountry(Request $request, $id){
        try{
            $country = Country::find($id);

            if($country){

                $rules = [
                    "name" => "required|min:3",
                    "dname" => "required|min:3"
                ];
    
                $validator = Validator::make($request->all() , $rules);
    
                if($validator->fails())
                    return response()->json( $validator->errors() , 400);

                $country->update($request->all());
                return response()->json($country, 200);
            
            }
            return response()->json([ "message" => "No Record Found" ] , 404);
        }
        catch(Exception $e){
            return response()->json(["message" => $e->getMessage()] , 404);
        }
    
    }

    public function deleteCountry($id){

        $country = Country::find($id);

        if($country){
            $country->delete();
            return response()->json(null, 204);
        }
        return response()->json([ "message" => "No Record Found" ] , 404);
    }

}
