<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


?>

<div class="row">
    
    <div class="col-xs-4">
        <center><h2><?= $info['name'] ?></h2><br/>
      
           <button type="button" class="btn btn-lg" data-toggle="modal" data-target="#Modal">
        <?= $this->Html->image($img, array('alt' => 'CakePHP', 'width' => '70%'));?>
      </button>
         
</center>
    </div>
   

    <div class="col-xs-5">
        <div id="myInfos">
        niveau : <?= $info['level'] ?><br/>
        force : <?= $info['skill_strength'] ?><br/> 
        vue : <?= $info['skill_sight'] ?><br/> 
        vie : <?= $info['current_health'] ?> / <?= $info['skill_health'] ?><br/>
        experience : <?= $info['xp'] ?><br/> 
        </div>
        
        <?php if (($info['xp']-$info['level']*4) <4){ ?>
        <div class="alert alert-warning" role="alert">Vous avez besoin de <?= 4-($info['xp']-$info['level']*4) ?> xp suplémentaires pour pouvoir evoluer</div>
        <?php } 
        else { ?>
        <div class="alert alert-info" role="alert">Vous pouvez monter de <?= variant_int(($info['xp']-$info['level']*4)/4) ?> niveau</div>
        <?php } ?>
    </div>
    <div class="col-xs-3">
        <?php if ( ($info['xp']-$info['level']*4) >=4)
             {
            
            $link = "../manage_perso/" . $id;
             ?>
        <form method="POST" action=<?= $link ?> >
         <input class="btn btn-primary" type="submit" name="force" value="+1pts Force"/><br/>
         <input type="hidden" name="id" value=<?= $id ?>  /> 
         <input class="btn btn-primary" type="submit" name="vue" value="+1pts Vue"/><br/>
         
        <input class="btn btn-primary" type="submit" name="vie" value="+3pts Vie"/></br>
     
        
        </form>
             <?php } ?>
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
            <input class="form-control" type="file" name="data[add_perso][avatar_file]"  placeholder="Image" />
            <input class="btn btn-primary" type="submit" name="sub" value="Add"/>
    </form>
      </div>
     
    </div>
  </div>
</div>

<script>
    $('#Modal').modal(options);
</script>