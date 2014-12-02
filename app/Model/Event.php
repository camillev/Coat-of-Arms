<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
App::uses('Surrounding', 'Model');

class Event extends AppModel {

    public $uses = array('Player', 'Fighter', 'Event');

    function getEvent($x, $y) {
        $data = $this->find('all', array('conditions' => array('coordinate_x' => $x, 'coordinate_y' => $y)));
        if ($data) {
            return $data;
        } else {
            return false;
        }
    }

    function createEvent($name, $coordinate_x, $coordinate_y) {
        $date = new DateTime(date("Y-m-d H:i:s"));
        $eventData = array('Event' => array(
                'name' => $name,
                'date' => $date->format("Y-m-d H:i:s"),
                'coordinate_x' => $coordinate_x,
                'coordinate_y' => $coordinate_y));
        $this->save($eventData);
    }

    function eventsFill($data) {
        $id_joueur = CakeSession::read('nom')['id'];
        //$id_fighter = 1;
        $vue_tot = $data['Fighter']['skill_sight'];
        $x = $data['Fighter']['coordinate_x'];
        $y = $data['Fighter']['coordinate_y'];
        $tab = NULL;

        for ($i = 0; $i < 10; $i++) {
            for ($j = 0; $j < 15; $j++) {
                if ((abs($i - $y) + abs($j - $x)) <= $vue_tot) {
                    $donnee = $this->getEvent($j, $i);
                    if ($donnee) {
                        foreach ($donnee as $d) {
                            $tab[] = array('vue' => abs($i - $y) + abs($j - $x), 'data' => $d['Event']);
                        }
                    }
                }
            }
        }
        return $tab;
    }
}
