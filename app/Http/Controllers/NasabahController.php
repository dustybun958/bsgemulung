<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class NasabahController extends Controller
{
    public function index()
    {
        $nasabah = User::role('nasabah')->orderBy('created_at', 'asc')->paginate(5);
        return view('admin.nasabah.index', compact('nasabah'));
    }

    public function create()
    {
        return view('admin.nasabah.create');
    }


    public function show(User $user)
    {
        return view('admin.nasabah.show', compact('user'));
    }
}
