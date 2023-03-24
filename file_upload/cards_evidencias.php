
<?php 
    $usuario = $_GET['usuario'] ?? null;
    $dir_usuario = $usuario == null ? '' : $usuario.'/' ;

    $resposta = $_GET['resposta'] ?? null;
    $dir_resposta = $resposta == null ? '' : $resposta.'/' ;
    $dir = "evidencias/".$dir_usuario.$dir_resposta;
    $evidencias = array();
    foreach (scandir($dir) as $file) {
        if (is_file($dir . $file)) {
            $evidencias[] = $file;
        }
    }
?>
<h2>Evidencias usuario <?= $_GET['usuario']??''?> Resposta: <?= $_GET['resposta']??''?> </h2>
<ul>
    <?php foreach ($evidencias as $evidencia) { 
        $href = $dir.$evidencia;
        ?>
        <li id='evidencia_<?= $evidencia ?>'><a href="<?= $href?>"  target="_blank"><?= $evidencia ?></a></li>
    <?php } ?>
</ul>
<a onclick="render_respostas(<?= $_GET['usuario']??''?>)">voltar</a>