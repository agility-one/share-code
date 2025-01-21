<?php
$code = $_GET['code'];
$file_path = "content/" . $code . ".txt";

if (file_exists($file_path)) {
    $content = file_get_contents($file_path);
} else {
    die("Lien invalide ou expiré.");
}
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Générateur du contenu de page</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h1>Contenu Partagé</h1>
    <pre><?php echo htmlspecialchars($content); ?></pre>
</body>
</html>
