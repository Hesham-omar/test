
  <head>


    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous">

    <!-- Custom styles for this template -->
  </head>
  <style>
    .sidenav {
      width: 250px;
      position: fixed;
      z-index: 1;
      top: 140px;
      right: 50px;
      background: #eee;
      overflow-x: hidden;
      padding: 8px 0;
    }

    .sidenav a {
      padding: 6px 8px 6px 16px;
      text-decoration: none;
      font-size: 20px;
      color: #2196F3;
      display: block;
    }

    .sidenav a:hover {
      color: #064579;
    }

    .main {
      margin-top: 50px;
      width: 800px;
      margin-left: 0px; /* Same width as the sidebar + left position in px */
       /* Increased text to enable scrolling */
      padding: 0px 10px;
    }

    @media screen and (max-height: 450px) {
      .sidenav {padding-top: 15px;}
      .sidenav a {font-size: 18px;}
    }

    .footer {
      position: absolute;
      right: 0;
      bottom: 0;
      left: 0;
      padding: 1rem;
      background-color: #efefef;
      text-align: center;
    }
  </style>

  <body>
    @include('layouts.nav')

    @if( $message = session('message') )
      <div id="flash" class="alert alert-success" role="alert">
        {{ $message }}
      </div>
    @endif



        @include('layouts.sidebar')


    <div class="container">
        <div class="main ">
            @yield('content')
        </div>
    </div>


        @include('layouts.errors')
    <div class="footer">
        @include('layouts.footer')
    </div>
</body>
