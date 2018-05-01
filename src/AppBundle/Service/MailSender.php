<?php

namespace AppBundle\Service;

class MailSender
{
    protected $mailer;
    protected $templating;

    public function __construct($mailer, $templating)
    {
        $this->mailer = $mailer;
        $this->templating = $templating;
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

    public function sendActivation($to, $usersGetter) {
        $user = $usersGetter->getByEmail($to);
        $message = (new \Swift_Message('Snowtricks : activation du compte'))
            ->setFrom('contact@snowtricks.com')
            ->setTo($to)
            ->setBody(
                $this->templating->render(
                // app/Resources/views/Emails/registration.html.twig
                    'Emails/registration.html.twig',
                    array('user' => $user)
                ),
                'text/html'
            )
        ;

        $this->mailer->send($message);
    }
}