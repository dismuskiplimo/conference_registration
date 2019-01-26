@extends('layouts.app')

@section('content')
	<div class="row" style = "margin-bottom: 50px;">
		<div class="col-lg-8 col-lg-offset-2">
			<div class="row">
				<div class="col-lg-12">
					<h2 class="text-teal text-center">CIArb International Conference 2018 Registration</h2><br>
				</div>
			</div>

			<div class="row">
				<div class="col-lg-12">
					
					<div class="steps step-one active border">
						<h4>Step 1</h4>
						<p>Contact Details</p>
					</div>

					<div class="steps step-two border-center">
						<h4>Step 2</h4>
						<p>Dietary Requirements</p>
					</div>

					<div class="steps step-three border">
						<h4>Step 3</h4>
						<p>Registration Information</p>
					</div>

					<div class="steps step-four border-right">
						<h4>Step 4</h4>
						<p>Review</p>
					</div>
				</div>
			</div>

			<form action="" method="POST" class="registration-form">
				{{ csrf_field() }}
			<!-- Nav tabs -->
				<ul class="nav nav-tabs hidden" role="tablist">
					<li role="presentation" class="active"><a href="#step-1" id="step-1-tab" aria-controls="step-1" role="tab" data-toggle="tab">Step 1</a></li>
					<li role="presentation"><a href="#step-2"  id="step-2-tab" aria-controls="step-2" role="tab" data-toggle="tab">Step 2</a></li>
					<li role="presentation"><a href="#step-3"  id="step-3-tab" aria-controls="step-3" role="tab" data-toggle="tab">Step 3</a></li>
					<li role="presentation"><a href="#step-4"  id="step-4-tab" aria-controls="step-4" role="tab" data-toggle="tab">Step 4</a></li>
					<li role="presentation"><a href="#step-5"  id="step-5-tab" aria-controls="step-5" role="tab" data-toggle="tab">Step 5</a></li>
				</ul>

				<!-- Tab panes -->
				<div class="tab-content">
					<div role="tabpanel" class="tab-pane fade in active" id="step-1">
						
						<h3 class="text-teal">Contact Details</h3>

						<p>
							Welcome to the CIArb International Conference 2018 which will be held in Leisure Lodge Beach Resort,Diani , Kenya from the 8th - 9th November 2018. Please follow the steps below to submit your registration.
						</p>
						
						<p>
							If you require an invitation letter when applying a Visa, contact CIArb Kenya through <a href="mailto:conference2018@ciarbkenya.org">conference2018@ciarbkenya.org</a>
						</p>
						
						<p>
							All information should be typed in upper and lower case (e.g. John Smith).
						</p>
						
						<p>
							Please use your work address as it will be published in the Conference Book.
						</p>
						
						<p>
							If you do not receive a confirmation e-mail within 7 days, please contact the Conference Secretariat or print and complete this form then email it to <a href="mailto:conference2018@ciarbkenya.org">conference2018@ciarbkenya.org</a>.
						</p>



						<div class="form-group">
							<label for="title">Title <span class="text-danger">*</span></label>

							<select name="title" id="title" class="form-control" required="">
								<option value="">-- select title --</option>
								<option value="Professor">Professor</option>
								<option value="Dr">Dr</option>
								<option value="Mr">Mr</option>
								<option value="Mrs">Mrs</option>
								<option value="Ms">Ms</option>
								<option value="Miss">Miss</option>
							</select>
						</div>

						<div class="form-group">
							<label for="fname">First Name <span class="text-danger">*</span></label>
							<input type="text" name="fname" id = "fname" class="form-control" placeholder="first name" required="">
						</div>

						<div class="form-group">
							<label for="lname">Last Name <span class="text-danger">*</span></label>
							<input type="text" name="lname" id = "lname" class="form-control" placeholder="last name" required="">
						</div>

						<div class="form-group">
							<label for="position">Position <span class="text-danger">*</span></label>
							<input type="text" name="position" id = "position" class="form-control" placeholder="position" required="">
						</div>

						<div class="form-group">
							<label for="organisation">Organisation (Please indicate your organisation name in full – no acronyms) <span class="text-danger">*</span></label>
							<input type="text" name="organisation" id = "organisation" class="form-control" placeholder="organisation" required="">
						</div>

						<div class="form-group">
							<label for="organisation_address">Organisation's Address (details will be published in the Conference Book) <span class="text-danger">*</span></label>
							<input type="text" name="organisation_address" id = "organisation_address" class="form-control" placeholder="organisation address" required="">
						</div>

						<div class="form-group">
							<label for="city">City <span class="text-danger">*</span></label>
							<input type="text" name="city" id = "city" class="form-control" placeholder="city" required="">
						</div>

						<div class="form-group">
							<label for="postcode">Postcode <span class="text-danger">*</span></label>
							<input type="text" name="postcode" id = "postcode" class="form-control" placeholder="postcode" required="">
						</div>

						<div class="form-group">
							<label for="country">Country <span class="text-danger">*</span></label>

							<select name="country" id = "country" class="form-control" required="">
								<option value="">-- select country</option>
								@foreach($countries as $country)
									<option value="{{ $country->name }}">{{ $country->name }}</option>
								@endforeach
							</select>
							
						</div>

						<div class="form-group">
							<label for="state">State/Province <span class="text-danger">*</span></label>
							<input type="text" name="state" id = "state" class="form-control" placeholder="state" required="">
						</div>

						<div class="form-group">
							<label for="work_phone">Work Phone <span class="text-danger">*</span></label>
							<input type="text" name="work_phone" id = "work_phone" class="form-control" placeholder="work phone" required="">
						</div>

						<div class="form-group">
							<label for="mobile_phone">Mobile/Cell Phone</label>
							<input type="text" name="mobile_phone" id = "mobile_phone" class="form-control" placeholder="mobile/cell phone">
						</div>

						<div class="form-group">
							<label for="email">Email Address <span class="text-danger">*</span></label>
							<input type="email" name="email" id = "email" class="form-control" placeholder="email" required="">
						</div>

						<div class="form-group">
							<label for="email_confirmation">Verify Email Address <span class="text-danger">*</span></label>
							<input type="email" name="email_confirmation" id = "email_confirmation" class="form-control" placeholder="verify email address">
						</div>

						<div class="form-group">
							<label for="">Privacy <span class="text-danger">*</span></label>

							<div class="radio">
								<label for="privacy-1" class="radio-inline">
									<input type="radio" name="consent_name" id="privacy-1" checked="" value="I consent to my details being included in a Conference delegate list."> I consent to my details being included in a Conference delegate list.
								</label> <br>

								<label for="privacy-2" class="radio-inline">
									<input type="radio" name="consent_name" id="privacy-2" value="I do not consent to my details being included in a Conference delegate list."> I do not consent to my details being included in a Conference delegate list.
								</label>
								
							</div>
						</div>	

						<div class="form-group">
							<button type="button" class="btn btn-success step-2-button pull-right">Next <i class="fa fa-arrow-right"></i></button>
						</div>

							
					</div>

					<div role="tabpanel" class="tab-pane fade" id="step-2">
						<h3 class="text-teal">Dietary Requirements</h3>

						<p>
							A variety of foods will be available at the Conference and at associated functions.
						</p>

						<p>
							If you have a specific diet or are allergic/intolerant to any particular foods that we should be aware of, please indicate these below.
						</p>

						<p>
							Note: This should be for serious allergies/intolerances or dietary requirements only and not simply preferences.
						</p>
						
						<p>
							If not applicable, please select 'Next'.
						</p>

						<div class="form-group">
							

							<div class="checkbox">
								<label for="food-1" class="checkbox-inline">
									<input type="checkbox" name="vegeterian" id="food-1"> Vegeterian
								</label> <br>

								<label for="food-2" class="checkbox-inline">
									<input type="checkbox" name="vegan" id="food-2"> Vegan
								</label> <br>

								<label for="food-3" class="checkbox-inline">
									<input type="checkbox" name="gluten_free" id="food-3"> Gluten-Free
								</label> <br>

								<label for="food-4" class="checkbox-inline">
									<input type="checkbox" name="lactose_free" id="food-4"> Lactose-Free
								</label> <br> 

								<label for="food-5" class="checkbox-inline">
									<input type="checkbox" name="halal" id="food-5"> Halal*
								</label> <br>

								<label for="food-6" class="checkbox-inline">
									<input type="checkbox" name="kosher" id="food-6"> Kosher*
								</label> <br>

								<label for="food-7" class="checkbox-inline">
									<input type="checkbox" name="no_seafood" id="food-7"> No seafood
								</label> <br>

								<label for="food-8" class="checkbox-inline">
									<input type="checkbox" name="allergic_to_nuts" id="food-8"> Allergic to nuts
								</label> <br>

								<label for="food-9" class="checkbox-inline">
									<input type="checkbox" name="allergic_to_shellfish" id="food-9"> Allergic to shellfish
								</label>
							</div>
						</div>

						<h4>Dietary Requirements - Other</h4>

						<div class="form-group">
							<label for="dietary_requirements"> Please Specify</label>
							<input type="text" name="dietary_requirements" id = "dietary_requirements" class="form-control" placeholder="dietary requirements">
						</div>

						<div class="form-group">
							<button type="button" class="btn btn-warning step-1-button"><i class="fa fa-arrow-left"></i> Previous</button>
							<button type="button" class="btn btn-success step-3-button pull-right">Next <i class="fa fa-arrow-right"></i></button>
						</div>

						
					</div>

					<div role="tabpanel" class="tab-pane fade" id="step-3">
						<h3 class="text-teal">Registration</h3>

						<p>
							Full Registration Entitlements include:
						</p>		

						<ul>
							<li>Admission to all Conference sessions and exhibition</li>
							<li>Ticket to the Opening Ceremony and Welcome Reception* </li>
							<li>Delegate materials (e.g. program book and satchel)</li>
							<li>Morning tea, lunch and afternoon tea/coffee daily</li>
						</ul>	

						<p>
							*To be eligible for the Member registration rates you must be a registered CIArb Member. Please note all registrations selected as a member will be cross checked for eligibility.
						</p>

						<p>
							All fees are quoted in US Dollars (USD) and are inclusive of 16% Value Added Tax (VAT).
						</p>

						<div class="form-group">
							<label for="">Categories <span class="text-danger">*</span></label>

							<table class="table">
								<tr>
									<td>
										<label for="registration-1" class="radio-inline">
											<input type="radio" name="registration" id="registration-1" checked="" data-price="250" value="CIArb Member"> CIArb Member
										</label> 
									</td>
									
									<th>
										USD 250 / KES 25,000
									</th>
								</tr>

								<tr>
									<td>
										<label for="registration-2" class="radio-inline">
											<input type="radio" name="registration" id="registration-2"  data-price="310" value="Non-Member"> Non-Member
										</label>
									</td>
									
									<th>
										USD 310 / KES 31,000
									</th>
								</tr>

								<tr>
									<td>
										<label for="registration-3" class="radio-inline">
											<input type="radio" name="registration" id="registration-3"  data-price="0" value="CIArb YMG Conference ONLY"> CIArb YMG Conference ONLY
										</label>
									</td>
									
									<th>
										FREE
									</th>
								</tr>

								<tr>
									<td>
										<label for="registration-4" class="radio-inline">
											<input type="radio" name="registration" id="registration-4"  data-price="200" value="CIArb YMG + CIArb Conference"> CIArb YMG + CIArb Conference
										</label>

										<div class="member-wrapper" style = "margin-left:20px">
											<br><label for="member-no">Member Number</label>
											<input type="text" class="form-control" name="member_no" id="member-no" />
										</div>
									</td>
									
									<th>
										USD 200 / KES 20,000
									</th>
								</tr>

								<tr>
									<td>
										<label for="registration-0" class="radio-inline">
											<input type="radio" name="registration" id="registration-0" data-price="0" value="Speaker"> Speaker
										</label> 
									</td>
									
									<th>
										FREE
									</th>
								</tr>


							</table>

				
						</div>

						<div class="form-group">
							<div class="checkbox">
								<label for="" class="checkbox-inline">
									<input type="checkbox" name="accompanying_person" class="accompanying_person">Accompanying Person (USD 100 / KES 10,000)
								</label>

								<p class="text-muted" style="margin-left:20px">
									Only applies to Family members, Spouse and friends who will not be attending the conference.
								</p>								
							</div>

							<div class="accompanying_person_field hidden">
								<label for="accompanying_person_name">Name</label>
								<input type="text" name="accompanying_person_name" data-amount="100" placeholder="name" class="form-control accompanying_person_name">
							</div>
						</div>

						<div class="form-group">
							<div class="checkbox">
								<label for="" class="checkbox-inline">
									<input type="checkbox" name="accommodation" class="accommodation">Accommodation
								</label>			
							</div>

							<div class="accommodation_field hidden">
								<div class="radio">
									<label for="" class="radio-inline">
										<input type="radio" name="accommodation_type" class="accommodation_type" value="Single (USD 106 / KES 9,570) / Day" data-desc="Single (USD 106 / KES 9,570) / Day" data-amount="106" data-amount-kes="9570">Single (USD 106 / KES 9,570) / Day
									</label>

									<label for="" class="radio-inline">
										<input type="radio" name="accommodation_type" class="accommodation_type" value="Double (USD 180 / KES 16,500) / Day" data-amount="180" data-amount-kes="16500" data-desc="Double (USD 180 / KES 16,500) / Day">Double (USD 180 / KES 16,500) / Day
									</label>			
								</div>

								<div class="row">
									<div class="col-xs-6">
										<div class="form-group">
											<label for="">From</label>
											<input type="text" name="from_date" id="" class="from_date form-control">

											<h1>Days : <span class="diff_days">0</span></h1>
										</div>
									</div>

									<div class="col-xs-6">
										<div class="form-group">
											<label for="">To</label>
											<input type="text" name="to_date" id="" class="to_date form-control">
										</div>
									</div>
								</div>								
							</div>
						</div>

						<input type="hidden" name = "price" id = "price" value="">

						<input type="hidden" name = "accompanying_person_amount" id = "accompanying_person_amount" value="0">
						<input type="hidden" name = "accommodation_amount" id = "accommodation_amount" value="0">
						
						<input type="hidden" name = "paid" id = "paid" value="">
						
						<input type="hidden" name = "accommodation_days" id = "accommodation_days" value="0">
						
						<hr>

						<label for="pay-now" class="checkbox-inline">
							<input type="checkbox" name="pay-now" id = "pay-now"> I would like to pay online through the portal after registration.
						</label> <br><br>

						<p style="margin-left:20px"><strong>Currency</strong></p>
						<label for="USD" class="radio-inline"  style="margin-left:20px">
							<input type="radio" name="currency" value="USD" id="USD" checked=""> US Dollars
						</label>

						<label for="KES" class="radio-inline">
							<input type="radio" name="currency" value="KES" id="KES"> Kenyan Shillings
						</label>
						
						<br><br>
						
						
						<p class="text-muted" style="margin-left:20px">
							If you agree to pay though the portal, a page will appear requesting your payment information. If you wish to pay at a later date, please leave the checkbox unchecked.
						</p>

						<div class="form-group">
							<button type="button" class="btn btn-warning step-2-button"><i class="fa fa-arrow-left"></i> Previous</button>
							<button type="button" class="btn btn-success step-4-button pull-right">Next <i class="fa fa-arrow-right"></i></button>
						</div>

						
					</div>

					<div role="tabpanel" class="tab-pane fade" id="step-4">
						<div>
							<h3>Summary <button type="button" class="btn btn-sm btn-primary pull-right print"><i class="fa fa-print"></i> PRINT</button></h3>
						</div>

						<table class="table table-striped printable">
							<tr class="success">
								<th colspan="2">Contact Details</th>
							</tr>

							<tr>
								<th>Title</th>
								<td><span id="title-display"></span></td>
							</tr>

							<tr>
								<th>First Name</th>
								<td><span id="fname-display"></span></td>
							</tr>

							<tr>
								<th>Last Name</th>
								<td><span id="lname-display"></span></td>
							</tr>

							<tr>
								<th>Position</th>
								<td><span id="position-display"></span></td>
							</tr>

							<tr>
								<th>Organisation</th>
								<td><span id="organisation-display"></span></td>
							</tr>

							<tr>
								<th>Organisation Address</th>
								<td><span id="organisation_address-display"></span></td>
							</tr>

							<tr>
								<th>City</th>
								<td><span id="city-display"></span></td>
							</tr>

							<tr>
								<th>Postcode</th>
								<td><span id="postcode-display"></span></td>
							</tr>

							<tr>
								<th>Country</th>
								<td><span id="country-display"></span></td>
							</tr>

							<tr>
								<th>State</th>
								<td><span id="state-display"></span></td>
							</tr>

							<tr>
								<th>Work Phone</th>
								<td><span id="work_phone-display"></span></td>
							</tr>

							<tr>
								<th>Mobile Phone</th>
								<td><span id="mobile_phone-display"></span></td>
							</tr>

							<tr>
								<th>Email</th>
								<td><span id="email-display"></span></td>
							</tr>

							<tr>
								<th>Consent</th>
								<td><span id="consent_name-display"></span></td>
							</tr>

							<tr class="success">
								<th colspan="2">Dietaty Requirements</th>
							</tr>

							<tr>
								<th>Vegetraian</th>
								<td><span id="vegeterian-display"></span></td>
							</tr>

							<tr>
								<th>Vegan</th>
								<td><span id="vegan-display"></span></td>
							</tr>

							<tr>
								<th>Gluten Free</th>
								<td><span id="gluten_free-display"></span></td>
							</tr>

							<tr>
								<th>Lactose Free</th>
								<td><span id="lactose_free-display"></span></td>
							</tr>

							<tr>
								<th>Halal</th>
								<td><span id="halal-display"></span></td>
							</tr>

							<tr>
								<th>Kosher</th>
								<td><span id="kosher-display"></span></td>
							</tr>

							<tr>
								<th>No Seafood</th>
								<td><span id="no_seafood-display"></span></td>
							</tr>

							<tr>
								<th>Allergic to Nuts</th>
								<td><span id="allergic_to_nuts-display"></span></td>
							</tr>

							<tr>
								<th>Allergic to Shellfish</th>
								<td><span id="allergic_to_shellfish-display"></span></td>
							</tr>

							<tr>
								<th>Dietary Requirements (other)</th>
								<td><span id="dietary_requirements-display"></span></td>
							</tr>

							<tr class="success">
								<th colspan="2">Registration Information</th>
							</tr>

							<tr>
								<th>Registration Type</th>
								<td><span id="registration-display"></span></td>
							</tr>

							<tr>
								<th>Member Number</th>
								<td><span id="member_no-display"></span></td>
							</tr>
							
							<tr>
								<th>Accompanying Person</th>
								<td><span id="accompanying_person-display"></span></td>
							</tr>

							<tr>
								<th>Accompanying Person Name</th>
								<td><span id="accompanying_person_name-display"></span></td>
							</tr>

							<tr>
								<th>Accompanying Person Amount</th>
								<td><span id="accompanying_person_amount-display"></span></td>
							</tr>

							<tr>
								<th>Accomodation</th>
								<td><span id="accommodation-display"></span></td>
							</tr>

							<tr>
								<th>Accommodation Type</th>
								<td><span id="accommodation_type-display"></span></td>
							</tr>

							<tr>
								<th>Check In Date</th>
								<td><span id="from_date-display"></span></td>
							</tr>

							<tr>
								<th>Check Out Date</th>
								<td><span id="to_date-display"></span></td>
							</tr>

							<tr>
								<th>Accommodation Days</th>
								<td><span id="accommodation_days-display"></span></td>
							</tr>

							<tr>
								<th>Accommodation Price</th>
								<td><span id="accommodation_amount-display"></span></td>
							</tr>

							<tr>
								<th>Conference Fee</th>
								<td><span id="price-display"></span></td>
							</tr>

							<tr>
								<th>Transaction Fee (3.5% of Registration Fees)</th>
								<td><span id="commission-display"></span></td>
							</tr>

							<tr>
								<th>Total Fee</th>
								<td><span id="total-display"></span></td>
							</tr>

						</table>

						<div class="terms-and-conditions">
							<h3>Terms and Conditions</h3>
							
							<div class="panel panel-success">
								<div class="panel-body">
									<div class="terms">
										<h4>Email communication</h4>
										<p>
											By providing your email address on the registration form, you agree to the event manager and other approved stakeholders communicating with you via email to market and manage this and future events of this type. You may opt out at any time.
										</p>

										<h4>Onsite Photography</h4>
										<p>
											Photos from the Conference may also be published on the website or other marketing materials. Please notify the onsite photographer if you do not wish to have your photo taken.
										</p>

										<h4>Cancellation Policy</h4>
										<h5>Deadline: 9 October 2018</h5>

										<p>
											Cancellations must be notified by e-mail to the Conference Secretariat. Cancellations made prior to 9 October 2018 will result in a full refund less 10% to cover administration costs. As an alternative to cancellation, your registration may be transferred to another person without incurring any cost penalty. The Congress Secretariat must be advised in writing of any alterations or transfers.
										</p>
									</div>	
								</div>
								
							</div>

							<p>
								<label for="accept-terms" class="checkbox-inline">
									<input type="checkbox" name="accept-terms" id = "accept-terms" required=""> I agree to the above terms and conditions. <span class="text-danger">*</span>
								</label>
							</p>
							
							

							
							

						</div>

						<div class="form-group">
							<button type="button" class="btn btn-warning step-3-button"><i class="fa fa-arrow-left"></i> Previous</button>
							<button type="submit" class="btn btn-success pull-right"><i class="fa fa-check"></i> Submit Registration</button>
						</div>

											
					</div>

					<div role="tabpanel" class="tab-pane fade" id="step-5">
						<div>
							
						</div>

						<button type="button" class="btn btn-warning step-4-button">Previous</button>
					</div>
				</div>

			</form>
			
		</div>
	</div>
@endsection

