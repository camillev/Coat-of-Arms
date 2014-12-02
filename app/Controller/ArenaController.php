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
class ArenaController extends AppController {

    public $helpers = array('Html', 'Form');
    public $uses = array('Player', 'Fighter', 'Event');
    //public $components = array('Session');

    //public  $name = 'Jqplots';                     

    /**
     * index method : first page
     *
     * @return void
     */
    public function beforeFilter() {
        /*if (!CakeSession::check('nom')) {
            $this->redirect(array("controller" => "Players",
                "action" => "home"));*/
        //}
    }

    public function homeSession() {
        
        if ($this->request->is('get')){
            if (isset($this->request->query['id'])){
                CakeSession::write('nom',array('id'=>$this->request->query['id']));
            }
        } 
        pr($this->Session->read('nom'));
        $avatar = $this->Fighter->carrousselAvatar();
        $this->set('avatar', $avatar);
    }

    
    public function enterArena() {
        if (CakeSession::check('fighter')) {
            $this->redirect(array("controller" => "Arena",
                "action" => "affichage2d"));
        }
        $idjoueur = CakeSession::read('nom')['id'];
        $data = $this->Fighter->afficherFighter($idjoueur);
        $this->set('list', $data);
    }

    
    function randPosition($id) {
        $this->Fighter->goArena($id);
        CakeSession::write('fighter', $id);
        $this->redirect(array("controller" => "Arena",
            "action" => "affichage2d"));
    }


  
    public function deconnexion() {
        CakeSession::destroy();
        $this->redirect(array("controller" => "Players",
            "action" => "home"));
    }

    
    public function affichage1d() {
        if (!CakeSession::check('fighter')) {
            $this->redirect(array("controller" => "Arena",
                "action" => "enterArena"));
        }
        //-----------------Actions-----------------------
        if ($this->request->is('post')) {
            if (isset($this->request->data["Fightermove"])) {
                $this->Fighter->doMove(CakeSession::read('fighter'), $this->request->data['Fightermove']['direction']);
                $this->redirect(array('action' => 'affichage1d'));
            }
            if (isset($this->request->data["Fighterattack"])) {
                $this->Fighter->doAttack(CakeSession::read('fighter'), $this->request->data['Fighterattack']['attack']);
                $this->redirect(array('action' => 'affichage1d'));
            }
        }
        $this->set('tabArena', $this->Fighter->arenaFill());
        $this->set('id', CakeSession::read('fighter'));
        
        //---------------Evolution perso---------------------
        $this->set('info', $this->Fighter->infoPerso(CakeSession::read('fighter')));
        if ($this->Fighter->testAvatar(CakeSession::read('fighter')) == 1) {
            $this->set('img', 'avatar/' . CakeSession::read('fighter') . '.png');
        } else {
            $this->set('img', 'blason_def.png');
        }
        
        //-------------------Diary----------------------------
        $id_fighter = CakeSession::read('fighter');
        $data = $this->Fighter->find('first', array('conditions' => array('fighter.id' => $id_fighter)));
        $this->set('tab', $this->Event->eventsFill($data));

        //-------------------Personnage tué-------------------
        $dead = $this->Fighter->find('first', array('conditions' => array('fighter.id' => $id_fighter, 'current_health <=' => '0')));
        if (!empty($dead)) {
            $this->redirect(array("controller" => "Arena",
                "action" => "youReDead/" . $id_fighter));
        }

        //--------------------Pts d'actions-----------------------
        $this->set('pts_action', $this->Fighter->ptsAction());
        
        //-------------------Evolution des skills----------------
        $this->set('tab', $this->Fighter->tabFill());
        if ($this->request->is('post')) {
            if (isset($this->request->data['vue'])) {
                $this->Fighter->evolution_perso($id_fighter, 'vue');
            }
            if (isset($this->request->data['force'])) {
                $this->Fighter->evolution_perso($id_fighter, 'force');
            }
            if (isset($this->request->data['vie'])) {
                $this->Fighter->evolution_perso($id_fighter, 'vie');
            }
            $this->redirect(array('action' => 'affichage1d'));
        }
    }

    public function youReDead($id_fighter) {
        $dead = $this->Fighter->find('first', array('conditions' => array('fighter.id' => $id_fighter, 'current_health <=' => '0')));
        $this->set('dead', $dead['Fighter']);
        $this->Fighter->delete($dead['Fighter']['id']);
        $this->Session->delete('fighter');
    }

    public function affichage2d() {
        if (!CakeSession::check('fighter')) {
            $this->redirect(array("controller" => "Arena",
                "action" => "enterArena"));
        }
        //--------------------Actions------------------------
        if ($this->request->is('post')) {
            if (isset($this->request->data["Fightermove"])) {
                $this->Fighter->doMove(CakeSession::read('fighter'), $this->request->data['Fightermove']['direction']);

                $this->redirect(array('action' => 'affichage2d'));
            }
            if (isset($this->request->data["Fighterattack"])) {
                $this->Fighter->doAttack(CakeSession::read('fighter'), $this->request->data['Fighterattack']['attack']);
            }
        }
        $this->set('tabArena', $this->Fighter->arenaFill());
        $this->set('id', CakeSession::read('fighter'));

        //----------------Evolution perso--------------------
        $this->set('info', $this->Fighter->infoPerso(CakeSession::read('fighter')));
        if ($this->Fighter->testAvatar(CakeSession::read('fighter')) == 1) {
            $this->set('img', 'avatar/' . CakeSession::read('fighter') . '.png');
        } else {
            $this->set('img', 'blason_def.png');
        }

        //----------------------Diary-------------------------
        $id_fighter = CakeSession::read('fighter');
        $data = $this->Fighter->find('first', array('conditions' => array('fighter.id' => $id_fighter)));

        $this->set('tab', $this->Event->eventsFill($data));

        //-------------------Personnage tué----------------
        $dead = $this->Fighter->find('first', array('conditions' => array('fighter.id' => $id_fighter, 'current_health <=' => '0')));
        if (!empty($dead)) {
            $this->redirect(array("controller" => "Arena",
                "action" => "youReDead/" . $id_fighter));
        }

        //--------------------Pts d'actions---------------------
        $this->set('pts_action', $this->Fighter->ptsAction());

        //----------------evolution des perso-----------------
        if ($this->request->is('post')) {
            if (isset($this->request->data['vue'])) {
                $this->Fighter->evolution_perso($id_fighter, 'vue');
            }
            if (isset($this->request->data['force'])) {
                $this->Fighter->evolution_perso($id_fighter, 'force');
            }
            if (isset($this->request->data['vie'])) {
                $this->Fighter->evolution_perso($id_fighter, 'vie');
            }
            $this->redirect(array('action' => 'affichage2d'));
        }
    }

    
    public function managePerso($id) {
        if ($this->request->is('post')) {
            if ($this->request->data['vue'] == TRUE) {
                $this->Fighter->evolutionPerso($id, 'vue');
            }
            if ($this->request->data['force'] == TRUE) {
                $this->Fighter->evolutionPerso($id, 'force');
            }
            if ($this->request->data['vie'] == TRUE) {
                $this->Fighter->evolutionPerso($id, 'vie');
            }
            $this->redirect(array("controller" => "Arena", 'action' => 'affichage2d'));
        }
    }

    public function diary() {
        if (!CakeSession::check('fighter')) {
            $this->redirect(array("controller" => "Arena",
                "action" => "enterArena"));
        }
        $id_joueur = CakeSession::read('nom')['id'];
        $id_fighter = CakeSession::read('fighter');
        $data = $this->Fighter->find('first', array('conditions' => array('fighter.id' => $id_fighter)));
        $this->set('tab', $this->Event->eventsFill($data));
    }

    function hallOfFame() {
        //$this->layout='clean'; 
    }

    public function fighter() {
        $this->set('raw', $this->Fighter->findById(1));
    }

    public function sight() {
        if ($this->request->is('post')) {
            pr($this->request->data);
        }
        $this->set('raw', $this->Fighter->find('all'));
        $this->Fighter->doMove(1, $this->request->data['Fightermove']['direction']);
    }

}
