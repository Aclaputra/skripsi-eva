<?php

namespace App\Http\Controllers;

use App\DataTables\UsersDataTable;
//use App\Models\User;
//use Illuminate\Http\Request;

class MahasiswaController extends Controller
{
    public function index()
    {
        return view('dashboard');
    }
    public function getMahasiswa(UsersDataTable $dataTable)
    {

        return $dataTable->render('dashboard');
    }
}
