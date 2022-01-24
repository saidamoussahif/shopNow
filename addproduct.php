<div class="con">
            <div class="header">
              <h2>Add Product</h2>
              <button>
                <i class="ri-refresh-fill" style="margin-left: 5px"></i> Your
                product
              </button>
            </div>
            <form action="upload.php" method="post" enctype="multipart/form-data">
              <div class="inputs mid">
                <div class="input">
                  <label for="Name">Name</label>
                  <input type="text" id="Name" name="Name" placeholder="Name" />
                </div>
                <div class="input">
                  <label for="Stock">Stock</label>
                  <input type="text" id="Stock" name="Stock" placeholder="Stock" />
                </div>
              </div>
              <div class="inputs mid">
                <div class="input">
                  <label for="Price">Price</label>
                  <input type="text" id="Price" name="Price" placeholder="Price" />
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
                    placeholder="Description"
                  />
                </div>
                <div class="input">
                  <label for="Image">Image</label>
                  <input type="file" accept="image/*" name="image" id="">
                </div>
              </div>
            
              <div class="inputs">
                <div class="input" class="submit">
                  <button type="submit" name="add">Submit</button>
                </div>
              </div>
            </form>
          </div>