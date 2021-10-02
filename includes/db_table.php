<?php
class DBTable {
    public static $databaseTable;
    public static $primaryKey;
    public static $attributes;

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

    public static function save($values) {
        $id = $values[static::$primaryKey] ?? "";
        $result = "";
        if ($id) {
            $result = self::update($values);
        } else {
            $result = self::create($values);
        }
        return $result;
    }

    public static function create($values) {
        $conn = self::connect();
        $keys = array_keys(static::$attributes);
        unset( $values[static::$primaryKey] );
        $values = " NULL, '".implode("' , '",$values)."'";
        
        $sql = "INSERT INTO ".static::$databaseTable." ( ". implode(" , ", $keys) .") VALUES ( $values )";
        $result = $conn->query($sql);

        return $result;
    }

    public static function update($values) {
        $conn = self::connect();
        $update = []; 
        $keys = array_keys(static::$attributes);
        
        $id = "";
        foreach ( $keys as $key ) {
            if ($key == static::$primaryKey) {
                 $id = $values[$key] ?? "";
                 continue;
            }
            $value = $values[$key] ?? "";
            $update []= "$key = '$value' ";
        }
        if(!$id){
            return false;
        }
        $sql = "UPDATE ".static::$databaseTable." SET ". implode(", ", $update ). " WHERE ".static::$primaryKey."=$id";
        $result = $conn->query($sql);

        return $result;
    }

    public static function delete($id) {
        $conn = self::connect();    
        $sql = "DELETE FROM ".static::$databaseTable." WHERE ".static::$primaryKey."=$id";
        $result = $conn->query($sql);
        return $result;
    }
}