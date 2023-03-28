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