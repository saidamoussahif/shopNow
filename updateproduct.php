<?php
$product=$_GET['id'];
$query_up = $conn->prepare("SELECT * FROM `product` WHERE id_product= $product;");
$query_up->execute();
$result_up=$query_up->fetchAll();

if (isset($_POST['update'])) {
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
          $query_prd=$conn->prepare("UPDATE `product` SET `nom`='$nom',`description`='$desc',`prix`='$price',`image`='$image',`category`='$cat',`stock`='$stock' WHERE id_product= $product;");
          $query_prd->execute(); 
          header("location:http://localhost/shopnow/adminUserface.php?poduct");
}
}
?>
<div class="con">
            <div class="header">
              <h2>Edit Product</h2>
              <button>
                <i class="ri-refresh-fill" style="margin-left: 5px"></i> Your
                product
              </button>
            </div>
            <form action="" method="post" enctype="multipart/form-data">
              <div class="inputs mid">
                <div class="input">
                  <label for="Name">Name</label>
                  <input type="text" id="Name" name="Name" value="<?php echo $result_up[0]['nom']; ?>" />
                </div>
                <div class="input">
                  <label for="Stock">Stock</label>
                  <input type="text" id="Stock" name="Stock" value="<?php echo $result_up[0]['stock']; ?>" />
                </div>
              </div>
              <div class="inputs mid">
                <div class="input">
                  <label for="Price">Price</label>
                  <input type="text" id="Price" name="Price" value="<?php echo $result_up[0]['prix']; ?>" />
                </div>
                <div class="input">
                  <label for="Category">Category</label>
                  <select type="text" id="Category" name="Category">
                  <?php foreach($resultsC as $output){?>
                            <option><?php echo $output['nom'];?></option>
                  <?php }?>
                  </select>
                </div>
              </div>
              <div class="inputs mid">
                <div class="input">
                  <label for="Description">Description</label>
                  <input
                    type="text"
                    id="Description"
                    name="Description"
                    value="<?php echo $result_up[0]['description']; ?>"
                  />
                </div>
                <div class="input">
                  <label for="Image">Image</label>
                  <input type="file"  name="image" id="">
                </div>
              </div>
            
              <div class="inputs">
                <div class="input" class="submit">
                  <button type="submit" name="update">Update</button>
                </div>
              </div>
            </form>
          </div>