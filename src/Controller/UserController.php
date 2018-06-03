<?php

namespace App\Controller;

use App\Entity\User;
use App\Form\UserRegistrationFormType;
use App\Security\LoginFormAuthenticator;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;
use Symfony\Component\Security\Guard\GuardAuthenticatorHandler;

class UserController extends Controller
{
    /**
     * @Route("/register", name="user_register")
     * @param Request $request
     * @param GuardAuthenticatorHandler $authenticatorHandler
     * @param LoginFormAuthenticator $authenticator
     * @param UserPasswordEncoderInterface $encoder
     * @return \Symfony\Component\HttpFoundation\RedirectResponse|\Symfony\Component\HttpFoundation\Response
     */
    public function register(
        Request $request,
        GuardAuthenticatorHandler $authenticatorHandler,
        LoginFormAuthenticator $authenticator,
        UserPasswordEncoderInterface $encoder
    )
    {
        $form = $this->createForm(UserRegistrationFormType::class);

        $form->handleRequest($request);

        if ($request->getMethod() === 'POST') {

            if ($form->isValid()) {
                /** @var User $user */
                $user = $form->getData();
                $user->setPassword($encoder->encodePassword($user, $user->getPlainPassword()));
                $em = $this->getDoctrine()->getManager();
                $em->persist($user);
                $em->flush();

                return $authenticatorHandler
                    ->authenticateUserAndHandleSuccess(
                        $user,
                        $request,
                        $authenticator,
                        'main'
                    );
            }
        }

        return $this->render('user/register.html.twig', [
            'form' => $form->createView(),
        ]);
    }
}
