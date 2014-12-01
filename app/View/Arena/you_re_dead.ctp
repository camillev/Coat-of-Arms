


<div class="home">
  <div class="row">
    <div class="col-md-offset-3 col-md-6" >       <?= $this->Html->image( 'dead.png', array('alt' => 'CakePHP','width'=>'100%')); ?></div>
</div>
</div>

<div class="home">
  <div class="row">
    <div class="col-md-offset-3 col-md-6" >  <center> <?php

echo $this->Html->link(
    'Retour au jeu',
    array(
        'controller' => 'Arena',
        'action' => 'affichage2d',
        'full_base' => true
    ) 
        );  ?> </center></div>
</div>
</div>


