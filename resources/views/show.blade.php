@extends('layouts.app')

@section('content')
<div class="row justify-content-center">
  @foreach ($dataUser as $user)
  <div class="col-md-4">
    <div class="card" style="width: 18rem;">
      <div class="card-body">
        <h5 class="card-title">{{ $user->name }}</h5>
        <h6 class="card-subtitle mb-2 text-body-secondary">{{ $user->email }}</h6>
        <table style="border-collapse: collapse; width: 100%;">
          <thead style="border-bottom: 1px solid #ddd;">
            <tr>
              <th style=" padding: 8px;">No</th>
              <th style=" padding: 8px;">Nama</th>
              <th style=" padding: 8px;">Warna</th>
              <th style="padding: 8px;">SKU</th>
              <th style="padding: 8px;">Variasi</th>
            </tr>
          </thead>
          <tbody>
            @php
                $no = 1
            @endphp
            @forelse ($user->motor as $motor)
            <tr>
                <td>{{ $no++ }}</td>
                <td>{{ $motor->nama }}</td>
                <td>{{ $motor->warna }}</td>
                <td>{{ $motor->sku }}</td>
                <td>{{ $motor->variant->nama_variasi }}</td>
            </tr>
            @empty
            <tr>
              <td colspan="3">Not record</td>
            </tr>
            @endforelse 
          </tbody>
        </table>
      </div>
    </div>
  </div>
  @endforeach
</div>

<a class="btn btn-info mt-5" href="/motors"><i class="fa-solid fa-pen-to-square"></i>Kembali ke Home</a>

@endsection