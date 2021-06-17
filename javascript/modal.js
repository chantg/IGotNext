
// Get the button that opens the modal
var modal = document.getElementById("myModal");

// Get the <span> element that closes the modal
var span = document.getElementsByClassName("close")[0];

span.onclick = function() {
  modal.style.display = "none";
  location.reload();

}
var but = document.getElementById("continueShopping");
but.onclick = function() {
  modal.style.display = "none";
  location.reload();

}

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
  if (event.target == modal) {
    modal.style.display = "none";
    location.reload();

  }
}

