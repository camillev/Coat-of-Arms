



  <!-- jQuery -->
<!--<script type="text/javascript" charset="utf8" src="//code.jquery.com/jquery-1.10.2.min.js"></script>-->
      <?= $this->Html->script('https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js'); ?>





  
  <div class="row">
  <div class="col-md-8 col-xs-12">       <?= $this->Html->image( 'home.png', array('alt' => 'CakePHP','width'=>'90%')); ?></div>
  <div class="col-md-4">
    
      <!-- CARROUSSEL D'AVATAR -->
<div id="carousel-example-generic" class="carousel" data-ride="carousel" >
 

  <!-- Wrapper for slides -->
  <div class="carousel-inner" role="listbox" >
       <div class="item active"><center>
       <?= $this->Html->image( 'blason_def.png', array('alt' => 'CakePHP','width'=>200,'height'=>200)); ?>
           </center>
     
       </div>
      <?php foreach ($avatar as $im){ ?>
    <div class="item"><center>
       <?= $this->Html->image( 'avatar/'.$im, array('alt' => 'CakePHP','width'=>200,'height'=>200)); ?>
      
     </center>
    </div>
    <?php echo ""; } ?>
  </div>

  <!-- Controls -->
  <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
    <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
    <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
<br/>
     </div>
    
            <center>
                <br/>
                <p>Venez nous rejoindre et defier nos utilisateurs !</p>
            </center>
     <br/>
          <center>
          <!--<= $this->Html->link(
    'Inscrivez vous',
    array(
        'controller' => 'Players',
        'action' => 'inscription',
        'full_base' => true
    ) );
?>-->
              
               <button type="button" class="btn btn-lg" data-toggle="modal" data-target="#ModalInscription">
       Inscrivez-vous
      </button>
          </center>
    
  </div>
  </div>
</div>

  

<!-- Modal -->
<div class="modal fade" id="ModalInscription" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
        <h4 class="modal-title" id="myModalLabel">INSCRIPTION</h4>
      </div>
      <div class="modal-body">
<form method="POST" action="inscription" class="well form-inline">
            Votre email :     
            <input class="form-control" type="email" name="email" value="" placeholder="Email" required/><br/><br/>
            Mot de passe : 
            <input class="form-control" type="password" name="pass" id="champA" placeholder="Password" required/><br/><br/>
            Confirmer votre mot de passe : 
            <input class="form-control" type="password" name="pass_confirm" id="champB" placeholder="Confirm the Password" required onBlur="checkPass()"/>  <br/><br/>  
            <div id="divcomp"></div>
            <input class="btn btn-primary" type="submit" name="sub" value="Inscription"/>
</form>

      </div>
     
    </div>
  </div>
</div>





<!-- Modal recup mdp-->
<div class="modal fade" id="ModalRecupMdp" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
        <h4 class="modal-title" id="myModalLabel">Mot de passe oublié ?</h4>
      </div>
      <div class="modal-body">
  <form method="POST" action="recup_mdp" class="well form-inline">
                  <input class="form-control" type="email" name="email" value="" id="pseudo" placeholder="Username" />           
            <input class="btn btn-primary" type="submit" name="sub" value="Envoyer un mail"/>
              </form>

      </div>
     
    </div>
  </div>
</div>


<script>
        $('#ModalInscription').modal(options);
              $('#ModalRecupMdp').modal(options);
        
    $('.carousel').carousel({
         interval: 2000  
    });
    </script>