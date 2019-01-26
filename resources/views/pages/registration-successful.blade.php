@extends('layouts.app')

@section('content')
	<div class="row">
		<div class="col-lg-12">
			<p>Dear {{ $user->fname }},</p>

			<p>
				Your Registration for the CIArb International Conference 2018 as <strong>[{{ $user->registration }}]</strong> has been received. Please wait for an official acknowledgment from CIArb Kenya.
			</p>

		</div>

	</div>

	@if(!$user->paid && $user->price)

	<div class="row">
		<div class="col-sm-12">
			<p>
				If you have not paid and would like to pay, you can make your payment of <strong>{{ $user->currency }} {{ number_format($user->price + $user->accommodation_amount + $user->accompanying_person_amount) }}</strong> through the following methods.
			</p> <br>
		</div>

		<div class="col-sm-6">
			<h2>Bank Details</h2>
			<p><strong>Bank : </strong> Commercial Bank of Afirca </p>
			<p><strong>Branch : </strong> Mama Ngina </p>
			<p><strong>A/C Name : </strong> Chartered Institute of Arbitrators </p>
			<p><strong>A/C No (Kenyan Shillings) : </strong> 6435390017 </p>
			<p><strong>A/C No (US Dollars) : 6435390067</strong></p>
			<p><strong>Swift Code : </strong> CBAFKENX </p>

		</div>

		<div class="col-sm-6">
			<h3>Mpesa Details</h3>

			<p><strong>MPESA Paybill Number : </strong> 975743 </p>
			<p><strong>Account Number : </strong> CIARB CONF </p>
		</div>
	
	</div>

	@endif
	

	<p>Regards, <br> CIArb Kenya</p>

	<p>
		<a href="{{ env('MAIN_SITE') }}" class="btn btn-info">Go Home</a>
	</p>
@endsection