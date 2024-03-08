<?php

declare(strict_types=1);

class FileImport
{
    public function __construct(
        public string $empresa,
        public string $tipo
    ) {

    }


    // public string $empresa;
    // public string $tipo;

    // public function __construct(
    //     string $empresa,
    //     string $tipo
    // ) {
    //     $this->empresa = $empresa;
    //     $this->tipo = $tipo;
    // }
}