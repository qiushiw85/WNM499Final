<?php

$filename = "data/drinks.json";
$file = file_get_contents($filename);
$data = json_decode($file);

$categoriesFilename = "data/categories.json";
$categoriesFile = file_get_contents($categoriesFilename);
$categoriesData = json_decode($categoriesFile);

function showDrinks($id,$category){
  ?>
    <a href='?id=<?php echo $id?>' data-id='<?php echo $id ?>' class='drink-container' style='background-color:<? echo $category[$id]->drinkBgrColor ?>'>
      <div class='drink-img'>
        <?php
        if ($category[$id]->hasCream == true) {
          ?>
          <div class="card-liquid card-liquid--bgr card-liquid--card"></div>
          <div class="card-cream card-cream--card"><?php include 'partials/cream.html' ?></div>
          <div class="card-liquid card-liquid--cream card-liquid--card">
            <div class='inner-cream inner-cream--card' style='background-color:#FBF5DE'></div>
          </div>
          <?php
        } else { ?>
          <div class="card-liquid card-liquid--bgr card-liquid--card"></div>
          <?php
        } ?>
        <?php
          $ingredients = $category[$id]->ingredients;
          for ($i=count($ingredients); $i>-1; $i--) {
            echo "<div class='card-liquid' style='height:".$ingredients[$i]->height."'><div class='inner-liquid inner-liquid--card' style='background-color:".$ingredients[$i]->color."'></div></div>";
          }
        ?>
        <svg class='cup-img' version='1.1' xmlns='http://www.w3.org/2000/svg' xmlns:xlink='http://www.w3.org/1999/xlink' x='0px' y='0px'
           viewBox='0 0 550 350' style='enable-background:new 0 0 550 350;' xml:space='preserve'>
          <path class="cup-bgr" style='fill:<?php echo $category[$id]->drinkBgrColor ?>' d="M0,0.2v333.2l550-0.4V-0.2L0,0.2z M143,9.3h238v204.4c0,56.7-46,102.7-102.7,102.7h-32.5
           c-56.7,0-102.7-46-102.7-102.7V9.3z"/>
          <path class="cup-handle" d="M379.4,183.7c31.1,0,56.2-25.2,56.2-56.2s-25.2-56.2-56.2-56.2V39.4c48.6,0,88,39.4,88,88s-39.4,88-88,88V183.7
           z"/>
          <path class="cup-handle-shadow" d="M435.6,127.4c0-22.8-13.5-42.3-33-51.2V42.5c37.3,10.2,64.7,44.3,64.7,84.9c0,40.5-27.4,74.7-64.7,84.9v-33.7
           C422.1,169.8,435.6,150.2,435.6,127.4z"/>
          <g>
           <path class="cup-highlight" d="M238.4,316.9c49.5,0,59.6-40.1,59.6-89.6V9.8h35.7v217.5c0,49.5-10.1,89.6-59.6,89.6H238.4z"/>
           <path class="cup-shadow" d="M260.4,316.9c-49.5,0-59.6-40.1-59.6-89.6V9.8h-59.4l0.7,217.5c0,49.5,33,89.6,82.5,89.6H260.4z"/>
           <path class="cup-shadow-dark" d="M141.4,220.5c0,56.7,46,102.7,102.7,102.7h32.5c56.7,0,102.7-46,102.7-102.7v-34.3
             c0,56.7-46,102.7-102.7,102.7h-32.5c-56.7,0-102.7-46-102.7-102.7V220.5z"/>
          </g>
          <path class="cup-outline" d="M389.3,32.2c50.3,5.7,83,46.8,85.4,89.1c1.4,25.5-5.9,48.3-22.5,67.9c-16.5,19.5-37.7,30.4-63.2,33.4
           c-1.5,19-7.3,36.5-17.5,52.4c-10.3,16-23.8,28.6-40.2,38.3c0.6,0,1.3,0,1.9,0c68,0,136,0,204,0c5.5,0,9.3,2.9,10.5,7.9
           c1.4,5.8-3.1,11.8-9.1,12.1c-0.6,0-1.2,0-1.8,0c-174.6,0-349.2,0-523.8,0c-5.8,0-9.6-2.7-10.9-7.8c-1.4-5.9,3.1-11.9,9.1-12.2
           c0.7,0,1.4,0,2.2,0c58,0,116,0,173.9,0c0.6,0,1.3,0,1.9,0c0-0.1,0-0.2,0.1-0.3c-1.6-1-3.2-1.9-4.8-2.9
           c-24.9-15.8-41.4-37.8-49.4-66.2c-2.8-9.8-3.9-19.9-3.9-30.1c0-67.8,0-135.6,0-203.5c0-6.4,5-10.8,10.7-10.8
           c78.9,0.1,157.9,0.1,236.8,0c6.4,0,10.9,4.9,10.7,10.8c-0.1,6.7,0,13.3,0,20C389.3,31,389.3,31.6,389.3,32.2z M369.3,19.8
           c-72.9,0-145.4,0-218.1,0c0,0.7,0,1.2,0,1.8c0,64.3,0,128.6,0,192.9c0,4.7,0.4,9.4,1.1,14.1c2.9,18.7,10.8,35,23.8,48.7
           c18.2,19.3,40.8,29.2,67.4,29.5c11,0.2,22,0,33,0c6.5,0,13-0.6,19.3-2c21-4.5,38.4-15.1,52.1-31.6c14.4-17.4,21.4-37.6,21.4-60.2
           c0-63.7,0-127.4,0-191.1C369.3,21.3,369.3,20.6,369.3,19.8z M389.4,64.3c30.3,5.2,51.8,29.8,53.6,59.4c0.8,13.6-2.4,26.3-9.8,37.7
           c-10.3,16-25,25.6-43.7,29c0,5.6,0,11.2,0,16.7c34.8-3.8,68.4-33.6,70.2-76.2c2-45.8-32.9-79.2-70.3-83.3
           C389.4,53.1,389.4,58.7,389.4,64.3z M389.4,79.8c0,31.7,0,63.4,0,95c18.3-3.3,38-20.5,38.5-46.5C428.5,102.8,409.8,83.7,389.4,79.8z
           "/>
        </svg>
      </div>
      <div class='drink-name'><?php echo $category[$id]->drinkName ?></div>
    </a>
    <?php
}
function showCategories($category_name) {
  global $data;
  $category = array_filter($data, function($obj) use ($category_name){return $obj->drinkCategory == $category_name;});
  $total = count($category);
  for($i=0; $i<$total; $i++) {
    if (empty($category[$i])) {$total++;}
    else {echo showDrinks($i,$category);}
  }
}
function showDrinkDetail($drink) {
  $currentID=$_GET['id'];
  ?>
    <!-- <body style="background-color:rgb(20,20,20)"> -->
      <div class="card-container" style="background-color:<?php echo $drink->drinkBgrColor?>">
        <div class="card-name"><?php echo $drink->drinkName?></div>
        <div class="container">
          <div class="row">
            <div class="col-md-7 col-sm-12 col-xs-12">
              <div class="text-wrapper">
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
              </div>
            </div>
            <div class="col-md-5 col-sm-12 col-xs-12">
              <div class="img-wrapper">
                <div class="card-img">
                  <?php
                  if ($drink->hasCream == true) {
                    ?>
                    <div class="card-liquid card-liquid--bgr"></div>
                    <div class="card-cream"><?php include 'partials/cream.html' ?></div>
                    <div class="card-liquid card-liquid--cream">
                      <div class='inner-cream' style='background-color:#FBF5DE'></div>
                    </div>
                    <?php
                  } else { ?>
                    <div class="card-liquid card-liquid--bgr"></div>
                    <?php
                  } ?>
                  <?php
                  $ingredients = $drink->ingredients;
                    for ($i=count($ingredients); $i>-1; $i--) {
                      echo "<div class='card-liquid' style='height:".$ingredients[$i]->height."'><div class='inner-liquid' style='background-color:".$ingredients[$i]->color."'></div></div>";
                    }
                  ?>
                  <svg class="cup-img" version="1.1" id="cup-horizontal" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                  	 viewBox="0 0 550 350" style="enable-background:new 0 0 550 350;" xml:space="preserve">
                     <style>
                      .cup-bgr{fill:<?php echo $drink->drinkBgrColor?>;}
                     </style>
                     <?php include "partials/cup.html"; ?>
                  </svg>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    <!-- </body> -->
  <?php
  }

if(isset($_GET['did'])){
  showDrinkDetail($data[$_GET['did']]);
  die;
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
  <script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>
  <script src="js/coffee.js"></script>
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
          <?php echo showCategories($categoriesData[$i]->categoryName);?>
        </div>
      </div>

    <?php
    }
    echo "
    <div class='modal'><div class='modal-inner'></div></div>
    </body>";
  }
?>
<style>
.cup-handle{fill:#CB4133;}
.cup-handle-shadow{fill:#EB6655;}
.cup-highlight{opacity:0.5;fill:#FFFFFF;}
.cup-shadow{opacity:0.2;}
.cup-shadow-dark{opacity:0.3;}
.cup-outline{fill:#613128;}
.modal {
  position:fixed;
  top:0;
  left:0;
  width:100%;
  height:100vh;
  background-color:rgba(0,0,0,0);
  display:none;
  transition:all 0.3s;
}
.modal-inner {
  width:90%;
  height:90%;
  position:absolute;
  bottom:5%;
  left:50%;
  transform-origin : 0% 100%;
  transform:scale(0.3,0.3) translateX(-50%);
  background-color:white;
  border-radius:1em;
  transition:all 0.3s;
  opacity:0;

}
.modal.active {
  /*display:block;*/
  background-color:rgba(0,0,0,0.8);
}
.modal.active .modal-inner {
  transform:scale(1,1) translateX(-50%);
  opacity:1;
}
</style>

</html>
