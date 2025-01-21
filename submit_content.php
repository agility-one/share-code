<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Générateur de Lien</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <h1>Génération du Lien</h1>
        <?php
        function generateRandomCode($length = 10) {
            $characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789';
            $charactersLength = strlen($characters);
            $randomString = '';
            for ($i = 0; $i < $length; $i++) {
                $randomString .= $characters[rand(0, $charactersLength - 1)];
            }
            return $randomString;
        }

        $content = $_POST['content'];
        $code = generateRandomCode();
        $file_path = "content/" . $code . ".txt";
        file_put_contents($file_path, $content);
        
        /* pensez à changer url pour votre ip ou domaine avant /page.php?code=$code\ */
        echo "<p>Lien généré à partager : <a href=\"http://127.0.0.1/page.php?code=$code\">http://127.0.0.1/page.php?code=$code</a></p>";
        ?>
    </div>
</body>
</html>
