<?php
include "includes/header.php";

$message = Message::get();
$hashtags = Hashtag::findAll();
?>


<div class="container">
    <div id="corpo">
        <h1>Menu principale</h1>
        <nav class="nav flex-column">
            <a class="nav-link" href="index-hashtag.php">Gestione hashtag</a>
            <a class="nav-link" href="index-category.php">Gestione categorie</a>
            <a class="nav-link" href="form-hashtag-generator.php">Genera hashtag</a>
        </nav>

    </div>
</div>
<?php include "includes/footer.php"; ?>