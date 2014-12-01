<?php
    include_once "google-plus-access.php";
?>
<!DOCTYPE html>
<html>

    
<body>
<div id="bar">
	<div class="top-area" >

		<?php if(isset($me)) { ?>
			<a href="?logout" ><h5>Logout</h5></a>
		<?php } else { ?>
			<a href="<?php echo($authUrl); ?>" ><h5>Login</h5></a>
		<?php } ?>
		</div>
	</div>
</div>

	<div id="connect-button"><a href="<?php echo($authUrl); ?>" ><img src="connect-button.png" alt="Connect to your Google+ Account"/></a><div>
	

<?php } ?>
</body>
</html>