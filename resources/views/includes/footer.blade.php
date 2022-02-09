<!-- Make sure you put this AFTER Leaflet's CSS -->
<script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js"
  integrity="sha512-XQoYMqMTK8LvdxXYG3nZ448hOEQiglfqkJs1NOQV44cWnUrBc8PkAOcXy20w0vlaXaVUearIOBhiXZ5V3ynxwA=="
  crossorigin=""></script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" referrerpolicy="no-referrer"></script>

<!-- Option 1: Bootstrap Bundle with Popper -->
<script>
  let mapJSON = '{{ URL::asset('/json/map.geojson') }}';
  
  let seleksi = "{{ $data_gedung_id }}";
  
  @php
  $data = $data_gedung_id;
  @endphp
  @if(is_null($data))
    let latitude = "-6.88681";
    let longitude = "107.61535";
    let view = 12;
  @else
    latitude = "{{$data->latitude}}";
    longitude = "{{$data->longitude}}";
    view = 20;
  @endif
</script>
<script src="{{ asset('js/script.js') }}"></script>