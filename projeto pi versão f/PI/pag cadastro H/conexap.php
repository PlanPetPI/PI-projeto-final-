<?php
// Conexão com o banco de dados MySQL
$servername = "127.0.0.1"; // Altere conforme as configurações do seu servidor
$username = "root"; // Altere conforme as configurações do seu servidor
$password = "univesp"; // Altere conforme as configurações do seu servidor
$dbname = "pi_univesp_db"; // Altere conforme as configurações do seu servidor

$conn = new mysqli($servername, $username, $password, $dbname);

// Verifica a conexão
if ($conn->connect_error) {
    die("Erro de conexão: " . $conn->connect_error);
}

// Verifica se o formulário foi submetido
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $senha = $_POST['senha'];
    $confirmar_senha = $_POST['confirmar_senha'];
    $email = $_POST['email'];

    // Verifica se as senhas coincidem
    if ($senha !== $confirmar_senha) {
        echo "As senhas não coincidem.";
    } else {
        // Prepara e executa a inserção dos dados no banco de dados
        $sql = "INSERT INTO usuarios (senha, email) VALUES ('$senha', '$email')";

        if ($conn->query($sql) === TRUE) {
            echo "Cadastro realizado com sucesso.";
        } else {
            echo "Erro ao cadastrar: " . $conn->error;
        }
    }
}

$conn->close();
