@include('admin.layouts.header')
@include('admin.layouts.navbar')
@include('admin.layouts.sidebar')
@include('sweetalert::alert')

<div id="layoutSidenav_content">
    <main>
    @yield('content')
</main>

@include('admin.layouts.footer')