<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/index.css">
    <link rel="stylesheet" href="css/card.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons+Sharp">
    <title>Jeito - Brasileiro</title>
</head>
<body>
    <div class="bar">
       <a href="index.html"><h1 class="lg1">Jeito <strong class="lg2">Brasileiro</strong></h1></a> 
       <img src="" alt="">
      
         <nav>
            <ul class="menu">
                <li><a href="abas/login.html"><span id="ico" class="material-icons-sharp">account_circle</span></a>
                    <ul>
                        <li> <a href="#" class="active">
                            <h3>Entrar</h3></a></li>
                    </ul>
                </li>
            </ul>
         </nav>
        
    </div>
    <div>
        <nav>
            <div>
                <nav>
                    <ul class="menu2" style="position: fixed;background: black;border: 1px solid #333;color: #fff;">
                        <li><a style="color: #fff;" href="">Videos</a></li>
                        <li><a style="color: #fff;" href="">Chat</a></li>
                        <li><a style="color: #fff;" href="">Apps</a></li>
                    </ul>
                </nav>
            </div>
            <h3 class="h3">Catergorias</h3>
            <div class="card">
                    <?php
                // Pasta de mídia
                $mediaDir = 'uploads/';

                // Pasta de fotos
                $photoDir = $mediaDir . '';
                $photos = glob($photoDir . '*.{jpg,jpeg,png,gif}', GLOB_BRACE);


                // Exibe fotos
                foreach ($photos as $photo) {
                    echo '<img style="margin: 5px;"  src="' . $photo . '" alt="Foto">';
                }

                ?>
        </div>
        </nav>

    </div>
    <h3 class="h3" style="margin-top: 8.5px;text-align:center;">Videos</h3>
       
    <div class="midias">
        <div style="margin-top: 10px;">
        <?php
        // Pasta de mídia
        $mediaDir = 'uploads/';

        
        // Pasta de vídeos
        $videoDir = $mediaDir . '';
        $videos = glob($videoDir . '*.{mp4,avi,mkv}', GLOB_BRACE);

        
        // Exibe vídeos
        foreach ($videos as $video) {
            echo '<video width="100%" controls>';
            echo '<source src="' . $video . '" type="video/mp4">';
            echo 'Seu navegador não suporta o vídeo.';
            echo '</video>';
        }
        ?>
        </div>
    </div>
</body>
</html>