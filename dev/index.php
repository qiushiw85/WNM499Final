<?php

$filename = "data/drinks.json";
$file = file_get_contents($filename);
$data = json_decode($file);

$categoriesFilename = "data/categories.json";
$categoriesFile = file_get_contents($categoriesFilename);
$categoriesData = json_decode($categoriesFile);

$americanClassics = array_filter($data, function($obj){return $obj->drinkCategory == "American Classics";});
$darkBurst = array_filter($data, function($obj){return $obj->drinkCategory == "Dark Burst";});

$categories = [$americanClassics,$darkBurst];

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
function showDrinkDetail($drink) {
  $currentID=$_GET['id'];
  ?>
    <body style="background-color:rgb(20,20,20)">
      <div class="card-container" style="background-color:<?php echo $drink->drinkBgrColor?>">
        <div class="card-name"><?php echo $drink->drinkName?></div>
        <div class="ingredients-container">
          <ul class="ingredients-list">
            <?php
            $ingredients = $drink->ingredients;
              for ($i=0; $i<count($ingredients); $i++) {
                echo "<li>".$ingredients[$i]->qty." <span class='uppercase'>".$ingredients[$i]->ingredient."</span></li>";
              }
            ?>
          </ul>
        </div>
        <div class="steps-container">
          <ul class="steps-list">
            <?php
            $steps = $drink->steps;
              for ($i=0; $i<count($steps); $i++) {
                echo "<li>".$steps[$i]->step."</li>";
              }
            ?>
          </ul>
        </div>
        <div class="card-img">
          <img src="images/coffeesvgs/<?php echo $drink->drinkImg ?>" alt="" />
        </div>
      </div>
    </body>
  <?php
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
<?php
  if(isset($_GET['id'])) {
    showDrinkDetail($data[$_GET['id']]);
  } else {
    global $categories;
    global $data;
    echo "<body style='background-color:#EDEDED'>";
    for($i=0; $i<count($categoriesData); $i++){
    ?>
      <div class="categories-container">
        <div class="categories-title"><?php echo $categoriesData[$i]->categoryName ?></div>
        <div class="categories-subtitle"><?php echo $categoriesData[$i]->categoryDes ?></div>
        <div class="categories-drinks">
          <?php echo showCategories($categories[$i]);?>
        </div>
      </div>
    <?php
    echo "</body>";
    }
  }
?>
</html>
