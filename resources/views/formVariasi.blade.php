@extends('layouts.app')

@section('content')
@php
  $formTitle = !empty($variant) ? 'Edit' : 'Tambah'    
@endphp
<h2 class="mx-3">{{ $formTitle }} Variasi</h2>
{{-- <form method="POST" action="/proses-tambah-variasi">
  @csrf --}}
  @if (!empty($variant))
    <form action="/proses-update-variasi/{{ $variant->id }}" method="POST">
    @method('PUT')
    @csrf
    <input type="hidden" name="id" value="{{ $variant->id }}">
  @else
    <form action="/proses-tambah-variasi" method="POST">
    @csrf
  @endif
  <div class="form-group">
    <label for="nama" class="form-label">Nama Variasi</label>
    <input type="hidden" name="idMotor" value="{{ $idMotor }}">
    <input type="text" class="form-control form-control-rounded @error('nama_variasi') is-invalid @enderror" name="nama_variasi" id="nama_variasi" placeholder="Silahkan diisi.." value="{{ $variant ? $variant->nama_variasi : '' }}">
    @error('nama_variasi')
      <span class="invalid-feedback" role="alert">
        <strong>{{ $message }}</strong>
      </span>
    @enderror
  </div>
  <div class="form-group">
    <button type="submit" class="btn btn-primary mt-4">Simpan</button>
  </div>
</form>
@endsection