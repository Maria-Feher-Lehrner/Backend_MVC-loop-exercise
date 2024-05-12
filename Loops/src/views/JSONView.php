<?php

namespace Fhtechnikum\Loops\views;

class JSONView implements ViewInterface
{
    public function output($data): void
    {
        header("Content-type: application/json");
        echo json_encode($data);
    }
}