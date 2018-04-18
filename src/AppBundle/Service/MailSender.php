<?php

namespace AppBundle\Service;

class MailSender
{
    protected $mailer;

    public function __construct($mailer, $usersGetter)
    {
        $this->mailer = $mailer;
        $this->usersGetter = $usersGetter;
    }

    /*public static function sendResetPassword($to) {
        $message = (new \Swift_Message('Hello Email'))
            ->setFrom('send@example.com')
            ->setTo($to)
            ->setBody(
                $this->renderView(
                // app/Resources/views/Emails/registration.html.twig
                    'Emails/registration.html.twig',
                    array('name' => $name)
                ),
                'text/html'
            )
        ;

        $mailer->send($message);
    }*/

    public static function sendActivation($to) {
        $user = $usersGetter->getByEmail($to);
        $message = (new \Swift_Message('Snowtricks : activation du compte'))
            ->setFrom('contact@snowtricks.com')
            ->setTo($to)
            ->setBody(
                $this->renderView(
                // app/Resources/views/Emails/registration.html.twig
                    'Emails/registration.html.twig',
                    array('user' => $user)
                ),
                'text/html'
            )
        ;

        $mailer->send($message);
    }
}