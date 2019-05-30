<?php
namespace App\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;

class IndexController
{
    /**
     * @Route("/", name="index")
     */
    public function indexAction()
    {
        return new Response(
            'hello!'
        );
    }

    /**
     * @Route("/send", name="send")
     */
    public function sendAction()
    {
        return;
    }

    /**
     * @Route("/history", name="history")
     */
    public function historyAction()
    {
        return;
    }

    /**
     * @Route("/success", name="success")
     */
    public function successAction()
    {
        return;
    }
}