<!DOCTYPE html>
<html>
  <head>
    <script src="jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/vue"></script>

    <title>Place Autocomplete</title>
    <meta name="viewport" content="initial-scale=1.0, user-scalable=no">
    <meta charset="utf-8">
    <style>
      /* Always set the map height explicitly to define the size of the div
       * element that contains the map. */
      #map {
        height: 100%;
      }
      /* Optional: Makes the sample page fill the window. */
      html, body {
        height: 100%;
        margin: 0;
        padding: 0;
      }
      .controls {
        margin-top: 5px;
        border: 1px solid transparent;
        border-radius: 2px 0 0 2px;
        box-sizing: border-box;
        -moz-box-sizing: border-box;
        height: 32px;
        outline: none;
        box-shadow: 0 2px 6px rgba(0, 0, 0, 0.3);
      }

      #origin-input {
        background-color: #fff;
        font-family: Roboto;
        font-size: 15px;
        font-weight: 300;
        margin-left: 1%;
        padding: 0 11px 0 13px;
        text-overflow: ellipsis;
        width: 98%;
      }

      #destination-input {
        background-color: #fff;
        font-family: Roboto;
        font-size: 15px;
        font-weight: 300;
        margin-left: -98%;
        margin-top: 40px;
        padding: 0 11px 0 13px;
        text-overflow: ellipsis;
        width: 98%;
      }

      #origin-input:focus,
      #destination-input:focus {
        border-color: #4d90fe;
      }

      #mode-selector {
        height: 28px;
        color: #fff;
        background-color: #4d90fe;
        margin-left: -98%;
        margin-top: 75px;
        padding: 2px 6px 2px 6px;
      }

      #mode-selector label {
        font-family: Roboto;
        font-size: 13px;
        font-weight: 300;
      }

      #uber {
        position: absolute;
        height: 28px;
        font-size: 10px;
        font-weight: 300;
        visibility: visible;
        margin-top: 75px;
        margin-left: 220px;
        z-index: 1;
        background:none;
      }

      #lala {
        position: absolute;
        margin-top: 175px;
        margin-left: 100px;
        z-index: 1;
      }

      #lala2 {
        position: absolute;
        margin-top: 205px;
        margin-left: 120px;
        z-index: 1;
      }

      #lala3 {
        position: absolute;
        margin-top: 235px;
        margin-left: 120px;
        z-index: 1;
      }

      #menu {
        position: absolute;
        z-index: 1;
        border: 1px solid transparent;
        border-radius: 2px 0 0 2px;
        box-sizing: border-box;
        -moz-box-sizing: border-box;
        outline: none;
        box-shadow: 0 2px 6px rgba(0, 0, 0, 0.3);

        height: 80px;
        visibility: hidden;
        margin-top: 106px;
        margin-left: 1.5%;
        background:none;
      }

      #example-1 {
        position: absolute;
        z-index: 1;
        border: 1px solid transparent;
        border-radius: 2px 0 0 2px;
        box-sizing: border-box;
        -moz-box-sizing: border-box;
        outline: none;
        box-shadow: 0 2px 6px rgba(0, 0, 0, 0.3);

        height: 200px;

        visibility: hidden;
        margin-top: 186px;
        margin-left: 1.5%;
        background:none;
      }

    </style>

    <style>
    /* Enter and leave animations can use different */
  /* durations and timing functions.              */
  .slide-fade-enter-active {
    transition: all .3s ease;
  }
  .slide-fade-leave-active {
    transition: all .8s cubic-bezier(1.0, 0.5, 0.8, 1.0);
  }
  .slide-fade-enter, .slide-fade-leave-to
  /* .slide-fade-leave-active below version 2.1.8 */ {
    transform: translateX(10px);
    opacity: 0;
  }
  </style>


  </head>
  <body>

  <div id="example-1">
    <button @click="show = !show">
      Toggle render
    </button>

    <transition name="slide-fade">
      <p id='lala' v-if="show">xxcx</p>
    </transition>

    <transition name="slide-fade">
      <input type="text" id="lala2" class="controls" 
        placeholder="try this" onfocus="this.value=''" v-if="show">
    </transition>

       <transition name="slide-fade">
      <p id='lala3' v-if="show">xxbx</p>
    </transition>

  </div>

  <script>
    new Vue({
    el: '#example-1',
      data: {
        show: true
      }
    })

  </script>



    <input id="origin-input" class="controls" type="text"
        placeholder="Enter an origin location" onfocus="this.value=''">

    <input id="destination-input" class="controls" type="text"
        placeholder="Enter a destination location" onfocus="this.value=''">

    <div id="mode-selector" class="controls">
      <input type="radio" name="type" id="changemode-driving" checked="checked">
      <label for="changemode-driving">Driving</label>

      <input type="radio" name="type" id="changemode-transit">
      <label for="changemode-transit">Transit</label>

      <input type="radio" name="type" id="changemode-walking">
      <label for="changemode-walking">Walking</label>
    </div>

      <input type="button" class="controls" onclick="uberlink()" id="uber" value="UBER Price"></input>

    <div id="menu" class="controls">
      <label id="lab1" style = "visibility: hidden;">Fight No.</label>
      <input type="text" id="origin-input" class="controls" 
          placeholder="try this" onfocus="this.value=''">
      <br>
      <label>get me</label>
    </div>

    <div id="map"></div>

    <script>
      // This example requires the Places library. Include the libraries=places
      // parameter when you first load the API. For example:
      // <script src="https://maps.googleapis.com/maps/api/js?key=YOUR_API_KEY&libraries=places">

      //document.getElementById("lab1").style.visibility = "visible";
      function uberlink() {
        window.location.href = 'https://m.uber.com/ul/';
      }

      function initMap() {
        var map = new google.maps.Map(document.getElementById('map'), {
          mapTypeControl: false,
          center: {lat: 40.7440000, lng: -74.17891209},
          zoom: 16
        });

        new AutocompleteDirectionsHandler(map);
      }

       /**
        * @constructor
       */
      function AutocompleteDirectionsHandler(map) {
        this.map = map;
        this.originPlaceId = null;
        this.destinationPlaceId = null;
        this.travelMode = 'WALKING';
        var originInput = document.getElementById('origin-input');
        var destinationInput = document.getElementById('destination-input');
        var modeSelector = document.getElementById('mode-selector');
        this.directionsService = new google.maps.DirectionsService;
        this.directionsDisplay = new google.maps.DirectionsRenderer;
        this.directionsDisplay.setMap(map);

        var originAutocomplete = new google.maps.places.Autocomplete(
            originInput, {placeIdOnly: true});
        var destinationAutocomplete = new google.maps.places.Autocomplete(
            destinationInput, {placeIdOnly: true});

        this.setupClickListener('changemode-walking', 'WALKING');
        this.setupClickListener('changemode-transit', 'TRANSIT');
        this.setupClickListener('changemode-driving', 'DRIVING');

        this.setupPlaceChangedListener(originAutocomplete, 'ORIG');
        this.setupPlaceChangedListener(destinationAutocomplete, 'DEST');

        this.map.controls[google.maps.ControlPosition.TOP_LEFT].push(originInput);
        this.map.controls[google.maps.ControlPosition.TOP_LEFT].push(destinationInput);
        this.map.controls[google.maps.ControlPosition.TOP_LEFT].push(modeSelector);
      }

      // Sets a listener on a radio button to change the filter type on Places
      // Autocomplete.
      AutocompleteDirectionsHandler.prototype.setupClickListener = function(id, mode) {
        var radioButton = document.getElementById(id);
        var me = this;
        radioButton.addEventListener('click', function() {
          me.travelMode = mode;
          me.route();
        });
      };

      AutocompleteDirectionsHandler.prototype.setupPlaceChangedListener = function(autocomplete, mode) {
        var me = this;
        autocomplete.bindTo('bounds', this.map);
        autocomplete.addListener('place_changed', function() {
          var place = autocomplete.getPlace();
          if (!place.place_id) {
            window.alert("Please select an option from the dropdown list.");
            return;
          }
          if (mode === 'ORIG') {
            me.originPlaceId = place.place_id;
          } else {
            me.destinationPlaceId = place.place_id;
          }
          me.route();
        });

      };

      AutocompleteDirectionsHandler.prototype.route = function() {
        if (!this.originPlaceId || !this.destinationPlaceId) {
          return;
        }
        var me = this;

        this.directionsService.route({
          origin: {'placeId': this.originPlaceId},
          destination: {'placeId': this.destinationPlaceId},
          travelMode: this.travelMode
        }, function(response, status) {
          if (status === 'OK') {
            me.directionsDisplay.setDirections(response);
//console.log(JSON.stringify(response));
            ShowUberPrice(response.routes[0].legs[0].start_location.lat(), response.routes[0].legs[0].start_location.lng(), response.routes[0].legs[0].end_location.lat(), response.routes[0].legs[0].end_location.lng());
          } else {
            window.alert('Directions request failed due to ' + status);
          }
        });
      };

      function ShowUberPrice(Xlat, Xlng, Ylat, Ylng) {
        var result;        
        //document.getElementById("uber").style.visibility = "visible";
        document.getElementById("uber").value = "Catching...";
        GetUberDetail(Xlat, Xlng, Ylat, Ylng);
        //document.getElementById("uber").value = "UBER: " + result.prices[0].estimate;
      }

      function GetUberDetail(Xlat, Xlng, Ylat, Ylng) {
        $.post( "uber.php",
          {
            Xlat,
            Xlng,
            Ylat,
            Ylng
          },
          function(data, status) {
            console.log(data);
            result = JSON.parse(data);
            document.getElementById("uber").value = "UBER " + result.prices[1].estimate;
          }
        );

      }

    </script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAYQtfrqfFZKTR1uPYUHgx9DeFTAyxNM1w&libraries=places&callback=initMap"
        async defer></script>
  </body>
</html>
