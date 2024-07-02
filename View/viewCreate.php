<?php
require_once __DIR__ . '/../controller/EmpresaController.php';

$empresaController = new EmpresaController();
$empresas = $empresaController->index();

?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Adicionar Conta a Pagar</title>
    <style>
        .error-message {
            color: red;
            font-weight: bold;
        }
    </style>
</head>
<body>
    <h1>Adicionar Conta a Pagar</h1>

    <?php if ($error) { ?>
        <p class="error-message">Erro ao processar a operação. Por favor, tente novamente.</p>
    <?php } ?>

    <form action="../index.php?action=create" method="post">
        <label for="id_empresa">Empresa:</label>
        <select name="id_empresa" id="id_empresa" required>
            <?php foreach ($empresas as $empresa) { ?>
                <option value="<?php echo $empresa['id_empresa']; ?>"><?php echo $empresa['nome']; ?></option>
            <?php } ?>
        </select>
        <br>

        <label for="data_pagar">Data a Pagar:</label>
        <input type="date" id="data_pagar" name="data_pagar" required>
        <br>

        <label for="valor">Valor:</label>
        <input type="number" id="valor" name="valor" step="0.01" required>
        <br>

        <input type="submit" value="Inserir">
    </form>

    <p><a href="viewIndex.php">Voltar para Lista de Contas</a></p>

</body>
</html>
