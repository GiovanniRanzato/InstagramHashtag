<?php
include_once("db_table.php");
class CategoryHashtag extends DBTable{
    public static $databaseTable = "category-hashtag";  
    public static $primaryKey = "id";  
    public static $attributes = array(
        "id"         => array("value" => "", "label" => "id", "fieldType" => "int", "length" => 11, "type" => "hidden" ),
        "id-category"         => array("value" => "", "label" => "id", "fieldType" => "int", "length" => 11, "type" => "hidden" ),
        "id-hashtag"         => array("value" => "", "label" => "id", "fieldType" => "int", "length" => 11, "type" => "hidden" ),
        
    );
    public static function addCategories($idHashtag, $categories) {
        // Elimino categorie precedenti
        CategoryHashtag::deleteWhere("`id-hashtag` = $idHashtag");
        // aggiungo nuove categorie
        foreach($categories as $idCategory) {
            CategoryHashtag::save(
                Array (
                    "id-category" => $idCategory,
                    "id-hashtag" => $idHashtag,
                )
            );
        }
        return true;
    }

    public static function getCategoriesIdFromHashtagId($idHashtag){
        if(!$idHashtag) return [];
        $categoryHashtags = CategoryHashtag::findAll("`id-hashtag` = $idHashtag");
        $categoriesId = [];
        foreach($categoryHashtags as $categoryHashtag){
            $categoriesId[] = $categoryHashtag["id-category"];
        }
        return $categoriesId;
    }

    public static function generateRandomHashtagList($categories) {
        // Message::clear();
        $hashtags = [];
        $categoryHashtags = []; 
        $idCategories = implode(",",$categories);
        $categoryHashtags = CategoryHashtag::findAll("`id-category` IN ($idCategories)");
        
        $idHashtags = [];
        foreach($categoryHashtags as $categoryHashtag) {
            $idHashtags[] = $categoryHashtag["id-hashtag"];
        }
        $idHashtagsClean = implode(",",array_unique($idHashtags));
        $hashtags = Hashtag::findAll("`id` IN ($idHashtagsClean)");
        shuffle($hashtags);
        $i = 0;
        $hastagString = "";
        foreach($hashtags as $hashtag){
            $hastagString .= "#".$hashtag["name"]. " ";
            $i++;
            if($i > 29) break;
        }
        if($i > 29) 
            Message::set("Hashtag generati correttamente","success");
        else
            Message::set("Attenzione sono stati generati solo $i hashtag. Selezionare più categorie o aggiungere altri hashtag alle categorie.","warning");
        
        return $hastagString;
    }

}