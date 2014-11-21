<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
?>
<?= $this->Html->script('jquery-1');?>
<br>
<?= $this->Html->link(
    'Affichage1D',
    array(
        'controller' => 'Arena',
        'action' => 'affichage1d',
        'full_base' => true
    ) 
); ?>
<br>
        <?php 
        for($i=9; $i>=0; $i--){?>
            <?php echo""; 
            for ($j=0; $j<15; $j++ ){
                echo "";
                if($tabArena[$j][$i]['type']=='non_vue'){?>
              <button type="button" class="btn btn-default" data-toggle="tooltip" width= "2%" data-placement="top" title="Vous ne voyez pas jusque là !"> 
                    <?php echo $this->Html->image('non_vue.png', array('alt'=>'???', 'width'=>'40px'))?>
                   </button>
                <?php echo "";}
                
                else if($tabArena[$j][$i]['type']=='fighter'){?>

                    <button type="button" class="btn btn-default" data-toggle="tooltip" data-placement="top" title="<h4><?php echo $tabArena[$j][$i]['data']['name']?></h4><br>
                        Level : <?php echo $tabArena[$j][$i]['data']['level']?><br>
                        Strength : <?php echo $tabArena[$j][$i]['data']['skill_strength']?><br>
                        Sight : <?php echo $tabArena[$j][$i]['data']['skill_sight']?><br>
                        Vie : <?php echo $tabArena[$j][$i]['data']['current_health'].'/'.$tabArena[$j][$i]['data']['skill_health']?>"> 
                    <?php echo $this->Html->image('fighter.png', array('alt'=>'???', 'width'=>'40px'))?> 
                    </button>
                 <?php echo "";}
                 
                 
                else if($tabArena[$j][$i]['type']=='me'){?>
               <button type="button" class="btn btn-default" data-toggle="tooltip" data-placement="top" title="Coucou c'est moi !"> 
                    <?php echo $this->Html->image('me.png', array('alt'=>'???', 'width'=>'40px'))?> 
                    </button>
                 <?php echo "";}
                 
                 
                else if ($tabArena[$j][$i]['type']=='vide'){?>
                 <button type="button" class="btn btn-default" data-toggle="tooltip" data-placement="top" title="Il n'y a rien ici !"> 
                     <?php echo $this->Html->image('vide.png', array('alt'=>'???', 'width'=>'40px'))?>
                     </button>   
            <?php echo "";}}?>
                <br>
        <?php echo "";}?>
        
           

<?php
echo $this->Form->create('Fightermove');
echo $this->Form->input('direction',array('options' => array('north'=>'north','east'=>'east','south'=>'south','west'=>'west'), 'default' => 'east'));
echo $this->Form->end('Move');
?>
<?php
echo $this->Form->create('Fighterattack');
echo $this->Form->input('attack',array('options' => array('north'=>'north','east'=>'east','south'=>'south','west'=>'west'), 'default' => 'east'));
echo $this->Form->end('Attack');
?>
                
<script>$(function () {
  $('[data-toggle="tooltip"]').tooltip({html : true})
})</script>