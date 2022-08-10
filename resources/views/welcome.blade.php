<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://kit.fontawesome.com/35749869da.js" crossorigin="anonymous"></script>
    <title>aminlabs</title>
    @vite(['resources/css/app.css','resources/js/app.js'])
</head>
<body>
    <div class="container">
        <div class="navbar">
          <div class="menu">
            <a href="/"><h3 class="logo">amin<span>labs</span></h3></a>
            <div class="hamburger-menu">
              <div class="bar"></div>
            </div>
          </div>
        </div>
  
        <div class="main-container">
          <div class="main">
            <header>
              <div class="overlay">
                <div class="inner">
                  @yield('content')
                  
                </div>
              </div>
            </header>
          </div>
  
          <div class="shadow one"></div>
          <div class="shadow two"></div>
        </div>
  
        <div class="links">
          <ul>
            <li>
              <a href="/" style="--i: 0.05s;">Home</a>
            </li>
            <li>
              <a href="/projects" style="--i: 0.1s;">Projects</a>
            </li>
            <li>
              <a href="/blog" style="--i: 0.15s;">Blog</a>
            </li>
            
            
          </ul>
        </div>
      </div>
      <script src="app.js"></script>
</body>
</html>