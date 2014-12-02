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
            <h1>Choose the fighter who is going to enter in the Arena</h1>
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
                            <th>Enter in the arena</td>
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
                            <td>
                                    <?= $this->Html->link(
                                    'Go in the Arena',
                                    array(
                                        'controller' => 'Arena',
                                        'action' => 'randPosition/'.$bla['Fighter']['id'],
                                        'full_base' => true
                                    ) );
                                    ?>
                            </td>
                            <?php } ?>
                    </tbody>
                </table>
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
            "order": [[0,"desc"]],
            "scrollY": "550px",
            "scrollColapse": true
        });
    });
</script>