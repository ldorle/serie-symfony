<?php

namespace App\Notification;

use Symfony\Component\Mailer\MailerInterface;
use Symfony\Component\Security\Core\User\UserInterface;

class Sender
{

  protected $mailer;

  public function __construct(MailerInterface $mailer) {
    $this->mailer = $mailer;
  }

  public function sendNewUserNotificationToAdmin(UserInterface $user): void {

    //    Test
    //    file_put_contents('debug.txt', $user->getUserIdentifier());
    $message = new \Symfony\Component\Mime\Email();
    $message->from('account@series.com')
      ->to('admin@series.com')
      ->subject('new account created on series.com!')
      ->html('<h1>New Account!</h1>email: '.$user->getUserIdentifier());

    $this->mailer->send($message);

  }

}