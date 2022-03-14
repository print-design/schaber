<?php
include '../../include/topscripts.php';

// Валидация формы
define('ISINVALID', ' is-invalid');
$form_valid = true;
$error_message = '';

$name_valid = '';

// Обработка отправки формы
if(null !== filter_input(INPUT_POST, 'create-industry-submit')) {
    $name = filter_input(INPUT_POST, 'name');
    if(empty($name)) {
        $name_valid = ISINVALID;
        $form_valid = false;
    }
    
    $parent_id = filter_input(INPUT_POST, 'parent_id');
    if(empty($parent_id)) $parent_id = "NULL";
    
    if($form_valid) {
        $name = addslashes($name);
        $sql = "insert into industry (name, parent_id) values ('$name', $parent_id)";
        $executer = new Executer($sql);
        $error_message = $executer->error;
        $insert_id = $executer->insert_id;
        
        if(empty($error_message)) {
            header('Location: details.php?id='.$insert_id);
        }
    }
}
?>
<!DOCTYPE html>
<html>
    <head>
        <?php
        include '../../include/head.php';
        ?>
    </head>
    <body>
        <?php
        include '../include/header.php';
        include './breadcrumb.php';
        ?>
        <div class="container-fluid">
            <?php
            if(!empty($error_message)) {
               echo "<div class='alert alert-danger mt-3'>$error_message</div>";
            }
            ?>
            <div class="row">
                <div class="col-12 col-md-8 col-lg-6">
                    <div class="d-flex justify-content-between mb-2">
                        <div><h1>Новая область</h1></div>
                        <div><a href="index.php" class="btn btn-outline-dark"><i class="fas fa-undo-alt"></i>&nbsp;Отмена</a></div>
                    </div>
                    <form method="post">
                        <input type="hidden" id="scroll" name="scroll" />
                        <div class="form-group">
                            <label for="name">Наименование</label>
                            <input type="text" id="name" name="name" class="form-control<?=$name_valid ?>" value="<?= filter_input(INPUT_POST, 'name') ?>" required="required" />
                            <div class="invalid-feedback">Наименование обязательно</div>
                        </div>
                        <div class="form-group">
                            <label for="parent_id">Родительская область</label>
                            <select id="parent_id" name="parent_id" class="form-control">
                                <option value="">...</option>
                                <?php
                                $sql = "select id, name, parent_id from industry order by name";
                                $grabber = new Grabber($sql);
                                if(empty($grabber->error)):
                                $industries = $grabber->result;
                                foreach($industries as $row):
                                ?>
                                <option value="<?=$row['id'] ?>"><?=$row['name'] ?></option>
                                <?php endforeach; endif; ?>
                            </select>
                        </div>
                        <button type="submit" class="btn btn-outline-dark mt-3" id="create-industry-submit" name="create-industry-submit"><i class="fas fa-save"></i>&nbsp;Сохранить</button>
                    </form>
                </div>
            </div>
        </div>
    </body>
</html>
