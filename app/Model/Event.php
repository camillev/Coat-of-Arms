<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class Event extends AppModel{
    
        public $uses = array('Player', 'Fighter', 'Event');
        
        
        
    function get_event($x,$y)
    {
        $data = $this->find('first',array('conditions'=>array('coordinate_x'=>$x,'coordinate_y'=>$y)));
        
        if ($data){
        return $data['Event'];}
        else {return false;}
        
    }
    
    
     function eventsFill($data)
     {
         //$id_joueur = CakeSession::read('nom')['id'];
         $id_fighter = 1;
         $vue_tot=$data['Fighter']['skill_sight'];
         $x=$data['Fighter']['coordinate_x'];
         $y=$data['Fighter']['coordinate_y'];
         $tab=NULL;
        
    // $tab[]=array('vue' => '0', 'data'=>$data['Fighter']);
    
        for ($i=0;$i<10;$i++)
         {
             for ($j=0;$j<15;$j++)
             {
                 if( (abs($i-$y)+abs($j -$x)) <= $vue_tot){
                    $donnee = $this->get_event($j,$i);
                    if ($donnee){
                    $tab[]=array('vue'=> abs($i-$y)+abs($j -$x) , 'data' => $donnee);}
                  
             }
         }
         }
        return $tab;
     }
    

    
}
    