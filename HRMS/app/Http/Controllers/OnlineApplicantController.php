<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\OnlineApplicant;
use Illuminate\Support\Facades\Storage;
use File;
use Response;
use App\Models\Country;
use App\Models\City;
use App\Models\State;
use App\Models\Jobtitle;
use Session;
use DB;
use Illuminate\Pagination\LengthAwarePaginator;

class OnlineApplicantController extends Controller
{
    //
    function show()
    {
        return view('onlinerecruitment')->with("countries", Country::all())
                                        ->with("cities", City::all())
                                        ->with("states", State::all())
                                        ->with("jobtitles", Jobtitle::all());
    }

    function store(Request $request)
    {
        $image=$request->file('profile-image');   
        $image->move('images',$image->getClientOriginalName());                
        $imageName=$image->getClientOriginalName();

        $document=$request->file('resume-file');   
        $document->move('documents',$document->getClientOriginalName());   
        $documentName=$document->getClientOriginalName();

        $addApplicant = OnlineApplicant::create([
            'name' => $request -> name,
            'ic' => $request -> noic,
            'dob' => $request -> dob,
            'gender' => $request -> gender,
            'marital_status' => $request -> maritalstatus,
            'race' => $request -> race,
            'religion' => $request -> religion,
            'nationality' => $request -> nationality,
            'email' => $request -> email,
            'phone_num' => $request -> phone,
            'address' => $request -> address,
            'city' => $request -> city,
            'state' => $request -> state,
            'zipcode' => $request -> zipcode,
            'country' => $request -> country,
            'position_applied' => $request -> position,
            'expected_salary' => $request -> Esalary,
            'document' => $documentName,
            'image' => $imageName,
            'emergency_contact_name'  => $request -> Ename,
            'emergency_contact_number' => $request -> Ephone,
            'relation_emergency' => $request -> Erelation,
        ]);
        
        return view('recruitment');
    }

    function adminshow()
    {
        $onlineapplicants = OnlineApplicant::paginate(10);
        return view('recruitmentadmin')->with('onlineapplicants', $onlineapplicants);
    }

    function view($id)
    {
        $onlineapplicants = OnlineApplicant::all()->where('id', $id);
        //return dd($onlineapplicants);
        return view('recruitmentdetail')->with('onlineapplicants', $onlineapplicants);
    }

    function download($id)
    {
        $onlineapplicants = OnlineApplicant::where('id', $id)->firstOrFail();
        $pathToFile = public_path('documents/'. $onlineapplicants->document);
        return response()->download($pathToFile);
    }

    
}
