<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Messenger\MessageBusInterface;
use App\Message\Query\SearchQuery;
use Symfony\Component\Messenger\HandleTrait;
use App\Message\Command\CreateOrder;
use App\Message\Command\SignUpSms;

class EshopController extends AbstractController
{
    use HandleTrait;
    /**
     * @var MessageBusInterface
     */
    private $messageBus;

    public function __construct(MessageBusInterface $messageBus)
    {
        $this->messageBus = $messageBus;
    }

    /**
     * @Route("/", name="app_eshop")
     */
    public function index(): Response
    {
        return $this->render('eshop/index.html.twig', [
            'controller_name' => 'EshopController',
        ]);
    }

    /**
     * @Route("/search", name="search")
     */
    public function search(): Response
    {
        $search = 'laptops';

        // $this->messageBus->dispatch(new SearchQuery($search));
        $result= $this->handle(new SearchQuery($search));

        return new Response('Your search results for '. $search . $result);
    }

    /**
     * @Route("/signup-sms", name="signup-sms")
     */
    public function signUpSMS(): Response
    {
        $phoneNumber = '111 222 333';

        $this->messageBus->dispatch(new SignUpSms($phoneNumber));
        
        return new Response(sprintf('Your phone number %s is successfully signed up to SMS newsletter!', $phoneNumber));     
    }

    /**
     * @Route("/order", name="order")
     */
    public function order(): Response
    {
        $productId = 243;
        $productName = 'product name';
        $productAmount = 2;

        // save the order in the database

        $this->messageBus->dispatch(new CreateOrder($productId, $productAmount));

        return new Response('You successfully ordered your product!: ' . $productName);
    }
}
