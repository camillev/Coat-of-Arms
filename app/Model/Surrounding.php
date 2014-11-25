<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

  App::uses('Folder', 'Utility');
App::uses('File', 'Utility');

class Surrounding extends AppModel{
    
    
    public $displayField = 'name';
    
 
      function getSurrounding($i,$j){
         $data = $this->find('first',array('conditions'=>array('coordinate_x'=>$i,'coordinate_y'=>$j)));
         if($data)
         {return $data['Surrounding'];}
         else {return false;}
     }
     
       function getSurroundingVisible($i,$j){
         $data1 = $this->find('first',array('conditions'=>array('coordinate_x'=>$i,'coordinate_y'=>$j,'type'=>'rock')));
         $data2 = $this->find('first',array('conditions'=>array('coordinate_x'=>$i,'coordinate_y'=>$j,'type'=>'exit')));
         if($data1)
         {return $data1['Surrounding'];}
         elseif($data2)
         {return $data2['Surrounding'];}
         else {return false;}
     }
     function getDanger($x,$y){
         $dataMonster = $this->query("Select * from surroundings where (coordinate_x=$x+1 AND coordinate_y=$y) "
                 . "OR(coordinate_x=$x-1 AND coordinate_y=$y) "
                 . "OR (coordinate_x=$x AND coordinate_y=$y+1) "
                 . "OR (coordinate_x=$x AND coordinate_y=$y-1) AND type = 'monster'");
         $dataTrap = $this->query("Select * from surroundings where (coordinate_x=$x+1 AND coordinate_y=$y) "
                 . "OR(coordinate_x=$x-1 AND coordinate_y=$y) "
                 . "OR (coordinate_x=$x AND coordinate_y=$y+1) "
                 . "OR (coordinate_x=$x AND coordinate_y=$y-1) AND type = 'trap'");
         if($dataMonster){
             return "You smell something ...";
         }
         elseif($dataTrap){
             return "You feel a light breeze ... ";
         }
         else
         {
             return "Me";
        }

    }
     
     
}
