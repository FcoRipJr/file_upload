

<?php
$usuario = $_POST['usuario'] ?? null;
$dir_usuario = $usuario == null ? '' : $usuario.'/' ;

$resposta = $_POST['resposta'] ?? null;
$dir_resposta = $resposta == null ? '' : $resposta.'/';
$dir = "evidencias/".$dir_usuario.$dir_resposta;

if (!file_exists($dir)) {
    mkdir($dir, 0777, true);
}

$tamanho_maximo = 10485760; // 10 MB

$extensoes_permitidas = array('pdf', 'jpg', 'png', 'doc', 'jpeg');

if (!empty($_FILES["arquivo"])) {
    if (in_array(strtolower(pathinfo($_FILES["arquivo"]["name"], PATHINFO_EXTENSION)), $extensoes_permitidas)) {
        
        if ($_FILES["arquivo"]["size"] <= $tamanho_maximo) {
            date_default_timezone_set('America/Manaus');
            $nome_arquivo = $usuario . '_' . $resposta . '_' . date('Y_m_d_h_i_s') . '.' . pathinfo($_FILES["arquivo"]["name"], PATHINFO_EXTENSION);

            if (move_uploaded_file($_FILES["arquivo"]["tmp_name"], $dir . $nome_arquivo)) {
                echo "Arquivo enviado com sucesso.";
            } else {
                echo "Erro ao enviar o arquivo.";
            }
        } else {
            echo "Tamanho máximo permitido é de " . ($tamanho_maximo / 1048576) . " MB.";
        }
    } else {
        echo "Formato de arquivo não permitido. Os formatos permitidos são: " . implode(", ", $extensoes_permitidas) . ".";
    }
} else {
    echo "Nenhum arquivo enviado.";
}
?>
<br>
<a href="index.php">voltar</a>
<br>
<a href="dashboard.php">ver arquivos</a>
