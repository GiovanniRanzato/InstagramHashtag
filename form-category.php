<?php
include "includes/header.php";

$id = $_GET["id"] ?? "";
$saved = false;
$message = Message::get();

if (isset($_POST["category"])) {
    $values  = $_POST;
    unset($values["category"]);
    $saved =  Category::save($values);

    if ($saved) {
        Message::set("Salvataggio eseguito", "success");
        header("Location: index-category.php");
    } else {
        Message::set("Impossibile salvare il record!", "danger");
        $message = Message::get();
    }
}

$category = Category::find($id);
$id = $category["id"] ?? "";

?>

<body>
    <div class="container">
        <div id="corpo">
            <div class="d-flex justify-content-between">
                <h1>Dettaglio categoria</h1>
                <div>
                    <a href="index.php" class="btn btn-info" title="home"><i class="fas fa-home"></i></a>
                    <a href="index-category.php" class="btn btn-info" title="index"><i class="fas fa-list"></i></a>
                    <a href="delete-category.php?id=<?php echo  $id ?>" class="btn btn-danger" title="Cancella"><i class="fas fa-trash"></i></a>
                </div>
            </div>

            <p>Qui sotto è presente il dettaglio della categoria selezionata</p>
            <div id="box-utente">
                <div class="info">
                    <?php
                    if ($message) echo printMessage($message["text"], $message["type"]);
                    if (!$saved) { ?>
                        <form action="form-category.php" name="category" method="post" enctype="multipart/form-data">
                            <?php foreach (Category::$attributes as $key => $attribute) {
                                $inputProps = $attribute;
                                $inputProps["value"] = $category[$key] ?? "";
                                $inputProps["name"] = $key;
                                echo printInput($inputProps);
                            }
                            $submitProps["type"] = "submit";
                            $submitProps["value"] = "salva";
                            $submitProps["name"] = "category";
                            echo printInput($submitProps);
                            ?>
                        </form>
                    <?php } ?>
                </div>
            </div>
        </div>
    </div>
    <?php include "includes/footer.php";  ?>