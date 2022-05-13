<?php
include "includes/header.php";

$message = Message::get();
$categorys = Category::findAll("","name");
?>


<div class="container">
    <div id="corpo">
        <div class="d-flex justify-content-between">
            <h1>Gestione Categorie</h1>
            <div>
                <a href="form-category.php" class="btn btn-primary"><i class="fas fa-plus"></i> Aggiungi categoria</a>
                <a href="index.php" class="btn btn-info" title="home"><i class="fas fa-home"></i></a>
            </div>
        </div>
        <p>Qui sotto è presente la lista deglle categorie</p>
        <?php
        if ($message) echo printMessage($message["text"], $message["type"]);
        if ($categorys) { ?>
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Nome</th>
                        <th>Opzioni</th>
                    </tr>
                </thead>
                <tbody>

                    <?php foreach ($categorys as $category) { ?>
                        <tr>
                            <td><?php echo $category["name"]; ?></td>
                            <td>
                                <a href="form-category.php?id=<?php echo  $category["id"] ?>" class="btn btn-info" title="Modifica"><i class="fas fa-pen"></i></a>
                                <a href="delete-category.php?id=<?php echo  $category["id"] ?>" class="btn btn-danger" title="Cancella"><i class="fas fa-trash"></i></a>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        <?php } else { ?>
            <div class="alert alert-info">Nessun record inserito</div>
        <?php } ?>

        <p class="mt-5">
            <a href="form-category.php" class="btn btn-primary"><i class="fas fa-plus"></i> Aggiungi categoria</a>
        </p>
    </div>
</div>
<?php include "includes/footer.php"; ?>