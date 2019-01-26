@extends('layouts.email')

@section('content')
	<p>Dear {{ $user->title . ' ' . $user->fname }}</p>

	<p>
		Your payment of <strong>{{ env('CURRENCY') }} {{ number_format($user->price) }}</strong> has been received. Your registration for the conference is now complete. You will receive an official receipt in due time.
	</p><br>

	<p>Regards,</p>
	<p>CIArb Kenya Branch</p>



@endsection