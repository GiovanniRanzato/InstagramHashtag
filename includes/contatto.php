<?php
include_once("db_table.php");
class Contatto extends DBTable{
    public static $databaseTable = "contatti";  
    public static $primaryKey = "id";  
    public static $attributes = array(
        "id"         => array("value" => "", "label" => "id", "fieldType" => "int", "length" => 11, "type" => "hidden" ),
        "name"       => array("value" => "", "label" => "Nome", "fieldType" => "varchar", "length" => 255, "type" => "text"),
        "secondname" => array("value" => "", "label" => "Cognome", "fieldType" => "varchar", "length" => 255, "type" => "text"),
        "email"      => array("value" => "", "label" => "Email", "fieldType" => "varchar", "length" => 255, "type" => "email"),
        "phone"      => array("value" => "", "label" => "Telefono", "fieldType" => "varchar", "length" => 255, "type" => "text"),
        "date"       => array("value" => "", "label" => "Data di nascita", "fieldType" => "varchar", "length" => 255, "type" => "date"),
        "address"    => array("value" => "", "label" => "Indirizzo", "fieldType" => "varchar", "length" => 255, "type" => "text"),
        "city"       => array("value" => "", "label" => "Città", "fieldType" => "varchar", "length" => 255, "type" => "text"),
        "zone"       => array("value" => "", "label" => "Provincia", "fieldType" => "varchar", "length" => 255, "type" => "text"),
        "region"     => array("value" => "", "label" => "Regione", "fieldType" => "varchar", "length" => 255, "type" => "text"),
        "image"      => array("value" => "", "label" => "Avatar", "fieldType" => "varchar", "length" => 255, "type" => "file"),
    );
    // function __construct($values) {
    //     $attributesKeys = array_keys(self::$attributes);
    //     foreach ( $attributesKeys as $key ) {
    //         $attributes[$key]["value"] = $values[$key];
    //     }
    // }
}