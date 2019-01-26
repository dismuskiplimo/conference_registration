<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\User;

use App\Country;

use Session;

use Auth;

use Mail;

class BackController extends Controller
{
    public function __construct(){
        $this->middleware('loggedin');
    }

    public function showDashboard(){
        return redirect()->route('users.show');
    }

    public function showUsers(){
        $users = User::where('is_admin', 0)->where('deleted', 0)->orderBy('created_at', 'ASC')->get();

        return view('pages.users', [
            'page'  => 'Registered Users',
            'users' => $users,
        ]);
    }

    public function showUser($id){
        $user = User::findOrFail($id);
        $countries = Country::orderBy('name', 'ASC')->get();

        return view('pages.user', [
            'page'          => $user->fname,
            'user'          => $user,
            'countries'     => $countries,
            'nav'           => 'user',
        ]);
    }

    public function deleteUser($id){
        $user = User::findOrFail($id);
        
        $user->deleted = 1;
        $user->deleted_at = $this->date;
        $user->update();

        session()->flash('success', 'User Deleted');

        return redirect()->route('users.show');

    }

    public function updateUser(Request $request, $id){
        $user = User::findOrFail($id);

        $user->title                = $request->title;
        $user->fname                = $request->fname;
        $user->lname                = $request->lname;
        $user->position             = $request->position;
        $user->organisation         = $request->organisation;
        $user->organisation_address = $request->organisation_address;
        $user->city                 = $request->city;
        $user->postcode             = $request->postcode;
        $user->country              = $request->country;
        $user->state                = $request->state;
        $user->work_phone           = $request->work_phone;
        $user->mobile_phone         = $request->mobile_phone;
        $user->email                = $request->email;
        $user->consent_name         = $request->consent_name;
        $user->member_no            = $request->member_no;

        $user->vegeterian           = $request->vegeterian ? 'YES' : 'NO';
        $user->vegan                = $request->vegan ? 'YES' : 'NO';
        $user->gluten_free          = $request->gluten_free ? 'YES' : 'NO';
        $user->lactose_free         = $request->lactose_free ? 'YES' : 'NO';
        $user->halal                = $request->halal ? 'YES' : 'NO';
        $user->kosher               = $request->kosher ? 'YES' : 'NO';
        $user->no_seafood           = $request->no_seafood ? 'YES' : 'NO';
        $user->allergic_to_nuts     = $request->allergic_to_nuts ? 'YES' : 'NO';
        $user->allergic_to_shellfish= $request->allergic_to_shellfish ? 'YES' : 'NO';
        $user->dietary_requirements = $request->dietary_requirements;

        $user->registration         = $request->registration;
        $user->currency             = $request->currency;
        
        $user->paid                 = $request->paid;
        $user->receipt_no           = $request->receipt_no;

        $user->updated_by           = Auth::user()->id;

        $user->update();  

        Session::flash('success', 'User Updated');
        return redirect()->back();
    }

    
}
