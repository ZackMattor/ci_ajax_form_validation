<?php
/**     -- test_form.js (VIEW)--
 **
 ** This view outputs a simple form. And links some external javascript files.
 **
 ** Author: Zachary Mattor (Criten)
 **/
?>

<html>
	<head>
		<title>Validation Test Form</title>
		<script>
			var PATH = '<?=site_url()?>';
		</script>
		<script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
		<script type="text/javascript" src="<?=base_url()?>js/form_validate.js"></script>
	</head>
	<body>
		<h2>Test Form</h2>
		<?=form_open('validation_test/test_form_action', array('id'=>'my_form'))?>
			<p><?=form_label('Name: ', 'name')?><?=form_input('name')?></p>
			<p><?=form_label('Pass: ', 'name')?><?=form_password('password')?></p>
			<p><?=form_label('Pass: ', 'repassword')?><?=form_password('repassword')?></p>
			<?=form_submit('my_submit', 'Test Validation')?>
		</form>
	</body>
</html>