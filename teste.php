<?php

declare(strict_types=1);

function welcome(?string $cidade = null, ?string $pais = null, ?string $email = null, ?string $nome = null): string
{
    return "Oi {$nome}";
} 

// echo welcome(null, null, null, "Elias").PHP_EOL;

//named arguments
echo welcome(nome: "Elias");