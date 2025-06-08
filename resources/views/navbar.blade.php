<div class="bg-orange text-white py-2">
    <div class="d-flex justify-content-between mx-5">
        <h3>
            <img src="img/pethub-logo-orange.png" alt="" class="mr-2" style="width: 32px; height: 32px;">
            Pethub Adoption
        </h3>
        <div class="d-flex justify-content-start align-items-center">
            <h5 class="mx-2">
                <a href="/">Home</a>
            </h5>
            <h5 class="mx-2">
                <a href="/animals">Animals</a>
            </h5>
            <h5 class="mx-2">
                <a href="/centre">Centers</a>
            </h5>
            @auth
            <h5><a href="{{ route('profile') }}">Profile</a></h5>
            <h4 class="mx-2"> <i class="bi bi-person-circle"></i> {{ auth()->user()->name }}
          </h4>
          <form action="/logout" method="post">
            @csrf
            <button typle="submit" class="btn btn-link">Logout</button>
        </form>
            @else
                <h5 class="mx-2">
                    <a href="/login"><i class="bi bi-box-arrow-in-right"></i> Log in</a>
                </h5>
            @endauth
        </div>
    </div>
</div>
