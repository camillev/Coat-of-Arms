<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

App::uses('SimplePasswordHasher', 'Controller/Component/Auth');


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
            "action" => "homeSession"));}
                    
                    
                    
                    
                    
               }
               else {
                   //Email deja existant
                  
                         $this->Session->setFlash('An account with this email already exist'); 
               }
           }
           else
           {
               //Le mot de passe est different de la confirmation
              
                     $this->Session->setFlash('ERROR : Tape two time the same password'); 
           } 
           
         $this->redirect(array("controller" => "Players", 
                          "action" => "home"));
       }
         
    }
    
    
        
    
    
    
    //Fonction de connexion
    function connexion(){
        
         //$this->google();
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
                          "action" => "homeSession"));
            }
            else {
                $this->Session->setFlash('Wrong email or password'); 
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
                 $pass = $player[0]['players']['password'];
                     $passwordHasher = new SimplePasswordHasher(array('hashType' => 'sha256')); 
                 $pass = $passwordHasher->hash( $pass);
                 
                //Envoyer mail avec lien avec id
                  App::uses('CakeEmail', 'Network/Email');
   
         $Email = new CakeEmail();
         $Email->config('gmail');
       $Email->viewVars(array('id' => $id,'email'=>$email,'pass'=> $pass));
        $Email->template('recup_mdp', NULL)
                ->emailFormat('html')
                ->to($email)
                ->from('you@localhost')
                ->send();
        
        
    $this->Session->setFlash('Email sended'); 
        
            }
            else
            {
                //EMAIL INCONNU
                $this->Session->setFlash('Warning : Email unknown'); 
            }
        
          $this->redirect(array("controller" => "Players", 
                          "action" => "home"));
          
        }
    }
    
    
    //Fonction de nouveau mdp (après perte)
    function newMdp($email,$pass_b1)
    {
        //$result = $this->Player->findPlayer($id,NULL);
        $result = $this->Player->find('first',array('conditions'=>array('email'=>$email)));
        
        $this->set('email',$email);
        $this->set('pass',$pass_b1);
        

        
        if (!empty($result)){
            
            $passwordHasher = new SimplePasswordHasher(array('hashType' => 'sha256')); 
             $pass_b = $passwordHasher->hash( $result['Player']['password']);
             $id= $result['Player']['id'];
             if ($pass_b == $pass_b1){
           
                 if ($this->request->is('post')){
                $pass = $this->request->data['pass'];
                $pass2= $this->request->data['pass_confirm'];
               
                if ($pass==$pass2)
                {
                    $this->Player->updateMdp($id,$pass);
                    $this->Session->setFlash('Modification with success'); 
                     $this->redirect(array("controller" => "Players", 
                          "action" => "home"));
                    
                    
                }
                else
                {
               $this->Session->setFlash('Error : write two times the same password');  
                //MDP DIFFERENT
                }
            }
      
             }
             $this->Session->setFlash('ERROR : Wrong link'); 
        }
        else {
            echo "Cet utilisateur n'existe pas";
            $this->Session->setFlash('This user does not exist'); 
        }
        
        
        /*
        $this->set('id', $id); 
        if ($result)
        {
            if ($this->request->is('post')){
                $pass = $this->request->data['pass'];
                $pass2= $this->request->data['pass_confirm'];
                echo $pass.' '.$pass2;
                if ($pass==$pass2)
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
        */
    }
    
    
    function hallOfFame(){
         //$this->layout='clean'; 
    }
    
        public function google(){
        require APPLIBS.'google-api-php-client'.DS.'src'.DS.'apiClient.php';//require the api previously downloaded
        require APPLIBS.'google-api-php-client'.DS.'src'.DS.'contrib'.DS.'apiOauth2Service.php';
        
        
        session_start();//to store the access token

        $client = new apiClient();//initialise api object
        $client->setApplicationName("Webarena");

        //*********** Replace with Your API Credentials **************
        $client->setClientId('138790794477-75ucljqq87jrqqj1sii421sct6qce6ff.apps.googleusercontent.com');
        $client->setClientSecret('xzA-WMVdtFdue6Z_gex4CdjP');
        $client->setRedirectUri('http://localhost:8888/Coat-of-Arms/Players/connexion');
        $client->setDeveloperKey('AIzaSyAqjlxafN5by-SVwFVyv1jclomc4mMuNTA');
        //************************************************************

        $client->setScopes(array('https://www.googleapis.com/auth/userinfo.email'));//what we want to access
        $plus = new apiOauth2Service($client); //api service

        if (isset($_REQUEST['logout'])) { //see if users has clicked on logout
          unset($_SESSION['access_token']);
        }

        if (isset($_GET['code'])) { //if users allows us to get some data
          $client->authenticate();
          $_SESSION['access_token'] = $client->getAccessToken();
          header('Location: http://' . $_SERVER['HTTP_HOST'] . $_SERVER['PHP_SELF']);
        }

        if (isset($_SESSION['access_token'])) { //check if the token is valide
          $client->setAccessToken($_SESSION['access_token']);
        }

        if ($client->getAccessToken()) {
          $me = $plus->userinfo->get(); 
          
          $_SESSION['access_token'] = $client->getAccessToken();
        } else {
          $authUrl = $client->createAuthUrl();
        }
        
        $this->set('authUrl', $authUrl);
        $this->set('client', $client);
        $this->set('me', $me);
        
        
        //$this->bdd($me['email']);
        
        $email = $me['email'];
        $pass = '0';
        debug($email);
        
        $inf=$this->Player->find('first', array('conditions'=>array('email'=> $email))); //requetes: l'utilisateur est-il dans la table?
         debug ($inf);        
         if (!empty($inf)){ //s'il est dans la table : connexion simple
            if ($this->Player->connexion($email, $pass)){
                $fighter = $this->Fighter->find('first',array('conditions'=>array('player_id'=> CakeSession::read('nom')['id'],'coordinate_x !='=> '-1' )));
                if(!empty($fighter)){
                    CakeSession::write('fighter',$fighter['Fighter']['id']);
                } 
            }
        $this->redirect(array("controller" => "Arena", "action" => "home_session"));
        }
                 
        elseif (empty($inf)){   //s'il n'est pas dans la table : inscription
            $this->Player->add_player($email, $pass);
            //Mail inscription
            //$this->Player->mail_inscription($email);
            $this->Session->setFlash('Inscription avec succes'); 

            if ($this->Player->connexion($email, $pass)){
                $fighter = $this->Fighter->find('first',array('conditions'=>array('player_id'=> CakeSession::read('nom')['id'],'coordinate_x !='=> '-1' )));
                if(!empty($fighter)){
                    CakeSession::write('fighter',$fighter['Fighter']['id']);
                }
                $this->redirect(array("controller" => "Arena", "action" => "home_session"));
                }else { //Email deja existant
                    $this->Session->setFlash('Email deja existant'); 
                }
             }else{
                $this->Session->setFlash('problème de connexion'); 
                $this->redirect(array('controller' => 'Players','action'=>'home'));
             }
   
    }
    
    
   
     function facebook(){
         
        require APPLIBS.'Facebook'.DS.'facebook.php';
         $facebook= new Facebook(array(
             'appId' => '389619224536157', 
             'secret' => '3b91f7806992d371b1a09355ffbd2d62'
         ));
         
        $users = $facebook->getUser();
         
        if($users){
             try{
                 $infos = $facebook->api('/'.$users); ///recuperation des infos 
                 
                 $email = $infos['email'];
                 $pass =NULL;
                
                 $inf=$this->Player->find('first', array('conditions'=>array('email'=> $email))); //requetes: l'utilisateur est-il dans la table?
                 
                 if (!empty($inf)){ //s'il est dans la table : connexion simple
                   if ($this->Player->connexion($email, $pass)){
                        $fighter = $this->Fighter->find('first',array('conditions'=>array('player_id'=> CakeSession::read('nom')['id'],'coordinate_x !='=> '-1' )));
                        if(!empty($fighter)){
                            CakeSession::write('fighter',$fighter['Fighter']['id']);
                        } 
                    }
                    $this->redirect(array("controller" => "Arena", 
                          "action" => "home_session"));
                 }
                 
                elseif (empty($inf)){   //s'il n'est pas dans la table : inscription
                    $this->Player->add_player($email, $pass);
                    //Mail inscription
                    //$this->Player->mail_inscription($email);
                    $this->Session->setFlash('Inscription avec succes'); 

                    if ($this->Player->connexion($email, $pass)){
                      $fighter = $this->Fighter->find('first',array('conditions'=>array('player_id'=> CakeSession::read('nom')['id'],'coordinate_x !='=> '-1' )));
                        if(!empty($fighter)){
                           CakeSession::write('fighter',$fighter['Fighter']['id']);
                        }
                    $this->redirect(array("controller" => "Arena", "action" => "home_session"));
                    }else { //Email deja existant
                        $this->Session->setFlash('Email deja existant'); 
                    }
             }else{
                 $this->Session->setFlash('problème de connexion'); 
                  $this->redirect(array('controller' => 'Players','action'=>'home'));
             }
             } catch (FacebookApiException $e) {
                 debug($e);
             }
         }else{
             $this->Session->setFlash("Erreur de l'identification facebook","notif", array('type'=>'error'));
            $this->redirect(array('controller' => 'Players','action'=>'home')); //affichage de la page de connexion basique
       }

        }
 
    
}