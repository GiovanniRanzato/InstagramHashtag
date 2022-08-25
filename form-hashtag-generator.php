<?php
include "includes/header.php";

$id = $_GET["id"] ?? "";
$results = false;
$message = Message::get();
$categories = []; 
if (isset($_POST["hashtag"])) {
    $values  = $_POST;
    $categories = isset($values["categories"]) ? $values["categories"] : [];
    unset($values["hashtag"]);
    unset($values["categories"]);

    $results = CategoryHashtag::generateRandomHashtagList($categories);
    $message = Message::get();


}
$categoriesSelected = $categories ? Category::getCategoriesId($categories) : [];
$categories = Category::findAll("", "name");
?>

<body>
    <div class="container">
        <div id="corpo">
            <div class="d-flex justify-content-between">
                <h1>Hashtag generator</h1>
                <div>
                    <a href="index.php" class="btn btn-info" title="home"><i class="fas fa-home"></i></a>
                </div>
            </div>

            <p>Seleziona le categorie per generare 30 hashtag in modo casuale</p>
            <div id="box-utente">
                <div class="info">
                    <?php
                    if ($message) echo printMessage($message["text"], $message["type"]); ?>
                    
                    <form action="form-hashtag-generator.php" name="hashtag" method="post" enctype="multipart/form-data">
                        <?php 
                        foreach ($categories as $category) {
                            $inputProps = Category::getInputProps($category, $categoriesSelected);
                            echo printInput($inputProps);
                        }
                        $submitProps["type"] = "submit";
                        $submitProps["value"] = "Genera lista #tags";
                        $submitProps["name"] = "hashtag";
                        echo printInput($submitProps);
                        ?>
                    </form>
                    <?php if(isset($results)) { ?>
                        <div class="mt-3">
                            <?php 
                            $resultInput["type"] = "textarea";
                            $resultInput["name"] = "results";
                            $resultInput["rows"] = 4;
                            $resultInput["id"] = "results-input";
                            $resultInput["value"] = $results;
                            echo printInput($resultInput); ?>
                            <button class="btn btn-primary" onclick="copyToClipboard('<?php echo $resultInput['id'] ?>')">Copia testo</button>
                        </div>
                    <?php }?>
                    
                </div>
            </div>
        </div>
    </div>
    <?php include "includes/footer.php";  ?>