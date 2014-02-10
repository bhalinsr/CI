<!DOCTYPE html>
<html lang="en">
<head>

</head>
<body>
	<?php echo " <h1> My Blog Page </h1>"; ?>
	
	<?php foreach ($rows as $r) { 
		echo '<h3>'. $r->title .'</h3>'; ?>
        <p> <?php echo $r->comments; ?> </p>
	<?php } ?> 



</body>
</html>