<?php 
    $usuario = $_GET['usuario'] ?? null;
    $dir_usuario = $usuario == null ? '' : $usuario.'/' ;
    $dir = "evidencias/".$usuario;
    $respostas = array();

    foreach (scandir($dir) as $file) {
        if (!is_file($dir . $file) && $file != "." && $file != "..") {
            $respostas[] = $file;
        }
    }
?>
<h2>Respostas Usuário <?= $_GET['usuario']??''?></h2>
<ul>
    <?php foreach ($respostas as $resposta) { ?>
        <li onclick="render_evidencias(<?= $usuario ?? '' ?>,<?= $resposta ?>)" id='resposta_<?= $resposta ?>'><?= $resposta ?></li>
    <?php } ?>
</ul>

<a onclick="render_usuarios()">voltar</a>
    