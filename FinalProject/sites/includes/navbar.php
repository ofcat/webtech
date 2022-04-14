
<?php 
include 'user_access.php';
include '../config/db.php';

if (session_status() === PHP_SESSION_NONE) {
    session_start();
} ?>
        <nav class="navbar navbar-toggleable-sm navbar-expand-lg navbar-custom navbar-dark bg-dark" id = "nav">
            
            <button class="navbar-toggler" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto mt-2 mt-lg-0" data-parent = "#nav">
                    <li class="nav-item active">
                        <a class="nav-link" href="../sites/index.php">Hotel Palace</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="../sites/news.php">news</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="../sites/about.php">about</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="../sites/help.php">help</a>
                    </li>
                    <?php if (!isset($_SESSION["username"])) { ?>
                    <li class="nav-item">
                        <a class="nav-link" href="Registration.php">registration</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="Login.php">login</a>
                    </li>
                    <?php } if(isset($_SESSION["username"]) && getRights($_SESSION["username"], $con) >= 3) { ?>
                        <li class="nav-item">
                        <a class="nav-link" href="../sites/adminNews.php">Publish</a>
                        </li>
                        <li class="nav-item">
<<<<<<< HEAD
                        <a class="nav-link" href="../sites/user_moderation.php">Customs</a>
=======
                        <a class="nav-link" href="../sites/adminNews.php">publish</a>
                        </li>
                        <li class="nav-item">
                        <a class="nav-link" href="../sites/user_moderation.php">customs</a>
>>>>>>> 719743ee380ca3fb1b787473b76aaecd952a1e85
                    </li>
                   
                    <?php }?> 
                    <?php if (isset($_SESSION["username"])){ ?>
                        <li class="nav-item">
                        <a class="nav-link" href="../sites/userprofile.php">Profile</a>
                        </li>
                        <li class="nav-item">
                        <a class="nav-link" href="../sites/Tickets.php">Tickets</a>
                        </li>
                        <li class="nav-item">
                        <a class="nav-link" href="../config/logout.php">check-out?</a>
                    </li>
                    <?php } ?>
                   
                </ul>
            </div>
        </nav>
  
   