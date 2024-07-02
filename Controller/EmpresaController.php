<?php
require_once __DIR__ . '/../model/Database.php';
require_once __DIR__ . '/../model/Empresa.php';

class EmpresaController {
    public function index() {
        return Empresa::getAll();
    }
}
?>
