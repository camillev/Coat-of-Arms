<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of ArenaController
 *
 * @author Camille
 */

class ArenaController extends AppController
{
  public $helpers = array('Html', 'Form');
    public $uses = array('Player', 'Fighter', 'Event');
    public $components = array( 'Session' ); 
    
      //public  $name = 'Jqplots';                     
    

    /**
     * index method : first page
     *
     * @return void
     */
    
    /// FONCTIONS C
    public function beforeFilter(){
        
      
           if (!CakeSession::check('nom'))
  {
    $this->redirect(array("controller" => "Players", 
                          "action" => "home"));
    }
   
    }
    
    
    //HOME PAGE COMPTE USER
    public function home_session()
    {
         
    }
    
    //
    public function enter_arena(){
        
        if (CakeSession::check('fighter'))
  {
    $this->redirect(array("controller" => "Arena", 
                          "action" => "affichage2d"));
    }
        
           $idjoueur = CakeSession::read('nom')['id']; 

        $data = $this->Fighter->afficher_fighter($idjoueur);

        $this->set('list',$data);
        
    }
    
    function rand_position($id){
        
        $this->Fighter->go_arena($id);  
        CakeSession::write('fighter',$id);
        $this->redirect(array("controller" => "Arena", 
                          "action" => "affichage2d"));
       
    }
    
    
    // Fonction globale de deconnexion + Redirection vers home page
    public function deconnexion()
    {
        CakeSession::destroy();
       // if (CakeSession::check('nom'))
    
         $this->redirect(array("controller" => "Players", 
                          "action" => "home"));
    }
    
    
    
  
    
    
    public function affichage1d(){
        
             if (!CakeSession::check('fighter'))
  {
    $this->redirect(array("controller" => "Arena", 
                          "action" => "enter_arena"));
    }
        
       $this->set('tab', $this->Fighter->tabFill());
         
         
    }
    
    
    
    public function you_re_dead($id_fighter){
        $dead = $this->Fighter->find('first',array('conditions'=>array('fighter.id'=>$id_fighter,'current_health <=' =>'0')));
         $this->set('dead',$dead['Fighter']);
                $this->Fighter->delete($dead['Fighter']['id']);
         $this->Session->delete('fighter');
    }
    
    
    public function affichage2d(){
        
         if (!CakeSession::check('fighter'))
    {
    $this->redirect(array("controller" => "Arena", 
                          "action" => "enter_arena"));
    }
    
             if ($this->request->is('post')) {
            if (isset($this->request->data["Fightermove"])){
            $this->Fighter->doMove(CakeSession::read('fighter'), $this->request->data['Fightermove']['direction']);}
            if (isset($this->request->data["Fighterattack"])){
            $this->Fighter->doAttack(CakeSession::read('fighter'), $this->request->data['Fighterattack']['attack']);}
        }
        $this->set('tabArena', $this->Fighter->arenaFill());
         $this->set('id', CakeSession::read('fighter'));
        
        
        /// Evolution perso
        $this->set('info', $this->Fighter->info_perso(CakeSession::read('fighter')));
         if ($this->Fighter->test_avatar(CakeSession::read('fighter'))==1)
        {
            $this->set('img','avatar/'.CakeSession::read('fighter').'.png');
        }
        else
        {
            $this->set('img','blason_def.png');
        }
        
        
        
        ///Diary
         //$id_joueur = CakeSession::read('nom')['id'];
         $id_fighter = CakeSession::read('fighter');
          $data = $this->Fighter->find('first',array('conditions'=>array('fighter.id'=>$id_fighter)));
        
          $this->set('tab', $this->Event->eventsFill($data));
          
          
          ///Personnage tué
          $dead = $this->Fighter->find('first',array('conditions'=>array('fighter.id'=>$id_fighter,'current_health <=' =>'0')));
          if (!empty($dead))
          {
                 $this->redirect(array("controller" => "Arena", 
                          "action" => "you_re_dead/".$id_fighter));
          }
         
        
    }
    
    
      
    //Page evolution des Fighter
     public function manage_perso($id) {
              
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
        
        
        $this->redirect(array("controller"=> "Arena",'action' => 'affichage2d'));
        }
        
    }
    
    
    

    
      public function diary(){
          
               if (!CakeSession::check('fighter'))
  {
    $this->redirect(array("controller" => "Arena", 
                          "action" => "enter_arena"));
    }
        
          $id_joueur = CakeSession::read('nom')['id'];
         $id_fighter = CakeSession::read('fighter');
          $data = $this->Fighter->find('first',array('conditions'=>array('fighter.id'=>$id_fighter)));
        
          $this->set('tab', $this->Event->eventsFill($data));
    }
  
    
    function hall_of_fame(){
         //$this->layout='clean'; 
    }
    
    
    /// FONCTIONS S
    
public function fighter(){
        $this->set('raw',$this->Fighter->findById(1)); 
       
    }
     public function sight(){
        if ($this->request->is('post'))       
        {   
             pr($this->request->data); 
        }
        $this->set('raw',$this->Fighter->find('all'));   
        $this->Fighter->doMove(1, $this->request->data['Fightermove']['direction']);
    }
    
   
    
    
    
}

