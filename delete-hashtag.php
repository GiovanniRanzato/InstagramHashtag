<?php
include_once("includes/includes.php");

$id = $_GET["id"] ?? "";

if ( $id && Hashtag::delete($id) && CategoryHashtag::deleteWhere("`id-hashtag` = $id")) {
    Message::set("Cancellazione eseguita", "success");
} else {
    Message::set("Impossibile cancellare record", "danger");
}
header ("Location: index-hashtag.php");