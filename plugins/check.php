<?php
    include("connect.php");

    function timing ($time)
    {

        $time = time() - $time; // to get the time since that moment
        $time = ($time<1) ? 1 : $time;
        $tokens = array (
            31536000 => 'ano',
            2592000 => 'mês',
            604800 => 'semana',
            86400 => 'dia',
            3600 => 'hora',
            60 => 'minuto',
            1 => 'segundo'
        );

        foreach ($tokens as $unit => $text) {
            if ($time < $unit) continue;
            $numberOfUnits = floor($time / $unit);
            if ($text == "segundo") {
                return "agora mesmo";
            }
            return $numberOfUnits.' '.$text.(($numberOfUnits>1)?'s':'');
        }

    }

    if(isset($_COOKIE["ID"]) && isset($_COOKIE["TOKEN"]) && isset($_COOKIE["SECURE"])) {
        // Normalization
        $id = $_COOKIE["ID"];
        $token = $_COOKIE["TOKEN"];
        $secure = $_COOKIE["SECURE"];

        // Query
        $stmt = $con->prepare("SELECT id, usuario, Picture, Online, Crreation FROM user WHERE (id = ? AND Token LIKE ? AND Secure = ?) LIMIT 1");
        $stmt->bind_param("isi", $id, $token, $secure);
        $stmt->execute();
        $me = $stmt->get_result()->fetch_assoc();

        // Check if exists
        if (!$me) {
            die("<script>location.href = '../abas/login.html';</script>");
        } else {
            // Normalize information
            $uid = $me["Id"];
            $username = $me["Username"];
            $user_picture = $me["Picture"];
            $user_online = strtotime($me["Online"]);
            $user_creation = $me["Creation"];

            // Online status pin-point
            $stmt = $con->prepare("UPDATE user SET `Online` = now() WHERE Id = ?");
            $stmt->bind_param("i", $uid);
            $stmt->execute();
        }
    } else {
        die("<script>location.href = '../abas/login.html';</script>");
    }
?>