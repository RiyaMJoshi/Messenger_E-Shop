<?php 

namespace App\Message\Command;

class SignUpSms
{
    private $phoneNumber;

    public function __construct(string $phoneNumber)
    {
        $this->phoneNumber = $phoneNumber;
    }

    public function getPhoneNumer(): string
    {
        return $this->phoneNumber;
    }
}

?>