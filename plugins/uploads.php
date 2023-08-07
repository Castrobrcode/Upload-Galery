<?php
include_once('connect.php');

$msg = false;

if (isset($_FILES['arquivo'])) {
    $extensao = strtolower($_FILES['arquivo']['name']);
    $novo_nome = $_FILES["arquivo"]["name"] . $extensao;
    $diretorio = '../uploads/';
    move_uploaded_file($_FILES['arquivo']['tmp_name'], $diretorio.$novo_nome);

    $sql = "INSERT INTO arquivos (id, arquivo, data) VALUES (null, ?, NOW())";
    $stmt = $con->prepare($sql);
    $stmt->bind_param("s", $novo_nome);

    if ($stmt->execute()) {
        $msg = "<p>Upload enviado com sucesso</p>";
    } else {
        $msg = "<p>Upload Mal-sucedido</p>";
    }

    $stmt->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/upload.css">
    <link rel="stylesheet" href="../css/index.css">
    <title>Teste</title>
</head>
<body>
    <div class="bar">
       <a href="index.html"><h1 class="lg1">Jeito <strong class="lg2">Brasileiro</strong></h1></a> 
       <img src="" alt="">
    </div>
    <div>
        <h1>Uploads de videos - fotos</h1>
    </div>
    <div>
        <div>
            <?php if ($msg != false) {
                echo '<p>$msg</p>';
            } ?>
            <form action="uploads.php" enctype="multipart/form-data" method="post">
                <label class="picture" for="picture__input" tabindex="0">
                    <span class="picture__image"></span>
                </label>
                <input type="file" id="picture__input" name="arquivo" required >
                <button class="botao" type="submit">Enviar arquivo</button>
                <script src="../js/upload.js"></script>
            </form>
        </div>    
    </div>
</body>
</html>

