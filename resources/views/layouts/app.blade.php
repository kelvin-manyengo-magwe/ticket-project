<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Ticketing system</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}"/>
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">
    <link href="bootstrap/css/bootstrap.css" rel="stylesheet"/>
    <link href="bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet"/>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/dist/js/bootstrap.min.js"></script>
    <!--Cdn datepicker bootstrap classes -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker.min.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js"></script>

    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
    <style>
      .sidebar ul {
        padding: 0;
      }
      .sidebar ul li {
        display: flex;
        align-items: center;
        margin-bottom: 10px;
      }
      .sidebar ul li i {
        margin-right: 10px;
      }
    </style>
</head>
<body style="font-size: 1.2em;">


            @guest
              <!-- <li>
                   <a href="{{ route('login') }}">
                       <i class="bi bi-box-arrow-in-right"></i>&nbsp;&nbsp;Login
                   </a>
               </li> -->

                    @yield('login.blade.php')

           @else
             <div class="container-fluid">

           <div class="sidebar">
             <h1 style="position: relative;"><i class="bi bi-person-circle"></i><i style="position: absolute; top: 10%; font-size: 3.2rem; left: 43%; color: green;" class="bi bi-dot"></i><br/>
              <!-- @if(Auth::check() && Auth::user()->name === 'Admin' )
                 <span style="font-size: 0.5em"><i class="bi bi-star"></i><i class="bi bi-star"></i><i class="bi bi-star"></i><i class="bi bi-star"></i></span>
               @endif-->

               <p>{{Auth::user()->name}}</p>
            </h1>

             <ul style="margin-left: 10px;">
                 <li><a href="/dashboard"><i class="bi bi-speedometer"></i>&nbsp&nbspDashboard</a></li>
                 <li><a href="/myticket"><i class="bi bi-person-fill-check"></i>&nbsp&nbspAssigned to me</a></li>
                 <li><a href="/tickets"><i class="bi bi-ticket-detailed"></i>&nbspManage Tickets</a></li>
                 <li><a href="#"><i class="bi bi-border-all"></i>&nbsp&nbspManage Departments</a></li>
                 <li><a href="#"><i class="bi bi-bell"></i>&nbsp&nbspNotifications</a></li>
                 <li><a href="/users"><i class="bi bi-people-fill"></i>&nbsp&nbspManage users</a></li>

               <li class="mt-3">
                   <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit(); confirm('Are you sure to Logout ?')">
                       <i class="bi bi-box-arrow-right"></i>&nbsp;&nbsp;Logout
                   </a>
                   <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                       @csrf
                   </form>
              </li>
            @endguest
        </ul>
    </div>

    <div class="main-content">
        @yield('content')
    </div>

  </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
  <script src="bootstrap/js/bootstrap.js"></script>
</body>
</html>
