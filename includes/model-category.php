<?php
include_once("db_table.php");
class Category extends DBTable{
    public static $databaseTable = "category";  
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
    public static function getInputProps($category, $categoriesSelected = []) {
        $checked = in_array($category["id"], $categoriesSelected);
        return array("value" => $category["id"],"name" => "categories", "label" => $category["name"], "type" => "checkboxgroup", "checked" => $checked );
    }
    public static function getCategoriesId ($categories = [] ){
        $categoriesId = [];
        foreach ($categories as $category) {
            $categoriesId[] = $category;
        }
        return $categoriesId;
    }
}