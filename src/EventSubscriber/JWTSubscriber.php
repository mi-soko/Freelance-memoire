<?php

namespace App\EventSubscriber;

use App\Entity\Users\Enterprise;
use App\Entity\Users\Freelancer;
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
        $data['firstName'] = $user->getFirstName();
        $data['email'] = $user->getEmail();
        $data['lastName'] = $user->getLastName();
        $data['id'] = $user->getId();
        if ($user instanceof Freelancer){
            $data['speciality'] = $user->getSpeciality();
            $data['description'] = $user->getDescription();
            $data['experienceCount'] = $user->getExperience()->count();
        }
        if ($user instanceof Enterprise){
            $data['enterpriseName'] = $user->getEnterpriseName();
        }

        $event->setData($data);

    }
}
