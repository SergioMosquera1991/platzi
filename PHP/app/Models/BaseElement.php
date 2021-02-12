<?php
    namespace App\Models;

require_once 'Printable.php';
///////PROGRAMACION ORIENTADA A OBJETO////////
class BaseElement implements Printable {

    //private $title;
    protected $title;
    public $description;
    public $visible=true;
    public $months;

    public function __construct($title, $description){
        //$this->title       = $title;
        $this->setTitle($title);   //para mantener la validacion del if
        $this->description = $description;
    }

    public function setTitle($ti){
        //$this->title = $ti;
        if($ti == ''){
            $this->title = 'N/A';
        }else{
            $this->title = $ti;
        }
    } 

    public function getTitle(){
        return $this->title;
    }

    public function getDuration(){
        $years = floor($this->months / 12);
        $module = $this->months % 12;

        if($years == 0){
        //$years = null;
        $years = "No ha compleatado el ";
        }

        return " $years years: $module months";
    }

    public function getDescription(){
        return $this->description;
    }
}