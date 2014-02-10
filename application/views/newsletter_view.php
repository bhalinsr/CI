<!Doctype html>
<html lang="en">
<head>
    <title> Newsletter </title>
</head>
<body>
	<?php $this->load->helper('form');?>  
	<?php echo form_open('newsletter/send');
	/*$name = array('name' => 'name', 
		      'id' => 'name',
		      'value' => set_value('name')); */?>
	<p>
            <label for='name'> Name: </label> 
            <input type='text' name='name' id='name' value='<?php echo set_value('name');?>'> 
        </p>
        <p> 
            <label for='email'>Email Address: </label>
            <input type="text" name='email' id='email' value='<?php echo set_value('email'); ?>'>
        </p>
        <p>
            <?php echo form_submit('submit', 'Subscribe Newsletter'); ?>
        </p>

        <?php echo form_close(); ?> 
        <?php echo validation_errors(); ?>
</body>
</html>
 
 


