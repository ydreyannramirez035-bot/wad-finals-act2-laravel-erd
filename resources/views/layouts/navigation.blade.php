<nav style="
    background: #1f2937;
    padding: 15px 20px;
    color: white;
    display: flex;
    justify-content: space-between;
    align-items: center;
    font-family: Arial;
    position: relative;
    z-index: 10;
">

    <!-- LEFT SIDE -->
    <div style="display: flex; gap: 20px; align-items: center;">

        {{-- USER DASHBOARD (ONLY NON-ADMINS) --}}
        @cannot('isAdmin')
            <a href="{{ route('dashboard') }}"
                style="color: {{ request()->routeIs('dashboard') ? '#38bdf8' : 'white' }}; text-decoration: none;">
                Dashboard
            </a>
        @endcannot

        {{-- ADMIN DASHBOARD (ONLY ADMINS) --}}
        @can('isAdmin')
            <a href="{{ route('admin.dashboard') }}"
                style="color: {{ request()->routeIs('admin.dashboard') ? '#38bdf8' : 'white' }}; text-decoration: none;">
                Admin Dashboard
            </a>

            <a href="{{ route('products.index') }}"
                style="color: {{ request()->routeIs('products.*') ? '#38bdf8' : 'white' }}; text-decoration: none;">
                Products
            </a>
        @endcan

        <a href="{{ route('orders.index') }}"
            style="color: {{ request()->routeIs('orders.index') ? '#38bdf8' : 'white' }}; text-decoration: none;">
            Orders
        </a>

        <a href="{{ route('orders.create') }}"
            style="color: {{ request()->routeIs('orders.create') ? '#38bdf8' : 'white' }}; text-decoration: none;">
            New Order
        </a>

    </div>

    <!-- RIGHT SIDE -->
    <div style="display: flex; gap: 15px; align-items: center;">

        @auth
            <span style="color: #d1d5db;">
                {{ Auth::user()->name }}
            </span>

            <a href="{{ route('profile.edit') }}" style="color: white; text-decoration: none;">
                Profile
            </a>

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

    </div>

</nav>