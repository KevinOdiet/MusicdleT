<?php
require 'vendor/autoload.php';

use Intervention\Image\ImageManagerStatic as Image;

$jsonData = file_get_contents('assets/json/album.json');

$data = json_decode($jsonData, true);

$randomAlbum = $data['albums'][array_rand($data['albums'])];

$imagePath = $randomAlbum['cover'];

$imageFullPath = $imagePath;

if (file_exists($imageFullPath)) {

    $image = Image::make($imageFullPath);

    $image->resize(500, 500);

    $image->pixelate(30);

    $tempImageFile = 'temp_image.jpg';
    $image->save($tempImageFile);
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Musicdle</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <div class="image-container">
            <h1>Trouve la cover</h1>
            <img id="coverImage" src="<?php echo $tempImageFile; ?>" alt="Album Cover">
        </div>
        <div class="album-info">
            <?=$randomAlbum['artiste']?><br>
            <?=$randomAlbum['nom']?>
        </div>
        <div id="textInputContainer">
            <input type="text" id="textInput" placeholder="Votre réponse...">
            <button id="validateButton">Valider</button>
        </div>
        <div id="displayTextContainer"></div>
    </div>

    <script src="script.js"></script>
</body>
</html>



