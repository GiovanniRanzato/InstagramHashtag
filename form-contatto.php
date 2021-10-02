<?php
include "includes/header.php";

$id = $_GET["id"] ?? "";
$saved = false;
$message = Message::get();

if (isset($_POST["contatto"])) {
    $values  = $_POST;
    unset($values["contatto"]);
    $values["image"] = "";
    $saved =  Contatto::save($values);

    if ($saved) {
        Message::set("Salvataggio contatto eseguito", "success");
        header("Location: index.php");
    } else {
        Message::set("Impossibile salvare il contatto!", "danger");
        $message = Message::get();
    }
}

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
                    <?php
                    if ($message) echo printMessage($message["text"], $message["type"]);
                    if (!$saved) { ?>
                        <form action="form-contatto.php" name="contatto" method="post" enctype="multipart/form-data">
                            <?php foreach (Contatto::$attributes as $key => $attribute) {
                                $inputProps = $attribute;
                                $inputProps["value"] = $contatto[$key] ?? "";
                                $inputProps["name"] = $key;
                                echo printInput($inputProps);
                            }
                            $submitProps["type"] = "submit";
                            $submitProps["value"] = "salva";
                            $submitProps["name"] = "contatto";
                            echo printInput($submitProps);
                            ?>
                        </form>
                    <?php } ?>
                </div>
            </div>
        </div>
    </div>
    <?php include "includes/footer.php";  ?>