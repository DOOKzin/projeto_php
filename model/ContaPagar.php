<?php
class ContaPagar {
    public static function getAll() {
        $conn = Database::getConnection();
        $sql = "SELECT cp.id_conta_pagar, e.nome, cp.data_pagar, cp.valor, cp.pago 
                FROM tbl_conta_pagar cp
                JOIN tbl_empresa e ON cp.id_empresa = e.id_empresa";
        $result = $conn->query($sql);
        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public static function getById($id) {
        $conn = Database::getConnection();
        $sql = "SELECT * FROM tbl_conta_pagar WHERE id_conta_pagar = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("i", $id);
        $stmt->execute();
        return $stmt->get_result()->fetch_assoc();
    }

    public static function create($id_empresa, $data_pagar, $valor) {
        $conn = Database::getConnection();
        $sql = "INSERT INTO tbl_conta_pagar (id_empresa, data_pagar, valor) VALUES (?, ?, ?)";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("isd", $id_empresa, $data_pagar, $valor);
        $stmt->execute();
    }

    public static function update($id_conta_pagar, $id_empresa, $data_pagar, $valor) {
        $conn = Database::getConnection();
        $sql = "UPDATE tbl_conta_pagar SET id_empresa = ?, data_pagar = ?, valor = ? WHERE id_conta_pagar = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("isdi", $id_empresa, $data_pagar, $valor, $id_conta_pagar);
        $stmt->execute();
    }

    public static function delete($id) {
        $conn = Database::getConnection();
        $sql = "DELETE FROM tbl_conta_pagar WHERE id_conta_pagar = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("i", $id);
        $stmt->execute();
    }

    public static function marcarPago($id) {
        $conn = Database::getConnection();
        $sql = "UPDATE tbl_conta_pagar SET pago = 1 WHERE id_conta_pagar = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("i", $id);
        $stmt->execute();
    }
}
?>
