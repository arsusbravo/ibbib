<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Crew;
use App\Models\Price;
use App\Models\Degree;
use App\Models\Certificate;

class CrewController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $user = \Auth::user();
        $languages = \App\Models\Language::whereActive(1)->get();
        $countries = \App\Models\Country::all();
        $userCrew = Crew::find($user->crew->id);
        $selectedCountry = $userCrew->country_id;
        $degrees = Degree::all();
        return view('user.settings', [
            'user' => $user,
            'degrees' => $degrees,
            'countries' => $countries,
            'languages' => $languages,
            'selectedCountry' => $selectedCountry
        ]);
    }

    public function pricing(){
        $user = \Auth::user();
        $pricelist = Price::where('role_id', $user->role_id)->get();
        return view('user.pricing', [
            'user' => $user,
            'pricelist' => $pricelist,
        ]);
    }

    public function update(Request $request){
        $certificates = array();
        $user = \Auth::user();
        $updatedUser = User::find($user->id);
        $updatedUser->name = $request->name;
        $updatedUser->save();

        $updatedCrew = Crew::find($updatedUser->crew->id);
        $updatedCrew->objective = $request->objective;
        $updatedCrew->resume = $request->motivation;
        $updatedCrew->co_phone = $request->phone;
        $updatedCrew->standard_rates = $request->standard_rates;
        $updatedCrew->additional_info = $request->additional_info;
        $updatedCrew->unit_rate = $request->unit_rate;
        $updatedCrew->country_id = $request->country_id;
        $updatedCrew->save();
            
        $crewId = Crew::find($updatedUser->crew->id);
       
      
        if($request->certificates){
            foreach($request->certificates as $certificate){
                if($certificate['id'] == 0){
                    $Newcertificate = new Certificate;
                }else {
                    $Newcertificate = Certificate::find($certificate['id']);
                }
              
                $Newcertificate->title = $certificate['title_cert'];
                $Newcertificate->crew_id = $updatedCrew->id;
                $Newcertificate->description = $certificate['description_cert'];
                $Newcertificate->language_from = $certificate['cert_langFrom'];
                $Newcertificate->language_to = $certificate['cert_langTo'];
                $Newcertificate->issued = $certificate['cert_year'];
                $Newcertificate->degree_id = $certificate['degree_id'] > 0 ? $certificate['degree_id']: null;
                $Newcertificate->save();
            }
        }
        if ($updatedCrew->save()) {
            return response()->json($updatedCrew);
        }
    }

    // public function update(Request $request)
    // {
    //     $certificates = array();
    //     $user = \Auth::user();
    //     $input = $request->all();
    //     $updatedUser = User::find($user->id);
    //     $updatedUser->name = $input['name'];
    //     $updatedUser->save();

    //     $updatedCrew = Crew::find($updatedUser->crew->id);
    //     $updatedCrew->objective = $input['objective'];
    //     $updatedCrew->resume = $input['motivation'];
    //     $updatedCrew->co_phone = $input['phone'];
    //     $updatedCrew->standard_rates = $input['standard_rates'];
    //     $updatedCrew->additional_info = $input['additional_info'];
    //     $updatedCrew->unit_rate = $input['unit_rate'];
    //     $updatedCrew->country_id = $input['country_id'];
    //     $updatedCrew->save();

    //     if ($updatedUser->save()) {
    //         return redirect('user/account')->with('success_msg', __('Your profile has been updated'));
    //     } else {
    //         return redirect()->back()->with('error_msg', __('Oops! Your profile cannot be updated!'));
    //     }
    // }
}
