<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <title>Sofie's Corner | Categories</title>
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.8.2/css/all.min.css"
      integrity="sha256-BtbhCIbtfeVWGsqxk1vOHEYXS6qcvQvLMZqjtpWUEx8="
      crossorigin="anonymous"
    />
    <link rel="shortcut icon" href="../../assets/logo/sofies_corner_logo_light.png">
    <link rel="stylesheet" href="../../css/mystyles.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
  </head>
  <body class="has-navbar-fixed-top">
    <nav class="navbar has-shadow is-fixed-top has-background-primary">
      <div class="navbar-brand">
        <!-- <a
          role="button"
          class="navbar-burger toggler"
          aria-label="menu"
          aria-expanded="false"
        >
          <span aria-hidden="true"></span>
          <span aria-hidden="true"></span>
          <span aria-hidden="true"></span>
        </a> -->

        <a href="admin_dashboard.html" class="navbar-item has-text-weight-bold has-text-white px-5">
          SOFIE'S CORNER
        </a>
        <!-- <a
          role="button"
          class="navbar-burger nav-toggler"
          aria-label="menu"
          aria-expanded="false"
        >
          <span aria-hidden="true"></span>
          <span aria-hidden="true"></span>
          <span aria-hidden="true"></span>
        </a> -->
      </div>
      <div class="navbar-menu">
        <div class="navbar-end">
          <a href="#" class="navbar-item has-text-white p-1">
            <i class="fa-solid fa-bell"></i>
          </a>
          <div class="navbar-item dropdown is-hoverable">
            <a href="#" class="has-text-white p-1">
              <span>Admin Name</span>
              <span class="icon">
                <i class="fa-solid fa-caret-down" aria-hidden="true"></i>
            </span>
            </a>
            <div class="navbar-dropdown is-right">
              <a href="#" class="navbar-item">
                Profile
              </a>
              <a href="#" class="navbar-item">Settings</a>
              <hr class="navbar-divider" />
              <a href="#" class="navbar-item">Log Out</a>
            </div>
          </div>
        </div>
      </div>
    </nav>

    <div class="columns is-variable is-0">
      <div class="column is-2 is-hidden-mobile">
        <div class="menu-container px-2">
          <div class="menu-wrapper py-3">
            <div class="menu">
              <ul class="menu-list">
                <li>
                  <a href="admin_dashboard.html" class="has-text-black">
                    <i class="fa-solid fa-gauge p-1"></i>
                    Dashboard</a>
                </li>
                <li>
                  <a href="admin_products.html" class="has-text-black">
                    <i class="fa-solid fa-bag-shopping p-1"></i>
                    Products</a>
                </li>
                <li>
                  <a href="admin_categories.php" class="is-active has-background-primary">
                    <i class="fa-solid fa-leaf p-1"></i>
                    Categories</a>
                </li>
                <li>
                  <a href="admin_clients.html" class="has-text-black">
                    <i class="fa-solid fa-users p-1"></i>
                    Clients</a>
                </li>
                <li>
                  <a href="admin_transactions.html" class="has-text-black">
                    <i class="fa-solid fa-coins p-1"></i>
                    Transactions</a>
                </li>
                <li>
                  <a href="admin_team.html" class="has-text-black">
                    <i class="fa-solid fa-user-gear p-1"></i>
                    Manage Team</a>
                </li>
              </ul>
            </div>
          </div>
        </div>
      </div>
      <div class="column">
        <div class="p-1 pt-3 mx-2">
          <div class="columns is-variable is-desktop">
            <div class="column">
              <h1 class="title has-text-primary">
                Categories
              </h1>
            </div>
            <div class="column is-2" align="right">
              <a href="create_category.php">
                <button class="button is-block is-link is-fullwidth" >
                  <span class="icon">
                    <i class="fa-solid fa-circle-plus"></i>                  
                  </span>
                  <span>Create New</span>
                </button>
              </a>
            </div>
          </div>

          <div class="level">
            <div class="level-left">
              <div class="level-item">
                <div class="field has-addons">
                  <div class="control">
                    <input class="input is-link" size="50" type="text" placeholder="Search">
                  </div>
                  <div class="control">
                    <a class="button is-link">
                      <i class="fas fa-search"></i>
                    </a>
                  </div>
                </div>
              </div>
            </div>

            <div class="level-right">
              <div class="level-item">
              <form method="GET" id='report_filter' action="<?= $_SERVER['PHP_SELF'];?>">  
                <div class="control has-icons-left">
                  <div class="select is-link">
                    <select name='sort' onchange="document.getElementById('report_filter').submit();">
                    <option selected>Sort</option>
                      <option value='ASC'>Alphabetically, A-Z</option>
                      <option value='DESC'>Alphabetically, Z-A</option>
                      <option value='ASC'>Date, new to old</option>
                      <option value='DESC'>Date, old to new</option>
                    </select>
                  </div>
                  <span class="icon is-left">
                    <i class="fa-solid fa-sort"></i>
                  </span>
                </div>
              </form>  
              </div>
            </div>
          </div>

          <div class="column">
            <table class="table is-striped is-hoverable is-fullwidth">
              <thead>
                <tr>
                  <th>No.</th>
                  <th>Category</th>
                  <th>Actions</th>                  
                </tr>
              </thead>
              <tbody>
              <?php 
                ini_set('display_errors', 0);
                require_once '../../classes/db.php';
               
                $sort = $_GET['sort'];
                $sql = "SELECT product_category_id, name from product_category order by name $sort";
                $result = $con->query($sql);

                if($result->num_rows > 0 ){
                  while($row = $result->fetch_assoc()){
                    echo "<tr>";
                    echo "<th>" .$row['product_category_id']."</th>";
                    echo "<td>".$row['name']."</td>";
                    echo"<td>";
                    echo  "<a href='' class='has-text-primary'>";
                    echo   "<span class='icon is-right'>";
                    echo      "<i class='fa-regular fa-pen-to-square'></i>";
                    echo   " </span>";
                    echo  "</a>";
                    echo " <a href='' class='has-text-danger'>";
                    echo   " <span class='icon is-right'>";
                    echo      "<i class='fa-solid fa-trash'></i>";
                    echo    "</span>";
                    echo  "</a>";
                    echo "</td>";
                    echo "</tr>";
                  }
                }
                ?>
                <!-- <tr>
                  <th>1</th>
                  <td>Succulent w/ Pots</td>
                  <td>
                    <a href="" class="has-text-primary">
                      <span class="icon is-right">
                        <i class="fa-regular fa-pen-to-square"></i>
                      </span>
                    </a>
                    <a href="" class="has-text-danger">
                      <span class="icon is-right">
                        <i class="fa-solid fa-trash"></i>
                      </span>
                    </a>
                  </td>
                </tr>
                <tr>
                  <th>2</th>
                  <td>Succulent w/o Pots</td>
                  <td>
                    <a href="" class="has-text-primary">
                      <span class="icon is-right">
                        <i class="fa-regular fa-pen-to-square"></i>
                      </span>
                    </a>
                    <a href="" class="has-text-danger">
                      <span class="icon is-right">
                        <i class="fa-solid fa-trash"></i>
                      </span>
                    </a>
                  </td>
                </tr>
                <tr>
                  <th>3</th>
                  <td>Moon Cactus</td>
                  <td>
                    <a href="" class="has-text-primary">
                      <span class="icon is-right">
                        <i class="fa-regular fa-pen-to-square"></i>
                      </span>
                    </a>
                    <a href="" class="has-text-danger">
                      <span class="icon is-right">
                        <i class="fa-solid fa-trash"></i>
                      </span>
                    </a>
                  </td>
                </tr>
                <tr>
                  <th>4</th>
                  <td>Air Plants</td>
                  <td>
                    <a href="" class="has-text-primary">
                      <span class="icon is-right">
                        <i class="fa-regular fa-pen-to-square"></i>
                      </span>
                    </a>
                    <a href="" class="has-text-danger">
                      <span class="icon is-right">
                        <i class="fa-solid fa-trash"></i>
                      </span>
                    </a>
                  </td>
                </tr>
                <tr>
                  <th>5</th>
                  <td>Hanging Plants</td>
                  <td>
                    <a href="" class="has-text-primary">
                      <span class="icon is-right">
                        <i class="fa-regular fa-pen-to-square"></i>
                      </span>
                    </a>
                    <a href="" class="has-text-danger">
                      <span class="icon is-right">
                        <i class="fa-solid fa-trash"></i>
                      </span>
                    </a>
                  </td>
                </tr>
                <tr>
                  <th>6</th>
                  <td>Pots</td>
                  <td>
                    <a href="" class="has-text-primary">
                      <span class="icon is-right">
                        <i class="fa-regular fa-pen-to-square"></i>
                      </span>
                    </a>
                    <a href="" class="has-text-danger">
                      <span class="icon is-right">
                        <i class="fa-solid fa-trash"></i>
                      </span>
                    </a>
                  </td>
                </tr> -->
              </tbody>
            </table>
          </div>
          
        </div> <!-- column container -->
      </div>
    </div>
  </body>
</html>
