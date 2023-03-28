# file_upload

```
<?php

if (isset($_GET['filename'])) {
    $filename = $_GET['filename'];
    $filepath = "evidencias/" . $filename;
    if (file_exists($filepath)) {
        if (unlink($filepath)) {
            echo "Arquivo excluído com sucesso: " . $filename;
        } else {
            echo "Erro ao excluir o arquivo: " . $filename;
        }
    } else {
        echo "Arquivo não encontrado: " . $filename;
    }
}
?>

```


```
<?php
$extensao = pathinfo($nome_arquivo, PATHINFO_EXTENSION);

if ($extensao == "pdf") {
    $icone = "fa-file-pdf-o";
} elseif ($extensao == "jpg" || $extensao == "jpeg" || $extensao == "png") {
    $icone = "fa-file-image-o";
} elseif ($extensao == "doc" || $extensao == "docx") {
    $icone = "fa-file-word-o";
} else {
    $icone = "fa-file-o";
}

echo "<i class='fa " . $icone . "'></i>";
?>

```