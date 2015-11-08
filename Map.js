/**
 * Created by Laurens on 7-11-2015.
 */

var currentlyOpened = -1;
var contentstring = [];
var regionlocation = [];
var stationIDs = [];
var markers = [];
var iterator = 0;
var areaiterator = 0;
var map;
var infowindow = [];
geocoder = new google.maps.Geocoder();

function initialize() {
    currentlyOpened = -1;
    infowindow = [];
    markers = [];
    GetValues();
    iterator = 0;
    areaiterator = 0;
    region = new google.maps.LatLng(regionlocation[areaiterator].split(',')[0], regionlocation[areaiterator].split(',')[1]);
    map = new google.maps.Map(document.getElementById("Map"), {
        zoom: 2,
        mapTypeId: google.maps.MapTypeId.ROADMAP,
        center: region,
    });
    drop();
}

function drop() {
    for (var i = 0; i < contentstring.length; i++) {
        setTimeout(function() {
            addMarker();
        }, 800);
    }
}

function addMarker() {
    var address = contentstring[areaiterator];
    var icons = 'http://maps.google.com/mapfiles/ms/icons/red-dot.png';
    var templat = regionlocation[areaiterator].split(',')[0];
    var templong = regionlocation[areaiterator].split(',')[1];
    var temp_latLng = new google.maps.LatLng(templat, templong);
    markers.push(new google.maps.Marker(
        {
            position: temp_latLng,
            map: map,
            icon: icons,
            draggable: false
        }));
    iterator++;
    info(iterator);
    areaiterator++;
}

function viewDetails(){
    if(currentlyOpened==-1){
        document.getElementById("demo").innerHTML = "No station selected";
        return;
    }
    window.open("StationInformation.php?id="+stationIDs[currentlyOpened-1]);

}

function info(i) {
    infowindow[i] = new google.maps.InfoWindow({
        content: contentstring[i - 1]
    });
    infowindow[i].content = contentstring[i - 1];
    google.maps.event.addListener(markers[i - 1], 'click', function() {
        if(currentlyOpened!=-1)infowindow[currentlyOpened].close();
        currentlyOpened = i;
        infowindow[i].open(map, markers[i - 1]);
    });
}