const candidateCards = document.querySelectorAll('.wrapper');
const detailsCard = document.querySelector('.info');
const main = document.getElementById('main');
candidateCards.forEach((candidateCard) => {
	candidateCard.addEventListener('click', () => {
		// Get candidate's ID from the card
		detailsCard.classList.toggle('active');
		main.classList.add('active');
		const candidateId = candidateCard.getAttribute('data-id');
		console.log('Candidate ID:', candidateId); // Log candidate ID

		console.log(candidateId);
   
		fetch(
			`../../controllers/RH_controller/SendDetailCandidat.php?candidateId=${candidateId}&includeSkills=true&includeParProf=true&includeParScol=true&includeLang=true`,
			{
				headers: {
					'Content-Type': 'application/json'
				}
			}
		)
			.then((response) => {

				console.log('Fetch response:', response); // Log
				return response.json();
			})
			.then((responseText) => {
				console.log('Candidate data:', responseText); // Log candidate data
				//const candidate = JSON.parse(responseText);
				const candidate = responseText;
        console.log('ddd', candidate);
				const skillsList = candidate.skills.map((skill) => `<li class='skill'>${skill.text}</li>`).join('');
				let ParProfList = '';
				candidate.parcours_professionnel &&
					(ParProfList = candidate.parcours_professionnel
						.map((ParPro) => `<li>${ParPro.societe}</li>`)
						.join(''));

				let ParScolList;
				candidate.parcours_scolaire &&
					(ParScolList = candidate.parcours_scolaire.map((ParScol) => `<li>${ParScol.diplome}</li>`).join(''));

				let LangList;
				candidate.langues && (LangList = candidate.langues.map((Lang) => `<li>${Lang.langue}</li>`).join(''));
console.log(LangList);
				detailsCard.innerHTML = `
            <div class="info_entete">
            <img src="data:image/jpeg;base64,${candidate.photo}" alt="" class="image_RH">

              <h2>${candidate.nom}&nbsp;${candidate.prenom}</h2>
                          <p>${candidate.poste_actuel}</p>
              <p>${candidate.tel}</p>
              <p>${candidate.addres}</p>
            </div>

          <div class="skills">
            <h4>skills</h4>
            <ul>
              ${skillsList}
            </ul>
          </div>

          <div class="parcours_scolaire">
            <h4>Parcours Scolaire</h4>
            <ul>
              ${ParProfList}
            </ul>
          </div>

          <div class="parcours_professionnels">
            <h4>parcours professionnels</h4>
            <ul>
              ${ParScolList}
            </ul>
          </div>

          <div class="langue">
            <h4>Langue</h4>
            <ul>
              ${LangList}
            </ul>
          </div>
          
           <div class="btn_info">
              <form method="post" action="../../../APP/controllers/RH_controller/download.php">
                <input type="hidden" name="candidateId" value="${candidateId}">
                <button type="submit" class="btn_cv btn_msg" > Cv ${candidateId} </button>
              </form>
             <button class="btn_cv" id='uu'  data-id="${candidateId}" >Contacter </button>
             <a class="btn_email" href="mailto:${candidate.email}" target="_blank"
              > Email</a>
          </div>
           `;
			})
			.catch((error) => console.error(error));
	});
});
