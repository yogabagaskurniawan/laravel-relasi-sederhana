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

        // $variasi = new Variant();
        // $variasi->motor_id = $newMotor->id;
        // $variasi->nama_variasi = $request->variasi;
        // $variasi->save();
        
    
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

        // $variasi = Variant::where('motor_id', $request->id)->first();
        // if ($variasi) {
        //     $variasi->nama_variasi = $request->variasi;
        //     $variasi->save();
        // }

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

    public function detailMotor($id)
    {
        $dataMotor = Motor::where('id',$id)->first();
        $idMotor = $id;
        return view('detailMotor', compact('dataMotor','idMotor'));
    }

    public function tambahVariasi($id)
    {
        $idMotor = $id;
        $variant = null;
        return view('formVariasi', compact('idMotor','variant'));
    }

    public function proses_tambah_variasi(Request $request)
    {        
        $data = [
            'nama_variasi' => $request->nama_variasi,
            'motor_id' => $request->idMotor
        ];

        $validator = Validator::make($request->all(), [
            'nama_variasi' => 'required'
        ]);
    
        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }
        Variant::create($data);
        return redirect('motor/'.$request->idMotor);
    }

    public function deleteVariasi($id)
    {
        Variant::where('id', $id)->delete();
        return back();
    }

    public function editVariasi($id)
    {
        $variant = Variant::where('id',$id)->first();
        $idMotor = $id;
        return view('formVariasi', compact('variant', 'idMotor'));
    }

    public function proses_update_variasi(Request $request)
    {
        // dd($request->idMotor);
        $data = [
            'nama_variasi' => $request->nama_variasi,
        ];

        $validator = Validator::make($request->all(), [
            'nama_variasi' => 'required'
        ]);
    
        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        // Simpan dulu id variansi sebelum dilakukan update
        $variantId = $request->id;

        // Lakukan update pada model Variant berdasarkan id
        Variant::where('id', $variantId)->update($data);

        // Ambil data variansi setelah update
        $variant = Variant::find($variantId);

        // Redirect ke route dengan id motor yang terkait dari variansi
        return redirect('motor/' . $variant->motor_id);
    }
}
