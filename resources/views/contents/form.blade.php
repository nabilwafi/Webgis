@extends('layout')
@section('content')
<div class="container form-wrap">
  <form action="{{ Route('titik.create') }}" method="post" enctype="multipart/form-data">
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
      <label for="nama_lahan">Nama Lahan</label>
      <input type="text" name="nama_lahan" id="nama_lahan" class="form-control">
    </div>

    <div class="mb-3">
      <label for="alamat_lahan">Alamat Lahan</label>
      <textarea name="alamat_lahan" id="alamat_lahan" class="form-control form-textarea"></textarea>
    </div>

    <div class="mb-3">
      <label for="luas_lahan">Luas Lahan</label>
      <textarea name="luas_lahan" id="luas_lahan" class="form-control form-textarea"></textarea>
    </div>

    <div class="mb-3">
      <label for="latitude">Latitude</label>
      <input type="text" name="latitude" id="latitude" class="form-control">
    </div>

    <div class="mb-3">
      <label for="longitude">Longitude</label>
      <input type="text" name="longitude" id="longitude" class="form-control">
    </div>

    <div class="mb-3">
      <label for="foto_lahan">Upload Image</label>
      <input type="file" name="foto_lahan" id="foto_lahan" class="form-control">
    </div>
    
    <div class="mt-5">
      <button type="submit" class="btn btn-primary">Submit</button>
    </div>

  </form>
</div>
@endsection