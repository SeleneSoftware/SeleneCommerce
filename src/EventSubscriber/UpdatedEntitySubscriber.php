<?php

namespace App\EventSubscriber;

use App\Interfaces\DatedEntityInterface;
use EasyCorp\Bundle\EasyAdminBundle\Event\BeforeEntityUpdatedEvent;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;

class UpdatedEntitySubscriber implements EventSubscriberInterface
{
    public static function getSubscribedEvents(): array
    {
        return [
            // BeforeEntityUpdatedEvent::class => ['setDateCreated'],
            // BeforeEntityUpdatedEvent::class => ['setDateUpdated'],
        ];
    }

    public function setDateUpdated(BeforeEntityUpdatedEvent $event)
    {
        $entity = $event->getEntityInstance();

        if (!$entity instanceof DatedEntityInterface) {
            return;
        }

        $entity->setDateUpdated(new \DateTime());
    }

    public function setDateCreated(BeforeEntityUpdatedEvent $event)
    {
        $entity = $event->getEntityInstance();

        if (!$entity instanceof DatedEntityInterface) {
            return;
        }
        if (null === $entity->getDateCreated()) {
            $entity->setDateCreated(new \DateTime());
        }
    }
}
