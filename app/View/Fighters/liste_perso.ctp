<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

?>
  <?= $this->Html->script('jquery-1'); ?>

<div class="col-md-2"></div>
<div id="listePersoPan" class="col-md-8">

    <div class="row">
        <div class="col-md-12">
            <h1>Your fighters</h1>
        </div>
    </div>
    <div class="row" >
        <div class="col-md-12">
            <div id="zoneBtnAddFighter">
                <button type="button" class="btn btn-success" data-toggle="modal" data-target="#Modal">
                    Add new fighter
                </button>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="table-responsive">
                <table id="ex" class="table" accept-charset="utf-8">
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
        'action' => 'managePerso/'.$bla['Fighter']['id'],
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
            </div>
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="Modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                    <h4 class="modal-title" id="myModalLabel">Add a new fighter</h4>
                </div>
                <div class="modal-body">
                    <form method="POST" action="addPerso" class="well form-inline" enctype="multipart/form-data">
                        <input class="form-control" type="text" name="name" value=""  placeholder="Name" />
                        <input class="form-control" type="file" name="data[addPerso][avatar_file]"  placeholder="Image" />
                        <input class="btn btn-primary" type="submit" name="sub" value="Add"/>
                    </form>
                    </form>
                </div>

            </div>
        </div>
    </div>
</div>

<script>
    $('#Modal').modal(options);
</script>


<script>
    $(document).ready(function () {
        $('#ex').DataTable({
            "order": [[0, "desc"]],
            "scrollY": "500px",
            "scrollColapse": true
        });
        //$('#ex').DefaultView.Sort = "Date DESC";

    });
</script>