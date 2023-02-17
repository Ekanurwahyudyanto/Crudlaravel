<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use Illuminate\Http\Request;
use PDF;

class EmployeeController extends Controller
{
    public function index(Request $request){

        if($request->has('search')){
            $data = Employee::where('nama','LIKE','%' .$request->search.'%')->paginate(5);
        }else{
            $data = Employee::paginate(5);
        }

        return view('datapegawai',compact('data'));
        
    }
    public function tambahpegawai(){
        return view('tambahdata');
    }

    public function insertdata(Request $request){     
        //dd($request->all());
        $this->validate($request,[
                'nama' => 'required|min:7|max:30',
                'notelpon' => 'required|min:11|max:12',
        ]);
        
        $data = Employee::create($request->all());
        if($request->hasFile('foto')){
            $request->file('foto')->move('fotopegawai/', $request->file('foto')->getClientOriginalName());
            $data->foto = $request->file('foto')->getClientOriginalName();
            $data->save();
        }
        return redirect()->route('pegawai')->with('success','Data Berhasil Di Tambahkan');
    }

    public function tampilkandata($id){
        
        $data = Employee::find($id);
        //dd($data);
        return view('tampildata', compact('data'));
    }

    public function updatedata(Request $request, $id){
        $data = Employee::find($id);
        $data->update($request->all());
        return redirect()->route('pegawai')->with('success',' Data Berhasil Di Update');

    }

    public function delete($id){
        $data = Employee::find($id);
        $data->delete();
        return redirect()->route('pegawai')->with('success',' Data Berhasil Di Dihapus');
    }

    public function exportpdf(){
        $data = Employee::all();

        view()->share('data', $data);
        $pdf = PDF::loadview('datapegawai-pdf');
        return $pdf->download('data.pdf');
    }

    public function home(){
        return view('home');
    }

    public function contact(){
        return view('contact');
    }
    public function admin(){
        return view('admin');
    }
}