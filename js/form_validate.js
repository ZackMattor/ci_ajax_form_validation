/**     -- form_validate.js --
 **
 ** This is an example javascript function for the CI Ajax Form Validation library
 **  it can obviously can be done better... and is mostly just an example of how to
 **  work with the json response from Ajax_validation.php
 **
 ** Author: Zachary Mattor (Criten)
 **/
 
$(document).ready(
	function()
	{
		$('input[name="my_submit"]').click(update_nonbasch_ejournal);

	}
);

function update_nonbasch_ejournal(e)
{
	var url = $('#my_form').attr('action');
	var data = $('#my_form').serialize();
	
	$.post(url, data, validate_form_JSON);
	
	return false;
}


function validate_form_JSON(msg)
{
	var obj = jQuery.parseJSON(msg);
	
	//set background color of all text boxes to white
	$('input[type="text"], input[type="password"]').css('background-color', '#fff');
	
	if(obj.error)
	{
		for (property in obj.problem_fields)
		{
			var problem_field = obj.problem_fields[property];
			
			//set background color of problem boxes to red
			$('input[name="' + problem_field + '"]').css('background-color', '#faa');
		}
		
		//if there is a 
		if(obj.error_message != '')
		{
			alert(obj.error_message);
		}
	}
	else
	{
		window.location.href = PATH + '/validation_test/success';
	}
	
	return false;
}