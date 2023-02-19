<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap w/ Vite</title>
    @vite(['resources/css/bootstrap.css', 'resources/css/main.css', 'resources/js/app.js', 'resources/js/bootstrap.bundle.js'])
  </head>
  <body data-bs-theme="light" class="container-fluid bg-secondary-subtle px-0">
    <div class="container-fluid bg-body py-1">
        @include('partials._navbar')

    </div>
    <div class="container-fluid bg-body border-top border-bottom border-secondary-subtle">
        <div class="container px-4 py-3">
            <h4>Dashboard</h4>
        </div>
    </div>
    <div class="container mt-5">
        <div class="card">
            <div class="card-body">
                <div class="row justify-content-between"">
                    <div class="col-sm-8">
                        <h5 class="card-title">Tpoll 1</h5>
                    </div>
                    <div class="col-sm-4">col-sm-4</div>
                </div>
                <p class="card-text">
                    <p>Status: <span class="badge text-bg-success">active</span></p>
                    <p>Tpoll info</p>
                </p>
                <button type="button" class="btn btn-outline-secondary">Edit</button>
            </div>
        </div>
    </div>
  </body>
</html>
