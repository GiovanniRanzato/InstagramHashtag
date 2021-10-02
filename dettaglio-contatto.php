<?php
include "includes/header.php";

$id = $_GET["id"] ?? "";

$contatto = Contatto::find($id);
$id = $contatto["id"] ?? "";
$image = $contatto["image"] ?? "";
?>

<body>
    <div class="container">
        <div id="corpo">
            <div class="d-flex justify-content-between">
                <h1>Dettaglio contatto</h1>
                <div>
                    <a href="index.php" class="btn btn-info" title="home"><i class="fas fa-home"></i></a>
                    <a href="delete-contatto.php?id=<?php echo  $id ?>" class="btn btn-danger" title="Cancella"><i class="fas fa-trash"></i></a>
                </div>
            </div>
            <p>Qui sotto è presente il dettaglio del contatto selezionato</p>
            <div id="box-utente">
                <div class="info">
                    <?php foreach (Contatto::$attributes as $key => $attribute) {
                        if ($attribute["type"] === "hidden") continue;  
                        if ($attribute["type"] !== "file" )  {?>
                        <div class="row mb-1">
                            <div class="col-2 ">
                                    <strong><?php echo $attribute["label"] ?></strong>
                                </div>
                                <div class="col-10">
                                    <span><?php echo $contatto[$key] ?? "-"; ?></span>
                                </div>
                            </div>
                        <?php } ?>
                    <?php } ?>
                </div>
                <div class="profilo">
                    <img src="img/<?php echo $image ?>" class="img-fluid">
                </div>
            </div>
        </div>
    </div>

    <?php include "includes/footer.php";  ?>