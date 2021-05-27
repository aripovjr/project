<nav class="col-md-2 d-none d-md-block bg-light sidebar">
          <div class="sidebar-sticky">
            <ul class="nav flex-column">
              <li class="nav-item">
                <a class="nav-link active" href="index.php">
                  <span data-feather="home"></span>
                  Dashboard <span class="sr-only">(current)</span>
                </a>
              </li>
			  <li class="nav-item">
                <a class="nav-link" href="posts.php">
                  <span data-feather="file"></span>
                  View posts
                </a>
              </li>
              <?php 
			  if(isset($_SESSION['author_role'])){
				  if($_SESSION['author_role']=="admin"){
					  ?>
					  
					  <!--ONLY ADMIN LINKS HERE-->
				<li class="nav-item">
                <a class="nav-link" href="category.php">
                  <span data-feather="file"></span>
                  View categories
                </a>
				</li>
				<li class="nav-item">
                <a class="nav-link" href="page.php">
                  <span data-feather="file"></span>
                  View pages
                </a>
				</li>
				<li class="nav-item">
                <a class="nav-link" href="settings.php">
                  <span data-feather="file"></span>
                  Settings
                </a>
				</li>
					  <?php
				  }
			  }
			  ?>
            </ul>

            
          </div>
        </nav>