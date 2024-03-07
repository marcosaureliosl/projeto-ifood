<?php

echo '========================'.PHP_EOL;
echo '--- INICIANDO IMPORT ---'.PHP_EOL;

$nomeDoArquivo = $argv[1];
// input/Zenir_20240704_entrada.csv

$partes = explode('_', $nomeDoArquivo);

//isolar apenas o nome da empresa
$empresa = explode('/', $partes[0])[1];

$data = $partes[1];

//isolar apenas o tipo de processo (entrada ou saida)
$tipo = explode('.', $partes[2])[0];

$empresa = strtolower($empresa);

// 20240307
$ano = substr($data, 0, 4);
$mes = substr($data, 4, 2);
$dia = substr($data, -2);

//criando a pasta da empresa
mkdir(
    directory: "data/{$empresa}/{$tipo}/{$ano}/{$mes}/{$dia}", 
    recursive: true
);




//lendo conteudo do arquivo e transformando em um array do PHP
// $linhasDoArquivo = file($nomeDoArquivo);

// print_r($linhasDoArquivo);

echo '========================'.PHP_EOL;

