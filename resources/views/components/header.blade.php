<div class="header m-0">
    <nav class="navbar navbar-dark bg-dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="/">
                <img src="{{ asset('images/logo.ico') }}" alt="logo" width="30" height="24"> Welcome, {{ auth()->user()->name}}
            </a>
            
            <ul class="navbar-nav">
                <li class="nav-item py-auto">
                    <form style="height: 20px;" action="/logout" method="POST">
                        @csrf
                        <button class="btn btn-danger my-auto">Logout</button>
                    </form>
                </li>
            </ul>
        </div>
    </nav>
</div>