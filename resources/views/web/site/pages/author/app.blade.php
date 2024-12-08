@include('web.site.pages.author.layout.head')

<body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">

        <!-- Preloader -->
        @include('web.site.pages.author.layout.nav')
        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            @include('web.site.pages.author.layout.header')

            <!-- Main content -->
            @yield('content')
            <!-- /.content -->
        </div>
        @include('web.site.pages.author.layout.footer')
    </div>
    <!-- ./wrapper -->

    @include('web.site.pages.author.layout.scripts')
</body>

</html>