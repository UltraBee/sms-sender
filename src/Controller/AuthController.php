<?php

namespace App\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Session\Session;
use App\Entity\User;

class AuthController extends AbstractController
{
    /**
     * @Route("/login", name="login", methods={"POST"})
     */
    public function loginAction(Request $request)
    {
        $session = new Session();
        $login = $request->get("login");
        $password = $request->get("password");

        if(!empty($login) && !empty($password))
        {
            $result = $this->getDoctrine()->getRepository(User::class)->verifyUser($login, $password);
            $session->set("auth", $result);
        } else {
            //error
            $session->set("auth", false);
        }
        return $this->redirectToRoute("index");
    }

    /**
     * @Route("/logout", name="logout")
     */
    public function logoutAction()
    {
        $session = new Session();

        if($session->get("auth") == true)
        {
            $session->remove("auth");
        }
        return $this->redirectToRoute("index");
    }
}