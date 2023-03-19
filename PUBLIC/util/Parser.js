const text = document.getElementById("maVariable").value;
console.log(text)

let textt = text.replace(/(\r\n|\n|\r)/gm, ""); // Remplace les retours à la ligne par une chaîne vide
console.log(textt)
let textet = textt.replace(/<br\s*\/?>/gi, "");//remplacer les espace par champ vide
console.log(textet)

let texte = textet.replace(/\s/g, "");
console.log(texte)

//
const infoRegex = /CVINFORMATIONPERSONNELLE:Nom:(.*?)prenom:(.*?)email:(.*?)adresse:(.*?)tel:(.*?)Compétances:(.*?)\.(.*?)\.(.*?)\.(.*?)Langue:(.*?)\.(.*?)\.(.*?)\.(.*?)\.(.*?)\.([^.]+)\./;

// Exécution de l'expression régulière sur la chaîne de texte
const matches = infoRegex.exec(texte);
if(matches){
// Stockage des informations extraites dans un tableau
const infoTableau = [matches[1], matches[2], matches[3], matches[4], matches[5], matches[6],matches[7] ,matches[8], matches[9], matches[10], matches[11],matches[12],matches[13], matches[14],matches[15]];



document.getElementById("nom").value = infoTableau[0];
document.getElementById("prenom").value = infoTableau[1];
document.getElementById("email").value = infoTableau[2];
document.getElementById("adresse").value = infoTableau[3];
document.getElementById("tel").value = infoTableau[4];
document.getElementById("competances").value=infoTableau[5];
document.getElementById("langue").value=infoTableau[9];
document.getElementById("degre").value=infoTableau[10];

 for (let i = 6; i <9; i++) {
// Si l'élément n'est pas une chaîne vide et correspond à une compétence
if (infoTableau[i] !== '' && infoTableau[i].indexOf('.') === -1) {
 // Créer un nouvel élément d'entrée de texte
 const input = document.createElement('input');
 input.type = 'text';
 input.name = 'skill[]';
 input.placeholder = 'Entrer une compétence';
 input.value = infoTableau[i];

 // Ajouter le nouvel élément après le champ de compétence existant
 const competences = document.getElementById('competances');
 competences.parentNode.insertBefore(input, competences.nextSibling);
}
}
 
var j=0;
for (let i = 11; i < 15; i=i+2) {

console.log(infoTableau[i])

 const inpute = document.createElement('input');
 inpute.type = 'text';
 inpute.name = 'degre[]';
 inpute.placeholder = 'Entrer votre degre';
 inpute.id='degre'
 inpute.value = infoTableau[i];
 inpute.style ="width:42vh"


 const input = document.createElement('input');
 input.type = 'text';
 input.name = 'langue_[]';
 input.placeholder = 'Entrer votre langue';
 input.id='langue'
 input.value = infoTableau[i];
 input.style ="width:42vh";

 var inputDiv = document.createElement("div");

 inputDiv.innerHTML = `
     <input type="text" name="langue_[]" style="width:42vh" placeholder="Entrer votre langue" id="langue" value="${infoTableau[i]}"> 
     <input type="text" name="degre[]" style="width:42vh" placeholder="Entrer votre degre" id="degre" value="${infoTableau[i+1]}">
 `;
 

 document.body.appendChild(inputDiv);


const langues = document.getElementById('degre');
 langues.parentNode.insertBefore(inputDiv, langues.nextSibling);
 
}


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


const submit =document.getElementById('envoyer')



const parcoursScolaireMatch = texte.match(/Parcoursscolaire:(.*?)Parcoursprofessionelle:/s);
const parcoursScolaire = parcoursScolaireMatch ? parcoursScolaireMatch[1] : "";
const diplomes = [];
const etablissements = [];
const parcoursMatches = parcoursScolaire.match(/\b(\w+),(\w+),\d{4},\d{4}\b/g);

if (parcoursMatches) {
 for (let i = 0; i < parcoursMatches.length; i++) {
     const parcoursMatch = parcoursMatches[i];
     const [diplome, etablissementWithDate] = parcoursMatch.split(",");
     const etablissement = etablissementWithDate.split(".")[0];
     diplomes.push(diplome);
     etablissements.push(etablissement);
 }
 if (diplomes.length > 1) {
     for (let i = 1; i < diplomes.length; i++) {
         const inputDiv = document.createElement("div");
         inputDiv.innerHTML = `
             <input type="text" name="diplome[]" placeholder="entrer votre Diplome" id="diplome${i}" value="${diplomes[i]}">
             <input type="text" name="etablissement[]" placeholder="entrer votre Etablissement" id="etablissement${i}" value="${etablissements[i]}">
             <br>
             <label for="datedebut">Date Début</label>
             <input type="date" name="date-debut-scolaire[]" style="margin-left: 5%;" >
             <br>
             <label for="date-fin">Date fin</label>
             <input type="date" name="date-fine-scolaire[]"  style="margin-left: 7.5%;" >
             <br> <br> <br>
         `;
         const scolaire=document.getElementById('parcours_sc')
         scolaire.parentNode.insertBefore(inputDiv, scolaire.nextSibling);
        
     }
 }
}









const parcoursprofmatch = texte.match(/Parcoursprofessionelle:(.*?);/s);
const parcoursprof = parcoursprofmatch ? parcoursprofmatch[1] : "";
const societess = [];
const positionss = [];
const parcoursmatchprof = parcoursprof.match(/\b(\w+),(\w+),\d{4},\d{4}\b/g);

if (parcoursmatchprof) {
 for (let i = 0; i < parcoursmatchprof.length; i++) {
     const parcoursMatch = parcoursmatchprof[i];
     const [socie, posi] = parcoursMatch.split(",");
     const positi = posi.split(".")[0];
     societess.push(socie);
     positionss.push(positi);
 }
 if (societess.length > 1) {
     for (let i = 1; i < societess.length; i++) {
         const inputDiv = document.createElement("div");
         console.log(societess[i])
         console.log(positionss[i])

         inputDiv.innerHTML = `
             <input type="text" name="parc-scolaire[]" placeholder="entrer societe" id="societe${i}" value="${societess[i]}">
             <input type="text" name="position[]" placeholder="entrer position" id="position${i}" value="${positionss[i]}">
             <br>
             <label for="datedebut">Date Début</label>
             <input type="date" name="date-debut-prof[]" style="margin-left: 5%;" >
             <br>
             <label for="date-fin">Date fin</label>
             <input type="date" name="date-fin-prof[]"  style="margin-left: 7.5%;" >
             <br> <br> <br>
         `;
         const prof=document.getElementById('parcours_pr')
         prof.parentNode.insertBefore(inputDiv, prof.nextSibling);
        
     }
 }
}

console.log(document.getElementById("societe"))
document.getElementById("societe").value = societess[0];
document.getElementById("position").value = positionss[0];




console.log(document.getElementById("diplome"))
document.getElementById("diplome").value = diplomes[0];
document.getElementById("etablissement").value = etablissements[0];

}






