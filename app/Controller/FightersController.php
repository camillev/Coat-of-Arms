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
       
      public function deleteFighter($id){
          
          $this->Fighter->delete($id);
          $this->redirect(array("controller" => "Fighters", 
                          "action" => "listePerso"));
      }
      
      
       //Page d'accueil de Fighters 
       public function listePerso(){
           
        $idjoueur = CakeSession::read('nom')['id']; 

        $data = $this->Fighter->afficherFighter($idjoueur);

        $this->set('list',$data);
 
 
       }
       
      //Page d'ajout d'un Fighter
    public function addPerso() {  
        if ($this->request->is('post'))
        {
            $name = $this->request->data['name'];   
            $id=$this->Fighter->addPerso($name);
            $this->Session->setFlash('Ajout avec succes'); 
            $rep = $this->Fighter->uploadFile2($this->request->data['addPerso']['avatarFile'],$id);
            if ($rep==false)
            {
                $this->Session->setFlash('Vous ne pouvez pas envoyer ce type de fichier'); 
            }
             //$this->response->header('location' , 'liste_perso' );
             //$this->response->send();
                $this->redirect(array("controller" => "Fighters", 
                          "action" => "listePerso"));
        }
        
    }
    
    // FOnction pour modifier ou ajouter un avatar
    public function updateAvatar($id){
         if ($this->request->is('post'))
        {
             if ($this->Fighter->testAvatar($id)==1)
        {
            unlink(IMAGES.'avatar/'.$id.'.png');
        } 
             
             $this->Fighter->uploadFile2($this->request->data['addPerso']['avatar_file'],$id);
              
        $this->redirect(array('action' => 'managePerso/'.$id));
             
        }
    }
    
    
    
    //Page evolution des Fighter
     public function managePerso($id) {
        if ($this->Fighter->testAvatar($id)==1)
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
        
        $this->redirect(array('action' => 'managePerso/'.$id));
        }
        $this->set('info', $this->Fighter->infoPerso($id));
        $this->set('id', $id);
    }
}