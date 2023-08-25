<?php

namespace App\Exceptions;

use Exception;

class TokenInvalidException extends Exception
{
    protected $message = 'Token inválido.';

    public function render(){
        return response()->json([
            'error' => class_basename($this),
            'message' =>  $this->getMessage(),
        ], 400);
    }
}
