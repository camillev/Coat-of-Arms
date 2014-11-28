<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


class PlayersController extends AppController {
    public $helpers = array('Html', 'Form');
    public $uses = array('Player', 'Fighter', 'Event');
    
    
   
    
    
    
     //HOME PAGE
    public function home()
    {
      $avatar = $this->Fighter->carrousselAvatar();
     
      $this->set('avatar',$avatar);
    }
    
    
    //Fonction inscription
    public function inscription() {
       if ($this->request->is('post'))
       {
           $email = $this->request->data['email'];
           $pass = $this->request->data['pass'];
           $pass_verif = $this->request->data['pass_confirm'];
           
                  
           if ($pass==$pass_verif)
           {
               $inf = $this->Player->find('first',array('conditions'=>array('email'=>$email)));
             
               if (empty($inf))
               {
                    $this->Player->addPlayer($email, $pass);
                    
                    //Mail inscription
                   //$this->Player->mail_inscription($email);
                    $this->Session->setFlash('Inscription avec succes'); 
               
                    if ($this->Player->connexion($email, $pass))
            {
               $fighter = $this->Fighter->find('first',array('conditions'=>array('player_id'=> CakeSession::read('nom')['id'],'coordinate_x !='=> '-1' )));
    if(!empty($fighter)){
    
        CakeSession::write('fighter',$fighter['Fighter']['id']);
       
        
    }
                
                
                $this->redirect(array("controller" => "Arena", 
            "action" => "home_session"));}
                    
                    
                    
                    
                    
               }
               else {
                   //Email deja existant
                  
                         $this->Session->setFlash('Email deja existant'); 
               }
           }
           else
           {
               //Le mot de passe est different de la confirmation
              
                     $this->Session->setFlash('Mdp erroné'); 
           } 
           
         $this->redirect(array("controller" => "Players", 
                          "action" => "home"));
       }
         
    }
    
    
        
    
    
    
    //Fonction de connexion
    function connexion(){
        
        
        if ($this->request->is('post'))
        {
            $email = $this->request->data['email'];
            $pass = $this->request->data['pass'];
            if ($this->Player->connexion($email, $pass))
            {
               $fighter = $this->Fighter->find('first',array('conditions'=>array('player_id'=> CakeSession::read('nom')['id'],'coordinate_x !='=> '-1' )));
    if(!empty($fighter)){
    
        CakeSession::write('fighter',$fighter['Fighter']['id']);
       
        
    }
                
                
                $this->redirect(array("controller" => "Arena", 
                          "action" => "home_session"));
            }
            
        }
        
    }
    
    
    //Fonction de récupération de mdp
    function recupMdp()
    {
        if ($this->request->is('post'))
        {
            $email = $this->request->data['email'];
            
            $player = $this->Player->findPlayer(NULL,$email);
            
            if ($player)
            {
                //Joueur ds la BDD
                $id = $player[0]['players']['id'];
                //Envoyer mail avec lien avec id
                  App::uses('CakeEmail', 'Network/Email');
   
         $Email = new CakeEmail();
         $Email->config('gmail');
       $Email->viewVars(array('id' => $id));
        $Email->template('recup_mdp', NULL)
                ->emailFormat('html')
                ->to($email)
                ->from('you@localhost')
                ->send();
        
        
        echo 'mail envoyé!!';
        
            }
            else
            {
                //EMAIL INCONNU
            }
        
          $this->redirect(array("controller" => "Players", 
                          "action" => "home"));
          
        }
    }
    
    
    //Fonction de nouveau mdp (après perte)
    function newMdp($id)
    {
        $result = $this->Player->findPlayer($id,NULL);
        
        $this->set('id', $id); 
        if ($result)
        {
            if ($this->request->is('post')){
                $pass = $this->request->data['pass'];
                $pass2= $this->request->data['pass_confirm'];
                if (strcmp($pass,$pass2))
                {
                    $this->Player->updateMdp($id,$pass);
                    echo 'modif reussi';
                }
                else
                {
                echo 'erreur mdp diferent';    
                //MDP DIFFERENT
                }
            }
        }
        else
        {
            //retour page d'accueil
            echo 'erreur';
        }
        
    }
    
    
    function hallOfFame(){
         //$this->layout='clean'; 
    }
    
    
}