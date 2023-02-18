<div class="container-lg">
    <nav class="navbar navbar-expand-lg">
    <div class="container-fluid">
      <a class="navbar-brand" href="#">
        <img src="/img/DateMark-logo-small.png" alt="Logo" width="30" height="30" class="d-inline-block align-text-top">
        DateMark
      </a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNavDropdown">
        <ul class="navbar-nav">
          {{ $slot }}
        </ul>
      </div>

    </div>
  </nav>
</div>
