<?php

/**
 * Escreva uma função em PHP para pegar determinar a extensão dos 3
 * arquivos abaixo e mostrar as extensões na tela. As saídas devem ser
 * mostradas em uma lista em ordem alfabética.
 * 
 * Arquivos de exemplo
 * a) music.mp4
 * b) video.mov
 * c) imagem.jpeg
 * 
 * Saída esperada:
 * 1 .jpeg
 * 2 .mov
 * 3 .mp4
 * 
 * @param array $arquivos contendo nome dos arquivos
 */

function showExtensoes(array $arquivos) {
    $extensoes = [];

    // Estrutura de repetição para percorrer o array de arquivos e obter todas as extensões
    foreach ($arquivos as $arquivo) {
        $extensao = pathinfo($arquivo, PATHINFO_EXTENSION);
        $extensoes[] = '.' . $extensao;
    }

    // Ordenando por ordem alfabética todas as extensões
    asort($extensoes);

    // Finalizando mostrando todas as extensões com uma lista numerada
    $i = 1;
    foreach($extensoes as $extensao) {
        echo $i . " " . $extensao . "<br>";
        $i++;
    }
}

// Variável de exemplo com array para função
$arquivos = ['music.mp4', 'video.mov', 'imagem.jpeg'];

// Executa a função para mostrar as extensões dos arquivos dados.
showExtensoes($arquivos);

?>