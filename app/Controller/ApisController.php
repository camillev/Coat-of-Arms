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
        $this->set('datas', $this->Fighter->findById($id));
    }
    
     public function fightermove($id, $direction) {
        $this->layout = 'ajax';
        $this->Fighter->doMove($id, $direction);
        $this->set('datas', $this->Fighter->findById($id));
    }
    
    public function fighterattack($id, $direction) {
        $this->layout = 'ajax';
        $this->Fighter->doAttack($id, $direction);
        $this->set('datas', $this->Fighter->findById($id));
    }
    
}

    
   