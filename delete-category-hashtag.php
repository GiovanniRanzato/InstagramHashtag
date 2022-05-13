<?php
include_once("includes/includes.php");

$id = $_GET["id"] ?? "";

if ( $id && CategoryHashtag::delete($id)) {
    Message::set("Cancellazione eseguita", "success");
} else {
    Message::set("Impossibile cancellare record", "danger");
}
header ("Location: index-hashtag.php");