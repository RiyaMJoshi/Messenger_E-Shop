<?php

namespace App\MessageHandler\Command;

use App\Message\Command\CreateOrder;

class CreateOrderHandler
{
    public function __invoke(CreateOrder $createOrder)
    {
        // send an email to client confirming the order (product name, amount, etc.)
        
        // update the warehouse databse to keep track up to date in physical stores.

        sleep(4);
        var_dump($createOrder);
    }
}

?>