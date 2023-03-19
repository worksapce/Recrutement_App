function search() {
  console.log('dadmkmcm');
  // Get the input field and filter the options based on its value
  var input = document.getElementById("search-item");
  var filter = input.value.toUpperCase();
  var options = document.querySelectorAll(".card");
  
  // Add a click event listener to the window object
  window.addEventListener("click", function(event) {
    // Check if the clicked element is a hidden option
    if (event.target.classList.contains("hidden")) {
      // Remove any event listeners from the clicked element
      event.target.onclick = null;
    }
  });
  
  for (var i = 0; i < options.length; i++) {
    var name = options[i].querySelector("h3").textContent.toUpperCase();
    if (name.indexOf(filter) > -1) {
      options[i].style.display = "";
      options[i].classList.remove("hidden");
      options[i].onclick = function() {
        // Handle click event on visible items
      };
    } else {
      options[i].style.display = "none";
      options[i].classList.add("hidden");
      options[i].onclick = null;
    }
  }
}
