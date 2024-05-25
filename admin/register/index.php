<? 
session_start();
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Admin panel</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <style>
      body {
        display: flex;
        align-items: center;
        justify-content: center;
        min-height: 100vh;
        min-width: 100%;
        background: url("https://cdn.wallpaperhub.app/cloudcache/6/9/0/e/e/f/690eefe3ba1f553e0ea527f51ee407b604b681b4.jpg") no-repeat;
        background-size: cover;
        background-position: center;
      }
      .card-wrapper {
        background: transparent;
        backdrop-filter: blur(20px);
        border: 2px solid rgba(255, 255, 255, .2) !important;
        border-radius: 20px;
        padding: 30px 20px;
      }
      .card-wrapper label {
        color: #fff;
      }
      .card-wrapper input::placeholder {
        opacity: 0.5;
        font-style: italic;
      }
      .btn {
        background: #5a7d1f !important;
        border: none;
        color: #fff;
      }
    </style>
  </head>
  <body>
      <div class="col-md-3 card-wrapper">
        <form method="post" action="/admin/register/registration.php">
          <div class="mb-3">
            <label for="firstname" class="form-label">Ismingizni kiriting</label>
            <input placeholder="John" type="text" class="form-control" id="firstname" name="firstname">
          </div>
          <div class="mb-3">
            <label for="lastname" class="form-label">Familiyangizni kiriting</label>
            <input placeholder="Doe" type="text" class="form-control" id="lastname" name="lastname">
          </div>
          <div class="mb-3">
            <label for="username" class="form-label">username kiriting</label>
            <input placeholder="johndoe" type="text" class="form-control" id="username" name="username">
          </div>
          <div class="mb-3">
            <label for="password" class="form-label">Parol kiriting</label>
            <input placeholder="1234" type="password" class="form-control" id="password" name="password">
          </div>
          <div class="mb-3">
            <label for="confirm_password" class="form-label">Parolni takrorlang</label>
            <input placeholder="1234" type="password" class="form-control" id="confirm_password" name="confirm_password">
          </div>
          <button type="submit" name="register" class="btn">Ro'yxatdan o'tish</button>
        </form>
    </div>
  </body>
</html>