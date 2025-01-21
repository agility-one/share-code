<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Nettoyage des Fichiers Expirés</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <h1>Nettoyage des Fichiers Expirés</h1>
        <form method="post">
            <fieldset>
                <legend>Fichiers à Supprimer</legend>
                <?php
                $directory = 'content/';
                $expiry_time = 24 * 60 * 60; // 24 heures en secondes

                foreach (glob($directory . "*.txt") as $file) {
                    $filemtime = filemtime($file);
                    $filename = basename($file);
                    $filesize = filesize($file);

                    echo '<div>';
                    echo '<input type="checkbox" name="files[]" value="' . $filename . '">';
                    echo '<label for="files[]">' . $filename . ' - ' . date("F d Y H:i:s", $filemtime) . ' - ' . round($filesize / 1024, 2) . ' KB</label>';
                    echo '</div>';
                }
                ?>
            </fieldset>
            <input type="submit" name="submit" value="Supprimer Sélection">
        </form>

        <?php
        if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit']) && isset($_POST['files'])) {
            $selectedFiles = $_POST['files'];
            foreach ($selectedFiles as $filename) {
                $file = $directory . $filename;
                if (file_exists($file)) {
                    unlink($file);
                    echo "<p>Fichier supprimé: $filename</p>";
                }
            }
            // Rafraîchir la page après la suppression
            echo '<script>window.location.href = window.location.href;</script>';
        }
        ?>
    </div>
</body>
</html>
