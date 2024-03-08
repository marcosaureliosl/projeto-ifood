<?php

include 'src/FileService.php';

echo '========================'.PHP_EOL;
echo '--- INICIANDO IMPORT ---'.PHP_EOL;

$nomeDoArquivo = $argv[1];

// $tipo = FileService::save($nomeDoArquivo);


// echo "- Tipo: {$tipo}".PHP_EOL;

// if ($tipo === 'saida') {
//     echo '========================'.PHP_EOL;
//     exit;
// }

$linhas = file($nomeDoArquivo);

$arquivoColab = fopen("colaboradores.csv", "a+"); //usa pra escrever no arquivo

$separador = ',';

if (true === str_contains($linhas[0], ';')) {
    $separador = ';';
} 

foreach ($linhas as $cadaLinha) {
    $partes = explode($separador, $cadaLinha);

    fwrite($arquivoColab, "{$partes[0]};{$partes[1]}".PHP_EOL);
}





