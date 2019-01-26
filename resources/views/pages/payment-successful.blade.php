@extends('layouts.app')

@section('content')
	<p>Dear {{ $user->fname }},</p>

	<p>
		Your payment of <strong>{{ env('CURRENCY') }} {{ $user->price }}</strong> has has been received. Please wait for an official receipt from CIArb Kenya.
	</p>

	<p>
		<a href="{{ env('MAIN_SITE') }}" class="btn btn-info">Go Home</a>
	</p>

	<p>Regards, <br> CIArb Kenya</p>
@endsection