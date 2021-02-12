<?php
//namespace Zend\Diactoros;
namespace App\Controllers;

use App\Models\{Job, Project};

class IndexController extends BaseController {

    public function indexAction(){
  
    $jobs=Job::all();
    $project1 = new Project('Project 1', 'Description');
    $projects = [
        $project1
    ];
    
    $lastName = 'Mosquera';
    $name = "Sergio $lastName";
    $limitMonths = 2000;

    return $this->renderHTML('index.twig', [
        'name' => $name,
        'jobs' => $jobs
    ]);
    }

}