@extends('layouts.app')

@section('content')
	<iframe src="<?php echo $iframe_src;?>" width="100%" height="700px"  scrolling="no" frameBorder="0">
		<p>Browser unable to load iFrame</p>
	</iframe>
@endsection