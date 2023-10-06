<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Ticketing system</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet"/>

        <style>
            body {
              font-family: Arial, sans-serif;
              display: flex;
              jus
            }
        </style>
    </head>
    <body>
          <div class="container">
              <div class="tabs">
                  <div class="tab active" id="loginTab">Login</div>
                  <div class="tab" id="registerTab">Register</div>
              </div>
              <div class="form" id="loginForm">
                  <h2>Login form</h2>
              </div>
              <div class="form hidden" id="registerForm">
                  <h2>Register form</h2>
              </div>
          </div>
    </body>
</html>
