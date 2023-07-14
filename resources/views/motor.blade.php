@extends('layouts.app')

@section('content')
@if (auth()->user()->name=='admin')
<a class="btn btn-success mb-5" href="/tambah-motor"><i class="fa-solid fa-pen-to-square"></i> tambah</a>
@endif

<table style="border-collapse: collapse; width: 100%;">
  <thead style="border-bottom: 1px solid #ddd;">
    <tr>
      <th style=" padding: 8px;">No</th>
      <th style=" padding: 8px;">Nama</th>
      <th style=" padding: 8px;">Warna</th>
      <th style="padding: 8px;">SKU</th>
      <th style="padding: 8px;">Variasi</th>
      <th style="padding: 8px;">AKSI</th>
    </tr>
  </thead>
  <tbody>
    @php
        $no = 1
    @endphp
    @forelse ($daftarMotor as $mtr)
    <tr>
        <td>{{ $no++ }}</td>
        <td>{{ $mtr->nama }}</td>
        <td>{{ $mtr->warna }}</td>
        <td>{{ $mtr->sku }}</td>
        <td>{{ $mtr->variant->nama_variasi }}</td>
        <td><a class="btn btn-warning btn-sm" href="/edit/{{ $mtr->id }}"><i class="fa-solid fa-pen-to-square"></i> Edit</a>
          @if (auth()->user()->name=='admin')
          <a class="btn btn-danger btn-sm" href="delete/{{ $mtr->id }}" onclick="return confirm('Apakah yakin untuk dihapus?')"><i class="fa-sharp fa-solid fa-trash"></i> Delete</a></td>
          @endif
    </tr>
    @empty
    <tr>
      <td>Not record</td>
    </tr>
    @endforelse 
  </tbody>
</table>

<a class="btn btn-info mt-5" href="/show"><i class="fa-solid fa-pen-to-square"></i> Show List User Menambahkan Product</a>

@endsection