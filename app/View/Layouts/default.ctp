<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Coat of Arms</title>

        <!-- Bootstrap -->
    <?= $this->Html->css('bootstrap'); ?>
    <?= $this->Html->css('jquery.dataTables'); ?> 
      <?= $this->Html->css('bootstrap-responsive'); ?>
 <?= $this->Html->css('monCss'); ?>
      <?= $this->fetch('css'); ?>

        <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
          <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
          <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->
    </head>
    <body>
        <div class="row">
            <nav class="navbar navbar-inverse" role="navigation">
                <div class="container-fluid">
                    <!-- Brand and toggle get grouped for better mobile display -->
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
         <?php  if (CakeSession::check('nom'))
              { 
       ?>
                        
                        <a class="navbar-brand" href="<?php echo $this->Html->url(array('controller' => 'Arena','action'=>'homeSession'));?>"><span class="glyphicon glyphicon-home"></span></a>
              <?php
             } else { ?>
                        <a class="navbar-brand" href="<?php echo $this->Html->url(array('controller' => 'Players','action'=>'home'));?>"><span class="glyphicon glyphicon-home"></span></a>
              <?php } ?>
                    </div>

                    <!-- Collect the nav links, forms, and other content for toggling -->
                    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
         <?php  if (CakeSession::check('nom'))
              { 
       ?>
                        <ul class="nav navbar-nav">
                            <li><?= $this->Html->link(
    'Arena',
    array(
        'controller' => 'Arena',
        'action' => "affichage2d",
        'full_base' => true
    ) 
); ?></li>
                                <li><?= $this->Html->link(
    'Tab View',
    array(
        'controller' => 'Arena',
        'action' => "affichage1d",
        'full_base' => true
    ) 
); ?></li>
                            <li><?= $this->Html->link(
    'Characters',
    array(
        'controller' => 'Fighters',
        'action' => 'listePerso',
        'full_base' => true
    ) 
); ?></li>
                            <li><?= $this->Html->link(
    'Diary',
    array(
        'controller' => 'Arena',
        'action' => 'diary',
        'full_base' => true
    ) 
); ?></li>
                        </ul>
                       
              <?php } ?>
                        <ul class="nav navbar-nav navbar-right">
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown"><span class="glyphicon glyphicon-user"/> <span class="caret"></span></a>
                                <div class="dropdown-menu" role="menu" style="padding: 15px;">
              <?php  if (CakeSession::check('nom'))
              { ?>
                                 
                                    <ul><?= $this->Html->link(
    'Deconnexion',
    array(
        'controller' => 'arena',
        'action' => 'deconnexion',
        'full_base' => true
    ) 
); ?></ul>
              <?php }
              else { ?>
                                    <form method="POST" action="../Players/connexion" class="well form-inline">
                                        <input class="form-control" type="email" name="email" value="" id="pseudo" placeholder="Username" />
                                        <input class="form-control" type="password" name="pass" id="pass" placeholder="Password" />
                                        <input class="btn btn-primary" type="submit" name="sub" value="Connexion"/>
                                    </form>
                                    
        
                                    <button type="button" class="btn btn-link" data-toggle="modal" data-target="#ModalRecupMdp">
                                        Forgot your passsword ?
                                    </button>
                                    
                                    <?php echo $this->Html->link("login with facebook", $fb_login_url);?>
                                 
           

             <?php } ?>
              
   

            
        <div id="fb-root"></div>
              
        </div>
              
     <?php echo $this->Html->script('google'); ?>   
       
    <?php if(isset($me)) { ?>
        <a href="?logout" ><h5>Logout</h5></a>
    <?php } else { ?>	
      <div id="signin-button" class="show">
        <!--<a href="<?php echo($authUrl); ?>" ><h5>COnnect with Google+</h5></a>-->
    <?php } ?>
       </div>

            
          </div>
       
        </li>
      </ul>
    </div>
  </div>
</nav>
    
        <div class="row">
            <div id="content" class="col-md-8 col-md-offset-2">
                <center><?= $this->Session->flash(); ?></center>
                <?= $this->fetch('content'); ?>
            </div>
        </div>


        <footer>

            Develloped by: Camille VACELET, Suzanne GARCIA, Lucile KIM LAM, Anna GUINET<br/>
            Group: 09-CG Time gestion and Connexion with facebook <br>
            Other options: Surroundings gestion, Bootstrap UI<br/>
            Contact information: <a href="mailto:coatofarms-contact@gmail.com">
                coaotofarms-contact@gmail.com</a>.<br/>
                Bonus: Website address <a href="mailto:coatofarms-contact@gmail.com">
                addressedu site</a>
            Adresse du site/ <a href="https://github.com/camillev/Coat-of-Arms">Github</a> /Options suplémentaires<br/>
        </footer>


    <?= $this->Html->script('https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js'); ?>
    <?= $this->Html->script('bootstrap'); ?>

      <?= $this->Html->script('jquery.dataTables'); ?>

       <?= $this->fetch('script'); ?>
        <script>
            $(window).load(function () {
                $('#myModal').modal('show');
            });
        </script>

    </body>



</html>

