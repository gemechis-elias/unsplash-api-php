<?php
require_once 'UnsplashAPI/unsplashapi.php';

$accessKey = '1L8wGeQPgYKF3x0cEgeon1sJuKIvC1vbX7OMtngXf4s'; // Replace with your actual Unsplash access key
$unsplashAPI = new UnsplashAPI($accessKey);


?>

<html>
<head>
<title>PHP Test</title>
<meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1">
<meta name="viewport" content="width=device-width, initial-scale=1">

<link rel="stylesheet" href="app.css">
</head>
<body>
<div class='container1'>
  <div class='form-container'>
    <div class='form-tab'>
      <div class='search-field'>
        <i data-feather="search" class='search-icon'></i> 
        <form action="index.php" method="get">
          <input autocomplete="off" type='text' pattern='\S+.*' name='input' id='input' class='text-field'>
          <button type="submit" class="search-btn" name="search"><p>search</p></button>
        </form>
      </div>
    </div>
  </div>
  <div class='result-tab'>
    <div class='ul-title'>
      <p>Recent Search</p>
    </div>
    <div class='ul'>
      <?php
      if (isset($_GET['search'])) {
          $keyword = $_GET['input'];
          $images = $unsplashAPI->searchImages($keyword);

          foreach ($images as $image) {
              $username = $image->user->username;
              $description = $image->description ?? '';

              $imageUrl = $image->urls->regular;

              echo "<div style='width:210px; height:120px;' class='gallery-item'>";
              echo "<img  style='width:200px; height:80px;'  class='gallery-image' src='" . htmlspecialchars($imageUrl, ENT_QUOTES, 'UTF-8') . "' alt='" . htmlspecialchars($description, ENT_QUOTES, 'UTF-8') . "'>";
              echo "<div class='image-details'>";
              echo "<p class='username'>$username</p>";
              echo "<p class='description'>$description</p>";
              echo "</div>";
              echo "</div>";
          }
      }
      ?>
    </div>
  </div>
</div>


<div class="container">

	<h1 class="heading">Images From Unsplash</h1>

	<div class="gallery">
        <?php
$images = $unsplashAPI->getImages(4);
        
foreach ($images as $image) {
    $username = $image->user->username;
    $description = $image->description ?? '';

    $imageUrl = $image->urls->regular;

    echo "<div class='gallery-item'>";
    echo "<img class='gallery-image' src='" . htmlspecialchars($imageUrl, ENT_QUOTES, 'UTF-8') . "' alt='" . htmlspecialchars($description, ENT_QUOTES, 'UTF-8') . "'>";
    echo "<div class='image-details'>";
    echo "<p class='username'>$username</p>";
    echo "<p class='description'>$description</p>";
    echo "</div>";
    echo "</div>";
}

        ?>

	</div>

</div>
</body>
</html>
