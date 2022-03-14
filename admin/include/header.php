<?php
$php_self = $_SERVER['PHP_SELF'];
$substrings = mb_split("/", $php_self);
$count = count($substrings);
$folder = '';
$file = '';

if($count > 1) {
    $folder = $substrings[$count - 2];
    $file = $substrings[$count - 1];
}

$admin_class = "";

if($folder == 'admin') {
    $admin_class = " disabled";
}
?>
<nav class="navbar navbar-expand-sm bg-dark navbar-dark">
    <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link" href="<?=APPLICATION ?>/">На главную</a>
        </li>
        <li class="nav-item">
            <a class="nav-link<?=$admin_class ?>" href="<?=APPLICATION ?>/admin/">Администратор</a>
        </li>
    </ul>
</nav>