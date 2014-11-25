<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

  App::uses('Folder', 'Utility');
App::uses('File', 'Utility');

class Fighter extends AppModel{
    
    
    public $displayField = 'name';
    
 
      function getSurrounding($i,$j){
         $data = $this->find('first',array('conditions'=>array('coordinate_x'=>$i,'coordinate_y'=>$j)));
         if($data)
         {return $data['Surrounding'];}
         else {return false;}
     }
     
    
    
}