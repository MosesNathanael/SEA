function form_reservation() {
  window.location.href = "../reservation/reservation_template.php";
}

function recent_reservation() {
  var date = document.getElementById("date");
  var time = document.getElementById("time");
  var service = document.getElementById("service");
  const table = document.querySelector("table");
  var tr = document.createElement("tr");
  var td = document.createElement("td");
  table.tr.td.appendChild(service.value);
}

function logout() {
  window.location.href = "../index.html";
}
