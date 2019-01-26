@extends('layouts.app')

@section('content')
	
		<div class="row">
			<div class="col-lg-12">
				<p>
					<a href="" data-toggle="modal" data-target="#edit-user-modal" class="btn btn-primary"><i class="fa fa-edit"></i> EDIT</a>

					<a href="{{ route('user.delete', ['id' => $user->id]) }}" class="btn btn-danger confirm-delete" title="Delete {{ $user->fname }}"><i class="fa fa-trash"></i> DELETE USER</a>

					<a href="{{ route('users.show') }}" class="btn btn-info pull-right"><i class="fa fa-arrow-left"></i> BACK</a>
				</p>
				<table class="table table-striped printable">
					<tr class="success">
						<th colspan="2">Contact Details</th>
					</tr>

					<tr>
						<th>Title</th>
						<td>{{ $user->title }}</td>
					</tr>

					<tr>
						<th>First Name</th>
						<td>{{ $user->fname }}</td>
					</tr>

					<tr>
						<th>Last Name</th>
						<td>{{ $user->lname }}</td>
					</tr>

					<tr>
						<th>Position</th>
						<td>{{ $user->position }}</td>
					</tr>

					<tr>
						<th>Organisation</th>
						<td>{{ $user->organisation }}</td>
					</tr>

					<tr>
						<th>Organisation Address</th>
						<td>{{ $user->organisation_address }}</td>
					</tr>

					<tr>
						<th>City</th>
						<td>{{ $user->city }}</td>
					</tr>

					<tr>
						<th>Postcode</th>
						<td>{{ $user->postcode }}</td>
					</tr>

					<tr>
						<th>Country</th>
						<td>{{ $user->country }}</td>
					</tr>

					<tr>
						<th>State</th>
						<td>{{ $user->state }}</td>
					</tr>

					<tr>
						<th>Work Phone</th>
						<td>{{ $user->work_phone }}</td>
					</tr>

					<tr>
						<th>Mobile Phone</th>
						<td>{{ $user->mobile_phone }}</td>
					</tr>

					<tr>
						<th>Email</th>
						<td>{{ $user->email }}</td>
					</tr>

					<tr>
						<th>Consent</th>
						<td>{{ $user->consent_name }}</td>
					</tr>

					<tr>
						<th>Registration Date</th>
						<td>{{ $user->created_at->format('D d M, Y') }}</td>
					</tr>

					<tr class="success">
						<th colspan="2">Dietaty Requirements</th>
					</tr>

					<tr>
						<th>Vegetraian</th>
						<td>{{ $user->vegeterian }}</td>
					</tr>

					<tr>
						<th>Vegan</th>
						<td>{{ $user->vegan }}</td>
					</tr>

					<tr>
						<th>Gluten Free</th>
						<td>{{ $user->gluten_free }}</td>
					</tr>

					<tr>
						<th>Lactose Free</th>
						<td>{{ $user->lactose_free }}</td>
					</tr>

					<tr>
						<th>Halal</th>
						<td>{{ $user->halal }}</td>
					</tr>

					<tr>
						<th>Kosher</th>
						<td>{{ $user->kosher }}</td>
					</tr>

					<tr>
						<th>No Seafood</th>
						<td>{{ $user->no_seafood }}</td>
					</tr>

					<tr>
						<th>Allergic to Nuts</th>
						<td>{{ $user->allergic_to_nuts }}</td>
					</tr>

					<tr>
						<th>Allergic to Shellfish</th>
						<td>{{ $user->allergic_to_shellfish }}</td>
					</tr>

					<tr>
						<th>Dietary Requirements (other)</th>
						<td>{{ $user->dietary_requirements }}</td>
					</tr>

					<tr class="success">
						<th colspan="2">Registration Information</th>
					</tr>

					<tr>
						<th>Registration Type</th>
						<td>{{ $user->registration }}</td>
					</tr>

					<tr>
						<th>Member Number</th>
						<td>{{ $user->member_no ? : 'N/A' }}</td>
					</tr>

					<tr>
						<th>Accompanying Person</th>
						<td>{{ $user->accompanying_person }}</td>
					</tr>

					<tr>
						<th>Accompanying Person Name</th>
						<td>{{ $user->accompanying_person_name }}</td>
					</tr>

					<tr>
						<th>Accompanying Person Amount</th>
						<td>{{ $user->currency . ' ' . $user->accompanying_person_amount }}</td>
					</tr>

					<tr>
						<th>Accomodation</th>
						<td>{{ $user->accommodation }}</td>
					</tr>

					<tr>
						<th>Accommodation Type</th>
						<td>{{ $user->accommodation_type }}</td>
					</tr>

					<tr>
						<th>Check In Date</th>
						<td>{{ $user->from_date }}</td>
					</tr>

					<tr>
						<th>Check Out Date</th>
						<td>{{ $user->to_date }}</td>
					</tr>

					<tr>
						<th>Accommodation Days</th>
						<td>{{ $user->accommodation_days }}</td>
					</tr>

					<tr>
						<th>Accommodation Price</th>
						<td>{{ $user->currency . ' ' . $user->accommodation_amount }}</td>
					</tr>

					<tr>
						<th>Price</th>
						<td>{{ $user->price ? $user->currency . ' ' . number_format($user->price + $user->accompanying_person_amount + $user->accommodation_amount) : 'FREE' }}</td>
					</tr>

					<tr>
						<th>Payment</th>
						<td>{{ $user->paid ? 'PAID' : 'PENDING' }}</td>
					</tr>

					<tr>
						<th>Paid</th>
						<td>{{ $user->paid ? 'YES' : 'NO' }}</td>
					</tr>

					<tr>
						<th>Paid at</th>
						<td>{{ $user->paid_at }}</td>
					</tr>


					<tr>
						<th>Receipt No.</th>
						<td>{{ $user->receipt_no }}</td>
					</tr>

					<tr>
						<th>Last updated by</th>
						<td>{{ $user->user ? $user->user->username : 'Not yet updated' }}</td>
					</tr>

				</table>
			</div>
		</div>
	
	@include('pages.modals.edit-user-modal')

@endsection