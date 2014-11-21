<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
?>
<h1>
    <?php echo "Hello,"?>
</h1>
<p>   
      Their is a link to change your password : <br/>
    
   
     <?= $this->Html->link(
    'Change your mdp',
    array(
        'controller' => 'players',
        'action' => 'new_mdp/'.$id,
        'full_base' => true
    ) 
); ?>
</p>
<p>
Hope you have a great time on Coat of Arms !
</p>
<p>
        Regards,
</p>
<p>
        Coat of Arms Team
</p>