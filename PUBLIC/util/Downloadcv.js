
function afficherImage() {
    const input = document.getElementById('photo');
    const img = document.querySelector('img');
    const file = input.files[0];
    const reader = new FileReader();
    reader.onload = function(e) {
      img.src = e.target.result;
    }
    reader.readAsDataURL(file);
  }


  function transformInput() {
    var input = document.getElementById("photo");
    input.setAttribute("title", "Upload Picture");
    input.setAttribute("aria-label", "Upload Picture");
    input.setAttribute("accept", "image/*");
  }

