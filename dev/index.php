<?php

$filename = "data/drinks.json";
$file = file_get_contents($filename);
$data = json_decode($file);

$categoriesFilename = "data/categories.json";
$categoriesFile = file_get_contents($categoriesFilename);
$categoriesData = json_decode($categoriesFile);

<<<<<<< HEAD
function showDrinks($id,$category){
  return "
    <a href='?id=$id' class='drink-container' style='background-color:{$category[$id]->drinkBgrColor}'>
      <div class='drink-img'>
        <img src='images/coffeesvgs/{$category[$id]->drinkImg}' alt='' />
      </div>
      <div class='drink-name'>{$category[$id]->drinkName}</div>
    </a>";
=======
function hex2rgb($hex = "#000000") {
	$f = function($x) { return hexdec($x); };
	return array_map($f, str_split(str_replace("#", "", $hex), 2));
}
function rgb2hex($rgb = array(0, 0, 0)) {
	$f = function($x) { return str_pad(dechex($x), 2, "0", STR_PAD_LEFT); };
	return "#" . implode("", array_map($f, $rgb));
}
function saturate($color) {
	$t = $color;
	if(is_string($color)) $t = hex2rgb($color);
  if (max($t) == $t[0]) {
    $t = array($t[0],$t[1]-60,$t[2]-30);
  } else if (max($t) == $t[1]) {
    $t = array($t[0]-30,$t[1],$t[2]-60);
  } else $t = array($t[0]-60,$t[1]-30,$t[2]);
  $u = $t;
	if(is_string($color)) return rgb2hex($u);
	return $u;
}

function showDrinks($id,$category){
  ?>
    <a href='?id=<?php echo $id?>' data-id='<?php echo $id ?>' class='drink-container' style='background-color:<? echo $category[$id]->drinkBgrColor ?>'>
      <div class='drink-img'>
        <?php
        if ($category[$id]->hasCream == true) {
          ?>
          <div class="card-liquid card-liquid--bgr card-liquid--card"></div>
          <div class="card-cream card-cream--card"><?php include 'partials/cream.html' ?></div>
          <div class="card-liquid card-liquid--cream card-liquid--card" style='height:85%'>
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
            echo "<div class='card-liquid card-liquid--card' style='height:".$ingredients[$i]->height."'><div class='inner-liquid inner-liquid--card' style='background-color:".$ingredients[$i]->color."'></div></div>";
          }
        ?>
        <svg version="1.1" class="cup-img" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
	 viewBox="0 0 550 340" style="enable-background:new 0 0 550 340;" xml:space="preserve">
           <path class="cup-bgr" style='fill:<?php echo $category[$id]->drinkBgrColor ?>' d="M0,0.5v349.6l550-0.4V0.1L0,0.5z M143,9.6h238V214c0,56.7-46,102.7-102.7,102.7h-32.5
           	C189,316.7,143,270.7,143,214V9.6z"/>
           <path class="cup-handle" d="M379.4,184c31.1,0,56.2-25.2,56.2-56.2s-25.2-56.2-56.2-56.2V39.7c48.6,0,88,39.4,88,88s-39.4,88-88,88V184z"/>
           <path class="cup-handle-shadow" d="M435.6,127.7c0-22.8-13.5-42.3-33-51.2V42.9c37.3,10.2,64.7,44.3,64.7,84.9c0,40.5-27.4,74.7-64.7,84.9v-33.7
           	C422.1,170.1,435.6,150.5,435.6,127.7z"/>
           <g>
           	<path class="cup-highlight" d="M238.4,317.2c49.5,0,59.6-40.1,59.6-89.6V10.1h35.7v217.5c0,49.5-10.1,89.6-59.6,89.6H238.4z"/>
           	<path class="cup-shadow" d="M260.4,317.2c-49.5,0-59.6-40.1-59.6-89.6V10.1h-59.4l0.7,217.5c0,49.5,33,89.6,82.5,89.6H260.4z"/>
           	<path class="cup-shadow-dark" d="M141.4,220.8c0,56.7,46,102.7,102.7,102.7h32.5c56.7,0,102.7-46,102.7-102.7v-34.3
           		c0,56.7-46,102.7-102.7,102.7h-32.5c-56.7,0-102.7-46-102.7-102.7V220.8z"/>
           </g>
           <path class="cup-outline" d="M389.3,32.5c50.3,5.7,83,46.8,85.4,89.1c1.4,25.5-5.9,48.3-22.5,67.9c-16.5,19.5-37.7,30.4-63.2,33.4
           	c-1.5,19-7.3,36.5-17.5,52.4c-10.3,16-23.8,28.6-40.2,38.3c0.6,0,1.3,0,1.9,0c68,0,136,0,204,0c5.5,0,9.3,2.9,10.5,7.9
           	c1.4,5.8-3.1,11.8-9.1,12.1c-0.6,0-1.2,0-1.8,0c-174.6,0-349.2,0-523.8,0c-5.8,0-9.6-2.7-10.9-7.8c-1.4-5.9,3.1-11.9,9.1-12.2
           	c0.7,0,1.4,0,2.2,0c58,0,116,0,173.9,0c0.6,0,1.3,0,1.9,0c0-0.1,0-0.2,0.1-0.3c-1.6-1-3.2-1.9-4.8-2.9
           	c-24.9-15.8-41.4-37.8-49.4-66.2c-2.8-9.8-3.9-19.9-3.9-30.1c0-67.8,0-135.6,0-203.5c0-6.4,5-10.8,10.7-10.8
           	C220.7,0,299.7,0,378.6-0.1c6.4,0,10.9,4.9,10.7,10.8c-0.1,6.7,0,13.3,0,20C389.3,31.3,389.3,31.9,389.3,32.5z M369.3,20.1
           	c-72.9,0-145.4,0-218.1,0c0,0.7,0,1.2,0,1.8c0,64.3,0,128.6,0,192.9c0,4.7,0.4,9.4,1.1,14.1c2.9,18.7,10.8,35,23.8,48.7
           	c18.2,19.3,40.8,29.2,67.4,29.5c11,0.2,22,0,33,0c6.5,0,13-0.6,19.3-2c21-4.5,38.4-15.1,52.1-31.6c14.4-17.4,21.4-37.6,21.4-60.2
           	c0-63.7,0-127.4,0-191.1C369.3,21.6,369.3,20.9,369.3,20.1z M389.4,64.6c30.3,5.2,51.8,29.8,53.6,59.4c0.8,13.6-2.4,26.3-9.8,37.7
           	c-10.3,16-25,25.6-43.7,29c0,5.6,0,11.2,0,16.7c34.8-3.8,68.4-33.6,70.2-76.2c2-45.8-32.9-79.2-70.3-83.3
           	C389.4,53.4,389.4,59,389.4,64.6z M389.4,80.1c0,31.7,0,63.4,0,95c18.3-3.3,38-20.5,38.5-46.5C428.5,103.1,409.8,84,389.4,80.1z"/>
        </svg>
      </div>
      <div class='drink-name'><?php echo $category[$id]->drinkName ?></div>
    </a>
    <?php
>>>>>>> 489d62239e829618e0bffc54a96e92ae495015c1
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
<<<<<<< HEAD
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
=======
  <body style="background-color:<?php echo $drink->drinkBgrColor?>">
    <div class="container">
      <div class="card-name-wrapper">
        <div class="card-name"><?php echo $drink->drinkName?></div>
        <a href="../dev/" class="menuBack-icon" data-nav="home"><?php include 'partials/menu-icon.html' ?></a>
      </div>
    </div>
    <div class="card-container">
      <div class="container">
        <div class="row">
          <div class="col-md-6 col-sm-12 col-xs-12">
            <div class="img-wrapper">
              <div class="card-img">
                <div class="card-liquid-wrapper">
                  <div class="card-liquid card-liquid--bgr"></div>
                  <?php
                  if ($drink->hasCream == true) {
                    ?>
                    <div class="card-liquid card-liquid--cream">
                      <div class='inner-cream' style='background-color:#FBF5DE'></div>
                    </div>
                    <?php
                  }
                  $ingredients = $drink->ingredients;
                    for ($i=count($ingredients); $i>-1; $i--) {
                      echo "<div class='card-liquid' style='height:".$ingredients[$i]->height."'><div class='inner-liquid' style='background-color:".$ingredients[$i]->color."'></div></div>";
                    }
                  ?>
                </div>
                <svg class="cup-img cup-img-bgr" version="1.1" id="cup-circle-bgr" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 650 650" style="enable-background:new 0 0 650 650;" xml:space="preserve">
                   <style>
                    .cup-bgr{fill:<?php echo saturate($drink->drinkBgrColor)?>;}
                   </style>
                   <?php
                   include "partials/cup_circle_bgr.html";
                   if ($drink->hasCream == true) {
                     include "partials/cream_circle.html";
                   }
                   include "partials/cup_circle.html";
                   ?>
                </svg>
              </div>
            </div>
          </div>
          <div class="col-md-6 col-sm-12 col-xs-12">
            <div class="text-wrapper">
              <div class="section-title-wrapper">
                <div class="section-title" style="color:<?php echo saturate($drink->drinkBgrColor)?>">Ingredients</div>
              </div>
              <div class="ingredients-container">
                <ul class="ingredients-list">
                  <?php
                  $ingredients = $drink->ingredients;
                    for ($i=0; $i<count($ingredients); $i++) {
                      echo "<li><div class='row'><div class='col-xs-4 col-md-2 ingredients-qty'>".$ingredients[$i]->qty."</div><div class='col-xs-8 col-md-10' style='text-transform:capitalize'>".$ingredients[$i]->ingredient."</div></div></li>";
                    }
                  ?>
                </ul>
              </div>
              <div class="section-title-wrapper">
                <div class="section-title" style="color:<?php echo saturate($drink->drinkBgrColor)?>">Steps</div>
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
              <a href="../dev/" class="menuBack-section" data-nav="home">Back to All Drinks</a>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class='modal-top'>
      <svg class='spinner' width='65px' height='65px' viewBox='0 0 66 66' xmlns='http://www.w3.org/2000/svg'>
        <circle class='path' fill='none' stroke-width='6' stroke-linecap='round' cx='33' cy='33' r='30'></circle>
      </svg>
    </div>
  </body>
  <?php
  }

if(isset($_GET['did'])){
  showDrinkDetail($data[$_GET['did']]);
  die;
}
>>>>>>> 489d62239e829618e0bffc54a96e92ae495015c1
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
<<<<<<< HEAD
=======
  <script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>
  <script src="js/coffee.js"></script>
>>>>>>> 489d62239e829618e0bffc54a96e92ae495015c1
</head>
<?php
  if(isset($_GET['id'])) {
    showDrinkDetail($data[$_GET['id']]);
  } else {
<<<<<<< HEAD
    global $categories;
    global $data;
    echo "<body style='background-color:#EDEDED'>";
=======
    ?>
    <body style='background-color:#EDEDED'>
      <div class="app-title-wrapper">
        <div class="app-title">Coffee Recipes</div>
      </div>
    <?php
>>>>>>> 489d62239e829618e0bffc54a96e92ae495015c1
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
<<<<<<< HEAD
    echo "</body>";
    }
  }
?>
=======
    }
    ?>
    <div class='modal'>
      <svg class='spinner' width='65px' height='65px' viewBox='0 0 66 66' xmlns='http://www.w3.org/2000/svg'>
        <circle class='path' fill='none' stroke-width='6' stroke-linecap='round' cx='33' cy='33' r='30'></circle>
      </svg>
    </div>
    </body>
    <?php
  }
?>
<style>
.cup-handle{fill:#CB4133;}
.cup-handle-shadow{fill:#EB6655;}
.cup-highlight{opacity:0.5;fill:#FFFFFF;}
.cup-shadow{opacity:0.2;}
.cup-shadow-dark{opacity:0.3;}
.cup-outline{fill:#613128;}
.cup-cream-svg{fill:#FBF5DE;transform-origin: bottom;transform: scale(0);animation-timing-function: cubic-bezier(.8,1);animation-fill-mode: forwards;}
.modal, .modal-top {
  position:fixed;
  bottom:-100%;
  left:0;
  width:100%;
  height:100%;
  background-color:rgba(0,0,0,0);
  display:none;
  transition:all 0.3s;
  display: flex;
  align-items: center;
  justify-content: center;
}

.modal-top {
  top: -100%;
  z-index: 1000;
}

.spinner {
 animation: rotator 1.4s linear infinite;
}

@keyframes rotator {
 0% { transform: rotate(0deg); }
 100% { transform: rotate(270deg); }
}

.path {
 stroke-dasharray: 187;
 stroke-dashoffset: 0;
 transform-origin: center;
 animation:
 dash 1.4s ease-in-out infinite,
 colors 5.6s ease-in-out infinite;
}

@keyframes colors {
 0% { stroke: #4285F4; }
 25% { stroke: #DE3E35; }
 50% { stroke: #F7C223; }
 75% { stroke: #1B9A59; }
 100% { stroke: #4285F4; }
}

@keyframes dash {
 0% { stroke-dashoffset: 187; }
 50% {
 stroke-dashoffset: 46.75;
 transform:rotate(135deg);
 }
 100% {
 stroke-dashoffset: 187;
 transform:rotate(450deg);
 }
}

</style>

>>>>>>> 489d62239e829618e0bffc54a96e92ae495015c1
</html>
