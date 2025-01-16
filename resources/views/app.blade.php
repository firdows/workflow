<!DOCTYPE html>
<html lang="end">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    {{-- <title>Dashboard</title> --}}

    @vite([
        // 'resources/sass/app.scss',
        'resources/css/app.css',
        // 'resources/js/app.js'
    ])
    @inertiaHead
    @routes
</head>

<body class="hold-transition sidebar-mini layout-fixed">
    @inertia

    @vite('resources/js/app.js')
</body>

</html>
