<div class="modal fade" id = "edit-user-modal">
  <div class="modal-dialog">
    <div class="modal-content">
      <form action="" method="post">
        {{ csrf_field() }}

        <input type="hidden" name="_method" value="PATCH">

        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
          <h4 class="modal-title">Edit {{ $user->fname }}</h4>
        </div>

        <div class="modal-body">
          <ul class="nav nav-tabs" role="tablist">
            <li role="presentation" class="active">
              <a href="#contact-details" aria-controls="home" role="tab" data-toggle="tab">Contact Details</a>
            </li>
            
            <li role="presentation">
              <a href="#dietary-requirements" aria-controls="profile" role="tab" data-toggle="tab">Dietary Requirements</a>
            </li>
            
            <li role="presentation">
              <a href="#registration-information" aria-controls="messages" role="tab" data-toggle="tab">Registration Information</a>
            </li>
          </ul>

          <div class="tab-content">
            <div role="tabpanel" class="tab-pane active" id="contact-details">
              <div class="form-group">
                <label for="title">Title <span class="text-danger">*</span></label>

                <select name="title" id="title" class="form-control" required="">
                  <option value="">-- select title --</option>
                  <option value="Professor"{{ $user->title == 'Professor' ? ' selected' : '' }}>Professor</option>
                  <option value="Dr"{{ $user->title == 'Dr' ? ' selected' : '' }}>Dr</option>
                  <option value="Mr"{{ $user->title == 'Mr' ? ' selected' : '' }}>Mr</option>
                  <option value="Mrs"{{ $user->title == 'Mrs' ? ' selected' : '' }}>Mrs</option>
                  <option value="Ms"{{ $user->title == 'Ms' ? ' selected' : '' }}>Ms</option>
                  <option value="Miss"{{ $user->title == 'Miss' ? ' selected' : '' }}>Miss</option>
                </select>
              </div>

              <div class="form-group">
                <label for="fname">First Name <span class="text-danger">*</span></label>
                <input type="text" name="fname" id = "fname" class="form-control" placeholder="first name" required="" value="{{ $user->fname }}">
              </div>

              <div class="form-group">
                <label for="lname">Last Name <span class="text-danger">*</span></label>
                <input type="text" name="lname" id = "lname" class="form-control" placeholder="last name" required="" value="{{ $user->lname }}">
              </div>

              <div class="form-group">
                <label for="position">Position <span class="text-danger">*</span></label>
                <input type="text" name="position" id = "position" class="form-control" placeholder="position" required="" value="{{ $user->position }}">
              </div>

              <div class="form-group">
                <label for="organisation">Organisation (Please indicate your organisation name in full – no acronyms) <span class="text-danger">*</span></label>
                <input type="text" name="organisation" id = "organisation" class="form-control" placeholder="organisation" required="" value="{{ $user->organisation }}">
              </div>

              <div class="form-group">
                <label for="organisation_address">Organisation's Address (details will be published in the Conference Book) <span class="text-danger">*</span></label>
                <input type="text" name="organisation_address" id = "organisation_address" class="form-control" placeholder="organisation address" required="" value="{{ $user->organisation_address }}">
              </div>

              <div class="form-group">
                <label for="city">City <span class="text-danger">*</span></label>
                <input type="text" name="city" id = "city" class="form-control" placeholder="city" required="" value="{{ $user->city }}">
              </div>

              <div class="form-group">
                <label for="postcode">Postcode <span class="text-danger">*</span></label>
                <input type="text" name="postcode" id = "postcode" class="form-control" placeholder="postcode" required="" value="{{ $user->postcode }}">
              </div>

              <div class="form-group">
                <label for="country">Country <span class="text-danger">*</span></label>

                <select name="country" id = "country" class="form-control" required="">
                  <option value="">-- select country</option>
                  @foreach($countries as $country)
                    <option value="{{ $country->name }}"{{ $user->country == $country->name ? ' selected' : '' }}>{{ $country->name }}</option>
                  @endforeach
                </select>
                
              </div>

              <div class="form-group">
                <label for="state">State/Province <span class="text-danger">*</span></label>
                <input type="text" name="state" id = "state" class="form-control" placeholder="state" required=""value="{{ $user->state }}">
              </div>

              <div class="form-group">
                <label for="work_phone">Work Phone <span class="text-danger">*</span></label>
                <input type="text" name="work_phone" id = "work_phone" class="form-control" placeholder="work phone" required="" value="{{ $user->work_phone }}">
              </div>

              <div class="form-group">
                <label for="mobile_phone">Mobile/Cell Phone</label>
                <input type="text" name="mobile_phone" id = "mobile_phone" class="form-control" placeholder="mobile/cell phone" value="{{ $user->mobile_phone }}">
              </div>

              <div class="form-group">
                <label for="email">Email Address <span class="text-danger">*</span></label>
                <input type="email" name="email" id = "email" class="form-control" placeholder="email" required=""value="{{ $user->email }}">
              </div>

              <div class="form-group">
                <label for="">Privacy <span class="text-danger">*</span></label>

                <div class="radio">
                  <label for="privacy-1" class="radio-inline">
                    <input type="radio" name="consent_name" id="privacy-1" {{ $user->consent_name == 'I consent to my details being included in a Conference delegate list.' ? 'checked=""' : '' }} value="I consent to my details being included in a Conference delegate list."> I consent to my details being included in a Conference delegate list.
                  </label> <br>

                  <label for="privacy-2" class="radio-inline">
                    <input type="radio" name="consent_name" id="privacy-2" {{ $user->consent_name == 'I do not consent to my details being included in a Conference delegate list.' ? 'checked=""' : '' }}  value="I do not consent to my details being included in a Conference delegate list."> I do not consent to my details being included in a Conference delegate list.
                  </label>
                  
                </div>
              </div>
            </div>
            
            <div role="tabpanel" class="tab-pane" id="dietary-requirements">
              <div class="form-group">
                <div class="checkbox">
                  <label for="food-1" class="checkbox-inline">
                    <input type="checkbox" name="vegeterian" id="food-1"{{ $user->vegeterian == 'YES' ? ' checked=""' : '' }}> Vegeterian
                  </label> <br>

                  <label for="food-2" class="checkbox-inline">
                    <input type="checkbox" name="vegan" id="food-2"{{ $user->vegan == 'YES' ? ' checked=""' : '' }}> Vegan
                  </label> <br>

                  <label for="food-3" class="checkbox-inline">
                    <input type="checkbox" name="gluten_free" id="food-3"{{ $user->gluten_free == 'YES' ? ' checked=""' : '' }}> Gluten-Free
                  </label> <br>

                  <label for="food-4" class="checkbox-inline">
                    <input type="checkbox" name="lactose_free" id="food-4"{{ $user->lactose_free == 'YES' ? ' checked=""' : '' }}> Lactose-Free
                  </label> <br> 

                  <label for="food-5" class="checkbox-inline">
                    <input type="checkbox" name="halal" id="food-5"{{ $user->halal == 'YES' ? ' checked=""' : '' }}> Halal*
                  </label> <br>

                  <label for="food-6" class="checkbox-inline">
                    <input type="checkbox" name="kosher" id="food-6"{{ $user->kosher == 'YES' ? ' checked=""' : '' }}> Kosher*
                  </label> <br>

                  <label for="food-7" class="checkbox-inline">
                    <input type="checkbox" name="no_seafood" id="food-7"{{ $user->no_seafood == 'YES' ? ' checked=""' : '' }}> No seafood
                  </label> <br>

                  <label for="food-8" class="checkbox-inline">
                    <input type="checkbox" name="allergic_to_nuts" id="food-8"{{ $user->allergic_to_nuts == 'YES' ? ' checked=""' : '' }}> Allergic to nuts
                  </label> <br>

                  <label for="food-9" class="checkbox-inline">
                    <input type="checkbox" name="allergic_to_shellfish" id="food-9"{{ $user->allergic_to_shellfish == 'YES' ? ' checked=""' : '' }}> Allergic to shellfish
                  </label>
                </div>
              </div>

              <h4>Dietary Requirements - Other</h4>

              <div class="form-group">
                <label for="dietary_requirements"> Please Specify</label>
                <input type="text" name="dietary_requirements" id = "dietary_requirements" class="form-control" placeholder="dietary requirements" value="{{ $user->dietary_requirements }}">
              </div>
            </div>
            
            <div role="tabpanel" class="tab-pane" id="registration-information">
              <div class="form-group">
                <label for="">Categories <span class="text-danger">*</span></label>

                <table class="table">
                  <tr>
                    <td>
                      <label for="registration-1" class="radio-inline">
                        <input type="radio" name="registration" id="registration-1" checked="" data-price="250" value="CIArb Member"{{ $user->registration == 'CIArb Member' ? ' checked=""' : '' }}> CIArb Member
                      </label> 
                    </td>
                    
                    <th>
                      USD 250 / KES 25,000
                    </th>
                  </tr>

                  <tr>
                    <td>
                      <label for="registration-2" class="radio-inline">
                        <input type="radio" name="registration" id="registration-2"  data-price="310" value="Non-Member" {{ $user->registration == 'Non-Member' ? ' checked=""' : '' }}> Non-Member
                      </label>
                    </td>
                    
                    <th>
                      USD 310 / KES 31,000
                    </th>
                  </tr>

                  <tr>
                    <td>
                      <label for="registration-3" class="radio-inline">
                        <input type="radio" name="registration" id="registration-3"  data-price="0" value="CIArb YMG Conference ONLY" {{ $user->registration == 'CIArb YMG Conference ONLY' ? ' checked=""' : '' }}> CIArb YMG Conference ONLY
                      </label>
                    </td>
                    
                    <th>
                      FREE
                    </th>
                  </tr>

                  <tr>
                    <td>
                      <label for="registration-4" class="radio-inline">
                        <input type="radio" name="registration" id="registration-4"  data-price="200" value="CIArb YMG + CIArb Conference" {{ $user->registration == 'CIArb YMG + CIArb Conference' ? ' checked=""' : '' }}> CIArb YMG + CIArb Conference
                      </label>
                    </td>
                    
                    <th>
                      USD 200 / KES 20,000
                    </th>
                  </tr>

                  <tr>
                    <td>
                      <label for="registration-4" class="radio-inline">
                        <input type="radio" name="registration" id="registration-0"  data-price="0" value="Speaker" {{ $user->registration == 'Speaker' ? ' checked=""' : '' }}> Speaker
                      </label>
                    </td>
                    
                    <th>
                      FREE
                    </th>
                  </tr>


                </table>
              </div>

              <div class="form-group">
                <label for="member-no">Member Number</label>
                <input type="text" class="form-control" name="member_no" id="member-no" value="{{ $user->member_no }}" />
              </div>

              <div class="form-group">
                <label for="price">Price</label>
                <input type="number" name = "price" id = "price" value="{{ $user->price }}" class="form-control" required="">
              </div>

              <div class="form-group">
                <label for="paid">Paid</label>

                <select name="paid" id="paid" class="form-control" required="">
                  <option value="1"{{ $user->paid ? ' selected' : '' }}>YES</option>
                  <option value="0"{{ $user->paid ? '' : ' selected' }}>NO</option>
                </select>
              </div>

              <div class="form-group">
                <label for="currency">Currency</label>

                <select name="currency" id="currency" class="form-control" required="">
                  <option value="USD"{{ $user->currency == 'USD' ? ' selected' : '' }}>USD</option>
                  <option value="KES"{{ $user->currency == 'KES' ? ' selected' : '' }}>KES</option>
                </select>
              </div>

              <div class="form-group">
                <label for="receipt_no">Receipt No</label>
                <input type="text" name = "receipt_no" id = "receipt_no" value="{{ $user->receipt_no }}" class="form-control">
              </div>

            </div>
            
            <hr>

            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary">Save changes</button>
          </div>

          </div>
        </div>

      </form>
    </div>
  </div>
</div>