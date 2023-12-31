<?php

namespace App\Exceptions;

use Exception;

class ResetPasswordTokenInvalidException extends Exception
{
    protected $message = 'Password reset token invalid';

    public function render(){
        return response()->json([
            'error' => class_basename($this),
            'message' =>  $this->getMessage(),
        ], 400);
    }

}
