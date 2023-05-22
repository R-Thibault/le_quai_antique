<?php

namespace App\Service;

use App\Entity\Planning;
use Doctrine\ORM\EntityManagerInterface;

class PlanningService
{
    private $entityManager;

    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
    }

    public function getOpeningHours($dayOfWeek, $service)
    {
        $planning = $this->entityManager->getRepository(Planning::class)->findOneBy([
            'day' => $dayOfWeek,
        ]);

        if (!$planning) {
            return null;
        }

        if ($service === 'Midi') {
            return [
                'openAm' => $planning->getOpenAm(),
                'closeAm' => $planning->getCloseAm(),
            ];
        } elseif ($service === 'Soir') {
            return [
                'openPm' => $planning->getOpenPm(),
                'closePm' => $planning->getClosePm(),
            ];
        } else {
            return null;
        }
    }
}