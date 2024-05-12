<?php

namespace Fhtechnikum\Loops;

use Fhtechnikum\Loops\models\ArrayModel;

class InputRepository
{
    public function getArrayModel(): ArrayModel
    {

        $arrayModel = new ArrayModel();
        $arrayModel->characterArray=["A", "B", "C", "D", "E", "F", "G", "H", "I", "J", "K", "L",
            "M", "N", "O", "P", "Q", "R", "S", "T", "U", "V", "W", "X", "Y", "Z"];

        return $arrayModel;
    }
}