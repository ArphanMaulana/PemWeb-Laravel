<aside class="navbar navbar-vertical navbar-expand-lg" data-bs-theme="dark">
  <div class="container-fluid">
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#sidebar-menu" aria-controls="sidebar-menu" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="sidebar-menu">
      <ul class="navbar-nav pt-lg-3">
        <li class="nav-item">
          <a class="nav-link" href="{{ route('roles.index') }}">
            <span class="nav-link-title">Peran</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{ route('users.index') }}">
            <span class="nav-link-title">Pengguna</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{ route('casts.index') }}">
            <span class="nav-link-title">Pemeran</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{ route('genres.index') }}">
            <span class="nav-link-title">Genre</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{ route('movies.index') }}">
            <span class="nav-link-title">Film</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{ route('reviews.index') }}">
            <span class="nav-link-title">Ulasan</span>
          </a>
        </li>
      </ul>
    </div>
  </div>
</aside>
