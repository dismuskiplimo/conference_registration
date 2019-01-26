@extends('layouts.app')

@section('content')
	<div class="row mh-70">
		<div class="col-lg-12">
			<h3>Registered Users ({{ count($users) }})</h3><br>

			@if(count($users))
				<table class="table table-bordered tiny data-table table-responsive">
					<thead>
						<tr>
							<th>TITLE</th>
							<th>NAME</th>
							<th>ORGANISATION</th>
							<th>POSITION</th>
							<th>COUNTRY</th>
							<th>EMAIL</th>
							<th>ATTENDING AS</th>
							<th>AMOUNT</th>
							<th>PAID</th>
							
							<th></th>
							<th></th>
						</tr>
					</thead>

					<tbody>
						@foreach($users as $user)
							<tr>
								<td>{{ $user->title }}</td>
								<td>{{ $user->fname . ' ' . $user->lname }}</td>
								<td>{{ $user->organisation }}</td>
								<td>{{ $user->position }}</td>
								<td>{{ $user->country }}</td>	
								<td>{{ $user->email }}</td>
								<td>{{ $user->registration }}</td>
								<td>{{ $user->currency . ' ' . number_format($user->price) }}</td>
								<td>{{ $user->paid ? 'YES' : 'NO' }}</td>
								
								<td>
									<a href="{{ route('user.show', ['id' => $user->id]) }}" class="btn btn-xs btn-primary" title="View {{ $user->fname }}">
										<i class="fa fa-eye"></i>
									</a>
								</td>

								<td>
									<a href="{{ route('user.delete', ['id' => $user->id]) }}" class="btn btn-xs btn-danger confirm-delete" title="Delete {{ $user->fname }}">
										<i class="fa fa-trash"></i>
									</a>
								</td>
							</tr>
						@endforeach
					</tbody>
				</table>
			@else
				<p class="text-muted">No Users Registered</p>
			@endif


		</div>
	</div>
@endsection