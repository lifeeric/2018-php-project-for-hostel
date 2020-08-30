$(document).ready(function() {
	$('.form').on('submit', function( event ) {
		
		event.preventDefault();
		$form = $(this);
		submitForm($form);

	});
});

function submitForm( $form )
{

	$footer = $('.customSMS');
	$image = $('.modal-p');
	var login = $('#login');

	$footer.html('<img src="/../hostel/public/images/gears-animation.gif">');

	$('.customSMS').show();	

	setTimeout(function() {

		$.ajax({

		url 	: $form.attr('action'),
		method  : $form.attr('method'),
		data	: $form.serialize(),
		success : function( response ) {

			response = $.parseJSON( response );
			if( response.success )
			{
				if( response.login )
				{
					$footer.html( response.message );
					window.location = response.url;
				}
				$footer.html( response.message );
				$('.clear').val('');
				
				setTimeout(function() {
					$('.customSMS').hide();	
				}, 2000);
				
				 
			}
			setTimeout(function() {
				$('.customSMS').hide();		
			}, 2000);
			$footer.html( response.message );
			console.log( response.message );

		}

	});

	}, 2000);
		

}