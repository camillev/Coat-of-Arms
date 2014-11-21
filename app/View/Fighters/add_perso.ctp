<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
?>

<form method="POST" action="add_perso" class="well form-inline" enctype="multipart/form-data">
            <input class="form-control" type="text" name="name" value=""  placeholder="Name" />
            <input class="form-control" type="file" name="data[add_perso][avatar_file]"  placeholder="Image" />
            <input class="btn btn-primary" type="submit" name="sub" value="Add"/>
</form>





