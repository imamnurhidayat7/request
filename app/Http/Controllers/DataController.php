<?php

namespace App\Http\Controllers;
use App\Models\Layanan;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Alert;
use Illuminate\Support\Facades\DB;
use File;
use Laravel\Socialite\Facades\Socialite;

class DataController extends Controller
{

    public function home(){
        $data['layanan'] = Layanan::where('status', 1)->get();
        return view('frontpage.home')->with($data);
    }

    public function showDetailLayanan($id){
        $data['layanan'] = Layanan::find($id);
        return view('frontpage.detail_layanan')->with($data);
    }

    

}