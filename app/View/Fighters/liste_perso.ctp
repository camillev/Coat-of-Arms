<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

?>
  <?= $this->Html->script('jquery-1'); ?>
    
<?= $this->Html->link(
    'Add new fighter',
    array(
        'controller' => 'Fighters',
        'action' => 'add_perso',
        'full_base' => true
    ) 
); ?>

<h1>Your fighters</h1>

<table id="table_id" class="display">
<thead>
<tr>
    <th>Avatar</th>
<th>Name</th>
<th>Level</th>
<th>Xp</th>
<th>Sight</th>
<th>Strength</th>
<th>Health</th>
<th>Manage</td>
</tr>
</thead>
<tbody>
<?php foreach($list as $bla){ ?>
 <tr><td>
     
     
        <?= $this->Html->image($bla['avatar'], array('alt' => 'CakePHP', 'width' => '50px'));?>
    
     </td>
<?php
echo "<td>".$bla['Fighter']['name']."</td>";
echo "<td>".$bla['Fighter']['level']."</td>";
echo "<td>".$bla['Fighter']['xp']."</td>";
echo "<td>".$bla['Fighter']['skill_sight']."</td>";
echo "<td>".$bla['Fighter']['skill_strength']."</td>";
echo "<td>".$bla['Fighter']['current_health'].'/'.$bla['Fighter']['skill_health']."</td>";
?>
<td><?= $this->Html->link(
    'Manage',
    array(
        'controller' => 'Fighters',
        'action' => 'manage_perso/'.$bla['Fighter']['id'],
        'full_base' => true
    ) );
?></td>
    <?php
} ?>

</tbody>
</table>




<script>
    $(document).ready( function () {
    $('#table_id').DataTable();
} );
</script>