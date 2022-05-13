<?php function printTitle($title, $caption)
{ 
    ob_start(); ?>
    <div class="row mt-3">
        <div class="col">
            <h1><?php echo $title ?></h1>
            <p><?php echo $caption ?></p>
        </div>

    </div>
<?php return  ob_get_clean();
}
function printMessage($message, $type)
{ 
    ob_start();?>
    <div class="row">
        <div class="col">
            <div class="alert alert-<?php echo $type; ?>" role="alert">
                <?php echo $message; ?>
            </div>
        </div>
    </div>
<?php return  ob_get_clean();
}
function printCard($props)
{ 
    ob_start(); ?>
    <div class="row">
        <div class="col">
            <div class="card cs-left-border cs-left-border-<?php echo $props["type"] ?? ""; ?> mb-3">
                <div class="card-body">
                    <?php echo $props["body"]; ?>
                </div>
            </div>
        </div>
    </div>
<?php return  ob_get_clean();
}
function printLink($url,$label)
{  
    ob_start(); ?>
    <a href="<?php echo $url ?>"><?php echo $label ?></a>
<?php return  ob_get_clean();
}

function printInput($props)
{  
    $type = isset($props["type"]) ? $props["type"] : "text";
    $id = isset($props["id"]) ? $props["id"] : "";
    $name = isset($props["name"]) ? $props["name"] : "";
    $label = isset($props["label"]) ? $props["label"] : "";
    $value = isset($props["value"]) ? $props["value"] : "";
    $required = isset($props["required"]) ? $props["required"] : "";
    $checked = isset($props["checked"]) ? $props["checked"] : [];
    $placeholder = isset($props["placeholder"]) ? $props["placeholder"] : "";
    $rows = isset($props["rows"]) ? $props["rows"] : 3;
    ob_start();
    switch ($type) { 
        case "submit": ?>
                <div class="mt-3">
                <input 
                name="<?php echo $name?>" 
                type="<?php echo $type?>" 
                class="btn btn-primary" 
                value="<?php echo $value?>" >
            </div>   
        <?php break;
        case "checkboxgroup":
            ?>
            <div class="form-check mt-3">
            <input class="form-check-input" name="<?php echo $name?>[]"  value="<?php echo $value?>" type="checkbox" <?php echo $checked ? "checked" : ""; ?> >
            <label class="form-check-label" for="<?php echo $name?>">
                <?php echo $label?>
            </label>
            </div>
        <?php break;
        case "description":
            ?>
            <div class="mt-3">
                <?php echo $label?>
            </label>
            </div>
        <?php break;
        case "hidden":
            ?>
            <input 
                type="<?php echo $type?>"
                value="<?php echo $value?>"
                name="<?php echo $name?>"
            >
        <?php break;
        case "textarea": ?>
            <div class="form-group">
                <label for="<?php echo $name?>"><?php echo $label ?></label>
                <textarea class="form-control" id="<?php echo $id ?>" rows="<?php echo $rows ?>" name="<?php echo $name?>"><?php echo $value?></textarea>
            </div>
        <?php break;
        case "file":
        case "text":
        case "email":
        case "tel":
        case "number": 
        default: ?>
            <div class="form-group mt-2">
                <label 
                    class="form-label" 
                    for="<?php echo $name?>">
                    <?php echo $label?>
                </label>
                <input 
                    class="form-control" 
                    type="<?php echo $type?>" 
                    value="<?php echo $value?>" 
                    name="<?php echo $name?>" 
                    placeholder="<?php echo $placeholder?>" 
                    <?php echo $required ? "required" : "" ?> >
            </div>
    <?php break;
    }
    return  ob_get_clean();
}

function printList($props)
{  
    if(!is_array($props))
        return;
    ob_start(); 
    ?>
    <ul class="list-group">
    <?php 
    foreach($props as $prop) {
        echo printListElement($prop);
    }
    ?>
    </ul>
    <?php return  ob_get_clean();
}
function printListElement($props)
{  
    $label = isset($props["label"]) ? $props["label"] : "";
    $value = isset($props["value"]) ? $props["value"] : "";
    ob_start(); ?>
    <li class="list-group-item">
        <span class="fw-bold"><?php echo $label?>: </span>
        <?php echo $value?>
    </li>
    <?php return  ob_get_clean();
}
