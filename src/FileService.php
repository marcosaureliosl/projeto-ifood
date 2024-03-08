<?php

declare(strict_types=1);

class FileService
{
    public static function save(string $filename): string
    {
        $partes = explode('_', strtolower($filename));

        //isolar apenas o nome da empresa
        $empresa = explode('/', $partes[0])[1];
                
        //isolar apenas o tipo de processo (entrada ou saida)
        $tipo = explode('.', $partes[2])[0];
                
        // separando a data
        $ano = substr($partes[1], 0, 4);
        $mes = substr($partes[1], 4, 2);
        $dia = substr($partes[1], -2);
        
        $caminho = "data/{$empresa}/{$tipo}/{$ano}/{$mes}/{$dia}";
        
        //criando a pasta da empresa
        mkdir(
            directory: $caminho, 
            recursive: true
        );
        
        $arquivoFinal = date('Y-m-d_His');
        
        //copiar o arquivo para a nova pasta
        copy(
            from: $filename,
            to: "{$caminho}/{$arquivoFinal}.csv"
        );
        
        return $tipo;
    }
}
