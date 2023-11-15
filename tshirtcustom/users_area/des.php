<?php
include('includes/connect.php');
include('functions/common_function.php');
session_start();
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>customized tshirts</title>
    <!--bootstrap css link  -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <!-- awesome font link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- css file -->
    <link rel="stylesheet" href="style.css">
    <style>
    body{
        overflow-x:hidden;
    }
</style>
</head>
<body>
    <!-- navbar -->
    <div class="container-fluid p-0">
        <!-- first child -->
        <nav class="navbar navbar-expand-lg navbar-light bg-info">
  <img src="./images/logo-home2.png" alt="" class="logo">
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>




<nav class="navbar navbar-expand-lg navbar-dark bg-secondary ">
    <ul class="navbar-nav me-auto">
    
    <?php
    if(!isset($_SESSION['username'])){
        echo "<li class='nav-item'>
        <a class='nav-link' href=''>Welcome guest</a>
      </li>";
      }else{
        echo "<li class='nav-item'>
        <a class='nav-link' href=''>Welcome ".$_SESSION['username']."</a>
      </li>";
      }
    if(!isset($_SESSION['username'])){
        echo "<li class='nav-item'>
        <a class='nav-link' href='./users_area/user_login.php'>login</a>
      </li>";
      }else{
        echo "<li class='nav-item'>
        <a class='nav-link' href='./users_area/logout.php'>logout</a>
      </li>";
      }
      ?>
    </ul>
</nav>
<div class="bg-light">
    <h3 class="text-center">T-shirts</h3>
    <p class="text-center">customization delivered at your fingertips!!</p>
</div>
<div class="row px-1">
  <div class="col-md-10">
    <div class="row">
    
    <?php
    getproducts();
    get_unique_categories();
    ?>
    </div>
  </div>
  <div class="col-md-2  bg-secondary p-0">
    <ul class="navbar-nav me-auto text-center">
      <li class="nav-item bg-info">
        <a href="" class="nav-link text-light"><h4>Categories</h4></a>
      </li>
      <?php
      getcategories();
        ?>

    </ul>
    <!-- sidenav -->
  </div>
</div>
</div>
<?php
cart();

?>





  <div class="tshirt-designer">
    <div class="tshirt-wrapper">
      <img id="tshirt-img" src="tshirt.png" alt="T-Shirt">
      <div id="design-area">
        <?php foreach ($designElements as $element): ?>
          <?php if ($element->type === 'text'): ?>
            <div class="design-element text" style="top: <?= $element->top ?>px; left: <?= $element->left ?>px; font-size: <?= $element->fontSize ?>px; color: <?= $element->color ?>;"><?= $element->text ?></div>
          <?php endif ?>
        <?php endforeach ?>
      </div>
    </div>
    <div class="controls">
      <h2>Customize your T-Shirt</h2>
      <div class="color-picker">
        <h3>Select Color</h3>
        <div class="color-option" data-color="#FFFFFF"></div>
        <div class="color-option" data-color="#000000"></div>
        <div class="color-option" data-color="#FF0000"></div>
        <div class="color-option" data-color="#00FF00"></div>
        <div class="color-option" data-color="#0000FF"></div>
      </div>
      <div class="text-editor">
        <h3>Add Text</h3>
        <input type="text" id="text-input" placeholder="Enter Text">
        <button id="add-text-btn">Add Text</button>
      </div>
      <div class="design-editor">
        <h3>Design Editor</h3>
        <button id="undo-btn">Undo</button>
        <button id="clear-btn">Clear</button>
      </div>
      <form id="tshirt-form" method="POST">
        <input type="hidden" name="designElements" id="design-elements-input">
        <button type="submit">Buy Now</button>
      </form>
    </div>
  </div>






<!-- last child -->
<?php include("./includes/footer.php") ?>
    </div>







<!-- bootstrap js link -->
<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</body>
</html>

