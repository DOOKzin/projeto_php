<?php
require_once __DIR__ . '/controller/EmpresaController.php';
require_once __DIR__ . '/controller/ContaPagarController.php';

$action = isset($_GET['action']) ? $_GET['action'] : 'list';
$id = isset($_GET['id']) ? $_GET['id'] : null;

$contaPagarController = new ContaPagarController();

switch ($action) {
    case 'create':
        if (isset($_POST['id_empresa']) && isset($_POST['data_pagar']) && isset($_POST['valor'])) {
            $contaPagarController->create($_POST['id_empresa'], $_POST['data_pagar'], $_POST['valor']);
            header("Location: view/viewIndex.php");
        } else {
            echo "Erro: Dados incompletos.";
        }
        break;

    case 'edit':
        if (isset($_POST['id_empresa']) && isset($_POST['data_pagar']) && isset($_POST['valor'])) {
            $contaPagarController->edit($id, $_POST['id_empresa'], $_POST['data_pagar'], $_POST['valor']);
            header("Location: view/viewIndex.php");
        } else {
            echo "Erro: Dados incompletos.";
        }
        break;

    case 'delete':
        $contaPagarController->delete($id);
        header("Location: view/viewIndex.php");
        break;

    case 'marcarPago':
        $contaPagarController->marcarPago($id);
        header("Location: view/viewIndex.php");
        break;

    default:
        header("Location: view/viewIndex.php");
        break;
}
?>
