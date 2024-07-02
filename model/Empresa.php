<?php
class Empresa {
    public static function getAll() {
        $conn = Database::getConnection();
        $sql = "SELECT id_empresa, nome FROM tbl_empresa";
        $resultado = $conn->query($sql);
        return $resultado->fetch_all(MYSQLI_ASSOC);
    }
}
?>
