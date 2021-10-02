<?php

class Message {
     public static function set($text,$type = "info"){
        $_SESSION["message"]["text"] = $text;
        $_SESSION["message"]["type"] = $type;
    }
    public static function clear(){
        $_SESSION["message"]["text"] = "";
        $_SESSION["message"]["type"] = "";
    }
    public static function get($type = "", $howOnce = true){
        $text =  $_SESSION["message"]["text"] ?? "";
        $type =  $_SESSION["message"]["type"] ?? "";
        if ($howOnce) self::clear();
        if ($text && $type)
            return array (
                "text" => $text,
                "type" => $type
            );
        else return []; 

    }
}