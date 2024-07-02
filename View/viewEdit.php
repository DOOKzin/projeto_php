<?php
require_once __DIR__ . '/../controller/ContaPagarController.php';
require_once __DIR__ . '/../controller/EmpresaController.php';

$contaPagarController = new ContaPagarController();
$empresaController = new EmpresaController();
$empresas = $empresaController->index();
$conta = $contaPagarController->getById($_GET['id']);

?>

<!DOCTYPE html>
<html>
<head>
    <title>Editar Conta</title>
</head>
<body>
    <h1>Editar Conta</h1>
    <form action="../index.php?action=edit&id=<?php echo $conta['id_conta_pagar']; ?>" method="post">
        <label for="id_empresa">Empresa:</label>
        <select name="id_empresa" id="id_empresa" required>
            <?php foreach ($empresas as $empresa) { ?>
                <option value="<?php echo $empresa['id_empresa']; ?>" <?php echo ($empresa['id_empresa'] == $conta['id_empresa']) ? 'selected' : ''; ?>>
                    <?php echo $empresa['nome']; ?>
                </option>
            <?php } ?>
        </select>
        <br>

        <label for="data_pagar">Data a Pagar:</label>
        <input type="date" id="data_pagar" name="data_pagar" value="<?php echo $conta['data_pagar']; ?>" required>
        <br>

        <label for="valor">Valor:</label>
        <input type="number" id="valor" name="valor" step="0.01" value="<?php echo $conta['valor']; ?>" required>
        <br>

        <input type="submit" value="Salvar">
        <a href="../index.php">Voltar</a>
    </form>
</body>
</html>
