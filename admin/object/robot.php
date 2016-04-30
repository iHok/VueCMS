<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class Robot {
    private $name = '';
    public function __construct($name) {
        $this->setName($name);
    }
    public function setName($name) {
        $this->name = (string)filter_var($name);
    }
    public function getName() {
        return $this->name;
    }
}
?>

<?php
include_once 'object/robot.php';
$a = new Robot('ロボ太郎');
$b = new Robot('ロボ次郎');

echo $a->getName(); // ロボ太郎
echo $b->getName(); // ロボ次郎
echo
$mysqli->close();
?>