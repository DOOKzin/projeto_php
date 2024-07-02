<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "teste";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "CREATE TABLE IF NOT EXISTS tbl_empresa (
    id_empresa INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(255) NOT NULL
)";
$conn->query($sql);

$sql = "INSERT INTO tbl_empresa (nome) VALUES ('Empresa A'), ('Empresa B'), ('Empresa C')";
$conn->query($sql);

$sql = "CREATE TABLE IF NOT EXISTS tbl_conta_pagar (
    id_conta_pagar INT AUTO_INCREMENT PRIMARY KEY,
    valor DECIMAL(10, 2) NOT NULL,
    data_pagar DATE NOT NULL,
    pago TINYINT(1) NOT NULL DEFAULT 0,
    id_empresa INT,
    FOREIGN KEY (id_empresa) REFERENCES tbl_empresa(id_empresa)
)";
$conn->query($sql);

$sql = "INSERT INTO tbl_conta_pagar (valor, data_pagar, pago, id_empresa) VALUES 
    (100.00, '2024-07-10', 0, 1),
    (200.50, '2024-07-15', 1, 2),
    (300.75, '2024-07-20', 0, 3)";
$conn->query($sql);

echo "Dados iniciais inseridos com sucesso!";
$conn->close();
?>
