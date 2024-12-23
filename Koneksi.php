<?php
// Konfigurasi koneksi database
class Koneksi {
    // Menentukan nama host, user password dan nama database
    private $host = "localhost";
    private $user = "root";
    private $password = "";
    private $database = "PerpustakaanAlma";
    private $connection;

    public function __construct() {
        $this->connection = new mysqli($this->host, $this->user, $this->password, $this->database);
        if ($this->connection->connect_error) {
            die("Connection failed: " . $this->connection->connect_error);
        }
    }

    public function connect() {
        return $this->connection;
    }

    public function close() {
        if ($this->connection) {
            $this->connection->close();
        }
    }
}
?>