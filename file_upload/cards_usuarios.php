<?php
    $dir = "evidencias/";
    $usuarios = array();

    foreach (scandir($dir) as $file) {
        if (!is_file($dir . $file) && $file != "." && $file != "..") {
            $usuarios[] = $file;
        }
    }
?>
<h2>Usuários</h2>
<ul>
    <?php foreach ($usuarios as $usuario) { ?>
        <li onclick="render_respostas(<?= $usuario ?>)" id='usuario_<?= $usuario ?>'><?=  $usuario ?></li>
    <?php } ?>
</ul>

<a href="index.php">voltar</a>