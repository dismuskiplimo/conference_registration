<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

use Carbon\Carbon;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;


    protected $date 	= null,
    		  $token 	= null,
    		  $params 	= null,
    		  $mode,
    		  $consumer_key,
    		  $consumer_secret,
    		  $signature_method,
    		  $currency;

    public function initialize(){
    	$this->mode 			= env('PESAPAL_MODE');
    	$this->currency 		= env('CURRENCY');
    	$this->date 			= Carbon::now();
    	$this->signature_method = new \OAuthSignatureMethod_HMAC_SHA1();

    	if($this->mode == 'demo'){
    		$this->consumer_key 	= env('PESAPAL_DEMO_CONSUMER_KEY');
    		$this->consumer_secret 	= env('PESAPAL_DEMO_CONSUMER_SECRET');
    	}elseif($this->mode == 'live'){
    		$this->consumer_key 	= env('PESAPAL_LIVE_CONSUMER_KEY');
    		$this->consumer_secret 	= env('PESAPAL_LIVE_CONSUMER_SECRET');
    	}
    }
}
