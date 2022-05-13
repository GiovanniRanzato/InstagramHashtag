<?php
include "includes/header.php";

$message = Message::get();
$categoryHashtags = CategoryHashtag::findAll();
?>


<div class="container">
    <div id="corpo">
        <div class="d-flex justify-content-between">
            <h1>Dettaglio Category Hashtag</h1>
            <div>
                <a href="index.php" class="btn btn-info" title="home"><i class="fas fa-home"></i></a>
            </div>
        </div>
        <p>Qui sotto è presente la lista di categoryHashtag</p>
        <?php
        if ($message) echo printMessage($message["text"], $message["type"]);
        if ($categoryHashtags) { ?>
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Nome</th>
                        <th>Opzioni</th>
                    </tr>
                </thead>
                <tbody>

                    <?php foreach ($categoryHashtags as $category) { ?>
                        <tr>
                            <td><?php echo $category["name"]; ?></td>
                            <td>
                                <a href="delete-category-hashtag.php?id=<?php echo  $categoryHashtag["id"] ?>" class="btn btn-danger" title="Cancella"><i class="fas fa-trash"></i></a>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        <?php } else { ?>
            <div class="alert alert-info">Nessun record inserito</div>
        <?php } ?>
    </div>
</div>
<?php include "includes/footer.php"; ?>