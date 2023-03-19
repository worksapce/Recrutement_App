





//le meme description que dans downloadcv

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
    input.setAttribute("accept", "image/*");}
  
  
  
  
  
  const btn_l = document.getElementById('btn-langue')
  const btn_c = document.getElementById('btn-competance')
  const langue = document.getElementById('langue')
  const langues = document.getElementById('langues')
  const competance = document.getElementById('competances')
  const competances = document.getElementById('competancess')
  const parcour_sc = document.getElementById('parcour_sc')
  const parcours_sc = document.getElementById('parcours_sc')
  const Btn_sc =document.getElementById('Btn-sc')
  const parcour_pr = document.getElementById('parcour_pr')
  const parcours_pr = document.getElementById('parcours_pr')
  const Btn_pr =document.getElementById('Btn-pr')
  
  
  
  
  
  
  
  
  
  
  const deg = document.getElementById('degre')
  console.log(deg)
  //ajouter champ langue et degre
  btn_l.addEventListener('click', (event) => {
      event.preventDefault();
      const newLangue = langue.cloneNode(true)
      const newdegre = deg.cloneNode(true)
      langues.appendChild(newLangue)
      langues.appendChild(newdegre)
  
      
  })
  
  //ajouter champ competance
  
  btn_c.addEventListener('click', (event) => {
      event.preventDefault();
      const fields = competance.querySelectorAll('input, select, textarea');
  
      fields.forEach(field => field.value = '');
      const newC = competance.cloneNode(true)
      competances.appendChild(newC)
  })
  
  
  
  const Btn_s_rm =document.getElementById('Btn-s_rm')
  const Btn_sc_rm =document.getElementById('Btn-sc_rm')
  const Btn_l_rm =document.getElementById('Btn-l_rm')
  
  const Btn_pr_rm =document.getElementById('Btn-pr_rm')
  
  
  
  
  
  
  
  
  //ajouter champ parcours scolaire
  Btn_sc.addEventListener('click',(event)=>{
    event.preventDefault();
    const newparcours_sc =parcour_sc.cloneNode(true)
    parcours_sc.appendChild(newparcours_sc)
  });
  
  
  
  
  //supprimer champ competance
  Btn_s_rm.addEventListener('click', (event) => {
    event.preventDefault();
  //dernier element ajouter
    const lastChild = competances.lastElementChild;
    if (lastChild) {
      competances.removeChild(lastChild);
    }
  });
  
  
  
  //ajouter champ parcours professionnelle
  Btn_pr.addEventListener('click',(event)=>{
      event.preventDefault();
      const newparcours_pr =parcours_pr_container.cloneNode(true)
      parcours_pr.appendChild(newparcours_pr)
    })
  
  
  
  
  
  
  
  
  
  
  
  const btn_sc = document.getElementById('Btn-sc');
  const btn_sc_rm = document.getElementById('Btn-sc_rm');
  const parcours_sc_container = document.querySelector('.parcours_sc_container');
  //ajouter un champ parcours_sc_container
  btn_sc.addEventListener('click', (event) => {
    event.preventDefault();
    const newc = parcours_sc_container.cloneNode(true);
    parcours_sc.appendChild(newc);
  });
  
  
  //supprimer champ parcours professionnelle 
  const btn_pr = document.getElementById('Btn-pr');
  const btn_pr_rm = document.getElementById('Btn-pr_rm');
  const parcours_pr_container = document.querySelector('.parcours_pr_container');
  btn_pr_rm.addEventListener('click', (event) => {
    event.preventDefault();
    const dernier = parcours_pr.lastChild;
    dernier.remove();
    const avantDernier = parcours_pr.lastChild;
    avantDernier.remove();
  });
  
  
  // supprimer  champ parcours_sc 
  btn_sc_rm.addEventListener('click', (event) => {
      event.preventDefault();
      const dernier = parcours_sc.lastChild;
      dernier.remove();
      const avantDernier = parcours_sc.lastChild;
      avantDernier.remove();
    });
    
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  //supprimer champ langue
  const btn_rm = document.getElementById('Btn-l_rm');
  btn_rm.addEventListener('click', (event) => {
    event.preventDefault();
    const langues = document.getElementById('languesss');
    const dernier = langues.lastChild;
    const avantDernier = dernier.previousSibling;
    langues.removeChild(dernier);
    langues.removeChild(avantDernier);
  });
  