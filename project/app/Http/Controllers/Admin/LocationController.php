<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Country;
use App\Models\State;
use App\Models\City;

class LocationController extends Controller
{
    public function countryListing()
    {
    	$countries = Country::orderBy('name', 'asc')->where('deleted', '0')->paginate(10);
    	return view('admin/location/country/listing',compact('countries'));
    }

    public function countryNew(Request $request)
    {
    	if ($request->isMethod('post')){
    		$country = new Country($request->all());
            $destinationPath = 'images/settings/' ;
            $fileName = uploadFileWithAjax($destinationPath,$request->file('image'),1);
            $country->image = $fileName;
    		if($country->save())
    		{
    		   return redirect()->route('admin.countryListing')->with('success', 'Country has been added sucessfully');
    		}
    	}else{
			return view('admin/location/country/new');	
    	}
    }

    public function countryEdit(Request $request, $id)
    {
    	if ($request->isMethod('get')){
    		$country = Country::find($id);
    		return view('admin/location/country/edit',compact('country'));		
    	}else{
    		$country = Country::find($id);
            $country->currency_id = $request->currency_id;
             $destinationPath = 'images/settings/' ;
             if($request->hasFile('image')){
                $fileName = uploadFileWithAjax($destinationPath,$request->file('image'),1);
                $country->image = $fileName;
                
             }
    		$country->update($request->all());
    		if($country->save())
    		{
    			return redirect()->route('admin.countryListing')->with('success', 'Country has been updated sucessfully');
    		}else{
    			return redirect()->route('admin.countryListing')->with('error', 'Could not update country. Please try again');
    		}
    	}
    }

    public function countryDelete(Request $request)
    {
    	$country = Country::find($request->id);
    	$country->deleted = "1";
    	if($country->save())
    		{
    			    return response()->json([
				        'success' => 'Country has been deleted successfully!'
				    ]);
    		}else{
    				return response()->json([
				        'error' => 'Could not delete country. Please try again'
				    ]);
    		}
    }


	public function stateListing()
    {
    	$states = State::orderBy('name', 'asc')->where('deleted', '0')->paginate(10);
    	return view('admin/location/state/listing',compact('states'));
    }

    public function stateNew(Request $request)
    {
        if ($request->isMethod('post')){
            $state = new State($request->all());
            if($state->save())
            {
               return redirect()->route('admin.stateListing')->with('success', 'State has been added sucessfully');
            }
        }else{
            $countries = Country::orderBy('name', 'asc')->where('deleted', '0')->get();
            return view('admin/location/state/new', compact('countries'));  
        }
    }


    public function stateEdit(Request $request, $id)
    {
        if ($request->isMethod('get')){
            $countries = Country::orderBy('name', 'asc')->where('deleted', '0')->get();
            $state = State::find($id);
            return view('admin/location/state/edit',compact('countries','state'));      
        }else{
            $state = State::find($id);
            $state->update($request->all());
            if($state->save())
            {
                return redirect()->route('admin.stateListing')->with('success', 'State has been updated sucessfully');
            }else{
                return redirect()->route('admin.stateListing')->with('error', 'Could not update state. Please try again');
            }
        }
    }

    public function stateDelete(Request $request)
    {
        $state = State::find($request->id);
        $state->deleted = "1";
        if($state->save())
            {
                    return response()->json([
                        'success' => 'State has been deleted successfully!'
                    ]);
            }else{
                    return response()->json([
                        'error' => 'Could not delete state. Please try again'
                    ]);
            }
    }

    public function cityListing()
    {
        $cities = City::orderBy('name', 'asc')->where('deleted', '0')->paginate(10);
        return view('admin/location/city/listing',compact('cities'));
    }

    public function cityNew(Request $request)
    {

        if ($request->isMethod('post')){
            
            $city = new City;
            $city->state_id = $request->state_id;
            $city->name = $request->name;
            $city->save();
             return redirect()->route('admin.cityListing')->with('success', 'City has been added sucessfully');
            
        }else{
             $states = State::orderBy('name', 'asc')->where('deleted', '0')->get();
            return view('admin/location/city/new', compact('states'));  
        }
    }


    public function cityEdit(Request $request, $id)
    {
        if ($request->isMethod('get')){
            $states = State::orderBy('name', 'asc')->where('deleted', '0')->get();
            $city = City::find($id);
            return view('admin/location/city/edit',compact('states','city'));      
        }else{
            $city = City::find($id);
            $city->update($request->all());
            if($city->save())
            {
                return redirect()->route('admin.cityListing')->with('success', 'City has been updated sucessfully');
            }else{
                return redirect()->route('admin.cityListing')->with('error', 'Could not update city. Please try again');
            }
        }
    }

    public function cityDelete(Request $request)
    {
        $city = City::find($request->id);
        $city->deleted = "1";
        if($city->save())
            {
                    return response()->json([
                        'success' => 'City has been deleted successfully!'
                    ]);
            }else{
                    return response()->json([
                        'error' => 'Could not delete city. Please try again'
                    ]);
            }
    }    
}
