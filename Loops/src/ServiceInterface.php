<?php

namespace Fhtechnikum\Loops;

use Fhtechnikum\Loops\DTOs\ArrayResponseDTO;

interface ServiceInterface // Mehrwert von einem Interface ist hier eigentlich nicht wirklich da, da keine Austauschbarkeit erwartet wird. -->???
{
    public function getLoopResult(): ArrayResponseDTO;
}