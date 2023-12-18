<?php

/**
 * Crie um parser que converte um arquivo XML em um arquivo CSV usando PHP.
 * 
 * @param string $arquivoXML para o arquivo XML que será convetido
 * @param string $arquivoCSV para o arquivo CSV que receberá a conversão
 */

function converterXMLparaCSV($arquivoXML, $arquivoCSV) {
    
    // Carrega o arquivo XML
    $XML = simplexml_load_file($arquivoXML);

    if (!$arquivoXML) {
        echo "Erro ao carregar arquivo XML.";
        return;
    }

    // Inicia formatação do arquivo CSV
    $CSV = fopen($arquivoCSV, 'w');

    if(!$CSV) {
        echo "Erro ao carregar arquivo CSV";
        return;
    }

    // Cria no arquivo o que deve conter igual no XML
    fputcsv($CSV, ['Nome', 'Sobrenome', 'Idade', 'Email', 'Login']);

    // Estrutura de repetição para percorrer o arquivo XML e inserir as informações para escrever no arquivo CSV
    foreach($XML->dados as $dados) {
        $nome = (string) $dados->nome;
        $sobrenome = (string) $dados->sobrenome;
        $idade = (int) $dados->idade;
        $email = (string) $dados->email;
        $login = (string) $dados->login;

        // Escreve os dados no CSV
        fputcsv($CSV, [$nome, $sobrenome, $idade, $email, $login]);
    }

    // Fecha o arquivo CSV para finalizar
    fclose($CSV);

    echo 'Arquivo CSV feito com sucesso! <br> Baixar arquivo: <a href="exercicio-5/'.$arquivoCSV.'">CSV</a>';;
}

// Localização dos arquivos XML e CSV
$arquivoXML = 'arquivo.xml';
$arquivoCSV = date("Ymd_His_").'arquivo.csv';

// Executa a função para executar
converterXMLparaCSV($arquivoXML, $arquivoCSV);
?>