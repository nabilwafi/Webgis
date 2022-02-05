const apiKey =
    "pk.eyJ1IjoibmFiaWx3YWZpIiwiYSI6ImNrejVvNGR3NjBjNTAycnFuZDYyNDRycTIifQ.64NBmUKA4bxoC933pq2X7w";
const baseMap = "ArcGIS:Streets";

let map = L.map("map").setView([-6.88681, 107.61535], 12);

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

L.marker([-6.88681, 107.61535]).addTo(map);

$(document).ready(function () {
    $.getJSON("/coordinate/json", (data) => {
        $.each(data, (index) => {
            var content = `
                        <div class="card">
                            <h1 class="card-title">${data[index].nama_gedung}</h1>
                            <div class="card-line"></div>
                        </div>
                        `;

            var popup = L.popup()
                .setLatLng([data[index].latitude, data[index].longitude])
                .setContent(content)
                .openOn(map);

            L.marker([
                parseFloat(data[index].latitude),
                parseFloat(data[index].longitude),
            ]).addTo(map).bindPopup(popup);
        });
    });
});

// $.getJSON(mapJSON, (json) => {
//     geoLayer = L.geoJson(json, {
//         style: function(feature) {
//             return {
//                 fillOpacity: 0.5,
//                 weight: 5,
//                 opacity: 1,
//                 color: '#008cff',
//             }
//         },

//         onEachFeature: function(feature, layer) {

//             let iconLabel = L.divIcon({
//                 className: 'label-bidang',
//                 html: `<b>${feature.properties.nama}</b>`,
//                 iconSize: [100, 20]
//             })

//             // L.maker(layer.getBounds().getCenter(),{icon:iconLabel}).addTo(map);

//             layer.on('click', (e) => {
//                 alert(feature.properties.nama);
//             });
//         }

//     });
// });
