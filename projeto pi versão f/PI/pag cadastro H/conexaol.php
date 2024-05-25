<?php
// Conectar ao banco de dados MySQL
$servername = "localhost"; // Altere se necessário
$username = "seu_usuario"; // Altere se necessário
$password = "sua_senha"; // Altere se necessário
$dbname = "nome_do_banco"; // Altere se necessário

$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar conexão
if ($conn->connect_error) {
    die("Conexão falhou: " . $conn->connect_error);
}

// Receber os dados do formulário
$email = $_POST['email'];
$senha = $_POST['senha'];

// Prevenir SQL injection
$email = mysqli_real_escape_string($conn, $email);
$senha = mysqli_real_escape_string($conn, $senha);

// Consultar o banco de dados para verificar se o usuário existe
$sql = "SELECT * FROM usuarios WHERE email = '$email' AND senha = '$senha'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // Usuário autenticado com sucesso
    echo "Login bem-sucedido!";
} else {
    // Falha na autenticação
    echo "E-mail ou senha inválidos.";
}

$conn->close();
?>

<?php
session_start();

// Verificar se o usuário está logado
if (!isset($_SESSION['email'])) {
    header("Location: index.html");
    exit;
}

// Página protegida
$email = $_SESSION['email'];
echo "Bem-vindo, $email! Esta é uma página protegida.";
?>
