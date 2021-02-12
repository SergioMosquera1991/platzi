<?php
    namespace App\Models;
    use Illuminate\Database\Eloquent\Model;
    
//require_once 'BaseElement.php';
//require_once 'Printable.php';

class Job extends Model {
    /*public function __construct($title, $description){
        $newTitle = 'Job: ' . $title;
        //parent::__construct($newTitle, $description);
        $this->title = $newTitle;
    }*/

    protected $table = 'jobs';

    public function getDuration(){
        $years = floor($this->months / 12);
        $module = $this->months % 12;

        if($years == 0){
        //$years = null;
        $years = "No ha compleatado el ";
        }

        return "Job Duration: $years years: $module months";
    }

}
