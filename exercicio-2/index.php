<?php

/**
 * Joãozinho vai morder o seu dedo 50% das vezes. Esse exercício será
 * dividido em 2 partes.
 * 
 * a) Primeiro, cria uma função chamada foiMordido() que deverá retornar TRUE para 50%
 * das vezes e FALSE para os outros 50%. A função rand() pode ser útil aqui.
 * 
 * b) Após criar a função, crie um código/página que mostre as frases "Joãozinho mordeu o
 * seu dedo !" ou "Joãozinho NAO mordeu o seu dedo !" usando a função foiMordido()que
 * foi criado na primeira parte.
 */

/**
 * Função foiMordido() que retorna TRUE para 50% das vezes e FALSE para os outros 50%.
 *
 * @return bool TRUE ou FALSE com uma chance de 50% cada.
 */
function foiMordido() {
    return (rand(0, 1) == 1);
}

// Estrutura de condição para verificar se Joãozinho mordeu ou não, fazendo com que mostre o resultado
if (foiMordido()) {
    echo "Joãozinho mordeu o seu dedo !";
} else {
    echo "Joaozinho NAO mordeu o seu dedo !";
}

?>