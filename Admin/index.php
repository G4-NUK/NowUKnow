<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet" />
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
  <link rel="stylesheet" href="../assets/css/admin.css">
  <title>NowUKnow</title>
</head>
<style>
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

    .logo {
      margin-left: 30px;
    }

    .nav-title {
      margin-left: 35px;
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
      <div class="hamburger-btn" onclick="document.querySelector('.left-column').classList.toggle('show')">&#9776;</div>

      <!-- Left Column (Sidebar) -->
      <div class="col-md-3 left-column">
        <div class="logo">
          <img src="../assets/icons/wordMark big.svg" alt="NowUKnow Logo" width="100" height="100" />
        </div>
        <div class="sidebar">
          <ul>
            <li><a href="adminDashBoard.html"><span class="nav-title">Dashboard</span></a></li>
            <li><a href="userManager.html"><span class="nav-title">User Manager</span></a></li>
            <li><a href="userList.html"><span class="nav-title">User List</span></a></li>
          </ul>
        </div>
        <div class="logout-container">
          <button class="btn-logout">Log Out</button>
        </div>
      </div>

      <!-- Right -->
      <div class="col-md-9 right-column">
        <nav class="custom-navbar">
          <div class="container-fluid d-flex align-items-center justify-content-between">
            <span class="nav-title">Dashboard</span>
          </div>
        </nav>

        <div class="container py-4">
          <div class="row g-4 justify-content-center">
            <div class="col-lg-3 col-md-6 col-sm-12">
              <div class="cardTop redCard">
                <h3 class="cardTitle">No. of Users</h3>
                <div class="cardDivider"></div>
                <h1 class="cardNumber">00</h1>
              </div>
            </div>

            <div class="col-lg-3 col-md-6 col-sm-12">
              <div class="cardTop goldCard">
                <h3 class="cardTitle">No. of Posts</h3>
                <div class="cardDivider"></div>
                <h1 class="cardNumber">00</h1>
              </div>
            </div>

            <div class="col-lg-3 col-md-6 col-sm-12">
              <div class="cardTop blueCard">
                <h3 class="cardTitle">No. of Tags</h3>
                <div class="cardDivider"></div>
                <h1 class="cardNumber">00</h1>
              </div>
            </div>

            <div class="col-lg-3 col-md-6 col-sm-12">
              <div class="cardTop greenCard">
                <h3 class="cardTitle">No. of Daily Visits/Clicks</h3>
                <div class="cardDivider"></div>
                <h1 class="cardNumber">00</h1>
              </div>
            </div>
          </div>
        </div>

        <!-- Daily Active Users -->
        <div class="dailyActiveUserContainer pt-0">
          <div class="dailyRow">
            <div class="col-12">
              <div class="dailyCard">
                <div class="card-body" style="height:320px;">
                  <div class="dailyCardTitle">
                    <h3>Daily Active Users</h3>
                  </div>
                  <div class="divider"></div>
                  <div class="dailyCardText">
                    <canvas id="dailyActiveUsers" style="width: 100%; height: auto; margin-left: 10px;"></canvas>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>

        <!-- Ranking of Tags and Users -->
        <div class="rankingContainer">
          <div class="row">

            <!-- Ranking of Tags -->
            <div class="col-lg-6 col-md-6 col-12">
              <div class="rtCard">
                <div class="rtCardBody">
                  <div class="rtCardTitle">
                    <h3>Ranking of Tags</h3>
                  </div>
                  <div class="divider"></div>
                  <div class="rtCardText">
                    <canvas id="rankingTags"
                      style="display: block; box-sizing: border-box; height: 200px; width: 300px;"></canvas>
                  </div>
                </div>
              </div>

            </div>

             <!-- Ranking of Users -->
             <div class="col-lg-6 col-md-6 col-12">
              <div class="ruCard">
                <div class="ruCardBody">
                  <div class="ruCardTitle">
                    <h3>Ranking of Users</h3>
                  </div>
                  <div class="divider"></div>
                  <div class="ruCardText">
                    <table class="ranking-table">
                      <thead>
                        <tr>
                          <th>Rank</th>
                          <th>Username</th>
                          <th>Full Name</th>
                          <th>Average Ratings</th>
                        </tr>
                      </thead>
                      <tbody>
                        <tr>
                          <td>1</td>
                          <td>user123</td>
                          <td>John Doe</td>
                          <td>4.8</td>
                        </tr>
                        <tr>
                          <td>2</td>
                          <td>user456</td>
                          <td>Jane Smith</td>
                          <td>4.6</td>
                        </tr>
                        <tr>
                          <td>1</td>
                          <td>user123</td>
                          <td>John Doe</td>
                          <td>4.8</td>
                        </tr>
                        <tr>
                          <td>2</td>
                          <td>user456</td>
                          <td>Jane Smith</td>
                          <td>4.6</td>
                        </tr>

                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>


    <!--Create Post Button-->
    <div class="me-3">
      <div class="create-post-button">
        <button class="btn-create-post" data-bs-toggle="modal" data-bs-target="#exampleModal">
          <i class="fa-solid fa-plus"></i>      
        </button>
      </div>
    </div>
  </div>

  <!-- modal create post -->
  <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content" style="background-color: #C9F6FF;">
        <div class="modal-header">
          <div class="card-header d-flex align-items-center p-1" style="border-color:white">
            <div>
              <h6 class="mb-0 profile-text">Announcement</h6>
            </div>
          </div>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <div class="title-text form-floating mb-5 p-0">
            <input type="text" class="form-control" style="background-color: #C9F6FF; border-color: #C9F6FF;"
              id="floatingInput" placeholder="Title">
            <label for="floatingInput">Title</label>
          </div>
          <div class="body-text form-floating mb-4 p-0" style="height: auto; max-height: 500px;">
            <textarea class="form-control" style="height: 100px; text-align: start; background-color: #67D2E8;"
              id="floatingInput" placeholder="Write Something..."></textarea>
            <label for="floatingInput">Description...</label>
          </div>
          <div class="modal-footer">
            <button type="submit" class="btn btn-primary" style="background-color: #67D2E8;"
              onclick="window.location.href='adminDashBoard.html'">Post</button>
          </div>
        </div>
      </div>
    </div>

    <!-- Bootstrap and Chart.js -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="../assets/js/chart.js"></script>
    <!-- JS Left column -->
    <script src="../assets/js/leftcolumn.js"></script>
</body>

</html>