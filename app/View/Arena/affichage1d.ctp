<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

?>
 <?= $this->Html->script('jquery-1'); ?>
    
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

<script>
    $(document).ready( function () {
    $('#ex').DataTable();
} );
</script>