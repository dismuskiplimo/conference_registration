@extends('layouts.email')

@section('content')

	<p>
		Payment of <strong>{{ env('CURRENCY') }} {{ number_format($user->price) }}</strong> has been received for <strong>{{ $user->title . ' ' . $user->fname . ' ' . $user->lname }}</strong>, email address {{ $user->email }}. 
	</p><br>

	<p>Regards,</p>
	<p>CIArb Kenya Branch</p>



@endsection