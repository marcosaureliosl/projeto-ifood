<?php

echo '========================'.PHP_EOL;
echo '--- INICIANDO IMPORT ---'.PHP_EOL;

$nomeDoArquivo = $argv[1];

//lendo conteudo do arquivo e transformando em um array do PHP
$linhasDoArquivo = file($nomeDoArquivo);

print_r($linhasDoArquivo);

echo '========================'.PHP_EOL;

