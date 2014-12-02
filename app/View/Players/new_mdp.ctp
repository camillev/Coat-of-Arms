<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

?>

<form method="POST" action="<?= '../../newMdp/'.$email.'/'.$pass?>" class="well form-inline" >
    <input class="form-control" type="password" name="pass" id="champA" placeholder="Password" required/><br>
    <input class="form-control" type="password" name="pass_confirm" id="champB" placeholder="Confirm the Password" required onBlur="checkPass()"/><br> 
            <input class="btn btn-primary" type="submit" name="sub" value="Valid your new password"/>
</form>

