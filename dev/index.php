<?php

$filename = "data/drinks.json";
$file = file_get_contents($filename);
$data = json_decode($file);

$americanClassics = array_filter($data, function($obj){return $obj->drinkCategory == "American Classics";});
$darkBurst = array_filter($data, function($obj){return $obj->drinkCategory == "Dark Burst";});

$darkBurstEncoded = json_encode($darkBurst);

function showDrinks($id,$category){
  return "
    <a href='?id=$id' class='drink-container' style='background-color:{$category[$id]->drinkBgrColor}'>
      <div class='drink-img'>
        <img src='images/coffeesvgs/{$category[$id]->drinkImg}' alt='' />
      </div>
      <div class='drink-name'>{$category[$id]->drinkName}</div>
    </a>";
    }

function showCategories($category) {
  $total = count($category);
  for($i=0; $i<$total; $i++) {
    if (empty($category[$i])) {$total++;}
    else {echo showDrinks($i,$category);}
  }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Coffee Guide</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
  <meta name="apple-mobile-web-app-capable" content="yes">
  <meta name="mobile-web-app-capable" content="yes">
  <link rel="stylesheet" href="css/style.css">
</head>
<body style="background-color:#EDEDED">
  <div class="categories-container">
    <div class="categories-title">American Classics</div>
    <div class="categories-subtitle">Some of our personal favorites</div>
    <div class="categories-drinks">
      <?php echo showCategories($americanClassics);?>
    </div>
  </div>
  <div class="categories-container">
    <div class="categories-title">Dark Burst</div>
    <div class="categories-subtitle">Our strongest recommendations for strongest drinkers</div>
    <div class="categories-drinks">
      <?php echo showCategories($darkBurst);?>
    </div>
  </div>
</body>
</html>
