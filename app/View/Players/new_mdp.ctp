<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

?>

<form method="POST" action=<?= '../new_mdp/'.$id ?> class="well form-inline">
            <input class="form-control" type="password" name="pass" id="champA" placeholder="Password" required/>
            <input class="form-control" type="password" name="pass_confirm" id="champB" placeholder="Confirm the Password" required onBlur="checkPass()"/>    
            <div id="divcomp"></div>
            <input class="btn btn-primary" type="submit" name="sub" value="Inscription"/>
</form>


<script>
    
    function checkPass()
{
var champA = document.getElementById("champA").value;
var champB = document.getElementById("champB").value;
var div_comp = document.getElementById("divcomp");
 
if(champA == champB)
{
divcomp.innerHTML = "Correct";
}
else
{
divcomp.innerHTML = "Erreur !";
}
}
</script>
