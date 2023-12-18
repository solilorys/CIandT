<?php

/**
 * Crie uma Classe para criar um select Field para uum user registration form.
 * Após criar essa classe crie um webform simples e adicione esse campo
 * criado.
 */

// Criação da classe SelectField
class SelectField {
    private $nome;
    private $opcoes;

    // Função construtor da classe
    public function __construct($nome, $opcoes)
    {
        $this->nome = $nome;
        $this->opcoes = $opcoes;
    }

    /** 
     * Função para gerar o código em HTML para o campo de seleção
     * 
     * @return string Código HTML do campo de seleção
     */
    public function carrega() {
        $campoSelect = '<select name="'. $this->nome .'">';
        
        // Percorrer as opções e inserir no valor de cada opção do Select
        foreach($this->opcoes as $key => $value) {
            $campoSelect .= '<option value="' . $key . '">' . $value . '</option>';
        }

        // Finalização do campo Select com as opções
        $campoSelect .= '</select>';

        return $campoSelect;
    }
}

// Exibindo todas as opções para o campo Select
$opcoes = array(
    'Programador' => 'Programador',
    'Engenheiro' => 'Engenheiro',
    'Contador' => 'Contador',
    'Cozinheiro' => 'Cozinheiro'
);

// Obtendo a classe criada em form.php e passando as variáveis
$campoSelect = new SelectField('opcoes', $opcoes);
?>