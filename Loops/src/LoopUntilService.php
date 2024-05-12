<?php

namespace Fhtechnikum\Loops;

use Fhtechnikum\Loops\DTOs\ArrayResponseDTO;

class LoopUntilService
{
    private array $characters;
    public string $until;

    public function __construct(InputRepository $inputRepository)
    {
        $this->characters = $inputRepository->getArrayModel()->characterArray;
    }

    public function getLoopResult(): DTOs\ArrayResponseDTO
    {
        $partArray = [];
        $count = 0;
        while ($this->characters[$count] != $this->until) { //evtl. hier noch eine Sicherheit eingeben und ein Maximum an Schleifen festlegen
            //weil, wenn das Alphabet z. B. nicht zur Gaenze hinterlegt ist, ich aber nach Y suche, dann laufe ich in eine Endlosschleife.

            $character = $this->characters[$count];
            $partArray[] = $character;
            $count++;
        }
        $partArray[] = $this->until;

        $responseDTO = new ArrayResponseDTO();
        $responseDTO->loopName = "WHILE-Loop";
        $responseDTO->array = $partArray;

        return $responseDTO;

    }
}