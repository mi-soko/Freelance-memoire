<?php

namespace App\EventSubscriber;

use App\Entity\Users\User;
use JetBrains\PhpStorm\ArrayShape;
use JetBrains\PhpStorm\NoReturn;
use JetBrains\PhpStorm\Pure;
use Lexik\Bundle\JWTAuthenticationBundle\Event\JWTCreatedEvent;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;

class JWTSubscriber implements EventSubscriberInterface
{


    #[ArrayShape([JWTCreatedEvent::class => "string"])]
    public static function getSubscribedEvents():array
    {
        return [
            'lexik_jwt_authentication.on_jwt_created' => 'onLexikJwtAuthenticationOnAuthenticationSuccess',
        ];
    }


    #[NoReturn]
    public function onLexikJwtAuthenticationOnAuthenticationSuccess(JWTCreatedEvent $event):void
    {

        /** @var User $user */
        $user = $event->getUser();
        $data = $event->getData();
        $data['fullName'] = sprintf('%s %s', $user->getFirstName(),$user->getLastName());

        $event->setData($data);

    }
}
