const modal = document.getElementById("map-modal");
const backdrop = document.getElementById("backdrop");
const cancelAddMapButton = modal.querySelector(".btn--passive");
const confirmAddMapButton = modal.querySelector(".btn--success");
const addMapButton = document.getElementById("add-map-button");
const CoordinatesStartLatinput = document.getElementById("tripStartCoordinatesLat");
const CoordinatesStartLnginput = document.getElementById("tripStartCoordinatesLng");
const StartMap = document.getElementById("map");
const getmylocationbutton = modal.querySelector(".getmylocation");
const modal__contentDiv = document.querySelector(".modal__content");
let newlat = 0;
let newlng = 0;
const toggleBackdrop = () => {
  backdrop.classList.toggle("visible");
};

const toggleStartModal = () => { 
  modal.classList.toggle("visible");
};


const SaveMapLocation = () => {
  toggleStartModalVisibility();
  saveCoordinates(newlat, newlng);
  location.reload();

};

const toggleStartModalVisibility = () => {
  toggleStartModal();
  toggleBackdrop();
};
getmylocationbutton.addEventListener("click", getLocation);
addMapButton.addEventListener("click", toggleStartModalVisibility);
backdrop.addEventListener("click", toggleStartModalVisibility);
cancelAddMapButton.addEventListener("click", toggleStartModalVisibility);
confirmAddMapButton.addEventListener("click", SaveMapLocation);

async function getLocation() {
  if (navigator.geolocation) {
    navigator.geolocation.watchPosition(showPosition);
  } else {
    x.innerHTML = "لا يدعم هذا المتصفح تحديد الموقع الجغرافي.";
  }
}

function showPosition(position) {
  let LatitudeMarker = position.coords.latitude;
  let longitudeMarker = position.coords.longitude;
  x.innerHTML =
    "إحداثيات موقعك : " +
    position.coords.latitude +
    "," +
    position.coords.longitude;
  initMap(LatitudeMarker, longitudeMarker);
  newlat = LatitudeMarker;
  newlng = longitudeMarker;
}

// Initialize and add the map
function initMap(LatitudeMarker, longitudeMarker) {
  // The location of Uluru
  const uluru = { lat: parseFloat(LatitudeMarker), lng: parseFloat(longitudeMarker) };
  // The map, centered at Uluru
  const map = new google.maps.Map(StartMap, {
    zoom: 16,
    center: uluru,
  });
  // The marker, positioned at Uluru
  const marker = new google.maps.Marker({
    position: uluru,
    map: map,
    draggable: true,
  });
   marker.addListener("dragend", () => {
    const lat = marker.getPosition().lat();
    const lng = marker.getPosition().lng();
     newlat = lat;
     newlng = lng;
    ww.innerHTML = `Latitude: ${lat}, Longitude: ${lng}`;
  });
}

function saveCoordinates(newlat, newlng) {
  CoordinatesStartLatinput.value = `${newlat}`;
  CoordinatesStartLnginput.value = `${newlng}`;
}

function submitForm() {
  document.querySelector(".formtripdetails").submit();
  }
