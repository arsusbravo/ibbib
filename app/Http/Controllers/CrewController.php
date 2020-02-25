<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Crew;
use App\Models\Price;
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
        return view('user.settings', [
            'user' => $user,
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
        $user = \Auth::user();
        $updatedUser = User::find($user->id);
        $crewId = Crew::find($updatedUser->crew->id);
        $Newcertificate = new Certificate;
        $Newcertificate->title = $request->title_cert;
        $Newcertificate->crew_id = $crewId->id;
        $Newcertificate->description = $request->description_cert;
        $Newcertificate->language_from = $request->cert_langFrom;
        $Newcertificate->language_to = $request->cert_langTo;
        $Newcertificate->save();
        if ($Newcertificate->save()) {
            return response()->json($Newcertificate);
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
