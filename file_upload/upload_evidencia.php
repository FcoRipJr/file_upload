

<?php
// Diretório onde os arquivos serão armazenados
$usuario = $_POST['usuario'] ?? null;
$dir_usuario = $usuario == null ? '' : $usuario.'/' ;

$resposta = $_POST['resposta'] ?? null;
$dir_resposta = $resposta == null ? '' : $resposta.'/';
$dir = "evidencias/".$dir_usuario.$dir_resposta;

if (!file_exists($dir)) {
    mkdir($dir, 0777, true);
}

// Tamanho máximo do arquivo (em bytes)
$tamanho_maximo = 10485760; // 10 MB

// Array com as extensões permitidas
$extensoes_permitidas = array('pdf', 'jpg', 'png', 'doc', 'jpeg');

// Verifica se um arquivo foi enviado
if (!empty($_FILES["arquivo"])) {
    // Verifica se o arquivo é uma imagem
    if (in_array(strtolower(pathinfo($_FILES["arquivo"]["name"], PATHINFO_EXTENSION)), $extensoes_permitidas)) {
        // Verifica o tamanho do arquivo
        if ($_FILES["arquivo"]["size"] <= $tamanho_maximo) {
            // Nome do arquivo será a concatenação das variáveis enviadas no formulário, mais o timestamp do upload
            $nome_arquivo = $usuario . '_' . $resposta . '_' . date('Y_m_d') . '.' . pathinfo($_FILES["arquivo"]["name"], PATHINFO_EXTENSION);

            // Move o arquivo enviado para o diretório
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

<a href="index.php">voltar</a>