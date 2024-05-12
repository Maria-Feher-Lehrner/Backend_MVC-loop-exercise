<?php

namespace Fhtechnikum\Loops\views;

interface ViewInterface
{
    /**
     * @param mixed $data
     */
    public function output($data): void;
}