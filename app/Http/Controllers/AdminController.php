<?php

namespace App\Http\Controllers;
use App\Models\Layanan;
use App\Models\LayananApprover;
use App\Models\LayananField;
use App\Models\Approver;
use App\Models\Request as Req;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Alert;
use Illuminate\Support\Facades\DB;
use File;

class AdminController extends Controller{
    
    public function dashboard(){
        return view('admin.dashboard');
    }

    public function layanan(){
        $data['layanan'] = Layanan::all();
        return view('admin.layanan.index')->with($data);
    }

    public function formLayanan(){
        $data['approver'] = Approver::all();
        return view('admin.layanan.add')->with($data);
    }

    public function editLayanan($id){
        $data['approver'] = Approver::all();
        $data['layanan_fields'] = LayananField::where('layanan_id', $id)->get();
        $data['layanan'] = Layanan::where('id', $id)->first();
        return view('admin.layanan.edit')->with($data);
    }

    public function updateLayanan(Request $request){
        $data = $request['outer-group'][0];
        //dd($data);
        $layanan = Layanan::find($data['id']);
        $layanan->fill($data);
        $layanan->save();

        $data['nama']= [];
        $data['tipe']= [];
        $data['jenis']= [];
        $data['label']= [];

        //LayananApprover::where('layanan_id', $data['id'])->update(['approver_id'=>$data['approver_id']]);
        LayananField::where('layanan_id', $data['id'])->delete();
        for($i=0; $i<count($data['inner-group']); $i++){
            array_push($data['nama'], $data['inner-group'][$i]['nama']); 
            array_push($data['tipe'], $data['inner-group'][$i]['tipe']); 
            array_push($data['jenis'], $data['inner-group'][$i]['jenis']); 
            array_push($data['label'], $data['inner-group'][$i]['label']); 
            LayananField::insert([
                'nama' => $data['inner-group'][$i]['nama'],
                'tipe'=>$data['inner-group'][$i]['tipe'],
                'jenis'=>$data['inner-group'][$i]['jenis'],
                'label'=>$data['inner-group'][$i]['label'],
                'layanan_id'=>$layanan->id
            ]);
        }

        Alert::success('Layanan berhasil diupdate!');
        return redirect('/admin/layanan');
    }

    public function uploadImage( Request $request ){
        if($request->hasFile('upload')) {
         
            //get filename with extension
            $fileNameWithExtension = $request->file('upload')->getClientOriginalName();
       
            //get filename without extension
            $fileName = pathinfo($fileNameWithExtension, PATHINFO_FILENAME);
       
            //get file extension
            $extension = $request->file('upload')->getClientOriginalExtension();
       
            //filename to store
            $fileNameToStore = $fileName.'_'.time().'.'.$extension;
       
            //Upload File
            $request->file('upload')->move(public_path('uploads'), $fileNameToStore);
             
            $CKEditorFuncNum = $request->input('CKEditorFuncNum') ? $request->input('CKEditorFuncNum') : 0;
             
            if($CKEditorFuncNum > 0){
             
                $url = asset('uploads/'.$fileNameToStore); 
                $msg = 'Image successfully uploaded'; 
                $renderHtml = "<script>window.parent.CKEDITOR.tools.callFunction($CKEditorFuncNum, '$url', '$msg')</script>";
                 
                // Render HTML output 
                @header('Content-type: text/html; charset=utf-8'); 
                echo $renderHtml;
                 
            } else {
             
                $url = asset('uploads/'.$fileNameToStore); 
                $msg = 'Image successfully uploaded'; 
                $renderHtml = "<script>window.parent.CKEDITOR.tools.callFunction($CKEditorFuncNum, '$url', '$msg')</script>";
                return response()->json([
                    'uploaded' => '1',
                    'fileName' => $fileNameToStore,
                    'url' => $url
                ]);
            }
             
        }
    }

    public function tambahLayanan(Request $request){
        $data = $request['outer-group'][0];
        //dd($data);
        $layanan = Layanan::create($data);
        if($layanan){
            // LayananApprover::create([
            //     'layanan_id' => $layanan->id,
            //     'approver_id' => $data['approver_id']
            // ]);

            $data['nama']= [];
            $data['tipe']= [];
            $data['jenis']= [];
            $data['label']= [];

            for($i=0; $i<count($data['inner-group']); $i++){
                array_push($data['nama'], $data['inner-group'][$i]['nama']); 
                array_push($data['tipe'], $data['inner-group'][$i]['tipe']); 
                array_push($data['jenis'], $data['inner-group'][$i]['jenis']); 
                array_push($data['label'], $data['inner-group'][$i]['label']); 
                LayananField::insert([
                    'nama' => $data['inner-group'][$i]['nama'],
                    'tipe'=>$data['inner-group'][$i]['tipe'],
                    'jenis'=>$data['inner-group'][$i]['jenis'],
                    'label'=>$data['inner-group'][$i]['label'],
                    'layanan_id'=>$layanan->id
                ]);
            }
        }
        return redirect('admin/layanan');
    }

    public function approver(){
        $data['approver'] = Approver::all();
        return view('admin.approver')->with($data);
    }

    public function inputApprover(Request $request){
        $data = $request->all();
        $approver = Approver::create($data);
        if($approver){
            Alert::success('Approver berhasil ditambahkan!');
        }
        return redirect('/admin/approver');
    }

    public function updateApprover(Request $request){

        $approver = Approver::find($request->id);
        $approver->fill($request->all());
        $approver->save();

        Alert::success('Data Approver berhasil diupdate!');
        return redirect('/admin/approver');
    }

    public function deleteApprover(Request $request){

        $approver = Approver::find($request->id);
        $approver->delete();

        Alert::success('Data Approver berhasil dihapus!');
        return redirect('/admin/approver');
    }

    public function showRequestList(Request $request){
        $data['request'] = Req::with('user')->with('layanan.fields')->with('meta')->get();
        return view('admin.request.index')->with($data);
    }

    public function requestDetail($id){
        $data['request'] = Req::with('user')->with('layanan.fields')->with('meta')->where('id', $id)->first();
        return view('admin.request.detail')->with($data);
    }

    public function updateRequest(Request $request){

        $data = $request->all();
        $req = Req::find($data['id']);
        $req->fill($data);
        $req->save();

        Alert::success('Status Request Berhasil Diubah');
        return redirect('admin/request/detail/'.$data['id']);

    }
}