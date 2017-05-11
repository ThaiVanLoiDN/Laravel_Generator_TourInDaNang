$( document ).ready( function () {
	$( "#CategoryPost" ).validate( {
		rules: {
			name: {
				required: true,
				minlength: 5,
				maxlength: 200,
			},
		},
		messages: {
			name: {
				required: "This field is required.",
				minlength: "Please enter at least 5 characters.",
				maxlength: "Please enter no more than 200 characters.",
			},
		},
	});

	$( "#CategoryTour" ).validate( {
		rules: {
			name: {
				required: true,
				minlength: 5,
				maxlength: 200,
			},
		},
		messages: {
			name: {
				required: "This field is required.",
				minlength: "Please enter at least 5 characters.",
				maxlength: "Please enter no more than 200 characters.",
			},
		},
	});

	$( "#City" ).validate( {
		rules: {
			name: {
				required: true,
				minlength: 5,
				maxlength: 100,
			},
		},
		messages: {
			name: {
				required: "This field is required.",
				minlength: "Please enter at least 5 characters.",
				maxlength: "Please enter no more than 100 characters.",
			},
		},
	});

	$( "#Post" ).validate( {
		ignore: [], 
		debug: false,
		rules: {
			name: {
				required: true,
				minlength: 5,
				maxlength: 200,
			},
			id_category: {
				required: true,
				number: true,
				digits: true
			},
			image: {
                extension: "jpg,jpeg,bmp,png"
            },
			preview: {
				required: true,
				minlength: 5,
			},
			content: {
				required: function(){
                 	CKEDITOR.instances.content.updateElement();
                },
				minlength: 5,
			},
		},
		messages: {
			name: {
				required: "This field is required.",
				minlength: "Please enter at least 5 characters.",
				maxlength: "Please enter no more than 200 characters.",
			},
			id_category: {
				required: "This field is required.",
				number: "Please enter a valid number.",
				digits: "Please enter only digits."
			},
			image: {
                extension: "The image must be a file of type: jpg, jpeg, bmp, png."
            },
			preview: {
				required: "This field is required.",
				minlength: "Please enter at least 5 characters.",
			},
			content: {
				required: "This field is required.",
				minlength: "Please enter at least 5 characters.",
			},
		},
	});

	$( "#Tour" ).validate( {
		ignore: [], 
		debug: false,
		rules: {
			name: {
				required: true,
				minlength: 5,
				maxlength: 200,
			},
			id_category: {
				required: true,
				number: true,
				digits: true
			},
			daytour: {
				required: true,
				number: true,
				digits: true
			},
			price: {
				required: true,
				number: true,
				digits: true
			},
			"cities[]": {
				required: true,
			},
			image: {
                extension: "jpg,jpeg,bmp,png"
            },
			preview: {
				required: true,
				minlength: 5,
			},
			content: {
				required: function(){
                 	CKEDITOR.instances.content.updateElement();
                },
				minlength: 5,
			},
		},
		messages: {
			name: {
				required: "This field is required.",
				minlength: "Please enter at least 5 characters.",
				maxlength: "Please enter no more than 200 characters.",
			},
			id_category: {
				required: "This field is required.",
				number: "Please enter a valid number.",
				digits: "Please enter only digits."
			},
			daytour: {
				required: "This field is required.",
				number: "Please enter a valid number.",
				digits: "Please enter only digits."
			},
			price: {
				required: "This field is required.",
				number: "Please enter a valid number.",
				digits: "Please enter only digits."
			},
			cities: {
				required: "This field is required.",
			},
			image: {
                extension: "The image must be a file of type: jpg, jpeg, bmp, png."
            },
			preview: {
				required: "This field is required.",
				minlength: "Please enter at least 5 characters.",
			},
			content: {
				required: "This field is required.",
				minlength: "Please enter at least 5 characters.",
			},
		},
	});
});