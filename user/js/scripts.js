$(document).ready(function(){
	var price 			= $('input[name=registration]:checked').data('price');
	var registration 	= $('input[name=registration]:checked').val();
	var curr 			= $('input[name=currency]:checked').val();
	var comm 			= '0';

	$('input[name=price]').val(price);

	if(price == 0){
		price = 'FREE';
		total = '0';

		$('input[name=paid]').val('1');
	}else{
		if(curr == 'USD'){
			comm 		= ((price / .965) - price);
			total 		= 'USD ' + (parseInt(comm) + parseInt(price));
			comm 		= 'USD ' + Math.round(comm);
			price 		= 'USD ' + price;
		}else{
			comm 		= (((price / .965) - price) * 100).toLocaleString();
			total 		= 'KES ' + (parseInt(comm) + parseInt(price * 100)).toLocaleString();
			comm 		= 'KES ' + Math.round(comm);
			price 		= 'KES ' + (parseInt(price) * 100).toLocaleString();
		}
		

		$('input[name=paid]').val('0');
	}

	function resetSteps(){
		$('.steps').each(function(index, value){
			$(this).removeClass('active');
		});
	}

	$('#registration-display').text(registration);
	$('#commission-display').text(comm);
	
	$('#total-display').text(total);
	$('#price-display').text(price);

	$('.step-1-button').on('click', function(){
		$('#step-1-tab').tab('show');

		resetSteps();

		$('.step-one').addClass('active');
	});

	$('.step-2-button').on('click', function(){
		var fields = ['#title', '#fname', '#lname', '#position', '#country', '#organisation', '#organisation_address', 
					  '#city', '#postcode', '#state', '#work_phone',
	  				  '#email, #email_confirmation'];

	  	var errors = 0;

	  	$.each(fields, function(index, value){
	  		$(value).closest('.form-group').removeClass('has-error');
	  	});

	  	$.each(fields, function(index, value){
	  		if( $(value).val() == '' ||  $(value).val() == undefined){
	  			$(value).closest('.form-group').addClass('has-error');

	  			errors++;
	  		}

	  	});

	  	if(!errors){
	  		if($('#email').val() == $('#email_confirmation').val()){
				$('#step-2-tab').tab('show');

				resetSteps();

				$('.step-two').addClass('active');

	  		}else{
	  			$('#email').closest('.form-group').addClass('has-error');
		  		$('#email_confirmation').closest('.form-group').addClass('has-error');

		  		$('.step-1-button').click();

		  		Swal('Email mismatch', 'The email address does not match with the confirmation email, please check', 'error');

		  		
	  		}

	  		
	  		
	  	}else{
	  		$('.step-1-button').click();

	  		Swal('Required Fields', 'Please Complete the highlighted fields before proceeding', 'error');

	  	}

	});

	$('.step-3-button').on('click', function(){
		$('#vegeterian-display').text('NO');
		$('#vegan-display').text('NO');
		$('#gluten_free-display').text('NO');
		$('#lactose_free-display').text('NO');
		$('#halal-display').text('NO');
		$('#kosher-display').text('NO');
		$('#no_seafood-display').text('NO');
		$('#allergic_to_nuts-display').text('NO');
		$('#allergic_to_shellfish-display').text('NO');

		$('#dietary_requirements-display').text($('#dietary_requirements').val());

		if($('input[name=vegeterian]').is(':checked')){
			$('#vegeterian-display').text('YES');
		}

		if($('input[name=vegan]').is(':checked')){
			$('#vegan-display').text('YES');
		}

		if($('input[name=gluten_free]').is(':checked')){
			$('#gluten_free-display').text('YES');
		}

		if($('input[name=lactose_free]').is(':checked')){
			$('#lactose_free-display').text('YES');
		}

		if($('input[name=halal]').is(':checked')){
			$('#halal-display').text('YES');
		}

		if($('input[name=kosher]').is(':checked')){
			$('#kosher-display').text('YES');
		}

		if($('input[name=no_seafood]').is(':checked')){
			$('#no_seafood-display').text('YES');
		}

		if($('input[name=allergic_to_nuts]').is(':checked')){
			$('#allergic_to_nuts-display').text('YES');
		}

		if($('input[name=allergic_to_shellfish]').is(':checked')){
			$('#allergic_to_shellfish-display').text('YES');
		}


		$('#step-3-tab').tab('show');

		resetSteps();

		$('.step-three').addClass('active');
	});

	$('.step-4-button').on('click', function(){
		
		var errors = 0;
		var messages = [];



		if($('input[name=accommodation]:checked').length > 0){
			if($('.accommodation_type:checked').length < 1){
				errors += 1;
				messages.push('You need to select the Room type');

				$('input[name=accommodation]').closest('.radio').addClass('has-error');
			}else{
				$('input[name=accommodation]').closest('.radio').removeClass('has-error');
			}

			var from_date = $('.from_date').val();
			var to_date = $('.to_date').val();

			if(from_date == '' || from_date == undefined ){
				errors += 1;
				messages.push('You need to select the check in date');

				$('.from_date').closest('.form-group').addClass('has-error');
			}else{
				$('.from_date').closest('.form-group').removeClass('has-error');
			}

			if(to_date == '' || to_date == undefined ){
				errors += 1;
				messages.push('You need to select the check out date');

				$('.to_date').closest('.form-group').addClass('has-error');
			}else{
				$('.to_date').closest('.form-group').removeClass('has-error');
			}
		}

		if($('input[name=accompanying_person]:checked').length > 0){
			var accompanying_person_name = $('.accompanying_person_name').val();

			if(accompanying_person_name == '' || accompanying_person_name == undefined ){
				errors += 1;
				messages.push('You need to give the name of the accompanying person');

				$('.accompanying_person_name').closest('.form-group').addClass('has-error');
			}else{
				$('.accompanying_person_name').closest('.form-group').removeClass('has-error');
			}
		}

		if($('input[name=currency]:checked').length < 1){
			errors += 1;
			messages.push('You need to select a currency to use');
		}

		$('#member-no').closest('.member-wrapper').removeClass('has-error');

		if($('#registration-1:checked').length > 0 || $('#registration-3:checked').length > 0){
			if($('#member-no').val() == ''){
				errors += 1;
				messages.push('You need to input your member number');
				$('#member-no').closest('.member-wrapper').addClass('has-error');
			}
			
		}

		if(errors > 0){
			var final = '';

			$.each(messages, function(index, value){
				final += value + ' | ';
			});

			Swal('Errors', final, 'error');
		}

		else{

			var local_currency = $('input[name=currency]:checked').val();
			var multiplier    	= local_currency == 'USD' ? 1 : 100;

			var accompanying_person_display 		= $('.accompanying_person:checked').length > 0 ? 'YES' : 'NO';
			var accompanying_person_name_display 	= $('.accompanying_person_name').val() ? $('.accompanying_person_name').val() : 'N/A';
			
			var accompanying_person_amount_display 	= $('.accompanying_person:checked').length > 0 ? $('.accompanying_person_name').data('amount') * multiplier : '0';

			$('#accompanying_person_amount').val(accompanying_person_amount_display / multiplier);

			accompanying_person_amount_display 		= local_currency + ' ' + accompanying_person_amount_display.toLocaleString() ;
			
			var accommodation_display 				= $('.accommodation:checked').length > 0 ? 'YES' : 'NO';
			var accommodation_type_display 			= $('.accommodation:checked').length > 0 ? $('.accommodation_type:checked').val() : 'N/A';
			var from_date_display 					= $('.from_date').val() ? $('.from_date').val() : 'N/A';
			var to_date_display 					= $('.to_date').val() ? $('.to_date').val() : 'N/A';
			var accommodation_days_display 			= parseInt($('#accommodation_days').val()) > 0 ? parseInt($('#accommodation_days').val()) : 0;
			var accommodation_amount_display;
			
			if(local_currency == 'KES'){
				accommodation_amount_display 		= $('.accommodation_type:checked').data('amount-kes') ? (parseInt($('.accommodation_type:checked').data('amount-kes')) * accommodation_days_display) : '0';
				$('#accommodation_amount').val(accommodation_amount_display);
			}else{
				accommodation_amount_display 		= $('.accommodation_type:checked').data('amount') ? (parseInt($('.accommodation_type:checked').data('amount')) * multiplier * accommodation_days_display) : '0';
				$('#accommodation_amount').val(accommodation_amount_display / multiplier);
			}
						
			accommodation_amount_display 			= local_currency + ' ' + accommodation_amount_display.toLocaleString();

			$('#accompanying_person-display').html(accompanying_person_display);
			$('#accompanying_person_name-display').html(accompanying_person_name_display);
			$('#accompanying_person_amount-display').html(accompanying_person_amount_display);
			
			$('#accommodation-display').html(accommodation_display);
			$('#accommodation_type-display').html(accommodation_type_display);
			$('#from_date-display').html(from_date_display);
			$('#to_date-display').html(to_date_display);
			$('#accommodation_days-display').html(accommodation_days_display);
			$('#accommodation_amount-display').html(accommodation_amount_display);
			
			var member_no;

			if($('#registration-1:checked').length > 0 || $('#registration-3:checked').length > 0){
				member_no = $('#member-no').val();
			}else{
				member_no = 'N/A';
			}

			$('#member_no-display').html(member_no);

			var conference_fee 		= parseInt($('#price').val());
			var accomodation_fee 	= parseInt($('#accommodation_amount').val() / multiplier);
			var person_fee 			= parseInt($('#accompanying_person_amount').val());

			var sub_total 	= (conference_fee + accomodation_fee + person_fee) * multiplier;
			
			var total 		= (sub_total) / 0.965;
			
			total 			= Math.round(total);

			var commission;	
			
			commission 		= total - sub_total;

			$('#commission-display').html(local_currency + ' ' + commission.toLocaleString()); 
			$('#total-display').html(local_currency + ' ' + total.toLocaleString()); 

			$('#step-4-tab').tab('show');

			resetSteps();

			$('.step-four').addClass('active');
		}
	

	});

	$('.step-5-button').on('click', function(){
		
		resetSteps();

		$('.step-five').addClass('active');
		
	});



	$('#fname, #lname, #position, #organisation, #organisation_address, #city, #postcode, #state, #work_phone, #mobile_phone, ' + 
	  '#email').on('change keyup', function(){
		$('#fname-display').text($('#fname').val());
		$('#lname-display').text($('#lname').val());
		$('#position-display').text($('#position').val());
		$('#organisation-display').text($('#organisation').val());
		$('#organisation_address-display').text($('#organisation_address').val());
		$('#city-display').text($('#city').val());
		$('#postcode-display').text($('#postcode').val());
		$('#state-display').text($('#state').val());
		$('#work_phone-display').text($('#work_phone').val());
		$('#mobile_phone-display').text($('#mobile_phone').val());
		$('#email-display').text($('#email').val());
	});

	$('#title, #country').on('change', function(){
		$('#title-display').text($('#title').find(':selected').val());
		$('#country-display').text($('#country').find(':selected').val());

	});

	$('input[name=currency]').on('change', function(){
		var that 	= $(this);
		var input 	= $('input[name=registration]:checked');
		var price 	= parseInt(input.data('price'));
		
		if(that.val() == 'USD'){
			commission 	= ((price / .965) - price);
			total 		= 'USD ' + (parseInt(commission) + parseInt(price));
			commission 	= 'USD ' + Math.round(commission);
			price 		= 'USD ' + price;
			
		}else{
			commission = (((price / .965) - price) * 100).toLocaleString();
			total 		= 'KES ' + (parseInt(commission) + parseInt(price * 100)).toLocaleString();
			commission 	= 'KES ' + Math.round(commission); 
			price 		= 'KES ' + (price * 100).toLocaleString();
		}
		
		$('#price-display').text(price);
		$('#commission-display').text(commission);
		$('#total-display').text(total);
		

	});

	$('#privacy-1, #privacy-2').on('change', function(){
		$('#consent_name-display').text($(this).val());
	});

	$('input[name=registration]').on('change', function(){
		var price 			= parseInt($(this).data('price'));
		var registration 	= $(this).val();
		var currency		= $('input[name=currency]:checked').val();
		var that			= $(this);

		if(that.val() == 'CIArb Member' || that.val() == 'CIArb YMG Conference ONLY'){
			$('.member-wrapper').removeClass('hidden');
			$('#member-no').attr('disabled', false);
			$('#member-no').attr('required', true);
		}else{
			$('.member-wrapper').addClass('hidden');
			$('#member-no').attr('disabled', true);
			$('#member-no').attr('required', false);
		}

		$('input[name=price]').val(price);

		if(price == 0){
			price 		= 'FREE';
			commission 	= '0';
			total 		= '0';

			$('input[name=paid]').val('1');

			// $('input[name=pay-now]').prop('checked', false);
			// $('input[name=pay-now]').prop('disabled', true);

		}else{
			if(currency == 'USD'){
				commission 	= ((price / .965) - price);
				total 		= 'USD ' + (parseInt(commission) + parseInt(price));
				commission 	= 'USD ' + Math.round(commission);
				price 		= 'USD ' + price;

			}else{
				commission 	= (((price / .965) - price) * 100).toLocaleString();
				total 		= 'KES ' + (parseInt(commission) + parseInt(price * 100)).toLocaleString();
				commission 	= 'KES ' + Math.round(commission);
				price 		= 'KES ' + (price * 100).toLocaleString();
			}

			$('input[name=paid]').val('0');

			// $('input[name=pay-now]').prop('disabled', false);
		}


		$('#registration-display').text(registration);
		$('#price-display').text(price);
		$('#commission-display').text(commission);
		$('#total-display').text(total);

	});

	if($('#privacy-1').is(':checked') || $('#privacy-2').is(':checked')){
		var val = $('input[name=consent_name]').val();

		$('#consent_name-display').text(val);
	}

	if($('input[name=payment-status]').length){
		var val = $('input[name=payment-status]').val();

		if(val == 'PENDING'){
			setInterval(function(){
				window.location.reload(true);
			}, 10000);
		}
	}

	if($('.data-table').length){
		$('.data-table').DataTable({
			"pageLength" : 25,
			"order" : [],
		});
	}

	if($('.from_date').length){
		$('.from_date').datepicker({

		});
	}

	if($('.to_date').length){
		$('.to_date').attr('readonly', true);

		$('.to_date').datepicker({

		});
	}

	$('.from_date, .to_date').on('change', function(){
		var from_date 	= $('.from_date').val();
		var to_date 	= $('.to_date').val();

		if(from_date != '' && from_date != undefined){
			$('.to_date').attr('readonly', false);
		}else{
			$('.to_date').attr('readonly', true);
		}

		if(from_date != '' && from_date != undefined & to_date != '' && to_date != undefined){
			from_date 		= new Date(from_date);
			to_date 		= new Date(to_date);
			var timeDiff 	= Math.abs(to_date.getTime() - from_date.getTime());
			var diffDays 	= Math.ceil(timeDiff / (1000 * 3600 * 24));

			if(diffDays == 0){
				diffDays = 1;
			}

			$('#accommodation_days').val(diffDays);
			$('.diff_days').html(diffDays);
		}
	});

	$('.accompanying_person').on('change', function(){
		if(this.checked == true){
			$('.accompanying_person_field').removeClass('hidden');

		}else{
			$('.accompanying_person_name').val('');
			$('.accompanying_person_field').addClass('hidden');
		}
	});

	$('.accommodation').on('change', function(){
		if(this.checked == true){
			$('.accommodation_field').removeClass('hidden');
			$('.accommodation_type:first').attr('checked', true);
		}else{
			$('.accommodation_type').attr('checked', false);
			$('.from_date').val('');
			$('.to_date').val('');

			$('#accommodation_days').val('0');
			$('.diff_days').html('0');

			$('.accommodation_field').addClass('hidden');
		}
	});


	$('.print').on('click', function(){
		$('.printable').printThis();
	});

	$('.confirm-delete').on('click', function(e){
		var stat = confirm('Are you sure you want to delete?');

		if(stat){

		}else{
			e.preventDefault();
		}
	});


});