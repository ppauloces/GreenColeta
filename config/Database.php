    <?php 

    class Database {
    	
        private $hostname = 'localhost';
        private $username = 'root';
        private $password = '';
        private $database = 'greencoleta';
        private $pdo;

        public function __construct() {
            try {
                $this->pdo = new PDO("mysql:host=$this->hostname;dbname=$this->database", $this->username, $this->password);
                $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            } catch (PDOException $e) {
                die("Erro na conexão com o banco de dados: " . $e->getMessage());
            }
        }

        public function getPDO() {
            return $this->pdo;
        }
    }

    ?>