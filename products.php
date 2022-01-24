<div class="products">
    <div class="header">
      <h2>Products</h2>
      <button>
        <i class="ri-add-line" style="margin-left: 5px"></i> Your
        products
      </button>
    </div>
    <div class="table-con">
        <table>
          <thead>
            <tr>
              <th>Name</th>
              <th>description</th>
              <th>Category</th>
              <th>Image</th>
              <th>Stock</th>
              <th>Price</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody>
            <?php
              if (sizeof($result_prd)>0) {
                for ($i=0; $i < sizeof($result_prd); $i++) { 
                  $id = $result_prd[$i]['id_product'];
                  $name = $result_prd[$i]['nom'];
                  $desc = $result_prd[$i]['description'];
                  $price = $result_prd[$i]['prix'];
                  $image = $result_prd[$i]['image'];
                  $category = $result_prd[$i]['category'];
                  $stock = $result_prd[$i]['stock'];
                  echo"            <tr>
                  <td>
                      $name
                  </td>
                  <td>$desc</td>
                  <td>$category</td>
                  <td>
                    <img
                      src='uploads/$image'
                      alt=''
                    />
                  </td>
                  <td class='center'>$stock</td>
                  <td>$price$</td>
                  <td class='actions-ud'>
                    <a href='?poduct&update&id=$id'><i class='ri-refresh-line'></i></a>
                    <a href='delete.php?id=$id'><i class='ri-delete-bin-5-fill'></i></a>
                  </td>
                </tr>";
                }
              }
            ?>
          </tbody>
          <form action="" method="post">
            
          </form>
        </table>
        <br>
      </div>
  </div>
