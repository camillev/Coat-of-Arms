<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

?>
  <?= $this->Html->script('jquery-1'); ?>

  <button type="button" class="btn btn-lg" data-toggle="modal" data-target="#Modal">
       Add new fighter
      </button>
    
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
<th>Manage</th>
<th>Delete</th>
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
    '',
    array(
        'controller' => 'Fighters',
        'action' => 'manage_perso/'.$bla['Fighter']['id'],
        'full_base' => true
  ),
        array('class'=>"glyphicon glyphicon-edit", 'escape' => false));
?></td>
<td><?= $this->Html->link(
    '',
    array(
        'controller' => 'Fighters',
        'action' => 'delete_fighter/'.$bla['Fighter']['id'],
        'full_base' => true
    ),
        array('class'=>"glyphicon glyphicon-trash", 'escape' => false));
?></td>
    <?php
} ?>

</tbody>
</table>

<!-- Modal -->
<div class="modal fade" id="Modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
        <h4 class="modal-title" id="myModalLabel">Add a new fighter</h4>
      </div>
      <div class="modal-body">
       <form method="POST" action="add_perso" class="well form-inline" enctype="multipart/form-data">
            <input class="form-control" type="text" name="name" value=""  placeholder="Name" />
            <input class="form-control" type="file" name="data[add_perso][avatar_file]"  placeholder="Image" />
            <input class="btn btn-primary" type="submit" name="sub" value="Add"/>
</form>
    </form>
      </div>
     
    </div>
  </div>
</div>

<script>
    $('#Modal').modal(options);
</script>


<script>
    $(document).ready( function () {
    $('#table_id').DataTable();
} );
</script>