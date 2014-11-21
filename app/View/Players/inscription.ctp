<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

?>
<form method="POST" action="inscription" class="well form-inline">
            <input class="form-control" type="email" name="email" value="" placeholder="Email" required/>
            <input class="form-control" type="password" name="pass" id="champA" placeholder="Password" required/>
            <input class="form-control" type="password" name="pass_confirm" id="champB" placeholder="Confirm the Password" required onBlur="checkPass()"/>    
            <div id="divcomp"></div>
            <input class="btn btn-primary" type="submit" name="sub" value="Inscription"/>
</form>

