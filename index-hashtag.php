<?php
include "includes/header.php";

$message = Message::get();
$hashtags = Hashtag::findAll("","name");
?>


<div class="container">
    <div id="corpo">
        <div class="d-flex justify-content-between">
            <h1>Dettaglio hashtag</h1>
            <div>
                <a href="form-hashtag.php" class="btn btn-primary"><i class="fas fa-plus"></i> Aggiungi hashtag</a>
                <a href="index.php" class="btn btn-info" title="home"><i class="fas fa-home"></i></a>
            </div>
        </div>
        <p>Qui sotto è presente la lista degli hashtag</p>
        <?php
        if ($message) echo printMessage($message["text"], $message["type"]);
        if ($hashtags) { ?>
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Nome</th>
                        <th>Opzioni</th>
                    </tr>
                </thead>
                <tbody>

                    <?php foreach ($hashtags as $hashtag) { ?>
                        <tr>
                            <td><?php echo $hashtag["name"]; ?></td>
                            <td>
                                <a href="form-hashtag.php?id=<?php echo  $hashtag["id"] ?>" class="btn btn-info" title="Modifica"><i class="fas fa-pen"></i></a>
                                <a href="delete-hashtag.php?id=<?php echo  $hashtag["id"] ?>" class="btn btn-danger" title="Cancella"><i class="fas fa-trash"></i></a>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        <?php } else { ?>
            <div class="alert alert-info">Nessun record inserito</div>
        <?php } ?>

        <p class="mt-5">
            <a href="form-hashtag.php" class="btn btn-primary"><i class="fas fa-plus"></i> Aggiungi hashtag</a>
        </p>
    </div>
</div>
<?php include "includes/footer.php"; ?>