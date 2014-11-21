<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

echo "diary";
?>
  <?= $this->Html->script('jquery-1'); ?>
    
<table id="ex" class="display">
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

<script>
    $(document).ready( function () {
    $('#ex').DataTable();
} );
</script>