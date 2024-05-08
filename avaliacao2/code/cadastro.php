<?php
class Cadastro {
    private $pdo;

    public function conectar() {
        try {
            $this->conexao = new PDO("mysql:host=$this->host;dbname=$this->nomeBanco", $this->usuario, $this->senha);
            $this->conexao->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            throw new Exception("Conexão falhou: " . $e->getMessage());
        }
    }

    public function desconectar() {
        $this->conexao = null;
    }


    public function cadastrarCandidato($nomeCompleto, $curso) {
        $sql = "INSERT INTO candidatos (`id`, `nome`, `curso`) VALUES (1, 'José da Silva', 1)";
        $stmt= $this->pdo->prepare($sql);
        $stmt->execute([$nomeCompleto, $curso]);
    }


    public function lerCandidatos() {
        $sql = "SELECT * FROM candidatos";
        $stmt = $this->pdo->query($sql);

        return $stmt->fetchAll();
    }
}
?>