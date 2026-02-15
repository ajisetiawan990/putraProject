<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RedirectController extends Controller
{
    public function handle()
    {
        $role = strtolower(Auth::user()->role);

        $routes = [
            'admin' => 'admin.dashboard',
            'petugas' => 'petugas.dashboard',
            'masyarakat' => 'masyarakat.dashboard',
        ];

        if (isset($routes[$role])) {
            return redirect()->route($routes[$role]);
        }

        abort(403, 'Role tidak dikenali');
    }
}
