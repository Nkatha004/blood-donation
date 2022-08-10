$(document).ready(function() {
	$('#registration_form').validate({
		rules: {
			fname: 'required',
		    lname: 'required',
		    donor_email: {
		    	required: true,
      	    	email: true,
			},
		    donor_password: {
	 	        required: true,
		        minlength: 6,
			},
			gender: 'required',
            donor_phoneNo: {
                required: true,
		        length: 10,
            },
			date_of_birth:'required',
		},
		messages: {
		    fname: 'This field is required!',
		    lname: 'This field is required!',
		    donor_email: 'Enter a valid email!',
		    donor_password: {
		    	minlength: 'Password must be at least 6 characters long!'
		    },
		    gender: 'Select atleast one!',
			donor_phoneNo: 'This field should have 10 numbers!',
			date_of_birth: 'This field is required!'
		}
	});
	$('#drive_scheduling_form').validate({
		rules: {
			drive_name: 'required',
		    drive_location: 'required',
			date_from: 'required',
			date_to: {greaterThan: '#date_from'}
			
		},
		messages: {
		    drive_name: 'This field is required!',
		    drive_location: 'This field is required!',
		    date_from: 'Please select a date that is greater than today!',
			date_to: 'Please select a date that is greater than or equal to start date!'
		}
	});
	jQuery.validator.addMethod("greaterThan", 
	function(value, element, params) {

		if (!/Invalid|NaN/.test(new Date(value))) {
			return new Date(value) >= new Date($(params).val());
		}

		return isNaN(value) && isNaN($(params).val()) || (Number(value) > Number($(params).val())); 
	},'Please select a date greater or equal to start date');

	$('#hospital_reg_form').validate({
		rules: {
			hospital_name: 'required',
		    hospital_email: {
		    	required: true,
      	    	email: true,
			},
		    hospital_password: {
	 	        required: true,
		        minlength: 6,
			},
            hospital_phoneNo: {
                required: true,
		        length: 10,
            },
		},
		messages: {
		    hospital_name: 'This field is required!',
		    hospital_email: 'Enter a valid email!',
		    hospital_password: {
		    	minlength: 'Password must be at least 6 characters long!'
		    },
			hospital_phoneNo: 'This field should have 10 numbers!',
		}
	});

	$('#login_form').validate({
		rules: {
		    email: {
		    	required: true,
	     	    email: true,
			},
			password: {
			    required: true,
			    minlength: 6,
			}
		},

		messages: {
			email: 'Enter a valid email!',
			password: {
		    	minlength: 'Password must be at least 6 characters long!'
			}
		}
	});
});