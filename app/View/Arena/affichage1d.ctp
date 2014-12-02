<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

?>
 <?= $this->Html->script('jquery-1'); ?>
<div class="row">
    <!-- ARENE -->
    <div id="leftPan" class="col-md-8 col-xs-8">
        <div class="row">
            <div id="arenaPan" class="col-md-12">
                <table id="ex" class="table">
                    <thead>
                        <tr>
                            <th>Distance</th>
                            <th>Avatar</th>
                            <th>Name</th>
                            <th>Position</th>
                            <th>Level</th>

                            <th>Xp</th>
                            <th>Strength</th>
                            <th>Sight</th>
                            <th>Health</th>
                        </tr>
                    </thead>
                    <tbody>
    <?php
      if(!empty($tab)){
    foreach ($tab as $value){
    
        if ($value['type']=='fighter'){?>

                        <tr>
                            <td><?=$value['vue']?></td>
                            <td><?= $this->Html->image($value['avatar'], array('alt' => 'CakePHP',  'width' => '50px'))?></td>
                            <td><?=$value['data']['name']?></td>
                            <td>(<?=$value['data']['coordinate_x']?>,<?=$value['data']['coordinate_y']?>)</td>

                            <td><?=$value['data']['level']?></td>

                            <td><?=$value['data']['xp']?></td>
                            <td><?=$value['data']['skill_sight']?></td>
                            <td><?=$value['data']['skill_strength']?></td>
                            <td>

                      <?=$value['data']['current_health'].'/'.$value['data']['skill_health']?>


                            </td>
                        </tr>

        <?php } else if ($value['type']=='surrounding') { ?>

                        <tr>
                            <td><?=$value['vue']?></td>
                            <td><?= $this->Html->image($value['data']['type'].'.jpg', array('alt' => 'CakePHP',  'width' => '50px'))?></td>
                            <td><?=$value['data']['type']?></td>
                            <td>(<?=$value['data']['coordinate_x']?>,<?=$value['data']['coordinate_y']?>)</td>

                            <td></td>

                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>


    <?php }}} ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div> 
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
                                    <?= $this->Form->create('force');?>    
                                        <div class="col-md-4"><button class="btn btn-primary btn-xs" type="submit" name="data[force][force]" value="+1pts Force">Strength <span class="glyphicon glyphicon-plus-sign" aria-hidden="true"></span></button></div>
                                    <?= $this->Form->end();?>
                                    <?= $this->Form->create('vue')?>
                                        <div class="col-md-4"><button class="btn btn-primary btn-xs" type="submit" name="data[vue][vue]" value="+1pts Vue">Sight <span class="glyphicon glyphicon-plus-sign" aria-hidden="true"></span></button></div>
                                    <?= $this->Form->end();?>
                                    <?= $this->Form->create('vie')?>    
                                        <div class="col-md-4"><button class="btn btn-primary btn-xs" type="submit" name="data[vie][vie]" value="+3pts Vie"/>Health <span class="glyphicon glyphicon-plus-sign" aria-hidden="true"></span></button></div>
                                    <?= $this->Form->end();?>
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
<script>
    $(document).ready(function () {
        $('#ex').DataTable({
            "order": [[0,"desc"]],
            "scrollY": "200px",
            "scrollColapse": true
        });
    });
</script>