<?php
include_once("db_table.php");
class Hashtag extends DBTable{
    public static $databaseTable = "hashtag";  
    public static $primaryKey = "id";  
    public static $attributes = array(
        "id"         => array("value" => "", "label" => "id", "fieldType" => "int", "length" => 11, "type" => "hidden" ),
        "name"       => array("value" => "", "label" => "Nome", "fieldType" => "varchar", "length" => 255, "type" => "text"),
    );
    // function __construct($values) {
    //     $attributesKeys = array_keys(self::$attributes);
    //     foreach ( $attributesKeys as $key ) {
    //         $attributes[$key]["value"] = $values[$key];
    //     }
    // }
    
}