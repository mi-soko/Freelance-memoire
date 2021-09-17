<?php

declare(strict_types=1);

namespace App\Doctrine;
use ApiPlatform\Core\EventListener\EventPriorities;
use App\Entity\Users\User;
use JetBrains\PhpStorm\ArrayShape;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpKernel\Event\ViewEvent;
use Symfony\Component\HttpKernel\KernelEvents;

class UserPasswordExtension implements EventSubscriberInterface
{


    #[ArrayShape([KernelEvents::VIEW => "array"])]
    public static function getSubscribedEvents():array
    {
        return [
            KernelEvents::VIEW => ['onValid', EventPriorities::POST_VALIDATE]
        ];
    }

    public function onValid(ViewEvent $event)
    {
        /** @var User $user */
         $user = $event->getControllerResult();
         $method = $event->getRequest()->getMethod();

         if($method === Request::METHOD_POST && $user instanceof User){
            $user->setPassword($user->plainPassword);
         }

    }
}
