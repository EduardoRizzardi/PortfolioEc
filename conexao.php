<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Configurações do banco de dados
    $servername = "localhost";
    $username = "root"; 
    $password = ""; 
    $dbname = "formulario_contato"; 

    // Cria conexão com o banco de dados
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Verifica a conexão
    if ($conn->connect_error) {
        die("Erro de conexão: " . $conn->connect_error);
    }

    // Verifica se o formulário de inserção foi submetido
    if (isset($_POST['nome'], $_POST['email'], $_POST['telefone'], $_POST['mensagem'])) {
        // Prepara os dados recebidos do formulário para inserção no banco de dados
        $nome = $_POST['nome'];
        $email = $_POST['email'];
        $telefone = $_POST['telefone'];
        $mensagem = $_POST['mensagem'];

        // Monta a query SQL para inserção dos dados
        $sql = "INSERT INTO contato (nome, email, telefone, mensagem) VALUES ('$nome', '$email', '$telefone', '$mensagem')";

        // Executa a query de inserção
        if ($conn->query($sql) === TRUE) {
            header("Location: enviado_sucesso.html");
            exit();
        } else {
            echo "Erro ao inserir dados: " . $conn->error;
        }
    }

    // Fecha a conexão com o banco de dados
    $conn->close();
}
?>
