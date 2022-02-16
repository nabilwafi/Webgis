@extends('layout')
@section('content')

<div class="container my-5">
  <div>
    <a href="/marker/create" class="btn btn-primary">Tambah Data</a>
  </div>
  <div>
    <table class="table">
      <thead>
        <tr>
          <th scope="col">No</th>
          <th scope="col">Nama Lahan</th>
          <th scope="col">Alamat Lahan</th>
          <th scope="col">Luas Lahan</th>
          <th scope="col">Foto Lahan</th>
          <th scope="col">Latitude</th>
          <th scope="col">Longitude</th>
          <th scope="col">Action</th>
        </tr>
      </thead>
      <tbody>
        @php
          $no = 1;
        @endphp
        @forelse($lahans as $lahan)
        <tr>
          <th scope="row">{{ $no }}</th>
          <td>{{ $lahan->nama_lahan }}</td>
          <td>{{ $lahan->alamat_lahan }}</td>
          <td>{{ $lahan->luas_lahan }}</td>
          <td>
            <img class="foto_gedung" src="{{ asset($lahan->foto_lahan) }}" alt="">
          </td>
          <td>{{ $lahan->latitude }}</td>
          <td>{{ $lahan->longitude }}</td>
          <td>
            <a class="btn btn-primary mr-3" href="{{ route('titik.edit', $lahan->id_lahan) }}">Edit</a>
            <a class="btn btn-danger" href="{{ route('titik.delete', $lahan->id_lahan) }}">Delete</a>
          </td>
        </tr>
        @php
        $no++;
        @endphp
        @empty
        <tr>
          <td colspan="8">No record found</td>
        </tr>
    
        @endforelse
      </tbody>
    </table>
  </div>
</div>

@endsection