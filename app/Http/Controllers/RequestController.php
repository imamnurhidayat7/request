<?php

namespace App\Http\Controllers;
use App\Models\Layanan;
use App\Models\LayananApprover;
use App\Models\LayananField;
use App\Models\LayananMeta;
use App\Models\Request as Req;
use App\Models\Approver;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Alert;
use Illuminate\Support\Facades\DB;
use File;

class RequestController extends Controller{

    public function requestLayanan($id){
        $data['field'] = LayananField::where('layanan_id', $id)->get();
        $data['layanan'] = Layanan::find($id);
        return view('request.add')->with($data);
    } 

    public function addRequest(Request $request){
        $data = $request->all();
        //dd(request()->allFiles());
        foreach(request()->allFiles() as $row => $value){
            
            $file = uniqid().'_'.$value->getClientOriginalName();
            $value->move(public_path('/uploads'), $file);
            $data[$row] = $file;
            
        }

        $insert_req = Req::create([
            'layanan_id' => $data['id'],
            'user_id' => Session::get('id'),
            'status' => 'Menunggu Persetujuan',
        ]);

        $field = LayananField::where('layanan_id', $data['id'])->get();

        foreach($field as $row){
            LayananMeta::create([
                'nama' => $row->nama,
                'value' => $data[$row->nama],
                'request_id' => $insert_req->id
            ]);
        }

        Alert::success('Permintaan Request Berhasil!');
        return redirect('my-request');
    }

    public function showMyRequest(){
        $data['request'] = Req::where('user_id', Session::get('id'))->get();
        return view('requester.my_request')->with($data);
    }

    public function detailRequest($id){
        $data['request'] = Req::with('user')->with('layanan.fields')->with('meta')->where('id', $id)->first();
        return view('requester.request_detail')->with($data);
    }

    public function updateRequest(Request $request){
        $data = $request->all();
        //dd(request()->allFiles());
        foreach(request()->allFiles() as $row => $value){
            
            $file = uniqid().'_'.$value->getClientOriginalName();
            $value->move(public_path('/uploads'), $file);
            $data[$row] = $file;
            
        }

        $update = Req::find($data['request_id']);
        $update->fill($data);
        $update->save();

        $field = LayananField::where('layanan_id', $data['layanan_id'])->get();
        //LayananMeta::where('request_id', $data['id'])->delete();
        foreach($field as $row){
            if(isset($data[$row->nama])){
                LayananMeta::where('request_id', $data['request_id'])->where('nama', $row->nama)->update([
                    'value' => $data[$row->nama],
                ]);
            }
        }

        Alert::success('Permintaan Request Berhasil di Update!');
        return redirect('my-request');
    }

}

?>