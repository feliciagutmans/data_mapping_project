/*
Student 1300 8920
INSTG033 Server Programming and Structured Data Assessment
Dr. Oliver Duke-Williams and Dr. Antonis Bikakis
Due 16/05/2018

Encoding an interactive map with data showing the location
of crimes in and around The City of London from
01 January 2018- 31 March 2018.
*/

function initialise() {
	// create the map object
	myMap = new L.Map('mapid');

	
	// create the tile layer with correct attribution
	var osmUrl='http://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png';
	var osmAttrib='Map data &copy; <a href="http://openstreetmap.org">OpenStreetMap</a> contributors';
	var osm = new L.TileLayer(osmUrl, {minZoom: 9, maxZoom: 16, attribution: osmAttrib});		

	
	// set the starting location
	myMap.setView(new L.LatLng(51.531062,-0.086609),12);
	myMap.addLayer(osm);  

	// the myData array has been imported in a separate <script> include
	// iterate through the array and create some markers
	for (item in myData) {
		var marker = L.marker([myData[item].latitude,myData[item].longitude]).addTo(myMap);
	}
	
	/* ---Adding circles for each area where crime was reported--- */
	
	//Camden (027B, 028B)
	var circle1 = L.circle([51.511780, -0.123191], {
    color: 'green',
    fillColor: '#00e400',
    fillOpacity: 0.5,
    radius: 1500
}).addTo(myMap);
   circle1.bindPopup("Camden: Holborn, Covent Garden");
   
   	//City of London (001A,001B,001C,001E,001F,001G)
	var circle2 = L.circle([51.512344, -0.090985], {
    color: 'green',
    fillColor:  '#006200',
    fillOpacity: 0.5,
    radius: 1500
}).addTo(myMap);
   circle2.bindPopup("City of London: City of London");
//comment, unlike other boroughs, all area codes to single neighborhood only.
//perhaps because city of london is smallest borough, more concentrated.   
   
   	//Hackney (025A)
	var circle3 = L.circle([51.551795,-0.054644], {
    color: 'green',
    fillColor: '#00e400',
    fillOpacity: 0.5,
    radius: 1500
}).addTo(myMap);
   circle3.bindPopup("Hackney");
   
   	//Islington(002D,002H,023D)
	var circle4 = L.circle([51.526490,-0.103875], {
    color: 'green',
    fillColor: '#00b200',
    fillOpacity: 0.5,
    radius: 1600
}).addTo(myMap);
   circle4.bindPopup("Islington: Old Street, Clerkenwell");
    
   	//Tower Hamlets (015B)many areas, larger circle
	var circle5 = L.circle([51.514820, -0.065053], {
    color: 'green',
    fillColor: '#009900',
    fillOpacity: 0.5,
    radius: 1700
}).addTo(myMap);
   circle5.bindPopup("Tower Hamlets: Spitafields");
   
   	//Westminster (018B) only one area, smaller circle
	var circle6 = L.circle([51.512303,-0.111046 ], {
    color: 'green',
    fillColor: '#00b000',
    fillOpacity: 0.5,
    radius: 500
}).addTo(myMap);
   circle6.bindPopup("Westminster: Temple");
   
    //Southwark (002C, 003H) only one area, smaller circle
	var circle7 = L.circle([51.504165, -0.076257], {
    color: 'green',
    fillColor: '#009800',
    fillOpacity: 0.5,
    radius: 500
}).addTo(myMap);
   circle7.bindPopup("Southwark: Tower Bridge");


	//Icons distinguishing between different months
	
	var redIcon = L.icon({
		iconUrl: 'images/red-marker.png',
		//shadowUrl: 'marker-shadow.png',
		iconSize:     [25, 41], // size of the icon
        //shadowSize:   [50, 64], // size of the shadow
        iconAnchor:   [12, 41],  // point of the icon which will correspond to marker's location
       // shadowAnchor: [4, 62],  // the same for the shadow
        popupAnchor:  [-3, -76] // point from which the popup should open relative to the iconAnchor	
	})	
		
	
	 //orange
	var orangeIcon = L.icon({
		iconUrl: 'images/orange-marker.png',
		//shadowUrl: 'marker-shadow.png',
		iconSize:     [25, 41], // size of the icon
       // shadowSize:   [50, 64], // size of the shadow
        iconAnchor:   [12, 41],  // point of the icon which will correspond to marker's location
       // shadowAnchor: [4, 62],  // the same for the shadow
        popupAnchor:  [-3, -76] // point from which the popup should open relative to the iconAnchor
	})
	
	
	// yellow
	var yellowIcon = L.icon({
		iconUrl: 'images/yellow-marker.png',
		//shadowUrl: 'marker-shadow.png',
		iconSize:     [25, 41], // size of the icon
       // shadowSize:   [50, 64], // size of the shadow
        iconAnchor:   [12, 41],  // point of the icon which will correspond to marker's location
       // shadowAnchor: [4, 62],  // the same for the shadow
        popupAnchor:  [-3, -76] // point from which the popup should open relative to the iconAnchor
	})
	
	 
	// iterate through the array and create some markers
	for (item in myData) {
if (myData[item].period == '1') {
			var thisIcon = redIcon;
		} else if (myData[item].period == '2') {
			var thisIcon = orangeIcon;
		} else {
			var thisIcon = yellowIcon;
		}
		var marker = L.marker([myData[item].latitude,myData[item].longitude],{icon: thisIcon}).addTo(myMap);
	}
	
}