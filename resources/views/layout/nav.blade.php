<div class="container">
    <header class="blog-header py-3">
        <div class="row flex-nowrap justify-content-between align-items-center">
            <div class="col-4 pt-1">
                <a class="link-secondary" href="#">Subscribe</a>
            </div>
            <div class="col-4 text-center">
                <a class="blog-header-logo text-dark" href="/">Large</a>
            </div>
            <div class="col-4 d-flex justify-content-end align-items-center">

                @guest
                    <a class="btn btn-sm btn-outline-secondary" href="/login">Log in</a>
                    <a class="btn btn-sm btn-outline-secondary" href="/register">Sign up</a>
                @else
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf

                        <x-dropdown-link :href="route('logout')"
                                         onclick="event.preventDefault();
                                                this.closest('form').submit();">
                            {{ __('Log Out') }}
                        </x-dropdown-link>
                    </form>
                @endguest

            </div>
        </div>
    </header>

    <div class="nav-scroller py-1 mb-2">
        <nav class="nav d-flex justify-content-between">
            <a class="p-2 link-secondary" href="/">Main</a>
            <a class="p-2 link-secondary" href="/about">About Us</a>
            <a class="p-2 link-secondary" href="/contact">Contact</a>
            <a class="p-2 link-secondary" href="/article/create">Created article</a>
            <a class="p-2 link-secondary" href="/admin">Admin</a>
        </nav>
    </div>
</div>
