<?php

namespace Fhtechnikum\Loops;

use Fhtechnikum\Loops\DTOs\ArrayResponseDTO;

class LoopEvenService implements ServiceInterface
{
    private array $characters;

    public function __construct(InputRepository $inputRepository)
    {
        $this->characters = $inputRepository->getArrayModel()->characterArray;
    }

    public function getLoopResult(): DTOs\ArrayResponseDTO
    {
        $evenArray = [];
        for ($i = 0; $i < count($this->characters); $i++) {
            if ($i % 2 != 0) {
                array_push($evenArray, $this->characters[$i]);
            }
        }
        $responseDTO = new ArrayResponseDTO();
        $responseDTO->loopName = "FOR-Loop";
        $responseDTO->result = $evenArray;

        return $responseDTO;

    }
}