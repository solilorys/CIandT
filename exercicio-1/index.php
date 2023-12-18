<?php

/**
 * Crie um script PHP que mostra o nome do país e sua capital usando uma
 * array chamada $location. Ordene a Lista pelo nome da capital e adicione
 * pelo menos 5 entradas no array.
 * 
 * Exemplo do que deve ser mostrado de saída:
 * 
 * A capital do Brasil e Brasília
 * A capital dos EUA e Washington
 * A capital da Espanha e Madrid
 */

// Array criado com pais e capital
$location = [
    'Brasil' => 'Brasília',
    'Colômbia' => 'Bogotá',
    'Japão' => 'Tóquio',
    'Argentina' => 'Buenos Aires',
    'Canadá' => 'Ottawa',
    'Reino Unido' => 'Londres',
    'Índia' => 'Nova Deli'
];

asort($location);

// Estrutura de repetição para mostrar os países e suas capitais
foreach ($location as $country => $capital) {
    echo "A capital de <strong>$country</strong> é <strong>$capital</strong><br>";
}

?>