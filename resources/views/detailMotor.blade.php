@extends('layouts.app')

@section('content')

<div class="row justify-content-center">
  <div class="col-md">
    <div class="card">
      <div class="card-body">
        <h2 class="card-title">{{ $dataMotor->user->name }}</h2>
        <h2 class="card-title">{{ $dataMotor->user->email }}</h2>
        <h5 class="card-title">Nama Motor : {{ $dataMotor->nama }}</h5>
        <table class="table">
          <thead>
            <tr>
              <th>Nama Variasi</th>
              <th>Option</th>
            </tr>
          </thead>
          <tbody>
          @foreach ($dataMotor->variant as $variant)
            <tr>
              <td>{{$variant->nama_variasi}}</td>
              <td>
                <a href="/edit-variasi/{{ $variant->id }}" class="btn btn-warning">Edit</a>
                <a href="/delete-variasi/{{ $variant->id }}" class="btn btn-danger" onclick="return confirm('yakin untuk menghapus portfolio?')">Delete</a>
              </td>
            </tr>
          @endforeach

          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>

<a class="btn btn-success " href="/tambah-variasi/{{ $idMotor }}"><i class="fa-solid fa-pen-to-square"></i>Tambah Variasi</a>
<a class="btn btn-info my-5" href="/motors"><i class="fa-solid fa-pen-to-square"></i>Kembali ke Home</a>
@endsection