<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>@yield('title')</title>

    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="/css/bootstrap.css"/>
    <link rel="stylesheet" href="/css/styles.css"/>
    <link rel="stylesheet" type="text/css" href="/css/bootstrapValidator.css">

  </head>

  <body>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <script src="/js/bootstrap.min.js"></script>
    <script src="/ckeditor/ckeditor.js"></script>
    <!-- Navbar -->
    <nav class="navbar navbar-default" role="navigation">
      <div class="container">

        <!-- Website Name and toggle menu -->
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse-main">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="pull-left" href="/"> 
            <img id="logo" src='/img/doge.png' alt='Dogwalk.xyz' width=30 height=30 'inline-block'/>
            <div class="navbar-brand">DogWalk.xyz</div>
          </a>
        </div>

        <div class="collapse navbar-collapse" id="navbar-collapse-main">
          <ul class="nav navbar-nav navbar-right">

            @if ( Auth::check() )

            <!-- Users Dropdown -->
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                Walks <span class="caret"></span>
              </a>
              <ul class="dropdown-menu" role="menu">
                <li> <a href="/walk/create"> Start a Walk </a></li>
                <li> <a href="/walk"> Find Walkers </a></li>
              </ul>
           </li>
            
            <!-- Users Dropdown -->
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                {{ Auth::user()->name }} <span class="caret"></span>
              </a>
              <ul class="dropdown-menu" role="menu">
                <li> <a href="/logout"> Logout </a></li>
              </ul>
           </li>

            @else
            <li>
              <a href="/login">Login</a>
            </li>
            <li>
              <a href="/user/create">Create an Account</a>
            </li>
            @endif

        </div>
      </div>
    </nav>


    <div class="body bottom_buffer">
       @yield('content')
    </div>

    <footer class="footer">
      <div class="container">
      <p>&copy; Please report bugs to <a href="mailto:collinwr@gmail.com">collinwr@gmail.com</a></p>
      </div>
    </footer>
  </body>
</html>
