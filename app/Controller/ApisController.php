<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class ApisController extends AppController
{
    
        public $uses = array('Player', 'Fighter', 'Event');
        
    function fighterview($id)
    {
        $this->layout = 'ajax';
        $this->set('datas', $this->Fighter->find('all'));
    }
}