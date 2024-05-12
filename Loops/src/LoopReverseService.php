<?php

namespace Fhtechnikum\Loops;

use Fhtechnikum\Loops\DTOs\ArrayResponseDTO;

class LoopReverseService implements ServiceInterface
{
    private array $characters;

    public function __construct(InputRepository $inputRepository)
    {
        $this->characters = $inputRepository->getArrayModel()->characterArray;
    }

    public function getLoopResult(): DTOs\ArrayResponseDTO
    {
        $reverseArray = [];
        $arrayLength = count($this->characters)-1;
        foreach ($this->characters as $character) {

            $character = $this->characters[$arrayLength];
            $reverseArray[] = $character;
            $arrayLength -= 1;
        }

        $responseDTO = new ArrayResponseDTO();
        $responseDTO->loopName = "FOR-EACH-Loop";
        $responseDTO->array = $reverseArray;

        return $responseDTO;
    }
}