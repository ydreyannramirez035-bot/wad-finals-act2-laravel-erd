<nav style="
    background: #1f2937;
    padding: 15px 20px;
    color: white;
    display: flex;
    justify-content: space-between;
    align-items: center;
    font-family: Arial;
">

    <!-- LEFT SIDE LINKS -->
    <div style="display: flex; gap: 15px; align-items: center;">

        <a href="{{ route('dashboard') }}" style="color: white; text-decoration: none;">
            Dashboard
        </a>

        <a href="/orders" style="color: white; text-decoration: none;">
            Orders
        </a>

        <a href="/orders/create" style="color: white; text-decoration: none;">
            Create Order
        </a>

        @auth
            @if(auth()->user()->role === 'admin')
                <a href="/products" style="color: white; text-decoration: none;">
                    Products
                </a>
            @endif
        @endauth

    </div>

    <!-- RIGHT SIDE (USER SECTION) -->
    <div style="display: flex; gap: 15px; align-items: center;">

        @auth
            <span style="color: #d1d5db;">
                {{ Auth::user()->name }}
            </span>

            <a href="{{ route('profile.edit') }}" style="color: white; text-decoration: none;">
                Profile
            </a>

            <!-- Logout -->
            <form method="POST" action="{{ route('logout') }}" style="display: inline;">
                @csrf
                <button type="submit" style="
                    background: red;
                    color: white;
                    border: none;
                    padding: 6px 10px;
                    border-radius: 5px;
                    cursor: pointer;
                ">
                    Logout
                </button>
            </form>
        @endauth

        @guest
            <a href="{{ route('login') }}" style="color: white; text-decoration: none;">
                Login
            </a>

            <a href="{{ route('register') }}" style="color: white; text-decoration: none;">
                Register
            </a>
        @endguest

    </div>

</nav>