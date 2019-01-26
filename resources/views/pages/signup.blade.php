@extends('layouts.app')

@section('content')
	<div class="row my-100">
		<div class="col-sm-6 col-xs-offset-3">
			<form action="" method="POST">
				{{ csrf_field() }}

				<h3>Staff Signup</h3>

				<div class="form-group">
					<label for="fname">First Name</label>
					<input type="text" class="form-control" value="{{ old('fname') }}" name="fname" id="fname" required="">
				</div>

				<div class="form-group">
					<label for="lname">Last Name</label>
					<input type="text" class="form-control" value="{{ old('lname') }}" name="lname" id="lname" required="">
				</div>

				<div class="form-group">
					<label for="email">Email</label>
					<input type="email" class="form-control" value="{{ old('email') }}" name="email" id="email" required="">
				</div>

				<div class="form-group">
					<label for="username">Username</label>
					<input type="text" class="form-control" value="{{ old('username') }}" name="username" id="username" required="">
				</div>

				<div class="form-group">
					<label for="password">Password</label>
					<input type="password" class="form-control" name="password" id="password" required="">
				</div>


				<div class="form-group">
					<label for="passwordpassword_confirmation">Confirm Password</label>
					<input type="password" class="form-control" name="password_confirmation" id="password_confirmation" required="">
				</div>

				<button type="submit" class="btn btn-info">Signup</button>

			</form>
		</div>
	</div>
@endsection