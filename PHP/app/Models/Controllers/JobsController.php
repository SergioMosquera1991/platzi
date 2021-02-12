<?php
namespace App\Controllers;
//namespace Zend\Diactoros;

use App\Models\Job;

class JobsController extends BaseController{
    public function getAddJobAction($request){
        //var_dump($_POST);
        if($request->getMethod() == 'POST'){
            $postData = $request->getParsedBody();
            $job = new Job();
            $job->title = $postData['title'];
            $job->description = $postData['description'];
            $job->save();

            return $this->renderHTML('addJob.twig');
        }
    }
}