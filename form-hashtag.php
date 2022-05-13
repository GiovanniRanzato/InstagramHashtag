<?php
include "includes/header.php";

$id = $_GET["id"] ?? "";
$saved = false;
$message = Message::get();

if (isset($_POST["hashtag"])) {
    $values  = $_POST;

    $categories = isset($values["categories"]) ? $values["categories"] : [];
    unset($values["hashtag"]);
    unset($values["categories"]);
    $saved =  Hashtag::save($values);

    if($saved) {
        $saved =  CategoryHashtag::addCategories($saved, $categories);
    }
    if ($saved) {
        Message::set("Salvataggio eseguito", "success");
        header("Location: index-hashtag.php");
    } else {
        Message::set("Impossibile salvare il record!", "danger");
        $message = Message::get();
    }
}

$hashtag = Hashtag::find($id);
$categories = Category::findAll("", "name");
$categoriesSelected = CategoryHashtag::getCategoriesIdFromHashtagId($id);

$id = $hashtag["id"] ?? "";

?>

<body>
    <div class="container">
        <div id="corpo">
            <div class="d-flex justify-content-between">
                <h1>Dettaglio hashtag</h1>
                <div>
                    <a href="index.php" class="btn btn-info" title="home"><i class="fas fa-home"></i></a>
                    <a href="index-hashtag.php" class="btn btn-info" title="index"><i class="fas fa-list"></i></a>
                    <a href="delete-hashtag.php?id=<?php echo  $id ?>" class="btn btn-danger" title="Cancella"><i class="fas fa-trash"></i></a>
                </div>
            </div>

            <p>Qui sotto è presente il dettaglio del hashtag selezionato</p>
            <div id="box-utente">
                <div class="info">
                    <?php
                    if ($message) echo printMessage($message["text"], $message["type"]);
                    if (!$saved) { ?>
                        <form action="form-hashtag.php" name="hashtag" method="post" enctype="multipart/form-data">
                            <?php foreach (Hashtag::$attributes as $key => $attribute) {
                                $inputProps = $attribute;
                                $inputProps["value"] = $hashtag[$key] ?? "";
                                $inputProps["name"] = $key;
                                echo printInput($inputProps);
                            }
                            foreach ($categories as $category) {
                                $inputProps = Category::getInputProps($category, $categoriesSelected);
                                echo printInput($inputProps);
                            }
                            $submitProps["type"] = "submit";
                            $submitProps["value"] = "salva";
                            $submitProps["name"] = "hashtag";
                            echo printInput($submitProps);
                            ?>
                        </form>
                    <?php } ?>
                </div>
            </div>
        </div>
    </div>
    <?php include "includes/footer.php";  ?>