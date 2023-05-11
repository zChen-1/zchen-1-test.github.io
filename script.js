function getVehicleInfo() {
  var make = document.getElementById('make').value;
  var model = document.getElementById('model').value;
  var year = document.getElementById('year').value;

  // Assuming you have the vehicle data stored in a variable named 'vehicles'
  var vehicle = vehicles.find(function(item) {
    return item.Make === make && item.Model === model && item.Year === parseInt(year);
  });

  if (vehicle) {
    var resultDiv = document.getElementById('result');
    resultDiv.innerHTML = '<h2>Vehicle Information:</h2>' +
                          '<p>Make: ' + vehicle.Make + '</p>' +
                          '<p>Model: ' + vehicle.Model + '</p>' +
                          '<p>Year: ' + vehicle.Year + '</p>' +
                          '<p>CombMPG: ' + vehicle.CombMPG + '</p>';
  } else {
    alert('Vehicle information not found!');
  }
}
