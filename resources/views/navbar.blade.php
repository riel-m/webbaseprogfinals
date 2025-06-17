<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <title>Pethub Navbar</title>
  <meta name="viewport" content="width=device-width, initial-scale=1" />

  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" />
  <!-- Bootstrap Icons -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet" />
  <!-- Alpine.js -->
  <script src="https://unpkg.com/alpinejs" defer></script>

  <style>
    [x-cloak] { display: none !important; }
    .bg-orange {
      background-color: #fd7e14 !important; /* Bootstrap's orange */
    }
  </style>
</head>
<body>
  <nav class="navbar navbar-expand-md navbar-dark bg-orange shadow" x-data="{ profileOpen: false }" @keydown.escape="profileOpen = false">
    <div class="container-fluid">
      <a class="navbar-brand fw-bold" href="/">Pethub Adoption</a>

      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#mainNav">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse justify-content-end pe-3" id="mainNav">
        <ul class="navbar-nav d-flex align-items-center">
          <li class="nav-item me-3">
            <a href="/" class="nav-link {{ request()->is('/') ? 'active' : '' }}">
              <i class="bi bi-house-door-fill me-1"></i> Home
            </a>
          </li>
          <li class="nav-item me-3">
            <a href="/animals" class="nav-link {{ request()->is('animals*') ? 'active' : '' }}">
              <i class="bi bi-heart-fill me-1"></i> Animals
            </a>
          </li>
          <li class="nav-item me-3">
            <a href="/centre" class="nav-link {{ request()->is('centre*') ? 'active' : '' }}">
              <i class="bi bi-geo-alt-fill me-1"></i> Centers
            </a>
          </li>

          @auth
          <li class="nav-item dropdown" x-data="{ open: false }" @click.outside="open = false">
            <a href="#" class="nav-link d-flex align-items-center" @click.prevent="open = !open">
              <i class="bi bi-person-circle me-2"></i> {{ auth()->user()->name }}
              <i class="bi bi-caret-down ms-1"></i>
            </a>
            <ul
              x-show="open"
              x-transition
              x-cloak
              class="dropdown-menu dropdown-menu-end mt-2 show"
              style="position: absolute;"
            >
              <li>
                <a class="dropdown-item" href="{{ route('profile') }}">
                  <i class="bi bi-person me-2"></i>My Profile
                </a>
              </li>
              <li><hr class="dropdown-divider" /></li>
              <li>
                <form method="POST" action="/logout" class="m-0">
                  @csrf
                  <button type="submit" class="dropdown-item">
                    <i class="bi bi-box-arrow-right me-2"></i>Sign Out
                  </button>
                </form>
              </li>
            </ul>
          </li>
          @else
          <li class="nav-item">
            <a href="/login" class="nav-link d-flex align-items-center">
              <i class="bi bi-box-arrow-in-right me-2"></i> Sign In
            </a>
          </li>
          @endauth
        </ul>
      </div>
    </div>
  </nav>

  <!-- Bootstrap JS (for toggler support) -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

<!-- <div class="bg-orange text-white py-2"> -->
<!--     <div class="d-flex justify-content-between mx-5"> -->
<!--         <h3> -->
<!--             <img src="img/pethub-logo-orange.png" alt="" class="mr-2" style="width: 32px; height: 32px;"> -->
<!--             Pethub Adoption -->
<!--         </h3> -->
<!--         <div class="d-flex justify-content-start align-items-center"> -->
<!--             <h5 class="mx-2"> -->
<!--                 <a href="/">Home</a> -->
<!--             </h5> -->
<!--             <h5 class="mx-2"> -->
<!--                 <a href="/animals">Animals</a> -->
<!--             </h5> -->
<!--             <h5 class="mx-2"> -->
<!--                 <a href="/centre">Centers</a> -->
<!--             </h5> -->
<!--             @auth -->
<!--             <h5><a href="{{ route('profile') }}">Profile</a></h5> -->
<!--             <h4 class="mx-2"> <i class="bi bi-person-circle"></i> {{ auth()->user()->name }} -->
<!--           </h4> -->
<!--           <form action="/logout" method="post"> -->
<!--             @csrf -->
<!--             <button typle="submit" class="btn btn-link">Logout</button> -->
<!--         </form> -->
<!--             @else -->
<!--                 <h5 class="mx-2"> -->
<!--                     <a href="/login"><i class="bi bi-box-arrow-in-right"></i> Log in</a> -->
<!--                 </h5> -->
<!--             @endauth -->
<!--         </div> -->
<!--     </div> -->
<!-- </div> -->
