<?php

namespace Fhtechnikum\Loops;

use Fhtechnikum\Loops\DTOs\ArrayResponseDTO;
use Fhtechnikum\Loops\views\JSONView;
use Fhtechnikum\Loops\views\ViewInterface;

class LoopController
{
    private LoopEvenService $evenService;
    private LoopReverseService $reverseService;
    private LoopUntilService $untilService;
    private ViewInterface $jsonView;
    private InputRepository $repository;

    public function __construct()
    {
        $this->repository = new InputRepository();
        $this->evenService = new LoopEvenService($this->repository);
        $this->reverseService = new LoopReverseService($this->repository);
        $this->untilService = new LoopUntilService($this->repository);
        $this->jsonView = new JsonView();
        $this->result = new ArrayResponseDTO();

    }

    public function route(): void
    {
        try {
            if (!isset($_GET['loopType'])) {
                throw new \InvalidArgumentException("loopType parameter is missing");
                //Gibt erst mal nur einen Fehler aus und ordnet ihm eine Message zu. Aber es wird noch keine Fehlermeldung AUSGEGEBEN!
                //Dafuer muss der geworfene Fehler erst gefangen werden. Und zwar von der ausfuehrenden Methode.
                //D.h. das muss dann in weiterer Folge auch bis zur index.php weitergegeben werden. (?)
                //Exception Handling: immer wenn ich weiss, dass ein Programm potenziell schiefgehen kann, verpacke ich die Aufgabe in ein try & catch.
            }

            $loopType = strtoupper(htmlspecialchars($_GET['loopType']));

            switch ($loopType) {
                case "UNTIL":

                    $until = strtoupper(htmlspecialchars($_GET['until']));
                    if (!preg_match('/^[A-Z]$/', $until)) {
                        throw new \InvalidArgumentException("until parameter must contain a single letter from A to Z");
                    }
                    $this->untilService->until = $until;
                    $this->result = $this->untilService->getLoopResult();
                    break;
                case "EVEN":
                    $this->result = $this->evenService->getLoopResult();
                    break;
                case "REVERSE":
                    $this->result = $this->reverseService->getLoopResult();
                    break;
                default:
                    throw new \InvalidArgumentException("Invalid value for loopType parameter");
            }

            $this->jsonView->output($this->result);

        } catch (\InvalidArgumentException $e) {
            http_response_code(400);
            $this->jsonView->output(['error' => $e->getMessage()]);
            //Das hier ist relevant, dass auf die geworfenen Fehler noch im Controller eingegangen wird und die Fehlermeldung ausgegeben wird.
            //Ansonsten wuerde der Fehler an die route function in der index.php zurueckgegeben, die aber keine andere Aufgabe als
            //das bootstrappen des Programms hat.
        } catch (\Exception $e) {
            http_response_code(500);
            $this->jsonView->output(['error' => 'An unexpected error occurred']);
        }
    }

    //Controller: koennte man auch in mehrere private Methods aufteilen, die man im switch dann aufruft. (?)

    //DTO-Ausgabe: ob dafuer der Controller oder die Serviceklasse (oder sogar die DTO Klasse selbst) zustaendig ist, ist Geschmackssache.
    //Aber die Entscheidung konsequent durchziehen!!
}