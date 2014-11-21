<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class FightersController extends AppController {
    
       public $helpers = array('Html', 'Form');
       
       public $uses = array('Player', 'Fighter', 'Event');

     
       //Verification ouverture de Session
      public function beforeFilter(){        
          if (!CakeSession::check('nom'))
  {
    $this->redirect(array("controller" => "Players", 
                          "action" => "home"));
  }
      }
       
      public function delete_fighter($id){
          
          $this->Fighter->delete($id);
          $this->redirect(array("controller" => "Fighters", 
                          "action" => "liste_perso"));
      }
      
      
       //Page d'accueil de Fighters 
       public function liste_perso(){
           
        $idjoueur = CakeSession::read('nom')['id']; 

        $data = $this->Fighter->afficher_fighter($idjoueur);

        $this->set('list',$data);
 
 
       }
       
      //Page d'ajout d'un Fighter
    public function add_perso() {  
        if ($this->request->is('post'))
        {
            $name = $this->request->data['name'];   
            $id=$this->Fighter->add_perso($name);
            $this->Session->setFlash('Ajout avec succes'); 
            $rep = $this->Fighter->upload_file2($this->request->data['add_perso']['avatar_file'],$id);
            if ($rep==false)
            {
                $this->Session->setFlash('Vous ne pouvez pas envoyer ce type de fichier'); 
            }
             //$this->response->header('location' , 'liste_perso' );
             //$this->response->send();
                $this->redirect(array("controller" => "Fighters", 
                          "action" => "liste_perso"));
        }
        
    }
    
    // FOnction pour modifier ou ajouter un avatar
    public function update_avatar($id){
         if ($this->request->is('post'))
        {
             if ($this->Fighter->test_avatar($id)==1)
        {
            unlink(IMAGES.'avatar/'.$id.'.png');
        } 
             
             $this->Fighter->upload_file2($this->request->data['add_perso']['avatar_file'],$id);
              
        $this->redirect(array('action' => 'manage_perso/'.$id));
             
        }
    }
    
    
    
    //Page evolution des Fighter
     public function manage_perso($id) {
          
     
        if ($this->Fighter->test_avatar($id)==1)
        {
            $this->set('img','avatar/'.$id.'.png');
        }
        else
        {
            $this->set('img','blason_def.png');
        }
     
        
        if ($this->request->is('post'))
        {
        
            if ($this->request->data['vue']== TRUE)
            {
               $this->Fighter->evolution_perso($id, 'vue');
            }
        if ($this->request->data['force']==TRUE)
        {
            $this->Fighter->evolution_perso($id, 'force');
        }
        if ($this->request->data['vie']==TRUE)
        {
            $this->Fighter->evolution_perso($id, 'vie');
        }
        
        
        $this->redirect(array('action' => 'manage_perso/'.$id));
        }
        
        
        $this->set('info', $this->Fighter->info_perso($id));
     
        $this->set('id', $id);
        
        
        
    }
}