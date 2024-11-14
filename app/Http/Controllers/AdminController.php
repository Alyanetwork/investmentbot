<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Transaction;

class AdminController extends Controller
{
    public function dashboard()
    {
        $userCount = User::count();
        $transactionCount = Transaction::count();

        return view('admin.dashboard', compact('userCount', 'transactionCount'));
    }

    public function users()
    {
        $users = User::all();
        return view('admin.users', compact('users'));
    }

    public function strategies()
    {
        // Strateji listesi ve yönetimi
    }

    public function notifications()
    {
        // Bildirim ayarları yönetimi
    }

    public function settings()
    {
        // Genel ayarlar ve güvenlik yönetimi
    }
}
?>
