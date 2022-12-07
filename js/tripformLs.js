
let tripStartCoordinatesLatinput = document.getElementById(
    "tripStartCoordinatesLat"
  );
  let tripStartCoordinatesLng = document.getElementById(
    "tripStartCoordinatesLng"
  );
  
  let destinationtripCoordinatesLat = document.getElementById(
    "destinationtripCoordinatesLat"
  );

  
  let destinationtripCoordinatesLng = document.getElementById(
    "destinationtripCoordinatesLng"
  );
  let destination = document.getElementById("destination");
  let origin_details = document.getElementById("origin_details");
  let destination_details = document.getElementById("destination_details");
  let extra_details = document.getElementById("extra_details");
  let Date_Time = document.getElementById("Date_Time");
  let origin = document.getElementById("origin");
  function store() {
    // tripStartCoordinatesLatinput.addEventListener("change", function () {
    //   localStorage.setItem(
    //     "tripStartCoordinatesLatinput",
    //     tripStartCoordinatesLatinput.value
    //   );
    // });
    
    // tripStartCoordinatesLng.addEventListener("change", function () {
    // localStorage.setItem(
    //   "tripStartCoordinatesLng",
    //   tripStartCoordinatesLng.value
    // );
    // });
    
    // destinationtripCoordinatesLat.addEventListener("change", function () {
    // localStorage.setItem(
    //   "destinationtripCoordinatesLat",
    //   destinationtripCoordinatesLat.value
    // );
    // });
  
    // destinationtripCoordinatesLng.addEventListener("change", function () {
    // localStorage.setItem(
    //   "destinationtripCoordinatesLng",
    //   destinationtripCoordinatesLng.value
    // );});
  
    origin.addEventListener("change", function () {
    localStorage.setItem("origin", origin.value);
    });
  
    destination.addEventListener("change", function () {
    localStorage.setItem("destination", destination.value);
    });

    origin_details.addEventListener("change", function () {
      localStorage.setItem("origin_details", origin_details.value);
    });

    
    destination_details.addEventListener("change", function () {
    localStorage.setItem("destination_details", destination_details.value);
    });
    
    extra_details.addEventListener("change", function () {
    localStorage.setItem("extra_details", extra_details.value);
    });
  
    Date_Time.addEventListener("change", function () {
    localStorage.setItem("Date_Time", Date_Time.value);
    });
  }
  
  function load() {
    tripStartCoordinatesLatinput.value = localStorage.getItem(
      "tripStartCoordinatesLatinput"
    );
  
    tripStartCoordinatesLng.value = localStorage.getItem(
      "tripStartCoordinatesLng"
    );
  
    destinationtripCoordinatesLat.value = localStorage.getItem(
      "destinationtripCoordinatesLat"
    );
  
    destinationtripCoordinatesLng.value = localStorage.getItem(
      "destinationtripCoordinatesLng"
    );
  
    origin.value = localStorage.getItem("origin");
  
    destination.value = localStorage.getItem("destination");
  
    origin_details.value = localStorage.getItem("origin_details");
  
    destination_details.value = localStorage.getItem("destination_details");
  
    extra_details.value = localStorage.getItem("extra_details");
  
    Date_Time.value = localStorage.getItem("Date_Time");
  }
  
  function clearStorage() {
    localStorage.clear();
  }
  
  store();
  

  const OldFormDataWasSaved = document.getElementById("OldFormDataWasSaved");

  if(localStorage.length > 0){
    OldFormDataWasSaved.style.display = "inline-block";
  }else{
    OldFormDataWasSaved.style.display = "none";
  }