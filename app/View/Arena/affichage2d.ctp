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

<div class="row">
    
    
    <!-- ARENE -->
    <div class="col-md-8">
        
<table id="arena"><tbody>
        <form method="POST" action="affichage2d" >
        <?php 
        for($i=9; $i>=0; $i--){?>
            <?php echo"<tr>"; 
            for ($j=0; $j<15; $j++ ){
                echo "";
                if($tabArena[$j][$i]['type']=='non_vue'){?>
    <td><button type="button"  class="btn btn-xs btn-block" id="case" data-toggle="tooltip" width= "2%" data-placement="top" title="Vous ne voyez pas jusque là !"> 
                    <?php echo $this->Html->image('non_vue.png', array('alt'=>'???', 'width'=>'100%','id'=> 'imagecase'))?>
        </button></td>
                <?php echo "";}
                
                else if($tabArena[$j][$i]['type']=='fighter'){?>

        <td><button type="button" id="case" class="btn btn-xs btn-block" data-toggle="tooltip" data-placement="top" title="<h4><?php echo $tabArena[$j][$i]['data']['name']?></h4><br>
                        Level : <?php echo $tabArena[$j][$i]['data']['level']?><br>
                        Strength : <?php echo $tabArena[$j][$i]['data']['skill_strength']?><br>
                        Sight : <?php echo $tabArena[$j][$i]['data']['skill_sight']?><br>
                        Vie : <?php echo $tabArena[$j][$i]['data']['current_health'].'/'.$tabArena[$j][$i]['data']['skill_health']?>"> 
                    <?php echo $this->Html->image('fighter.png', array('alt'=>'???', 'width'=>'100%', 'id'=> 'imagecase'))?> 
            </button></td>
                 <?php echo "";}
                 
                 
                else if($tabArena[$j][$i]['type']=='me'){?>
            <td><button type="button" id="case" class="btn btn-xs btn-block"  data-toggle="tooltip" data-placement="top" title="<?php echo $tabArena[$j][$i]['state']?>"> 
                    <?php echo $this->Html->image('me.png', array('alt'=>'???', 'width'=>'100%','id'=> 'imagecase'))?> 
                </button></td>
                 <?php echo "";}
                 
                 
                else if ($tabArena[$j][$i]['type']=='vide'){ 
                    ?>
                <td><button type="button"  id="case" class="btn btn-xs btn-block" data-toggle="tooltip" data-placement="top" title="Il n'y a rien ici !"> 
                     <?php echo $this->Html->image('herbe.jpg', array('alt'=>'???', 'width'=>'100%','id'=> 'imagecase'))?>
                 </button></td>   
                      <?php echo "";}
                 
                 
                else if ($tabArena[$j][$i]['type']=='surrounding'){ 
                    ?>
                <td><button type="button"  id="case" class="btn btn-xs btn-block" data-toggle="tooltip" data-placement="top" title="<?= $tabArena[$j][$i]['data']['type']?> ">
                     <?php echo $this->Html->image($tabArena[$j][$i]['data']['type'].'.png', array('alt'=>'???', 'width'=>'100%','id'=> 'imagecase'))?>
                 </button></td> 
                 
            <?php echo "";}}?>
                <!--<br>-->
        <?php echo "</tr>";}?>
        </form>
        </tbody></table>

    </div>
    
    <!-- PARTIE SUR LE COTE -->
    <div class="col-md-3">
        <!-- EVOLUTION -->
        <div class="row">
            <div class="row">
    
    <div class="col-xs-4">
        <center><h2><?= $info['name'] ?></h2><br/>
      
          
        <?= $this->Html->image($img, array('alt' => 'CakePHP', 'width' => '70%'));?>
      
         
</center>
    </div>
   

    <div class="col-xs-4">
        <div id="myInfos">
        niveau : <?= $info['level'] ?><br/>
        force : <?= $info['skill_strength'] ?><br/> 
        vue : <?= $info['skill_sight'] ?><br/> 
        vie : <?= $info['current_health'] ?> / <?= $info['skill_health'] ?><br/>
        experience : <?= $info['xp'] ?><br/> 
        </div>
        
     
    </div>
    <div class="col-xs-3">
        <?php if ( ($info['xp']-$info['level']*4) >=4)
             {
            
            $link = "manage_perso/" . $id;
             ?>
        <div id="evolv">
        <form method="POST" action=<?= $link ?> >
         <input class="btn btn-primary btn-xs" type="submit" name="force" value="+1pts Force"/><br/>
         <input type="hidden" name="id" value=<?= $id ?>  /> 
         <input class="btn btn-primary btn-xs" type="submit" name="vue" value="+1pts Vue"/><br/>
         
        <input class="btn btn-primary btn-xs" type="submit" name="vie" value="+3pts Vie"/></br>
     
        
        </form>
        </div>
             <?php } ?>
    </div>
</div>
    <div class="row">
           <?php if (($info['xp']-$info['level']*4) <4){ ?>
        <div class="alert alert-warning" role="alert">Vous avez besoin de <?= 4-($info['xp']-$info['level']*4) ?> xp suplémentaires pour pouvoir evoluer</div>
        <?php } 
        else { ?>
        <div class="alert alert-info" role="alert">Vous pouvez monter de <?= variant_int(($info['xp']-$info['level']*4)/4) ?> niveau</div>
        <?php } ?>
    </div>
        </div>
        <div class="row">
           <table id="ex" class="display" accept-charset="utf-8">
    <thead>
        <tr>
            <th>Distance de moi</th>
            <th>Name</th>
            <th>Date</th>
             <th>Position</th>
              
        </tr>
    </thead>
    <tbody>
    <?php
    if(!empty($tab)){
    foreach ($tab as $value){
    ?>
        <tr>
            <td><?=$value['vue']?></td>
            <td><?=$value['data']['name']?></td>
            <td><?=$value['data']['date']?></td>
             <td>(<?=$value['data']['coordinate_x']?>,<?=$value['data']['coordinate_y']?>)</td>
       
        </tr>
       
    <?php }} ?>
    </tbody>
</table>
            
        </div>    
            
    </div>
</div>


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


<div class="col-md-6">
           <form action="/Coat-of-Arms/Arena/affichage2d" id="FightermoveAffichage2dForm" method="post" accept-charset="utf-8">
<table id="pad"><tbody>
        <tr>
            <td></td>
            <td><input class="btn" type="submit" name="data[Fightermove][direction]" value="north"></input></td>
            <td></td>
        </tr>
        <tr>
            <td><input class="btn"  type="submit" name="data[Fightermove][direction]" value="west"></input></td>
            <td>Move</td>
            <td><input class="btn"  type="submit" name="data[Fightermove][direction]" value="east"></input></td>
        </tr>
        <tr>
            <td></td>
            <td><input class="btn"  type="submit" name="data[Fightermove][direction]" value="south"></input></td>
            <td></td>
        </tr>
        
        
    </tbody></table>
           </form>
</div>

<div class="col-md-6">
<form action="/Coat-of-Arms/Arena/affichage2d" id="FighterattackAffichage2dForm" method="post" accept-charset="utf-8">
<table id="pad"><tbody>
        <tr>
            <td></td>
            <td><input class="btn"  type="submit" name="data[Fighterattack][attack]" value="north"></input></td>
            <td></td>
        </tr>
        <tr>
            <td><input class="btn"  type="submit" name="data[Fighterattack][attack]" value="west"></input></td>
            <td>Attack</td>
            <td><input class="btn"  type="submit" name="data[Fighterattack][attack]" value="east"></input></td>
        </tr>
        <tr>
            <td></td>
            <td><input class="btn"  type="submit" name="data[Fighterattack][attack]" value="south"></input></td>
            <td></td>
        </tr>
        
        
    </tbody></table></form></div>

<script>$(function () {
  $('[data-toggle="tooltip"]').tooltip({html : true})
})</script>


<script>
    $(document).ready( function () {
    $('#ex').DataTable();
} );
</script>