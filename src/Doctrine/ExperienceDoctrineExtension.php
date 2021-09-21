<?php

declare(strict_types=1);

namespace App\Doctrine;
use ApiPlatform\Core\EventListener\EventPriorities;
use App\Entity\OwnerInterfaceInterface;
use App\Entity\Skills\Experience;
use App\Entity\Users\Freelancer;
use App\Entity\Users\User;
use JetBrains\PhpStorm\ArrayShape;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpKernel\Event\ViewEvent;
use Symfony\Component\HttpKernel\KernelEvents;
use Symfony\Component\Security\Core\Authentication\Token\Storage\TokenStorageInterface;

class ExperienceDoctrineExtension implements EventSubscriberInterface
{

    public function __construct(private TokenStorageInterface $storage){}

    #[ArrayShape([KernelEvents::VIEW => "array"])]
    public static function getSubscribedEvents():array
    {
        return [
            KernelEvents::VIEW => ['onValid', EventPriorities::POST_VALIDATE]
        ];
    }

    public function onValid(ViewEvent $event)
    {
        /** @var Experience $experience */
         $experience   = $event->getControllerResult();
         $method = $event->getRequest()->getMethod();
         $user =  $this->storage->getToken()->getUser();
         if($method === Request::METHOD_POST && $experience instanceof Experience && $user instanceof Freelancer){
             $experience->setFreelancer($user);
         }

    }
}
