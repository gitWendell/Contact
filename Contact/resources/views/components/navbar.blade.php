<section class="navbar">
    <div class="d-flex justify-content-between w-100 align-center">
        <div>
            <h4>Contact Management</h4>
        </div>
        <div class="navbar-users">
            <span>{{session('users_name')}} | <a href="{{ route('logout') }}"> Logout </a></span>
        </div>
    </div>
</section>