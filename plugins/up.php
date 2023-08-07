<!DOCTYPE html>
<html>
<head>
    <title>Upload de Imagens/Vídeos</title>
</head>
<body>
    <h2>Envio de Arquivos</h2>
    <form method="post" enctype="multipart/form-data">
        Selecione o arquivo:
        <input type="file" name="arquivo" id="arquivo">
        <input type="submit" value="Enviar Arquivo" name="submit">
    </form>

    <?php
    if (isset($_FILES["arquivo"])) {
        $nomeArquivo = $_FILES["arquivo"]["name"];
        $tipoArquivo = $_FILES["arquivo"]["type"];
        $tamanhoArquivo = $_FILES["arquivo"]["size"];
        $tempArquivo = $_FILES["arquivo"]["tmp_name"];

        // Verifica se é um formato de arquivo válido (imagem ou vídeo)
        $permitidos = array("image/jpeg", "image/png", "image/gif", "video/mp4");
        if (in_array($tipoArquivo, $permitidos) && $tamanhoArquivo <= 52428800) { // 50MB

            // Pasta onde os arquivos serão armazenados no servidor
            $caminho = "../uploads/";

            // Move o arquivo para a pasta de destino
            move_uploaded_file($tempArquivo, $caminho . $nomeArquivo);

            // Salva as informações no banco de dados (assumindo que você tenha uma conexão com o banco de dados aqui)
            $conexao = new mysqli("127.0.0.1", "root", "", "jeito_brasileiro");
            $sql = "INSERT INTO arquivos (nome, tipo, tamanho, caminho) VALUES ('$nomeArquivo', '$tipoArquivo', $tamanhoArquivo, '$caminho$nomeArquivo')";
            $conexao->query($sql);
            $conexao->close();

            echo "Arquivo enviado com sucesso!";
        } else {
            echo "Formato de arquivo inválido ou tamanho muito grande (máx. 50MB).";
        }
    }
    ?>
</body>
</html>
