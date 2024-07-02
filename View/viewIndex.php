<?php
require_once __DIR__ . '/../controller/ContaPagarController.php';

$contaPagarController = new ContaPagarController();
$contas = $contaPagarController->index();

$hoje = new DateTime();
?>

<!DOCTYPE html>
<html lang="pt-BR">
    <head>
        <meta charset="UTF-8">
        <title>Contas a Pagar</title>
        <style>
            table, th, td {
                border: 1px solid black;
                border-collapse: collapse;
            }
            th, td {
                padding: 10px;
            }
        </style>
    </head>
    <body>
        <h1>Contas a Pagar</h1>

        <table>
            <tr>
                <th>Empresa</th>
                <th>Data a Pagar</th>
                <th>Valor</th>
                <th>Pago</th>
                <th>Ações</th>
            </tr>
            <tbody>
                <?php foreach ($contas as $conta) { ?>
                    <tr>
                        <td><?= $conta['nome'] ?></td>
                        <td><?php echo date('Y-m-d', strtotime($conta['data_pagar'])); ?></td>
                        <td>R$ <?php
                                if ($hoje->format('Y-m-d') < $conta['data_pagar']) {
                                    echo $conta['valor']* 0.95;
                                } elseif ($hoje->format('Y-m-d') > $conta['data_pagar']) {
                                    echo $conta['valor']* 1.10;
                                } elseif ($hoje->format('Y-m-d') == $conta['data_pagar']) {
                                    echo $conta['valor'];
                                }
                        ?></td>
                        <td><?php echo $conta['pago'] ? 'Sim' : 'Não'; ?></td>
                        <td>
                            <?php if($conta['pago'] == 0){ ?>
                                <a href="viewEdit.php?id=<?php echo $conta['id_conta_pagar']; ?>">Editar |</a>
                                <a href="../index.php?action=delete&id=<?php echo $conta['id_conta_pagar']; ?>">Excluir |</a>
                                <?php if (!$conta['pago']) { ?>
                                    <a href="../index.php?action=marcarPago&id=<?php echo $conta['id_conta_pagar']; ?>">Marcar como Paga</a>
                                <?php } ?>
                            <?php } ?>
                        </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>

        <p><a href="viewCreate.php">Adicionar Nova Conta</a></p>

    </body>
</html>
