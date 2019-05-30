<?php
namespace App\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Session\Session;
use App\Helper\Sms;

class IndexController extends AbstractController
{
    /**
     * @Route("/", name="index")
     */
    public function indexAction()
    {
        $session = new Session();
        return $this->render("index.html.twig", [
            "auth" => $session->get("auth")
        ]);
    }

    /**
     * @Route("/send", name="send", methods={"POST"})
     */
    public function sendAction(Request $request)
    {
        $phone = $request->get("phone");
        $message = $request->get("message");
        $sms = new Sms();
        
        $sms->setPhone($phone);
        $sms->setMessage($message);

        $sms->sendMessage();
        
        return $this->redirectToRoute("index");
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