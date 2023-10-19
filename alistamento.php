<?php
// Conectar ao banco de dados (ajuste as configurações conforme necessário)
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "alistamento";

$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar a conexão
if ($conn->connect_error) {
    die("Conexão falhou: " . $conn->connect_error);
}

// Obter dados do formulário
$nome = $_POST['nome'] ?? '';
$sobrenome = $_POST['sobrenome'] ?? '';
$idade = $_POST['idade'] ?? '';
$endereco = $_POST['endereco'] ?? '';
$bairro = $_POST['bairro'] ?? '';
$numero = $_POST['numero'] ?? '';
$email = $_POST['email'] ?? '';
$telefone = $_POST['telefone'] ?? '';
$rg = $_POST['rg'] ?? '';
$cpf = $_POST['cpf'] ?? '';
$genero = $_POST['genero'] ?? '';

// Verificar se o usuário já está cadastrado
$sql_verificar = "SELECT * FROM usuarios WHERE usu_rg='$rg' OR usu_cpf='$cpf'";
$result_verificar = $conn->query($sql_verificar);

if ($result_verificar->num_rows > 0) {
    echo "Você já está cadastrado no alistamento militar.";
} elseif ($idade < 18) {
    echo "Você não pode se alistar no exército, pois é menor de idade.";
} else {
    // Inserir dados no banco de dados
    $sql_inserir = "INSERT INTO usuarios (usu_nome, usu_sobrenome, usu_idade, usu_endereco, usu_bairro, usu_numero, usu_email, usu_telefone, usu_rg, usu_cpf, usu_genero)
                    VALUES ('$nome', '$sobrenome', $idade, '$endereco', '$bairro', '$numero', '$email', '$telefone', '$rg', '$cpf', '$genero')";

    if ($conn->query($sql_inserir) === TRUE) {
        echo "Cadastro realizado com sucesso!";
    } else {
        echo "Erro ao cadastrar: " . $conn->error;
    }
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="alistamento.css">
    <title>Alistamento Militar</title>
</head>

<body>
    <h1 align="center">Alistamento Militar</h1>
    <form method="post" action="alistamento.php">

        <label for="nome">Nome:</label>
        <input type="text" id="nome" name="nome" required><br>

        <label for="sobrenome">Sobrenome:</label>
        <input type="text" id="sobrenome" name="sobrenome" required><br>

        <label for="idade">Idade:</label>
        <input type="number" id="idade" name="idade" required><br>

        <label for="endereco">Endereço:</label>
        <input type="text" id="endereco" name="endereco" required><br>

        <label for="bairro">Bairro:</label>
        <input type="text" id="bairro" name="bairro" required><br>

        <label for="numero">Número:</label>
        <input type="text" id="numero" name="numero" required><br>

        <label for="email">Email:</label>
        <input type="email" id="email" name="email" required><br>

        <label for="telefone">Telefone:</label>
        <input type="tel" id="telefone" name="telefone" required><br>

        <label for="rg">RG:</label>
        <input type="text" id="rg" name="rg" required><br>

        <label for="cpf">CPF:</label>
        <input type="text" id="cpf" name="cpf" required><br>

        <label for="genero">Gênero:</label>
        <input type="text" id="genero" name="genero" required><br>

        <input type="submit" value="Enviar">
    </form>
</body>

</html>
