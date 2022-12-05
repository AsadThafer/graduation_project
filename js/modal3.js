const DestModal = document.getElementById("Destmap-modal");
const addMapDestButton = document.getElementById("add-map-destination-button");
const destinationCoordinatesLatinput = document.getElementById("destinationtripCoordinatesLat");
const destinationCoordinatesLnginput = document.getElementById("destinationtripCoordinatesLng");
const confirmAddDestMapButton = DestModal.querySelector(".success-dest");
const getmylocationbutton2 = DestModal.querySelector(".getDestlocation");
const DestMap = document.getElementById("mapDest");
const cancelAddMapDestButton = DestModal.querySelector(".cancel-dest");
const backdrop2 = document.getElementById("backdrop2");
const getMyDestButton = document.querySelector(".getDestlocation");
let newDestlat = 0;
let newDestlng = 0;
const ww = document.getElementById("demo2");
const x = document.getElementById("demo");
const www = document.getElementById("demo3");
const xx = document.getElementById("demo4");


const SaveDestMapLocation = () => {
  saveDestCoordinates(newDestlat, newDestlng);
  toggleDestModalVisibility();
  location.reload();
};

const toggleBackdrop2 = () => {
  backdrop2.classList.toggle("visible");
};

const toggleDestModal = () => {
  DestModal.classList.toggle("visible");
};

const toggleDestModalVisibility = () => {
  toggleDestModal();
  toggleBackdrop2();

};

getMyDestButton.addEventListener("click", getDestLocation);
backdrop2.addEventListener("click", toggleDestModalVisibility);
addMapDestButton.addEventListener("click", toggleDestModalVisibility);
cancelAddMapDestButton.addEventListener("click", toggleDestModalVisibility);
confirmAddDestMapButton.addEventListener("click", SaveDestMapLocation);


async function getDestLocation() {
  if (navigator.geolocation) {
    navigator.geolocation.watchPosition(showDestPosition);
  } else {
    xx.innerHTML = "لا يدعم هذا المتصفح تحديد الموقع الجغرافي.";
  }
}

function showDestPosition(position) {
  let LatitudeDestMarker = position.coords.latitude;
  let longitudeDestMarker = position.coords.longitude;
  xx.innerHTML =
    "إحداثيات موقعك : " +
    position.coords.latitude +
    "," +
    position.coords.longitude;
  initDestMap(LatitudeDestMarker, longitudeDestMarker);
  newDestlat = LatitudeDestMarker;
  newDestlng = longitudeDestMarker;
}

// Initialize and add the map
function initDestMap(LatitudeDestMarker, longitudeDestMarker) {
  // The location of Uluru
  const Destuluru = { lat: parseFloat(LatitudeDestMarker), lng: parseFloat(longitudeDestMarker) };
  // The map, centered at Uluru
  const Destmap = new google.maps.Map(DestMap, {
    zoom: 16,
    center: Destuluru,
  });
  // The marker, positioned at Destuluru
  const Destmarker = new google.maps.Marker({
    position: Destuluru,
    map: Destmap,
    draggable: true,
  });
  Destmarker.addListener("dragend", () => {
    const Destlat = Destmarker.getPosition().lat();
    const Destlng = Destmarker.getPosition().lng();
     newDestlat = Destlat;
     newDestlng = Destlng;
    www.innerHTML = `Destlatitude: ${Destlat}, Longitude: ${Destlng}`;
  });
}

function saveDestCoordinates(newDestlat, newDestlng) {
  destinationCoordinatesLatinput.value = `${newDestlat}`;
  destinationCoordinatesLnginput.value = `${newDestlng}`;
}



