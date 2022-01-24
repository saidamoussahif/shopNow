<?php
include('data/db.php'); 
//Products
$query = $conn->prepare("SELECT COUNT(id_product) FROM product;");
$query->execute();
$count_prd=$query->fetchColumn();
//get the products
$query_get = $conn->prepare("SELECT *FROM product;");
$query_get->execute();
$result_prd=$query_get->fetchAll();
//Add Products
if (isset($_POST['add'])) {
  $nom=$_POST['Name'];
  $cat=$_POST['Category'];
  $desc=$_POST['Description'];
  $stock=$_POST['Stock'];
  $price=$_POST['Price'];
  $image=$_FILES['image']['name'];
  if(isset($_FILES['image'])){
      $buffer_image = basename($_FILES["image"]["name"]);
          $tr_image = "uploads/" . $buffer_image;
          move_uploaded_file($_FILES["image"]["tmp_name"], $tr_image);
          $query_prd=$conn->prepare("INSERT INTO `product`(`nom`, `description`, `prix`, `image`, `category`, `stock`) VALUES ('$nom','$desc','$price','$image','$cat','$stock');");
          $query_prd->execute();  
}
}



//Categories
$queryc = $conn->prepare("SELECT COUNT(id_category) FROM category;");
$queryc->execute();
$count_ctg=$queryc->fetchColumn();
//get the categories
$queryCat=$conn->prepare("SELECT * FROM `category`;");
$queryCat->execute();
$resultsC=$queryCat->fetchAll();




//Users
$queryu = $conn->prepare("SELECT COUNT(id_employer) FROM employer;");
$queryu->execute();
$count_usr=$queryu->fetchColumn();
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="./styles/dashboard.css" />
    <link
      href="https://cdn.jsdelivr.net/npm/remixicon@2.5.0/fonts/remixicon.css"
      rel="stylesheet"
    />
    <title>Dashboard Admin section</title>
  </head>
  <body>
    <main>
      <div class="lf-sc-disp" tabindex="-1">
        <header>
          <img src="./images/logo-white.svg" />
          <h3>Moussahif Saida</h3>
          <span>Platform Admin</span>
        </header>
        <section>
          <div class="line"></div>
          <div class="container">
            <div class="nav-link active">
              <a href="adminUserface.php">
                <div class="icon">
                  <i class="ri-dashboard-line"></i>
                </div>
                <span> Dashboard </span>
              </a>
            </div>
            <div class="nav-link">
              <a href="?poduct">
                <div class="icon">
                  <i class="ri-archive-line"></i>
                </div>
                <span>Products</span>
              </a>
            </div>
            <div class="nav-link">
              <a href="?addproduct">
                <div class="icon">
                  <i class="ri-add-circle-line"></i>
                </div>
                <span>Add products</span>
              </a>
            </div>
            <div class="nav-link">
              <a href="?categorie">
                <div class="icon">
                  <i class="ri-file-copy-line"></i>
                </div>
                <span>Categories</span>
              </a>
            </div>
          </div>
        </section>
      </div>
      <section id="dashboard">
        <header>
          <div class="con">
            <h2>ShopNow Admin</h2>
          </div>
          <div class="st-TY0">
            <div
              class="nav-toggle"
              onclick="document.querySelector('.lf-sc-disp').focus()"
            >
              <i class="ri-menu-line"></i>
            </div>
            <div class="user">
              <div class="icon">
                <i class="ri-user-fill"></i>
              </div>
              <span class="email">moussahifsaida@gmail.com</span>
            </div>
            <div class="notification-section" tabindex="-1">
              <a href="logout.php" style="text-decoration:none;">
              <i class="ri-login-box-fill" style="font-size: 22px"></i>
              </a>
            </div>
          </div>
        </header>
        <div class="container">
          <div class="top-section">
            <div class="nums-dash">
              <div class="nm-8lzc">
                <div class="icon" style="background-color: #f26938">
                  <i class="ri-archive-line" style="font-size: 25px"></i>
                </div>
                <div class="stats">
                  <h3 class="num"><?php echo $count_prd;?></h3>
                  <span>Products</span>
                </div>
              </div>
              <div class="nm-8lzc">
                <div class="icon" style="background-color: #5b44f2">
                  <i class="ri-file-copy-line" style="font-size: 25px"></i>
                </div>
                <div class="stats">
                  <h3 class="num"><?php echo $count_ctg;?></h3>
                  <span>Categories</span>
                </div>
              </div>
              <div class="nm-8lzc">
                <div class="icon" style="background-color: #04d94f">
                  <i class="ri-file-user-line" style="font-size: 25px"></i>
                </div>
                <div class="stats">
                  <h3 class="num"><?php echo $count_usr;?></h3>
                  <span>Users</span>
                </div>
              </div>
            </div>
          </div>
          <?php 
        
        if(isset($_GET["update"]) && isset($_GET["poduct"])){
            require 'updateproduct.php';
        }
        elseif(isset($_GET["dashboard"])){
            require 'adminUserface.php'; 
        }elseif(isset($_GET["poduct"])){
            require 'products.php'; 
        }elseif(isset($_GET["addproduct"])){
            require 'addproduct.php'; 
        }elseif(isset($_GET["categorie"])){
            require 'categoriess.php'; 
        }else{
          return;
        }
    
    ?>
        </div>
      </section>
    </main>
  </body>
</html>
