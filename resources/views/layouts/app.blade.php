<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', 'Produtos') - {{ config('app.name') }}</title>
    <style>
        body { font-family: system-ui, sans-serif; margin: 0; background: #f5f5f5; color: #222; }
        main { max-width: 900px; margin: 2rem auto; padding: 1.5rem; background: #fff; border-radius: 6px; }
        table { width: 100%; border-collapse: collapse; }
        th, td { text-align: left; padding: .5rem; border-bottom: 1px solid #ddd; }
        label { display: block; margin-top: 1rem; font-weight: 600; }
        input, textarea { width: 100%; padding: .5rem; box-sizing: border-box; }
        .btn { display: inline-block; padding: .4rem .8rem; border: 1px solid #333; background: #fff; color: #222; border-radius: 4px; text-decoration: none; cursor: pointer; font-size: 1rem; }
        .btn-primary { background: #2563eb; border-color: #2563eb; color: #fff; }
        .btn-danger { background: #dc2626; border-color: #dc2626; color: #fff; }
        .alert { padding: .75rem; border-radius: 4px; margin-bottom: 1rem; }
        .alert-success { background: #dcfce7; }
        .error { color: #dc2626; font-size: .9rem; }
        form.inline { display: inline; }
    </style>
</head>
<body>
<main>
    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif
    @yield('content')
</main>
</body>
</html>
