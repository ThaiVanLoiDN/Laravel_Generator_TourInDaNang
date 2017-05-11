$( document ).ready( function () {
	$( "#contactForm" ).validate( {
		ignore: [], 
		debug: false,
		rules: {
			fullname: {
				required: true,
				minlength: 5,
				maxlength: 100,
			},
			mail: {
				required: true,
				email: true,
				minlength: 5,
				maxlength: 50,
			},
			phone: {
				required: true,
				minlength: 10,
				maxlength: 20,
			},
			subject: {
				required: true,
				minlength: 5,
				maxlength: 100,
			},
			content: {
				required: true,
				minlength: 10,
			},
		}		
	});
});