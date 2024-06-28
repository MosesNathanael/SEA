function submit() {
  var username = document.getElementById("username");
  var email = document.getElementById("email");
  var phonenumber = document.getElementById("phonenumber");
  var password = document.getElementById("password");
  var body = document.querySelector("body");
  var container = document.querySelector(".container");
  if (
    username.value == "Thomas N" &&
    email.value == "thomas.n@compfest.id" &&
    phonenumber.value == "08123456789" &&
    password.value == "Admin123"
  ) {
    window.location.href = "admin_dashboard.php";
  } else {
    var msg = document.querySelector(".msg");
    msg.style.display = "block";
  }
}
