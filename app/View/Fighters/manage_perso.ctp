<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


?>
<div class="col-md-2"></div>
<div class="col-md-8">
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
                            Strenght : <?= $info['skill_strength'] ?><br/> 
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
            </div>
            </div>



<!-- Modal -->
<div class="modal fade" id="Modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
        <h4 class="modal-title" id="myModalLabel">Modifier votre avatar</h4>
      </div>
      <div class="modal-body">
        <form method="POST" action=<?= "../update_avatar/" . $id ?> class="well form-inline" enctype="multipart/form-data">
            <input class="form-control" type="file" name="data[addPerso][avatar_file]"  placeholder="Image" />
            <input class="btn btn-primary" type="submit" name="sub" value="Add"/>
    </form>
      </div>
     
    </div>
  </div>
</div>

<script>
    $('#Modal').modal(options);
</script>