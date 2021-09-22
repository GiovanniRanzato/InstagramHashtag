<?php
include "includes/header.php";

$id = $_GET["id"] ?? "";

$contatto = Contatti::find($id);
// if($contatto) print_r($contatto);
$id = $contatto["id"] ?? "";
$image = $contatto["image"] ?? "";
?>

<body>
    <div class="container">
        <div id="corpo">
            <h1>Dettaglio contatto</h1>
            <p>Qui sotto è presente il dettaglio del contatto selezionato</p>
            <div id="box-utente">
                <div class="info">
                    <form action="">
                        <?php foreach (Contatti::$attributes as $key => $attribute) {
                            if ($attribute["type"] === "none") continue;  
                            $inputProps = $attribute;
                            $inputProps["value"] = $contatto[$key] ?? "";
                            echo printInput($inputProps);
                        } ?>
                    </form>
                </div>
            </div>
            <p class="mt-5"><a href="index.php" class="btn btn-primary">Torna alla home</a></p>
        </div>
    </div>
<?php include "includes/footer.php";  ?>