<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ config('app.name', 'My Accounting System') }}</title>

    {{-- Tailwind CDN --}}
    <script src="https://cdn.tailwindcss.com"></script>

    {{-- Lucide Icons --}}
    <script src="https://unpkg.com/lucide@latest"></script>

    <style>
        .sidebar-collapsed { width: 80px; }
        .sidebar-expanded { width: 260px; }
    </style>

    @stack('styles')
</head>

<body class="bg-gray-100">

<div class="flex min-h-screen">

    {{-- SIDEBAR --}}
    <aside id="sidebar"
        class="sidebar-expanded bg-white shadow-xl border-r transition-all duration-300 flex flex-col fixed lg:static inset-y-0 left-0 z-50 lg:z-auto lg:translate-x-0 -translate-x-full">

        {{-- LOGO + TOGGLE --}}
        <div class="flex items-center justify-between p-4 border-b">
            <h1 id="logoText" class="text-xl font-bold transition-all duration-300">
                {{ config('app.name', 'My Accounting') }}
            </h1>

            <button onclick="toggleSidebar()" class="p-2 hover:bg-gray-200 rounded hidden lg:block">
                <i data-lucide="menu"></i>
            </button>
        </div>

        {{-- MENU --}}
        <nav class="flex-1 overflow-y-auto">
            <ul class="px-3 py-4 space-y-2">

                <li>
                    <a href="{{ route('dashboard') }}"
                       class="flex items-center gap-4 px-4 py-2 rounded-lg hover:bg-gray-100 group">
                        <i data-lucide="layout-dashboard"></i>
                        <span class="sidebar-text font-medium">Dashboard</span>
                    </a>
                </li>

                <li>
                    <a href="{{ route('accounts.index') }}"
                       class="flex items-center gap-4 px-4 py-2 rounded-lg hover:bg-gray-100 group">
                        <i data-lucide="users"></i>
                        <span class="sidebar-text font-medium">Accounts</span>
                    </a>
                </li>
                <li>
                    <a href="#"
                       class="flex items-center gap-4 px-4 py-2 rounded-lg hover:bg-gray-100 group">
                        <i data-lucide="users"></i>
                        <span class="sidebar-text font-medium">Contacts</span>
                    </a>
                </li>

                <li>
                    <a href="#"
                       class="flex items-center gap-4 px-4 py-2 rounded-lg hover:bg-gray-100 group">
                        <i data-lucide="package"></i>
                        <span class="sidebar-text font-medium">Products</span>
                    </a>
                </li>

                <li>
                    <a href="#"
                       class="flex items-center gap-4 px-4 py-2 rounded-lg hover:bg-gray-100 group">
                        <i data-lucide="shopping-cart"></i>
                        <span class="sidebar-text font-medium">Sales</span>
                    </a>
                </li>

                <li>
                    <a href="#"
                       class="flex items-center gap-4 px-4 py-2 rounded-lg hover:bg-gray-100 group">
                        <i data-lucide="receipt"></i>
                        <span class="sidebar-text font-medium">Purchases</span>
                    </a>
                </li>

                <li>
                    <a href="#"
                       class="flex items-center gap-4 px-4 py-2 rounded-lg hover:bg-gray-100 group">
                        <i data-lucide="file-text"></i>
                        <span class="sidebar-text font-medium">Reports</span>
                    </a>
                </li>

            </ul>
        </nav>
    </aside>


    {{-- MAIN CONTENT --}}
    <div class="flex-1 flex flex-col lg:ml-0 ml-0">

        {{-- TOPBAR --}}
        <header class="flex items-center justify-between px-6 py-4 bg-white shadow-sm border-b">

            {{-- Mobile Sidebar Button --}}
            <button onclick="mobileSidebar()" class="lg:hidden p-2 hover:bg-gray-200 rounded">
                <i data-lucide="menu"></i>
            </button>

            <h2 class="text-xl font-semibold">@yield('title', 'Dashboard')</h2>

            <div class="flex items-center gap-4">
                <i data-lucide="bell" class="text-gray-600"></i>
                <img src="https://i.pravatar.cc/40" class="w-10 h-10 rounded-full" />
            </div>
        </header>

        {{-- PAGE CONTENT --}}
        <main class="p-6">
            @yield('content')
        </main>

    </div>

</div>

{{-- SCRIPTS --}}
<script>
    function toggleSidebar() {
        const sidebar = document.getElementById('sidebar');
        const texts = document.querySelectorAll('.sidebar-text');
        const logo = document.getElementById('logoText');

        sidebar.classList.toggle('sidebar-collapsed');
        sidebar.classList.toggle('sidebar-expanded');

        if (sidebar.classList.contains('sidebar-collapsed')) {
            texts.forEach(t => t.classList.add('hidden'));
            logo.classList.add('hidden');
        } else {
            texts.forEach(t => t.classList.remove('hidden'));
            logo.classList.remove('hidden');
        }
    }

    function mobileSidebar() {
        const sidebar = document.getElementById('sidebar');
        sidebar.classList.toggle('-translate-x-full');
    }

    lucide.createIcons();
</script>

@stack('scripts')
</body>
</html>
