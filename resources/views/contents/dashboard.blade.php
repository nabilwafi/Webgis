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
          <th scope="col">Nama Gedung</th>
          <th scope="col">Alamat</th>
          <th scope="col">Deskripsi</th>
          <th scope="col">Foto</th>
          <th scope="col">Latitude</th>
          <th scope="col">Longitude</th>
          <th scope="col">Action</th>
        </tr>
      </thead>
      <tbody>
        @php
          $no = 1;
        @endphp
        @forelse($markers as $marker)
        <tr>
          <th scope="row">{{ $no }}</th>
          <td>{{ $marker->nama_gedung }}</td>
          <td>{{ $marker->alamat }}</td>
          <td>{{ $marker->deskripsi }}</td>
          <td>
            <img class="foto_gedung" src="{{ asset($marker->foto) }}" alt="">
          </td>
          <td>{{ $marker->latitude }}</td>
          <td>{{ $marker->longitude }}</td>
          <td>
            <a class="btn btn-primary mr-3" href="{{ route('marker.edit', $marker->id) }}">Edit</a>
            <a class="btn btn-danger" href="{{ route('marker.delete', $marker->id) }}">Delete</a>
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