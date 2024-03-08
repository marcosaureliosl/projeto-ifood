<?php

class Aluno 
{
    public string $nome;
    public string $email;
    public string $cpf;

    public function __construct(
        string $nome,
        string $email,
        string $cpf
    ) {
        $this->nome = $nome;
    }
}

$aluno_1 = new Aluno('Alessandro', 'ale@email', '123');

echo $aluno_1->nome;