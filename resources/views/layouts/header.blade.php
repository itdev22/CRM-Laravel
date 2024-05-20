@if (!request()->is('login*'))
<header>
    <div class="navbar bg-base-100">
        <div class="flex-1">
            <a href="/" class="btn btn-ghost text-xl">CRMAPP</a>
        </div>
        <div class="flex-none">
            <ul class="menu menu-horizontal px-1">
                <li>
                    <a href="/">Dashboard</a>
                </li>
                <li>
                    <a href="/admin/sales">Sales</a>
                </li>
                <li>
                    <a href="/admin/customer">Customer</a>
                </li>
                <li>
                    <a href="/admin/product">Product</a>
                </li>
                <li>
                    <a href="/admin/transaction">Transaction</a>
                </li>
            </ul>
            <div class="dropdown dropdown-end">
                <div tabindex="0" role="button" class="btn btn-ghost btn-circle avatar">
                    <div class="w-10 rounded-full">
                        <img alt="Tailwind CSS Navbar component"
                            src="https://img.daisyui.com/images/stock/photo-1534528741775-53994a69daeb.jpg" />
                    </div>
                </div>
                <ul tabindex="0"
                    class="menu menu-sm dropdown-content mt-3 z-[1] p-2 shadow bg-base-100 rounded-box w-52">
                    <li>
                        <a class="justify-between">
                            Profile
                            {{-- <span class="badge">New</span> --}}
                        </a>
                    </li>
                    <li><a>Settings</a></li>
                    <li><a class="bg-error">Logout</a></li>
                </ul>
            </div>
        </div>
    </div>
</header>
@endif
