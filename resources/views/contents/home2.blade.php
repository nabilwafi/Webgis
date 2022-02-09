@extends('layout')
@section('content.main')

<a href="/dashboard" class="btn btn-primary btn-dashboard">Dashboard</a>
<div class="map-wrap">
  <form action="{{ route('marker.find') }}" method="POST" class="search">
    @csrf
    <input type="text" class="form-control" name="nama_gedung" placeholder="Nama Gedung" />
    <button type="submit" class="btn btn-primary">Search</button>
  </form>
  <div id="map"></div>
</div>

@endsection