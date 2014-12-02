<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

?>
  <?= $this->Html->script('jquery-1'); ?>
<div class="col-md-2" ></div>
<div id="diaryPan" class="col-md-8" >
    <div class="row">
        <div class="col-md-12">
            <h1>Your Fight Diary</h1>
        </div>
    </div>
<div class="row">
    <div class="col-md-12">
            <table id="ex" class="table" accept-charset="utf-8">
                <thead>
                    <tr>
                        <th>Date</th>
                        <th>Name</th>
                        <th>Position</th>
                        <th>Distance</th>

                    </tr>
                </thead>
                <tbody>
    <?php
    if(!empty($tab)){
    foreach ($tab as $value){
    ?>
                    <tr>
                        <td><?=$value['data']['date']?></td>
                        <td><?=$value['data']['name']?></td>
                        <td>(<?=$value['data']['coordinate_x']?>,<?=$value['data']['coordinate_y']?>)</td>
                        <td><?=$value['vue']?></td>
                    </tr>

    <?php }} ?>
                </tbody>
            </table>
    </div>
</div> 
</div>  

<script>
    $(document).ready(function () {
        $('#ex').DataTable({
            "order": [[0,"desc"]],
            "scrollY": "550px",
            "scrollColapse": true
        });
        //$('#ex').DefaultView.Sort = "Date DESC";
        
    });
</script>