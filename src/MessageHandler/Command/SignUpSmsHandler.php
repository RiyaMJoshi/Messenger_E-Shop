<?php

namespace App\MessageHandler\Command;

use App\Message\Command\SignUpSms;

class SignUpSmsHandler
{
    public function __invoke(SignUpSms $signUpSms)
    {
        // connect to API of external sms provider
        
        sleep(2);
        var_dump($signUpSms);
    }
}

?>