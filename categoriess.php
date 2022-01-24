<div class="products">
    <div class="header">
      <h2>categories</h2>
      <button>
        <i class="ri-add-line" style="margin-left: 5px"></i> Your
        categories
      </button>
    </div>
    <div class="table-con">
        <table>
          <thead>
            <tr>
              <th>Number</th>
              <th>Category</th>
            </tr>
          </thead>
          <tbody>
            <?php
            if (sizeof($resultsC)>0) {
              for ($i=0; $i < sizeof($resultsC); $i++) { 
                $id = $resultsC[$i]['id_category'];
                $nom = $resultsC[$i]['nom'];
                echo"            <tr>
                <td>
                    $id
                </td>
                <td>
                    $nom
                </td>
              </tr>  ";
              }
            }
            ?>         
          </tbody>
        </table>
        <br>
      </div>
  </div>
