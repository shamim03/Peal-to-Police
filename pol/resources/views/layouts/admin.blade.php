
<!doctype html>
<html class="no-js h-100" lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Peaal to police</title>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" id="main-stylesheet" data-version="1.1.0" href="css/admin_styles/shards-dashboards.1.1.0.min.css">
  </head>
  
    <div class="color-switcher-toggle animated pulse infinite">
      <i class="material-icons">settings</i>
    </div>
    <div class="container-fluid">
      <div class="row">
        <!-- Main Sidebar -->
        <aside class="main-sidebar col-12 col-md-3 col-lg-2 px-0">
          <div class="main-navbar">
            <nav class="navbar align-items-stretch navbar-light bg-white flex-md-nowrap border-bottom p-0">
              <a href="/" style="margin-left: 35px ; margin-top: 25px; font-weight: bold;">
                  <span style="color: black">Peal To</span>
                  <span style="color: #1DA1F2">&nbsp Police</span>
                </a>
                
              <a class="toggle-sidebar d-sm-inline d-md-none d-lg-none">
                <i class="material-icons">&#xE5C4;</i>
              </a>
            </nav>
          </div>
          <form action="#" class="main-sidebar__search w-100 border-right d-sm-flex d-md-none d-lg-none">
            <div class="input-group input-group-seamless ml-3">
              <div class="input-group-prepend">
                <div class="input-group-text">
                  <i class="fas fa-search"></i>
                </div>
              </div>
              <input class="navbar-search form-control" type="text" placeholder="Search for something..." aria-label="Search"> </div>
          </form>
          <div class="nav-wrapper">
            <ul class="nav flex-column">
              <li class="nav-item">
                <a class="nav-link " href="/admin">
                  <i class="material-icons">vertical_split</i>
                  <span>Users Posts</span>
                </a>
              </li>
            
              <li class="nav-item">
                <a class="nav-link " href="/user-list">
                  <i class="material-icons">table_chart</i>
                  <span> User List</span>
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link " href="/admin-profile">
                  <i class="material-icons">person</i>
                  <span>Admin Profile</span>
                </a>
              </li>

               <li class="nav-item">
                <a class="nav-link " href="/journalists">
                  <i class="material-icons">person</i>
                  <span>Journalist List</span>
                </a>
              </li>

              <li class="nav-item">
                <a class="nav-link " href="/wanted-list">
                  <i class="material-icons">person</i>
                  <span>Wanted List</span>
                </a>
              </li>

              <li class="nav-item">
                <a class="nav-link " href="/missing-list">
                  <i class="material-icons">person</i>
                  <span>Missing List</span>
                </a>
              </li>

              <li class="nav-item">
                <a class="nav-link " href="/criminal-record-admin">
                  <i class="material-icons">person</i>
                  <span>Criminal Record</span>
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link " href="/gd-admin">
                  <i class="material-icons">person</i>
                  <span>GDs</span>
                </a>
              </li>

              <li class="nav-item">
                <a class="nav-link " href="/notices-admin">
                  <i class="material-icons">table_chart</i>
                  <span> Notice</span>
                </a>
              </li>

              <!-- <li class="nav-item">
                <a class="nav-link " href="#">
                  <i class="material-icons">table_chart</i>
                  <span> Reward List</span>
                </a>
              </li>
           -->
            </ul>
          </div>
        </aside>
        <!-- End Main Sidebar -->
        <main class="main-content col-lg-10 col-md-9 col-sm-12 p-0 offset-lg-2 offset-md-3">
          <!-- / .main-navbar -->
          <div class="main-content-container container-fluid px-4">

           @yield('content')
            
  </body>
</html>