<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Admin panel</title>
    <style>
      @import url('https://fonts.googleapis.com/css2?family=Danfo&display=swap');
      body {
        display: flex;
        flex-direction: column;
        justify-content: space-between;
        min-height: 100vh;
        background: url("https://cdn.wallpaperhub.app/cloudcache/6/9/0/e/e/f/690eefe3ba1f553e0ea527f51ee407b604b681b4.jpg") no-repeat;
        background-size: cover;
        background-position: center;
      }
      .navbar {
        background: transparent;
        backdrop-filter: blur(20px);
        /* border-bottom-left-radius: 10px;
        border-bottom-right-radius: 10px; */
      }
      .navbar-brand {
        font-family: "Danfo", serif;
        font-optical-sizing: auto;
        font-weight: 400;
        font-style: normal;
        font-variation-settings:
          "ELSH" 0;
      }

      .footer {
        /* margin-top: auto; */
        background: transparent;
        backdrop-filter: blur(20px);
        /* border-top-left-radius: 10px;
        border-top-right-radius: 10px; */
      }
      .table > :not(caption) > * > * {
        background: transparent !important;
        backdrop-filter: blur(20px) !important;
      }
      .form-control {
        background: transparent !important;
        backdrop-filter: blur(20px) !important; 
      }
      .form-select {
        background: transparent !important;
        backdrop-filter: blur(20px) !important;
      }
       .pagination .page-item .page-link{
        background: transparent !important;
        backdrop-filter: blur(20px) !important;
      }

    </style>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  </head>
  <body>
  <nav class="navbar navbar-expand-lg bg-body-dark">
    <div class="container-fluid">
      <a class="navbar-brand text-white" href="/admin/news">YANGILIKLAR</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item">
            <a class="nav-link" href="/admin/news">Yangiliklar</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="/admin/category">Kategoriyalar</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="/admin/tag">Teglar</a>
          </li>
        </ul>
        <form class="d-flex" role="search">
          <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
          <button class="btn btn-success" type="submit">Search</button>
        </form>
      </div>
    </div>
  </nav>