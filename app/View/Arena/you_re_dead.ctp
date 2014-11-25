<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

echo "Your fighter ".$dead['name']." is dead!!";
echo $this->Html->link(
    'Retour au jeu',
    array(
        'controller' => 'Arena',
        'action' => 'affichage2d',
        'full_base' => true
    ) 
); 



