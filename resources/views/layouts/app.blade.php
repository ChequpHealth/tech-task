<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Tech task</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        html, body {
            height: 100%;
        }

        a {
            text-decoration: none;
        }

        .content form {
            width:600px;
        }
    </style>
</head>
<body>
    <div class="d-flex justify-content-between align-items-center py-4 px-3">
        <h1>@yield('title')</h1>
        <div class="actions d-flex gap-2">
            @yield('actions')
        </div>
    </div>
    <div class="px-4 content">
        @if ($errors->any() || session('success') || session('error') || session('warning') || session('info'))
            <div class="alerts-container">
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <strong>Please fix the following errors:</strong>
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                @foreach (['success', 'error', 'warning', 'info'] as $msg)
                    @if(session($msg))
                        <div class="alert alert-{{ $msg }}">
                            {{ session($msg) }}
                        </div>
                    @endif
                @endforeach
            </div>
        @endif

        @yield('content')
    </div>
</body>
</html>
