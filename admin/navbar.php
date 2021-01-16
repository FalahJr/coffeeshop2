<nav class="navbar navbar-expand-lg navbar-light border-bottom"  style="background-color: #fdbb28;">
        <button class="btn list-dashboard" id="menu-toggle"><i class="fa fa-bars"></i></button>

        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav ml-auto mt-2 mt-lg-0">
            
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="text-transform: capitalize;">
                <i class="fa fa-user"> </i>
                <?php echo $_SESSION['username'];?>
              </a>
              <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                <a class="dropdown-item" href="profile.php?id=<?php echo $_SESSION['id']?>">View Profile</a>
                
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="../logout.php"><i class="fa fa-sign-out"></i> Log Out</a>
              </div>
            </li>
          </ul>
        </div>
      </nav>