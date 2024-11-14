<!-- resources/views/admin/layout.blade.php -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Yönetim Paneli</title>
    <link rel="stylesheet" href="{{ asset('css/admin.css') }}">
</head>
<body>
    <div id="app">
        <nav class="sidebar">
            <ul>
                <li><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                <li><a href="{{ route('admin.users') }}">Kullanıcılar</a></li>
                <li><a href="{{ route('admin.strategies') }}">Stratejiler</a></li>
                <li><a href="{{ route('admin.notifications') }}">Bildirimler</a></li>
                <li><a href="{{ route('admin.settings') }}">Ayarlar</a></li>
            </ul>
        </nav>
        <main class="content">
            @yield('content')
        </main>
    </div>
</body>
</html>
