<?php

namespace App\Exceptions;

use Exception;

class InvalidScore extends Exception
{
    private $from;
    private $to;
    public function __construct($from, $to)
    {
        $this->from =$from;
        $this->to =$to;
    }
    public function render(){
        return response()->json([
            //'score' => 'Debe ingresar un valor entre 1 y 5'
            trans('rating.invalidScore', [
              'from' => $this->from,     
              'to' => $this->to,  
            ])
        ]);
    }
}
