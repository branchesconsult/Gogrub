<header>
    <nav class="navbar navbar-expand-lg navbar-light">
        <a class="navbar-brand" href="#">
            <img src="{!! asset('frontend/images/Symbol-1-2@2x.png') !!}" width="148" height="48"/></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse"
                data-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent"
                aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse justify-content-end" id="navbarSupportedContent">
            <ul class="navbar-nav">
                <li class="nav-item active">
                    <a class="nav-link" href="#">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">About Us</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Terms and Condition</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Privacy</a>
                </li>
            </ul>
            @if(!\Auth::check())
                <button class="btn btn-outline-success my-2 my-sm-0" data-toggle="modal" data-target="#login"
                        type="submit">
                    Login
                </button>
                <button class="btn btn-outline-success my-2 my-sm-0 active" data-toggle="modal" data-target="#signup"
                        type="submit">Signup
                </button>
                @if(\Auth::user()->confirmed == 1)
                    <button class="btn btn-outline-success my-2 my-sm-0 active" data-toggle="modal"
                            data-target="#varify"
                            type="submit">Varify
                    </button>
                @endif
            @endif
        </div>
    </nav>
</header>
<section id=""><!--Section Id Start-->