<?php

namespace App\Controller;

use App\Dispatcher\LoggerEventDispatcher;
use App\Event\LoggingEvent;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * Class TestController
 * @package App\Controller
 */
class TestController extends AbstractController
{

    #[Route('api/test/event', methods: "GET")]
    public function main(Request $request, LoggerEventDispatcher $eventDispatcher)
    {
        /** @var string $message */
        $message = $request->get('message', 'Сообщение не передано');

        $eventDispatcher->dispatch(new LoggingEvent($message));

        return new Response($message);
    }
}
