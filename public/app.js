// get your key from app.tomorrow.io/development/keys
const API_KEY = 'iwHi2u4Jaeaw64WmK4joH6QiPQ30v8ZH'; 

// pick the field (like temperature, precipitationIntensity or cloudCover)
const DATA_FIELD = 'precipitationIntensity';

// set the ISO timestamp (now for all fields, up to 6 hour out for precipitationIntensity)
const TIMESTAMP = (new Date()).toISOString(); 

// initialize the map
function initMap() {
  var map = new google.maps.Map(document.getElementById('map'), {
    zoom: 10,
    center: {
      lat: 11.5564,
      lng: 104.9282
    }
  });

  // gets the icons
  const iconBase = "https://maps.google.com/mapfiles/kml/shapes/";
  const icons = {
    parking: {
      name: "Parking",
      icon: iconBase + "parking_lot_maps.png",
    },
    library: {
      name: "Library",
      icon: iconBase + "library_maps.png",
    },
    info: {
      name: "Info",
      icon: iconBase + "info-i_maps.png",
    },
  };

  //get icon locations
  const features = [
    {
      position: new google.maps.LatLng(11.5564, 104.9282),
      type: "info",
    },
  ];

  //set icons on map
  features.forEach((feature) => {
    new google.maps.Marker({
      position: feature.position,
      icon: icons[feature.type].icon,
      map: map,
    });
  });

  // create a constant for legend
  const legend = document.getElementById("legend");

  //key is considered the type in icons How do they get the key?
  // for (const key in icons) {
  //   const type = icons[key];
  //   const name = type.name;
  //   const icon = type.icon;
  //   const div = document.createElement("div");

  //   div.innerHTML = '<img src="' + icon + '"> ' + name;
  //   legend.appendChild(div);
  // }

  const div = document.createElement("div");
  div.innerHTML = ' <img src="legend.png"> ';
  legend.appendChild(div);

  // inject the tile layer
  var imageMapType = new google.maps.ImageMapType({
    getTileUrl: function(coord, zoom) {
      if (zoom > 12) {
        return null;
      }

      return `https://api.tomorrow.io/v4/map/tile/${zoom}/${coord.x}/${coord.y}/${DATA_FIELD}/${TIMESTAMP}.png?apikey=${API_KEY}`;
    },
    tileSize: new google.maps.Size(256, 256)
  });

  map.controls[google.maps.ControlPosition.BOTTOM_CENTER].push
  (document.getElementById('legend'));

  map.overlayMapTypes.push(imageMapType);
}


 