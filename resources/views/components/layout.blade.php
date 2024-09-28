<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
    <title>@yield('title') | Dashboard</title>

    @include('components.include')

    @stack('style')
</head>

<body>
    <div id="app">
        <div class="main-wrapper">
            <div class="navbar-bg"></div>
            @include('components.header')
            <div class="main-sidebar sidebar-style-2">
                @include('components.asside')
            </div>

            <!-- Main Content -->
            <div class="main-content">
                <section class="section">
                    <div class="section-header">
                        <h1>@yield('main')</h1>
                        <div class="section-header-breadcrumb">
                            @yield('location')
                        </div>
                    </div>

                    <div class="section-body">
                        {{ $slot }}
                    </div>
                </section>
            </div>
            @include('components.footer')
        </div>
    </div>

    @include('components.script')
    @stack('script')
</body>

</html>