<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
App::uses('Folder', 'Utility');
App::uses('File', 'Utility');
App::uses('Surrounding', 'Model');
App::uses('Event', 'Model');

class Fighter extends AppModel {

    public $displayField = 'name';
    public $belongsTo = array(
        'Player' => array(
            'className' => 'Player',
            'foreignKey' => 'player_id',
        ),
    );

    function position_aleatoire() {
        do {
            $x = rand(0, 14);
            $y = rand(0, 9);
            $resp = $this->getFighter($x, $y);
            $s = new Surrounding();
            $resp2 = $s->getSurrounding($x, $y);
        } while ($resp != false && $resp2 != false);
        $position = array('x' => $x, 'y' => $y);
        return $position;
    }

    function goArena($id) {
        $event = new Event();
        do {
            $x = rand(0, 14);
            $y = rand(0, 9);
            $resp = $this->getFighter($x, $y);
        } while ($resp != false);

        $data = array('coordinate_x' => $x, 'coordinate_y' => $y, 'id' => $id);
        $event->createEvent($datas['Fighter']['name'] . " entered the arena.", $datas['Fighter']['coordinate_x'], $datas['Fighter']['coordinate_y']);
        $this->save($data);
    }

    function testAvatar($id) {
        $dir = new Folder(IMAGES . 'avatar');
        $a = $dir->find($id . '.png');
        if (empty($a)) {
            return 0; //empty
        } else {
            return 1;
        }//full
    }

    function carrousselAvatar() {
        $dir = new Folder(IMAGES . 'avatar');
        return $dir->find('.*\.png');
    }

/// FONCTIONS S

    function checkOccupied($x, $y) {
        $datas = $this->query("select * from fighters where coordinate_x ='$x' and coordinate_y='$y';");
        if ($datas == null) {
            return true;
        } else {
            return false;
        }
    }

    function checkLimit($x, $y) {
        if ($x < 15 && $y < 10 && $x >= 0 && $y >= 0) {
            return true;
        } else {
            return false;
        }
    }

    function doMove($fighterId, $direction) {
        //récupérer la position et fixer l'id de travail
        $datas = $this->find('first', array('conditions' => array('Fighter.id' => $fighterId)));
        $x = $datas['Fighter']['coordinate_x'];
        $y = $datas['Fighter']['coordinate_y'];
        $surrounding = new Surrounding();
        $event = new Event();
        // use the Model
        if ($direction == 'north') {
            $y+=1;
        } elseif ($direction == 'south') {
            $y-=1;
        } elseif ($direction == 'east') {
            $x+=1;
        } elseif ($direction == 'west') {
            $x-=1;
        }
        $element = $surrounding->getSurrounding($x, $y);
        if ($this->checkOccupied($x, $y) && $this->checkLimit($x, $y)) {
            if ($element == false) {
                $this->set('coordinate_x', $datas['Fighter']['coordinate_x'] = $x);
                $this->set('coordinate_y', $datas['Fighter']['coordinate_y'] = $y);
            } elseif ($element['type'] == 'arbre') {
                return false;
            } elseif ($element['type'] == 'monster') {
                $position = $this->position_aleatoire();
                $event->createEvent($datas['Fighter']['name'] . " has been killed by a monster !", $datas['Fighter']['coordinate_x'], $datas['Fighter']['coordinate_y']);
                $surrounding->set('coordinate_x', $element['coordinate_x'] = $position['x']);
                $surrounding->set('coordinate_y', $element['coordinate_y'] = $position['y']);
                $this->set('current_health', $datas['Fighter']['current_health'] = 0);
            } elseif ($element['type'] == 'exit') {
                $position = $this->position_aleatoire();
                $event->createEvent($datas['Fighter']['name'] . " left the arena.", $datas['Fighter']['coordinate_x'], $datas['Fighter']['coordinate_y']);
                $this->set('coordinate_x', $datas['Fighter']['coordinate_x'] = -1);
                $this->set('coordinate_y', $datas['Fighter']['coordinate_y'] = -1);
                $surrounding->set('coordinate_x', $element['coordinate_x'] = $position['x']);
                $surrounding->set('coordinate_y', $element['coordinate_y'] = $position['y']);
            } elseif ($element['type'] == 'trap') {
                $position = $this->position_aleatoire();
                $event->createEvent($datas['Fighter']['name'] . " has fallen into a trap !", $datas['Fighter']['coordinate_x'], $datas['Fighter']['coordinate_y']);
                $surrounding->set('coordinate_x', $element['coordinate_x'] = $position['x']);
                $surrounding->set('coordinate_y', $element['coordinate_y'] = $position['y']);
                $this->set('current_health', $datas['Fighter']['current_health'] = 0);
            }
        } else {
            return false;
        }
        $this->save($datas);
        $surrounding->save($element);
        return true;
    }

    function doAttack($fighterId, $attack) {
        //récupérer la position et fixer l'id de travail
        $datas = $this->find('first', array('conditions' => array('Fighter.id' => $fighterId)));
        $x = $datas['Fighter']['coordinate_x'];
        $y = $datas['Fighter']['coordinate_y'];
        $surrounding = new Surrounding();
        $event = new Event();
        if ($attack == 'north') {
            $y+=1;
        } elseif ($attack == 'south') {
            $y-=1;
        } elseif ($attack == 'east') {
            $x+=1;
        } elseif ($attack == 'west') {
            $x-=1;
        }

        $element = $surrounding->getSurrounding($x, $y);

        if ($this->getFighter($x, $y) && $element == false) {
            $victim = $this->find('first', array('conditions' => array('coordinate_x' => $x, 'coordinate_y' => $y)));
            $seuil = 10 + $victim['Fighter']['level'] - $datas['Fighter']['level'];
            $rand = rand(0, 20);

            if ($rand > $seuil) {
                $victim['Fighter']['current_health']-=$datas['Fighter']['skill_strength'];
                $datas['Fighter']['xp']+=1;
                $event->createEvent($datas['Fighter']['name'] . " attacked " . $victim['Fighter']['name'] . " for " . $datas['Fighter']['skill_strength'] . " dammage !", $datas['Fighter']['coordinate_x'], $datas['Fighter']['coordinate_y']);
                if ($victim['Fighter']['current_health'] <= 0) {
                    $datas['Fighter']['xp']+=$victim['Fighter']['level'];
                    $event->createEvent($victim['Fighter']['name'] . " has been killed by" . $datas['Fighter']['name'] . " !", $datas['Fighter']['coordinate_x'], $datas['Fighter']['coordinate_y']);
                }
                $this->save($victim);
            } else {
                $event->createEvent($datas['Fighter']['name'] . " attacked " . $victim['Fighter']['name'] . " but it failed !", $datas['Fighter']['coordinate_x'], $datas['Fighter']['coordinate_y']);
            }
        } elseif ($element != false) {
            if ($element['type'] == 'monster') {
                $position = $this->position_aleatoire();
                $event->createEvent($datas['Fighter']['name'] . " killed a monster !", $datas['Fighter']['coordinate_x'], $datas['Fighter']['coordinate_y']);
                $surrounding->set('coordinate_x', $element['coordinate_x'] = $position['x']);
                $surrounding->set('coordinate_y', $element['coordinate_y'] = $position['y']);
                $datas['Fighter']['xp']+=1;
                $surrounding->save($element);
            }
        } else {
            $event->createEvent($datas['Fighter']['name'] . " attacked in the wind ...", $datas['Fighter']['coordinate_x'], $datas['Fighter']['coordinate_y']);
            return false;
        }
        //sauver la modif
        $this->save($datas);
        return true;
    }

    function arenaFill() {
        $id_joueur = CakeSession::read('nom')['id'];
        $id_fighter = CakeSession::read('fighter');
        $data = $this->find('first', array('conditions' => array(/* 'player_id'=>$id_joueur, */'fighter.id' => $id_fighter)));
        $vue_tot = $data['Fighter']['skill_sight'];
        $x = $data['Fighter']['coordinate_x'];
        $y = $data['Fighter']['coordinate_y'];
        $s = new Surrounding();

        for ($i = 0; $i < 15; $i++) {
            for ($j = 0; $j < 10; $j++) {

                $tab[$i][$j] = array("type" => 'non_vue');
            }
        }
        $tab[$x][$y] = array('type' => 'me', 'data' => $data['Fighter']);

        for ($i = 0; $i < 10; $i++) {
            for ($j = 0; $j < 15; $j++) {
                if ((abs($i - $y) + abs($j - $x)) <= $vue_tot) {
                    $donnee = $this->getFighter($j, $i);
                    if ($donnee) {
                        $tab[$j][$i] = array('type' => 'fighter', 'data' => $donnee);
                    } else {
                        //Recuperer surroundings

                        $donnee = $s->getSurroundingVisible($j, $i);
                        if (!empty($donnee)) {
                            $tab[$j][$i] = array('type' => 'surrounding', 'data' => $donnee);
                        } else {
                            $tab[$j][$i] = array('type' => 'vide');
                        }
                    }
                } else {
                    $tab[$j][$i] = array("type" => 'non_vue');
                }
            }
        }

        $tab[$x][$y] = array('type' => 'me', 'data' => $data['Fighter'], 'state' => $s->getDanger($x, $y));

        return $tab;
    }

/// FONCTIONS C

    function infoPerso($id_perso) {

        $inf = $this->query("SELECT * FROM fighters WHERE id = $id_perso");

        return $inf[0]['fighters'];
    }

    function addPerso($name) {
        $id_joueur = CakeSession::read('nom')['id'];

        App::uses('CakeTime', 'Utility');

        $date = new DateTime();
        $date_f = $date->format('Y-m-d H:i:s');
        $data = array('name' => $name, 'player_id' => $id_joueur, 'skill_health' => 3, 'current_health' => 3, 'skill_strength' => 1, "coordinate_x" => -1, "coordinate_y" => -1, "next_action_time" => $date_f);

        $this->save($data);
        return $this->id;
    }

    function evolution_perso($id_perso, $skills) {

        $perso = $this->infoPerso($id_perso);

        $vue = $perso['skill_sight'] + 1;
        $force = $perso['skill_strength'] + 1;
        $vie = $perso['skill_health'] + 3;
        $vie_current = $perso['current_health'] + 3;
        $level = $perso['level'] + 1;


        switch ($skills) {
            case 'vue' :
                //$this->query("UPDATE fighters SET skill_sight = $vue , level = $niveau , xp = $experience WHERE id = $id_perso");
                $data = array('id' => $id_perso, 'skill_sight' => $vue, 'level' => $level);

                break;
            case 'vie' :
                //$this->query("UPDATE fighters SET skill_health = $vie , level = $niveau , xp = $experience WHERE id = $id_perso");
                $data = array('id' => $id_perso, 'skill_health' => $vie, 'current_health' => $vie_current, 'level' => $level);
                break;

            case 'force' :
                //$this->query("UPDATE fighters SET skill_strength = $force , level = $niveau , xp = $experience WHERE id = $id_perso");
                $data = array('id' => $id_perso, 'skill_strength' => $force, 'level' => $level);
                break;
        }
        $this->save($data);
    }

    function getFighter($i, $j) {
        $data = $this->find('first', array('conditions' => array('coordinate_x' => $i, 'coordinate_y' => $j)));
        if ($data) {
            return $data['Fighter'];
        } else {
            return false;
        }
    }

    function uploadFile2($file, $id) {


        if (
                !empty($file['tmp_name']) &&
                in_array(strtolower(pathinfo($file['name'], PATHINFO_EXTENSION)), array('png'))) {
            $extension = strtolower(pathinfo($file['name'], PATHINFO_EXTENSION));
            move_uploaded_file($file['tmp_name'], IMAGES . 'avatar' . DS . $id . '.' . $extension);
            return true;
        } else {

            return false;
        }
    }

    function tabFill() {
        //$id_joueur = CakeSession::read('nom')['id'];
        $id_fighter = CakeSession::read('fighter');
        $data = $this->find('first', array('conditions' => array(/* 'player_id'=>$id_joueur, */'fighter.id' => $id_fighter)));
        $vue_tot = $data['Fighter']['skill_sight'];
        $x = $data['Fighter']['coordinate_x'];
        $y = $data['Fighter']['coordinate_y'];


        // $tab[]=array('vue' => '0', 'data'=>$data['Fighter']);

        for ($i = 0; $i < 10; $i++) {
            for ($j = 0; $j < 15; $j++) {
                if ((abs($i - $y) + abs($j - $x)) <= $vue_tot) {
                    $donnee = $this->getFighter($j, $i);
                    if (!empty($donnee)) {
                        if ($this->testAvatar($donnee['id']) == 1) {
                            $avatar = 'avatar/' . $donnee['id'] . '.png';
                        } else {
                            $avatar = "blason_def.png";
                        }
                        $tab[] = array('vue' => abs($i - $y) + abs($j - $x), 'data' => $donnee, 'avatar' => $avatar, 'type' => 'fighter');
                    } else {
                        //Recuperer surroundings
                        $s = new Surrounding();
                        $donnee = $s->getSurroundingVisible($j, $i);
                        if (!empty($donnee)) {
                            $tab[] = array('vue' => abs($i - $y) + abs($j - $x), 'data' => $donnee, 'type' => 'surrounding');
                        }
                    }
                }
            }
        }
        return $tab;
    }

    /// FONCTIONS LULU 
    function afficherFighter($id) {

        $data = $this->find('all', array('conditions' => array('player_id' => $id)));
        for ($i = 0; $i < count($data); $i++) {
            if ($this->testAvatar($data[$i]['Fighter']['id']) == 1) {
                $avatar = 'avatar/' . $data[$i]['Fighter']['id'] . '.png';
            } else {
                $avatar = "blason_def.png";
            }
            $data[$i]['avatar'] = $avatar;
        }

        return $data;
    }

    function checkTime() {
        $fighter = $this->find('first', array('conditions' => array('id' => CakeSession::read('fighter'))));
        $temps = $fighter['Fighter']['next_action_time'];
        $date_actuelle = new DateTime();
        $temps_actuel = $date_actuelle->format('y-m-d H:i:s');
        $max_action = 3;
        $temps_action = 10;

        if (($temps_actuel - $temps) >= $temps_action) {
            if (($temps_actuel - $temps) >= ($max_action * $temps_action)) {
                $newtime = $temps_actuel - (($max_action - 1) * $temps_action);
            } else {
                $newtime = $temps + $temps_action;
            }
            $data = array('id' => CakeSession::read('fighter'), 'next_action-time' => $newtime);
            $this->save($data);
            return true;
        } else {
            return false;
        }
    }

}
