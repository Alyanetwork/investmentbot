<!-- resources/views/admin/dashboard.blade.php -->

@extends('admin.layout')

@section('content')
    <h1>Yönetim Paneli</h1>
    <div class="stats">
        <div class="stat-box">
            <h3>Kullanıcı Sayısı</h3>
            <p>{{ $userCount }}</p>
        </div>
        <div class="stat-box">
            <h3>İşlem Sayısı</h3>
            <p>{{ $transactionCount }}</p>
        </div>
    </div>
@endsection
