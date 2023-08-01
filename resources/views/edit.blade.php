@extends('layouts.app')

@section('content')
<form method="POST" action="/proses-update">
    @csrf
    <input type="hidden" name="id" value="{{$dataMotor->id}}"> 
    <div class="form-group">
      <label for="nama" class="form-label">Nama Motor</label>
      <input type="text" class="form-control form-control-rounded @error('nama') is-invalid @enderror" name="nama" id="nama" placeholder="Silahkan diisi.." value="{{$dataMotor->nama}}">
      @error('nama')
        <span class="invalid-feedback" role="alert">
          <strong>{{ $message }}</strong>
        </span>
      @enderror
    </div>
    <div class="form-group">
      <label for="warna" class="form-label ">Warna Motor</label>
      <input type="text" class="form-control form-control-rounded  @error('warna') is-invalid @enderror" name="warna" id="warna" placeholder="Silahkan diisi.." value="{{$dataMotor->warna}}">
      @error('warna')
        <span class="invalid-feedback" role="alert">
          <strong>{{ $message }}</strong>
        </span>
      @enderror
    </div>
    <div class="form-group">
      <label for="sku" class="form-label">SKU</label>
      <input type="text" class="form-control form-control-rounded  @error('sku') is-invalid @enderror" name="sku" id="sku" placeholder="Silahkan diisi.." value="{{$dataMotor->sku}}">        
      @error('sku')
        <span class="invalid-feedback" role="alert">
          <strong>{{ $message }}</strong>
        </span>
      @enderror
    </div>
    {{-- <div class="form-group">
      <label for="variasi" class="form-label">Variasi</label>
      <input type="text" class="form-control form-control-rounded  @error('variasi') is-invalid @enderror" name="variasi" id="variasi" placeholder="Silahkan diisi.." value="{{$dataMotor->variant->nama_variasi}}">        
      @error('variasi')
        <span class="invalid-feedback" role="alert">
          <strong>{{ $message }}</strong>
        </span>
      @enderror
    </div> --}}
    <div class="form-group">
      <button type="submit" class="btn btn-primary mt-4">Tambah</button>
    </div>
  </form>
@endsection