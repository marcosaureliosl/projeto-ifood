<?php

include 'src/FileImport.php';
include 'src/FileService.php';

echo '========================'.PHP_EOL;
echo '--- INICIANDO IMPORT ---'.PHP_EOL;

$nomeDoArquivo = $argv[1];

$file = FileService::save($nomeDoArquivo);

echo "- Tipo: {$file->tipo}".PHP_EOL;

if ($file->tipo === 'saida') {
    $linhas = file($nomeDoArquivo);

    $separador = ',';
    if (true === str_contains($linhas[0], ';')) {
        $separador = ';';
    }

    if (false === file_exists("data/{$file->empresa}/colaboradores.csv")) {
        echo 'Arquivo de colaboradores não existe.' . PHP_EOL;
        exit;
    }

    $colabradores = file("data/{$file->empresa}/colaboradores.csv");
    $colabradoresFinal = $colabradores;

    unset($linhas[0]); //remove o cabeçalho
    foreach ($linhas as $linha) {
        $matriculaExcluir = explode($separador, $linha)[0];

        foreach ($colabradores as $key => $colabrador) {
            $matriculaColaborador = explode(';', $colabrador)[0];

            if ($matriculaColaborador === $matriculaExcluir) {
                unset($colabradoresFinal[$key]);
            }
        }
    }

    $arquivoColab = fopen("data/{$file->empresa}/colaboradores.csv", "w");
    fwrite($arquivoColab, implode($colabradoresFinal));
    fclose($arquivoColab); 

    echo '========================'.PHP_EOL;
    exit;
}

$linhas = file($nomeDoArquivo);

$separador = ',';

if (true === str_contains($linhas[0], ';')) {
    $separador = ';';
} 

$header = "Matricula;Nome".PHP_EOL;

if (true === file_exists("data/{$file->empresa}/colaboradores.csv")) {
    $header = "";
}

$arquivoColab = fopen("data/{$file->empresa}/colaboradores.csv", "a+"); //usa pra escrever no arquivo

fwrite($arquivoColab, $header);

unset($linhas[0]);
// array_shift($linhas[0]);

foreach ($linhas as $cadaLinha) {
    $partes = explode($separador, $cadaLinha);

    fwrite($arquivoColab, "{$partes[0]};{$partes[1]}".PHP_EOL);
}

// fechar o arquivo
fclose($arquivoColab); 





