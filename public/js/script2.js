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