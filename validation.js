$(function(){

	$
	$("#signup-form").validate({
		rules: {

			<!-- Validate name-->
			name:{
				required: true,
				nowhitespace: true,
				lettersonly: true,
				minlength:2
			},

			<!-- Validate email-->
			email:{
				required: true,
				email: true
			},
			<!-- Validate counrty-->
			country:{
				required: true,
				nowhitespace: true,
				lettersonly: true
			},

			<!-- Validate day -->
			date: {
				required: true,
			}
		},

		messages: {
			name: {
				required: 'Please enter your name',
				nowhitespace: 'Your name cannot include white spaces',
				lettersonly: 'Your can only contain letters',
				minlength: 'Your name cannot have one letter'
				},

			email: {
				required: 'Please enter an email address.',
				email: 'Please enter a valid email address.'
				}
		  },

		  highlight: function (element) {
            $(element).parent().addClass('error')
        },
        
        unhighlight: function (element) {
            $(element).parent().removeClass('error')
        }
	});
})