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
    <div id="leftPan" class="col-md-8 col-xs-8">
        <div class="row">
            <div id="arenaPan" class="col-md-12">
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
                        <td><button type="button"  id="case" class="btn btn-xs btn-block" data-toggle="tooltip" data-placement="top" title="There is apparently nothing here"> 
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
                    </tbody>
                </table>
            </div>
        </div>

    </div>
    <!-- PARTIE SUR LE COTE -->
    <div class="col-md-4 col-xs-8">
        <!-- EVOLUTION -->
        <div id="rightPan" class="col-md-12">
            <div id="infoPerso" class="row">
                <div class="col-md-12">
                    <div id="namePerso" >
                        <center><h2><?= $info['name'] ?></h2></center>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div id="avatar" >
                        <?= $this->Html->image($img, array('alt' => 'CakePHP', 'width' => '70%'));?>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div id="myInfos">
                            Level : <?= $info['level'] ?><br/>
                            Strength : <?= $info['skill_strength'] ?><br/> 
                            Sight : <?= $info['skill_sight'] ?><br/> 
                            Experience : <?= $info['xp'] ?><br/> 
                            <div class="progress">
                                <div id="lifeBar" class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="<?= $info['current_health'] ?>" aria-valuemin="0" aria-valuemax="<?= $info['skill_health'] ?>" style="width:<?= $info['current_health']/$info['skill_health']*100?>%"> Health : <?= $info['current_health'] ?> / <?= $info['skill_health'] ?></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
        <?php if ( ($info['xp']-$info['level']*4) >=4)
             {
             $link = "managePerso/" . $id;}?>
                    </div>
                    <div class="col-md-12 col-xs-12">
                        <div id="xpAlert">
           <?php if (($info['xp']-$info['level']*4) <4){ ?>
                            <div class="alert alert-info" role="alert">You need <?= 4-($info['xp']-$info['level']*4) ?> xp to level up</div>
        <?php } 
        else { ?>
                            <div class="alert alert-success" role="alert"><span class="glyphicon glyphicon-star-empty" aria-hidden="true"></span> You can up to <?= variant_int(($info['xp']-$info['level']*4)/4) ?> levels
                                <div id="evolv" class="row" >
                                    <form method="POST" action=<?= $link ?> >
                                        <div class="col-md-4"><button class="btn btn-primary btn-xs" type="submit" name="force" value="+1pts Force">Strength <span class="glyphicon glyphicon-plus-sign" aria-hidden="true"></span></button></div>
                                        <input type="hidden" name="id" value=<?= $id ?>  /> 
                                        <div class="col-md-4"><button class="btn btn-primary btn-xs" type="submit" name="vue" value="+1pts Vue">Sight <span class="glyphicon glyphicon-plus-sign" aria-hidden="true"></span></button></div>
                                        <div class="col-md-4"><button class="btn btn-primary btn-xs" type="submit" name="vie" value="+3pts Vie"/>Health <span class="glyphicon glyphicon-plus-sign" aria-hidden="true"></span></button></div>
                                    </form>
                                </div>
                            </div>
        <?php } ?>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div id="actionPan"class="col-md-12">
                    <h5>Actions available : <?=$pts_action ?></h5>
                </div>
            </div>

            <div class="row">
                <div id="actionPan"class="col-md-12">
                    <center><div class="col-md-6">
                            <form action="/Coat-of-Arms/Arena/affichage2d" id="FightermoveAffichage2dForm" method="post" accept-charset="utf-8">
                                <table id="pad"><tbody>
                                        <tr>
                                            <td></td>
                                            <td><button class="btn btn-info" type="submit" name="data[Fightermove][direction]" value="north"><span class="glyphicon glyphicon-circle-arrow-up" aria-hidden="true"></span></button></td>
                                            <td></td>
                                        </tr>
                                        <tr>
                                            <td><button class="btn btn-info"  type="submit" name="data[Fightermove][direction]" value="west"><span class="glyphicon glyphicon-circle-arrow-left" aria-hidden="true"></span></button></td>
                                            <td><center><?= $this->Html->image('step.png', array('alt' => 'CakePHP', 'width' => '70%'));?></center></td>
                                    <td><button class="btn btn-info"  type="submit" name="data[Fightermove][direction]" value="east"><span class="glyphicon glyphicon-circle-arrow-right" aria-hidden="true"></span></button></td>
                                    </tr>
                                    <tr>
                                        <td></td>
                                        <td><button class="btn btn-info"  type="submit" name="data[Fightermove][direction]" value="south"><span class="glyphicon glyphicon-circle-arrow-down" aria-hidden="true"></span></button></td>
                                        <td></td>
                                    </tr>


                                    </tbody></table>
                            </form>
                        </div></center>
                    <center><div class="col-md-6">
                            <form action="/Coat-of-Arms/Arena/affichage2d" id="FighterattackAffichage2dForm" method="post" accept-charset="utf-8">
                                <table id="pad"><tbody>
                                        <tr>
                                            <td></td>
                                            <td><button class="btn btn-danger"  type="submit" name="data[Fighterattack][attack]" value="north"><span class="glyphicon glyphicon-circle-arrow-up" aria-hidden="true"></span></button></td>
                                            <td></td>
                                        </tr>
                                        <tr>
                                            <td><button class="btn btn-danger"  type="submit" name="data[Fighterattack][attack]" value="west"><span class="glyphicon glyphicon-circle-arrow-left" aria-hidden="true"></span></button></td>
                                            <td><center><?= $this->Html->image('swords.png', array('alt' => 'CakePHP', 'width' => '70%'));?></center></td>
                                    <td><button class="btn btn-danger"  type="submit" name="data[Fighterattack][attack]" value="east"><span class="glyphicon glyphicon-circle-arrow-right" aria-hidden="true"></span></button></td>
                                    </tr>
                                    <tr>
                                        <td></td>
                                        <td><button class="btn btn-danger"  type="submit" name="data[Fighterattack][attack]" value="south"><span class="glyphicon glyphicon-circle-arrow-down" aria-hidden="true"></span></button></td>
                                        <td></td>
                                    </tr>


                                    </tbody></table></form></div></center>

                </div>

            </div>
        </div>
    </div>
</div>

<!--Diary row-->
<div class="row">
    <div id="diaryPan" class="col-md-12">
            <table id="ex" class="table" accept-charset="utf-8">
                <thead>
                    <tr>
                        <th>Date</th>
                        <th>Name</th>
                        <th>Position</th>
                        <th>Distance</th>

                    </tr>
                </thead>
                <tbody>
    <?php
    if(!empty($tab)){
    foreach ($tab as $value){
    ?>
                    <tr>
                        <td><?=$value['data']['date']?></td>
                        <td><?=$value['data']['name']?></td>
                        <td>(<?=$value['data']['coordinate_x']?>,<?=$value['data']['coordinate_y']?>)</td>
                        <td><?=$value['vue']?></td>

                    </tr>

    <?php }} ?>
                </tbody>
            </table>
    </div>
</div> 
</div>


 <?php
$this->Form->create('Fightermove');
$this->Form->input('direction',array('options' => array('north'=>'north','east'=>'east','south'=>'south','west'=>'west'), 'default' => 'east'));
$this->Form->end('Move');
?>
<?php
$this->Form->create('Fighterattack');
$this->Form->input('attack',array('options' => array('north'=>'north','east'=>'east','south'=>'south','west'=>'west'), 'default' => 'east'));
$this->Form->end('Attack');
?>




<script>$(function () {
        $('[data-toggle="tooltip"]').tooltip({html: true})
    })</script>


<script>
    $(document).ready(function () {
        $('#ex').DataTable();
    });
</script>