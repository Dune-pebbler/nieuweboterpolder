window.onload = function() {
    initMap();
  };

function initMap() {
  var map = new google.maps.Map(document.getElementById("custom-map"), {
    center: { lat: 52.09587334696054, lng: 4.599396683390852 },
    zoom: 17,
  });
  var customMarker = new google.maps.Marker({
    position: { lat: 52.09587334696054, lng: 4.599396683390852 },
    map: map,
    icon: {
    url: theme_data.template_directory_uri + '/images/bplogo.svg',
      scaledSize: new google.maps.Size(80, 80),
    },
    title: "Custom Marker",
  });
}