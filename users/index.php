<?php
include("../assets/shared/connect.php");
include("../assets/shared/classes.php");
include("../assets/shared/post.php");

session_start(); 
session_destroy();
session_start(); 

if (isset($_GET['userID']) && !isset($_SESSION['userID'])) {
    $_SESSION['userID'] = $_GET['userID']; 
}

$userID = $_SESSION['userID'];

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../assets/css/styles.css">
    <!-- <link rel="stylesheet" href="teststyle.css"> -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <title>NowUKnow | Home</title>
</head>

<style>
    .custom-card {
        width: 100%;
        max-width: auto;
        margin: auto;
        background-color: #C9F6FF;
        border-color: white;
        border-radius: 10px;
        transition: all 0.3s ease;
    }

    .btn-primary {
        border-radius: 50px;
        border-color: transparent;
        height: 30px;
        font-size: 15px;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        font-family: "Helvetica Rounded";
        background-color: #7091E6;
        border-color: transparent;
    }


    .create-post-button {
        position: absolute;
        bottom: 50px;
        right: 260px;

    }

    @media (max-width: 1000px) {
        .left-column {
            position: fixed;
            top: 0;
            left: -250px;
            width: 250px;
            height: 100vh;
            background-color: #fff;
            box-shadow: 2px 0 5px rgba(0, 0, 0, 0.2);
            transition: left 0.3s ease;
            z-index: 1;
        }

        .middle-column {
            width: 100%;
        }

        .left-column.show {
            left: 0;
        }
    }

    .hamburger-btn {
        display: block;
        font-size: 25px;
        width: 25px;
        cursor: pointer;
        position: absolute;
        top: 15px;
        left: 15px;
        z-index: 999;
    }

    @media (min-width: 1000px) {
        .hamburger-btn {
            display: none;
        }
    }
</style>

<body>
    <div class="container">
        <div class="row">

            <!-- Hamburger Button -->
            <div class="hamburger-btn" onclick="toggleLeftColumn()">&#9776;</div>

            <!-- Left Column -->
            <div class="col-md-3 left-column">
                <div class="logo m-0">
                    <img src="../assets/icons/wordMark big.svg" alt="NowUKnow Logo" width="100" height="100">
                </div>
                <div class="sidebar">
                    <ul>
                        <li>
                            <a href="index.php?userID=<?php echo $userID; ?>"
                                style="display: flex; align-items: center; gap: 8px; text-decoration: none; color: #06080F;">
                                <i class="fa-solid fa-house nav-icon" style="font-size: 24px; color: #06080F;"></i>
                                <span class="nav-title"
                                    style="font-family: Helvetica, Arial, sans-serif; font-weight: normal; font-size: 20px;">Home</span>
                            </a>
                        </li>
                        <li>
                            <a href="users/profile.html"
                                style="display: flex; align-items: center; gap: 8px; text-decoration: none; color: #06080F;">
                                <i class="fa-solid fa-user nav-icon" style="font-size: 24px; color: #06080F;"></i>
                                <span class="nav-title"
                                    style="font-family: Helvetica, Arial, sans-serif; font-weight: normal; font-size: 20px;">Profile</span>
                            </a>
                        </li>
                        <li>
                            <a href="tags/explore.html"
                                style="display: flex; align-items: center; gap: 8px; text-decoration: none; color: #06080F;">
                                <i class="fa-solid fa-hashtag nav-icon" style="font-size: 24px; color: #06080F;"></i>
                                <span class="nav-title"
                                    style="font-family: Helvetica, Arial, sans-serif; font-weight: normal; font-size: 20px;">Tags</span>
                            </a>
                        </li>
                        <li>
                            <a href="notif.html"
                                style="display: flex; align-items: center; gap: 8px; text-decoration: none; color: #06080F;">
                                <i class="fa-solid fa-bell nav-icon" style="font-size: 24px; color: #06080F;"></i>
                                <span class="nav-title"
                                    style="font-family: Helvetica, Arial, sans-serif; font-weight: normal; font-size: 20px;">Notification</span>
                            </a>
                        </li>
                        <li>
                            <a href="bookmark.html"
                                style="display: flex; align-items: center; gap: 8px; text-decoration: none; color: #06080F">
                                <i class="fa-solid fa-bookmark nav-icon" style="font-size: 24px; color: #06080F;"></i>
                                <span class="nav-title"
                                    style="font-family: Helvetica, Arial, sans-serif; font-weight: normal; font-size: 20px;">Bookmarks</span>
                            </a>
                        </li>
                    </ul>
                </div>

                <div class="logout-container">
                    <form action="../login.php" method="POST">
                        <button type="submit" class="btn-logout">Log Out</button>
                    </form>
                    <?php
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        session_start();    
        session_unset();    
        session_destroy();  
        header("Location: login/login.php");  
         exit();
        }
?>
                </div>
            </div>

            <!-- Middle Column -->
            <div class="col-md-6 middle-column p-0">
                <div class="middle-search-bar">
                    <input type="text" class="form-control" placeholder="Search...">
                </div>
                </nav>
                <nav class="navbar navbar-expand-md navbar-light bg-light mb-3">
                    <div class="container">
                        <ul class="navbar-nav mx-auto">
                            <li class="nav-item">
                                <a class="nav-link active fw-bold" href="#">For You</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link fw-bold" href="#">Following</a>
                            </li>
                        </ul>
                    </div>
                </nav>

                <!-- Card for Post -->
                <div class="content">
                    <div class="container">
                        <?php
                        foreach ($postsList as $postItem) {
                            // function to display dynamic posts of users from the database
                            echo $postItem->createPost();
                            // function to display dynamic modal of each post of users from the database; can add or view of comments
                            echo $postItem->showModal();
                        }
                        ?>
                    </div>
                </div>
            </div>
            <div class="col-md-3 right-column d-none d-md-block">
                <div class="right-search-bar" style="margin-bottom: 15px;">
                    <input type="text" class="form-control" placeholder="Search...">
                </div>
                <div class="announcement-tab">
                    <h5 style="margin-bottom: 15px;">Announcements</h5>
                    <div class="announcement-box">
                        <div class="card ">
                            <div class="card-body">
                                <h6 class="card-title">System Update</h6>
                                <p class="card-text">This is the first announcement.</p>
                            </div>
                        </div>
                        <div class="card ">
                            <div class="card-body">
                                <h6 class="card-title">System Update</h6>
                                <p class="card-text">This is the first announcement.</p>
                            </div>
                        </div>

                        <div class="card ">
                            <div class="card-body">
                                <h6 class="card-title">System Update</h6>
                                <p class="card-text">This is the first announcement.</p>
                            </div>
                        </div>

                        <div class="card ">
                            <div class="card-body">
                                <h6 class="card-title">System Update</h6>
                                <p class="card-text">This is the first announcement.</p>
                            </div>
                        </div>
                        <div class="card ">
                            <div class="card-body">
                                <h6 class="card-title">System Update</h6>
                                <p class="card-text">This is the first announcement.</p>
                            </div>
                        </div>
                        <div class="card ">
                            <div class="card-body">
                                <h6 class="card-title">System Update</h6>
                                <p class="card-text">This is the first announcement.</p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Footer Section -->
                <footer class="footer">
                    <div class="footer-content">
                        <p class="text-center"><img src="../assets/icons/Copyright.svg" class="footer-icon" alt="icon"
                                width="20" height="20">2025 NowUKnow Corp. All Rights Reserved</p>
                        <p class="text-center">
                            <a href="terms.php" class="footer-link">Terms of Services</a> |
                            <a href="privacy.php" class="footer-link">Privacy Policy</a> |
                            <a href="about.php" class="footer-link">About</a>
                        </p>
                    </div>
                </footer>



                <!-- Create Post Button with Modal Trigger -->
                <div class="me-3">
                    <div class="create-post-button">
                        <button class="btn-create-post" data-bs-toggle="modal" data-bs-target="#exampleModal">
                            <img src="../assets/icons/edit.svg" alt="Icon" class="button-icon"> Create Post
                        </button>
                    </div>
                </div>
            </div>
            <!-- Create button for responsiveness -->
            <div class="me-3 text-center">
                <div class="create-post-button">
                    <button class="btn-create-post" data-bs-toggle="modal" data-bs-target="#exampleModal">
                        <img src="../assets/icons/edit.svg" alt="Icon" class="button-icon"> Create Post
                    </button>
                </div>
            </div>
        </div>
    </div>

    <!-- JS Post -->
    <script src="../assets/js/post.js"></script>
    <!-- JS Left column -->
    <script src="../assets/js/leftcolumn.js"></script>
    <!-- Bootstrap Script -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>
</body>

</html>