<?php
class DBTable {
    public static $databaseTable;
    public static $primaryKey;

    private static function connect(){
        // Create connection
        $conn = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_DB);
        // Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }
        if (!$conn->set_charset("utf8")) {
            echo 'Errore nel set di caretteri: '.$conn->connect_error;
            exit();
        }
          
        if (isset($_GET["debug"])){
            echo 'Success: A proper connection to MySQL was made.';
            echo '<br>';
            echo 'Host information: '.$conn->host_info;
            echo '<br>';
            echo 'Protocol version: '.$conn->protocol_version;
        }
        return $conn;
    }

    public static function findAll() {
        $conn = self::connect();
        $sql = "SELECT * FROM ".static::$databaseTable;
        
        $result = $conn->query($sql);
        $rows = [];  
        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                $rows[] = $row;
            }
        }
        

        if (isset($_GET["debug"])){
            echo '<br>';
            print_r($sql);
            echo '<br>';
            print_r($rows);
            echo '<br>';
        }

        $conn->close();
        return $rows;
    }

    public static function find($id) {
        $conn = self::connect();
        $sql = "SELECT * FROM ".static::$databaseTable." WHERE ".static::$primaryKey."=$id";
        $data = []; 
        $result = $conn->query($sql);
        if ($result && $result->num_rows > 0) {
            $data = $result->fetch_assoc();
        }

        if (isset($_GET["debug"])){
            echo '<br>';
            print_r($sql);
            echo '<br>';
            print_r($data);
            echo '<br>';
        }

        $conn->close();
        return $data;
    }
}