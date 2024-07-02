<?php
require_once __DIR__ . '/../model/Database.php';
require_once __DIR__ . '/../model/ContaPagar.php';

class ContaPagarController {
    public function index() {
        return ContaPagar::getAll();
    }

    public function create($id_empresa, $data_pagar, $valor) {
        ContaPagar::create($id_empresa, $data_pagar, $valor);
    }

    public function edit($id, $id_empresa, $data_pagar, $valor) {
        ContaPagar::update($id, $id_empresa, $data_pagar, $valor);
    }

    public function delete($id) {
        ContaPagar::delete($id);
    }

    public function marcarPago($id) {
        ContaPagar::marcarPago($id);
    }

    public function getById($id) {
        return ContaPagar::getById($id);
    }
}
?>
