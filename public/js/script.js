const apiKey =
    "pk.eyJ1IjoibmFiaWx3YWZpIiwiYSI6ImNrejVvNGR3NjBjNTAycnFuZDYyNDRycTIifQ.64NBmUKA4bxoC933pq2X7w";
const baseMap = "ArcGIS:Streets";

let map = L.map("map").setView(["-6.895412", "107.5651106"], 15);

L.tileLayer(
    "https://api.mapbox.com/styles/v1/{id}/tiles/{z}/{x}/{y}?access_token={accessToken}",
    {
        maxZoom: 25,
        id: "mapbox/streets-v11",
        tileSize: 512,
        zoomOffset: -1,
        accessToken: apiKey,
    }
).addTo(map);

// L.marker([-6.88681, 107.61535]).addTo(map);

$(document).ready(function () {
    $.getJSON("/coordinate/json", (data) => {
        $.each(data, (index) => {
            var content = `
                        <div class="card">
                            <h1 class="card-title">${data[index].nama_gedung}</h1>
                            <div class="card-line"></div>
                            <diV>
                            <img class="foto-marker" src="${data[index].foto}" alt="..." />
                            </div>
                            <div class="card-line"></div>
                            <diV>${data[index].alamat}</div>
                            <div class="card-line"></div>
                            <diV>${data[index].deskripsi}</div>
                        </div>
                        `;

            var popup = L.popup()
                .setLatLng([data[index].latitude, data[index].longitude])
                .setContent(content);

            L.marker([
                parseFloat(data[index].latitude),
                parseFloat(data[index].longitude),
            ])
                .addTo(map)
                .bindPopup(popup);
        });
    });

    $.ajax({
        type: 'POST',
        url: '/marker/find',
        success: (data) => {
            console.log(data);
        }
    });
});


$.getJSON("/json/administrasi_kota_cimahi.geojson", function(json) {
    geoLayer = L.geoJson(json, {
        style: function(feature) {
            return {
                fillOpacity: 0.5,
                weight: 2,
                opacity: 1,
            }
        },

        onEachFeature: function(feature, layer) {
            layer.addTo(map);
            layer.addEventListener('mouseover', function() {
                layer.bindPopup(feature.properties.Name);
            });
        }
    });
});