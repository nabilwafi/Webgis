@extends('layout')
@section('content')
<div class="container form-wrap">
  <form action="{{ Route('marker.update', $marker->id) }}" method="post" enctype="multipart/form-data">
    @csrf

    <div class="form-title">
      <h1 class="title">Input Data</h1>
      @foreach ($errors->all() as $error)
      <div class="alert alert-danger">
        {{ $error }}
      </div>
      @endforeach
    </div>

    <div class="mb-3">
      <label for="nama_gedung">Nama Gedung</label>
      <input type="text" name="nama_gedung" id="nama_gedung" class="form-control" value="{{ $marker->nama_gedung }}">
    </div>

    <div class="mb-3">
      <label for="alamat">Alamat</label>
      <textarea name="alamat" id="alamat" class="form-control form-textarea">{{ $marker->alamat }}</textarea>
    </div>

    <div class="mb-3">
      <label for="deskripsi">Deskripsi</label>
      <textarea name="deskripsi" id="deskripsi" class="form-control form-textarea">{{ $marker->deskripsi }}</textarea>
    </div>

    <div class="mb-3">
      <label for="atitude">Latitude</label>
      <input type="text" name="latitude" id="latitude" class="form-control" value="{{ $marker->latitude }}">
    </div>

    <div class="mb-3">
      <label for="longitude">Longitude</label>
      <input type="text" name="longitude" id="longitude" class="form-control" value="{{ $marker->longitude }}">
    </div>

    <div class="mb-3">
      <label for="file">Upload Image</label>
      <input type="hidden" name="old_image" value="{{ $marker->foto }}" />
      <input type="file" name="foto" id="foto" class="form-control">
    </div>
    
    <div class="mt-5">
      <button type="submit" class="btn btn-primary">Submit</button>
    </div>

  </form>
</div>
@endsection