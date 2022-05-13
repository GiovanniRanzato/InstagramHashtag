<?php
include_once("includes/includes.php");

$id = $_GET["id"] ?? "";

if ( $id && Category::delete($id) && CategoryHashtag::deleteWhere("`id-category` = $id") ) {
    Message::set("Cancellazione eseguita", "success");
} else {
    Message::set("Impossibile cancellare record", "danger");
}
header ("Location: index-category.php");