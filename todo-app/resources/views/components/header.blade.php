<header class="bg-blue-500 text-white p-4">
    <h1 class="text-2xl font-bold">{{ $slot }}</h1>
    <nav>
        <ul class="flex space-x-4">
            @guest
                <li><a href="{{ route('login') }}" class="hover:underline">Login</a></li>
                <li><a href="{{ route('register') }}" class="hover:underline">Register</a></li>
            @endguest

            @auth
            <li><a href="{{ url('/') }}" class="hover:underline">Home</a></li>
            <li><a href="{{ url('/about') }}" class="hover:underline">About</a></li>
            <li><a href="{{ route('profile') }}" class="hover:underline">Profile</a></li>
                <li>
                    <form action="{{ route('logout') }}" method="post">
                        @csrf
                        <button type="submit" class="hover:underline">Logout</button>
                    </form>
                </li>
            @endauth
        </ul>
    </nav>
</header>