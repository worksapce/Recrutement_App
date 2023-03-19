// Cette fonction est appelée lorsqu'un utilisateur sélectionne un fichier image à partir d'un formulaire d'envoi de fichiers
function afficherImage() {
  // Récupère l'élément d'entrée du formulaire qui a un ID de "photo"
  const input = document.getElementById('photo');
  // Récupère l'élément image sur la page
  const img = document.querySelector('img');
  // Récupère le premier fichier sélectionné par l'utilisateur
  const file = input.files[0];
  // Crée un nouvel objet FileReader
  const reader = new FileReader();
  // Cette fonction sera appelée lorsque le fichier sera chargé
  reader.onload = function(e) {
    // Définit la source de l'image sur la base de l'URL de données du fichier
    img.src = e.target.result;
  }
  // Lit le contenu du fichier sous forme d'URL de données
  reader.readAsDataURL(file);
}

// Cette fonction est appelée pour transformer l'élément d'entrée du formulaire d'envoi de fichiers
function transformInput() {
  // Récupère l'élément d'entrée du formulaire qui a un ID de "photo"
  var input = document.getElementById("photo");
  // Définit l'attribut "title" de l'élément sur "Upload Picture"
  input.setAttribute("title", "Upload Picture");
  // Définit l'attribut "aria-label" de l'élément sur "Upload Picture"
  input.setAttribute("aria-label", "Upload Picture");
  // Définit l'attribut "accept" de l'élément sur image/*
  input.setAttribute("accept", "image/*");
}


