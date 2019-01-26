@extends('layouts.app')

@section('content')
	<div class="row my-100">
		<div class="col-sm-6 col-xs-offset-3">
			<form action="" method="POST">
				{{ csrf_field() }}

				<h3>Staff Login</h3>

				<div class="form-group">
					<label for="username">Username</label>
					<input type="text" class="form-control" value="{{ old('username') }}" name="username" id="username" required="">
				</div>

				<div class="form-group">
					<label for="password">Password</label>
					<input type="password" class="form-control" name="password" id="password" required="">
				</div>

				<div class="form-group">
					<div class="checkbox">
						<label for="remember" class="checkbox-inline">
							<input type="checkbox" name="remember" id="remember"> Remember Me
						</label>
					</div>
				</div>

				<button type="submit" class="btn btn-info">Login</button>

			</form>
		</div>
	</div>
@endsection