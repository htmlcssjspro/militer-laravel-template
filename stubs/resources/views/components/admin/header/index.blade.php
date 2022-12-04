<x-layout.header block="admin-header" flex>
    <x-link href="{{ route('admin.dashboard') }}" class="" value="Dashboard" />
    <div>Hello, {{ auth('admin')->user()->name }}!</div>
    <x-link href="{{ route('admin.logout') }}" class="btn btn_main" value="Logout" />
</x-layout.header>
