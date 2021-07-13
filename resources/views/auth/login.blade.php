<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <script
      src="https://kit.fontawesome.com/64d58efce2.js"
      crossorigin="anonymous"
    ></script>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}" />
    <title>Login - Hatoy</title>
    <script src="{{ asset('js/app2.js') }}" defer></script>

  </head>
  <body>
    <div class="container">
      <div class="forms-container">
        <div class="signin-signup">
          <form method="POST" action="{{ route('loginpost') }}" aria-label="{{ __('Login') }}">
            <h2 class="title">Log in</h2>
             @csrf
            <div class="input-field">
              <i class="fas fa-user"></i>
              <input placeholder="Username" id="email" type="email" name="email" required autofocus/>
            </div>
            <div class="input-field">
              <i class="fas fa-lock"></i>
              <input id="password" type="password" name="password" required placeholder="Password" />
            </div>
            <input type="submit" value="Login" class="btn solid" />
          </form>
          
        </div>
      </div>

      <div class="panels-container">
        <div class="panel left-panel">
          <div class="content">
            <h3>SMP IT HATOY</h3>
            <p>
              Lorem ipsum, dolor sit amet consectetur adipisicing elit. Debitis,
              ex ratione. Aliquid!
            </p>
          </div>
          <img src="{{ asset('img/log.svg') }}" class="image" alt="" />
        </div>
      </div>
    </div>

    <script src="app.js"></script>
  </body>
</html>
