<?php

namespace App\Http\Controllers;

use App\User;
use App\Motor;
use App\Variant;
use App\Variasi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;


class MotorController extends Controller
{
    public function index()
    {
        $daftarMotor = Motor::all();
        return view('motor',compact('daftarMotor'));
    }

    public function tambah()
    {
        $daftarMotor = Motor::get();
        return view('tambah',compact('daftarMotor'));
    }

    public function proses_tambah(Request $request)
    {
        $data = [
            'nama' => $request->nama,
            'warna' => $request->warna,
            'sku' => $request->sku,
            'user_id' => auth()->user()->id,
        ];
    
        $validator = Validator::make($request->all(), [
            'nama' => 'required',
            'warna' => 'required',
            'sku' => 'required|integer',
        ]);
    
        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        $newMotor = Motor::create($data);

        $variasi = new Variant();
        $variasi->motor_id = $newMotor->id;
        $variasi->nama_variasi = $request->variasi;
        $variasi->save();
        
    
        return redirect('/motors');
    }

    public function edit($id)
    {
        $dataMotor = Motor::where('id',$id)->first();
        return view('edit',compact('dataMotor'));
    }

    public function proses_update(Request $request)
    {
        $data = [
            'nama' => $request->nama,
            'warna' => $request->warna,
            'sku' => $request->sku,
            'user_id' => auth()->user()->id,
        ];

        $validator = Validator::make($request->all(), [
            'nama' => 'required',
            'warna' => 'required',
            'sku' => 'required|integer',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        Motor::where('id', $request->id)->update($data);

        $variasi = Variant::where('motor_id', $request->id)->first();
        if ($variasi) {
            $variasi->nama_variasi = $request->variasi;
            $variasi->save();
        }

        return redirect('/motors');
    }

    public function destroy($id)
    {
        Motor::where('id',$id)->delete();
        Variant::where('motor_id', $id)->delete();
        return back()->with('success','Data berhasil dihapus');
    }

    // show user
    public function show_user()
    {
        $dataUser = User::get();

        return view('show', compact('dataUser'));
    }
}
