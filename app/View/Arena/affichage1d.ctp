<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

echo "affichage 1D -> tab datatables";
?>
<script type="text/javascript" charset="utf8" src="//code.jquery.com/jquery-1.10.2.min.js"></script>
  
<table id="ex" class="display">
    <thead>
        <tr>
            <th>Distance</th>
            <th>Avatar</th>
            <th>Name</th>
             <th>Position</th>
            <th>Niveau</th>
            
               <th>Xp</th>
                <th>Force</th>
                 <th>Vue</th>
                 <th>Vie</th>
        </tr>
    </thead>
    <tbody>
    <?php
      if(!empty($tab)){
    foreach ($tab as $value){
    ?>
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
                   <div class="progress">
                       <div class="progress-bar" role="progressbar" aria-valuenow="<?=$value['data']['current_health']?>" aria-valuemin="0" 
                            aria-valuemax="<?=$value['data']['skill_health']?>" style="width : <?=$value['data']['current_health']/$value['data']['skill_health']*100?>%;">
                           <?=$value['data']['current_health'].'/'.$value['data']['skill_health']?></div>
                   </div>
            
          </td>
        </tr>
       
      <?php }} ?>
    </tbody>
</table>

<script>
    $(document).ready( function () {
    $('#ex').DataTable();
} );
</script>