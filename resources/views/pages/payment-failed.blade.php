@extends('layouts.app')

@section('content')
	<p>Dear {{ $user->fname }},</p>

	<p>
		Your payment has has not yet been received. The Current status of the transaction is <strong>{{ $status }}</strong> 
	</p>

	<p>
		@if($status == 'PENDING')
			<a href="{{ route('payment.pesapal.verify', ['id' => $user->id]) }}" class="btn btn-info">Check Status</a>

			<input type="hidden" name="payment-status" value="{{ $status }}">
			
		@elseif($status == 'FAILED')
			<a href="{{ route('payment.pesapal.request', ['id' => $user->id]) }}" class="btn btn-info">Pay Now</a>
		@endif
		
	</p>

	<p>Regards, <br> CIArb Kenya</p>
@endsection