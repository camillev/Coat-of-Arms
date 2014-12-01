     

<script src="https://apis.google.com/js/plusone.js" type="text/javascript"></script>
     <?php echo $this->Html->script('google'); ?>   
       
    <?php if(isset($me)) { ?>
        <a href="?logout" ><h5>Logout</h5></a>
    <?php } else { ?>	
      <div id="signin-button" class="show">
        <a href="<?php echo($authUrl); ?>" ><h5>Cnnect with Google+</h5></a>
    <?php } ?>