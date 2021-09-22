<?php
include_once("db_table.php");
class Contatti extends DBTable{
    public static $databaseTable = "contatti";  
    public static $primaryKey = "id";  

    public static $attributes = array(
        "id"         => array("label" => "id", "fieldType" => "int", "length" => 11, "type" => "none" ),
        "name"       => array("label" => "Nome", "fieldType" => "varchar", "length" => 255, "type" => "text"),
        "secondname" => array("label" => "Cognome", "fieldType" => "varchar", "length" => 255, "type" => "text"),
        "email"      => array("label" => "Email", "fieldType" => "varchar", "length" => 255, "type" => "email"),
        "phone"      => array("label" => "Telefono", "fieldType" => "varchar", "length" => 255, "type" => "text"),
        "date"       => array("label" => "Data di nascita", "fieldType" => "varchar", "length" => 255, "type" => "date"),
        "address"    => array("label" => "Indirizzo", "fieldType" => "varchar", "length" => 255, "type" => "text"),
        "city"       => array("label" => "Città", "fieldType" => "varchar", "length" => 255, "type" => "text"),
        "zone"       => array("label" => "Provincia", "fieldType" => "varchar", "length" => 255, "type" => "text"),
        "region"     => array("label" => "Regione", "fieldType" => "varchar", "length" => 255, "type" => "text"),
        "image" => array("label" => "Avatar", "fieldType" => "varchar", "length" => 255, "type" => "file"),
    );
}