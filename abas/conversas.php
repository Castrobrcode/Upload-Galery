<?php
    session_start();
    if (!isset($_SESSION['logado'])) {
        $_SESSION['logado'] = false;
        $_SESSION['tema'] = 'comum';
        $_SESSION['usuarios'] = '';
        $_SESSION['nome'] = '';
        $_SESSION['cor_nome_texto'] = '#000';
        $_SESSION['cor_nome_fundo'] = '#fff';
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/conversa.css">
    <link rel="stylesheet" href="tema_<?=$_SESSION['tema']?>.css">
    <title>Jeito Brasileiro - Chat</title>
</head>
<body>
<div class="tela_login">
<?php
if ($_SESSION['logado']) 
{
    ?>
        <span class="informacao">
            <span class="nome">Logado como: </span>
            <span class="valor"><?php $_SESSION['usuario']?></span>
        </span>
        <span class="informacao">
            Seja Bem-vindo <span class="valor"><?php $_SESSION ?></span>
        </span>
        <form method="post">
            <input type="hidden" name="acao" value="Deslogar">
            <input type="submit" value="Deslogar">
        </form>
    <?
}   else
    {
        ?>
        <span class="informacao">
            <span class="nome">Voce nao esta logado. Entre com suas informçoes abaixo.</span>
            <span class="valor"><?php $_SESSION['usuario']?></span>
        </span>
        
        <form method="post">
            <input type="hidden" name="acao" value="logar">
            <span class="informacao">
                <span class="valor">Nome de usuario</span>
                <input name="usuario" />
            </span>
            <input type="submit" value="Logar">
            <input type="hidden" name="acao" value="logar">
            <span class="informacao">
            <span class="valor">Nome de usuario</span>
                <input name="senha" type="password" />            
            </span>
            <input type="submit" value="Logar">
        </form>
        <?php
    }

    

?>
</div>
<div class="tela_mensagem">

</div>
<div class="tela_usuarios">
</div>
<div class="tela_chat">
</div>

</body>
</html>