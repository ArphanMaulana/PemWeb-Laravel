<!DOCTYPE html>
<html lang='en'>
<head>
    <meta charset='UTF-8'>
    <meta name='viewport' content='width=device-width, initial-scale=1.0'>
    <title>@yield('title', 'Default Title')</title>
    <link href="{{ asset('dist/css/tabler.min.css') }}" rel='stylesheet'/>
</head>
<body>
<div class='page'>
    <!-- Navbar -->
    @include('partials.navbar')

    <div class='page-wrapper'>
        <!-- Page header -->
        <div class='page-header d-print-none'>
            <div class='container-xl'>
                <div class='row g-2 align-items-center'>
                    <div class='col'>
                        <h2 class='page-title'>
                            @yield('page-title', 'Default Title')
                        </h2>
                    </div>
                    <!-- Page title actions -->
                    <div class='col-auto ms-auto d-print-none'>
                        <div class='btn-list'>
                            @yield('actions')
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Page body -->
        <div class='page-body'>
            <div class='container-xl'>
                @yield('content')
            </div>
        </div>
    </div>
</div>

<script src="{{ asset('dist/js/tabler.min.js') }}" defer></script>
</body>
</html>
