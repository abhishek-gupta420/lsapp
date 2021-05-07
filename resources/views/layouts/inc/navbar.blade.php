{{-- 
  
  <nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container-fluid">
      <a class="navbar-brand" href="/">{{config('app.name','lsapp')}}</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNavDropdown">
        <ul class="navbar-nav">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="/">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="/about">About Us</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="/services">Services</a>
          </li>
         
            </ul>
          </li>
        </ul>
      </div>
    </div>
  </nav> --}}
 
<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>                        
      </button>
      <a class="navbar-brand" href="/">{{config('app.name','lsapp')}}</a>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav">
      
        <li class="active"><a href="/">Home</a></li>
        {{-- <li class="dropdown">
          <a class="dropdown-toggle" data-toggle="dropdown" href="#">Page 1 <span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="#">Page 1-1</a></li>
            <li><a href="#">Page 1-2</a></li>
            <li><a href="#">Page 1-3</a></li>
          </ul>
        </li> --}}
        <li><a href="/about">About Us</a></li>
        <li><a href="/services">Services</a></li>
        <li><a href="/posts">Blog</a></li>
        <li><a href="/posts/create">Create Post</a></li>
      </ul>
      <ul class="nav navbar-nav pull-right">
        @auth
            <li><a href="https://www.instagram.com/abubhaiengineer/" target="blank">{{auth()->user()->name}}</a></li>
            <li><a href="/dashboard">Dashboard</a></li>
            <li>
              <form action="/logout" method="POST">
              @csrf 
              <input type="submit" value="Logout" class="btn btn-danger" style="margin-top: 10px">
            </form>
          </li>
            
         
        @endauth
        @guest
            <li><a href="/login">Login</a></li>
            <li><a href="/register">Register</a></li>

        @endguest
      </ul>
      {{-- <ul class="nav navbar-nav navbar-right">
        <li><a href="#"><span class="glyphicon glyphicon-user"></span> Sign Up</a></li>
        <li><a href="#"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
      </ul> --}}
    </div>
  </div>
</nav>
