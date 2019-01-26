<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Carbon\Carbon;

use Auth;

use Session;

use Mail;

use App\User;

use App\Country;



class UserController extends Controller
{
    
    public function getRegistration(){
    	$countries = Country::orderBy('name', 'ASC')->get();

        return view('pages.registration', [
            'page'        => 'Register',
    		'countries'   => $countries,
    	]);
    }

    public function postRegistration(Request $request){
        $this->validate($request, [

        ]);

        $user = new User;
        
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
        $user->member_no            = $request->member_no ? : null;

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

        $user->accommodation                = $request->accommodation ? 'YES' : 'NO';
        $user->accommodation_type           = $request->accommodation_type ? : 'N/A';
        $user->accommodation_days           = $request->accommodation_days ? : 0;
        $user->from_date                    = $request->from_date ? : 'N/A';
        $user->to_date                      = $request->to_date ? : 'N/A';
        $user->accommodation_days           = $request->accommodation_days ? : 0;
        $user->accommodation_amount         = $request->accommodation_amount ? : 0;

        $user->accompanying_person          = $request->accompanying_person ? 'YES' : 'NO';
        $user->accompanying_person_name     = $request->accompanying_person_name ? : 'N/A';
        $user->accompanying_person_amount   = $request->accompanying_person_amount ?  : 0;

        $user->price                        = $request->price;

        $user->registration                 = $request->registration;
        $user->currency                     = $request->currency;
        
        if($request->currency == 'KES'){
            
            $user->price                        = $request->price * 100;
            $user->accommodation_amount         = $request->accommodation_amount ? $request->accommodation_amount : 0;
            $user->accompanying_person_amount   = $request->accompanying_person_amount ? $request->accompanying_person_amount * 100  : 0;

        }
        
        $tot = ($user->price + $user->accompanying_person_amount + $user->accommodation_amount); 
        if($tot == 0){
            $user->paid = 1;
        }

        $user->pesapal_merchant_reference = generateRandomString();

        $user->save();

         try{
            $subject = "Conference Registration Details";

            Mail::send('emails.registration-details', ['subject' => $subject, 'user' => $user], function ($message) use($user, $subject){
                $message->subject($subject);
                $message->to($user->email);
            });

            Mail::send('emails.registration-details-support', ['subject' => $subject, 'user' => $user], function ($message) use($user, $subject){
                $message->subject($subject);
                $message->to(env('SUPPORT_MAIL'));
            });

        }catch(\Exception $e){
            Session::flash('error', $e->getMessage());
        }


        if($request->has('pay-now')){
            if(!$user->paid){
                return redirect()->route('payment.pesapal.request', ['id' => $user->id]);
            }
        }

        return redirect()->route('registration.successfull', ['id' => $user->id]);

    }

    public function getSuccessPage($id){

        $user = User::find($id);

        if(!$user){
            return redirect()->back();
        }

        return view('pages.registration-successful', [
            'page'        => 'Registration Successful',
            'user'        => $user,
        ]);
    }


    public function getUser($id){

    }

    public function getUsers(){
		   	
    }

    public function sendMail(User $user){

    }
}
