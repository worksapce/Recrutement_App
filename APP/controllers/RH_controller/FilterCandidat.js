

// cette partie a pour but de afficher les candidats selon les filters selectiones

const skillBtnsss = document.querySelector('.selectbox:nth-child(2) button');
const jobTitleOptionss = document.querySelector('.selectbox:first-child .options');
const dropdownss = document.querySelectorAll('.selectbox .options');
const skillsOptionss = document.querySelector('.selectbox:nth-child(2) .options');
const candidateCardss = document.querySelectorAll('.wrapper');
const jobTitleBtnnn = document.querySelector('.selectbox:first-child button');
const cardElementss = document.querySelectorAll('.wrapper');

jobTitleBtnnn.addEventListener('DOMSubtreeModified', () => {
	// on prend le jobtitle selectionné
	const selectedJobTitle = jobTitleBtnnn.textContent.trim().toLowerCase();

	// Iterer Sur les  card  et afficher ou hide les cards en se basant sur les job selectionnes
	cardElementss.forEach((cardElement) => {
		
		const cardJobTitle = cardElement.dataset.jobtitle.toLowerCase();
		if (selectedJobTitle === 'tout' || selectedJobTitle.includes(cardJobTitle)) {
			cardElement.style.display = 'block';
			console.log('first');
		} else {
			cardElement.style.display = 'none';
		}
	});
});

// Listener sur les skills selectionnes dans un filtre
skillsOptionss.addEventListener('click', (event) => {
	const checked = skillsOptionss.querySelectorAll('.checked');
	// retourne un tableau des skills qui sont (checked)
	const selectedSkills = Array.from(checked).map((item) => item.querySelector('span:last-child').textContent);
	console.log(selectedSkills);
	//Appel une fonction qui permet de filterCandidat selon skills
	filterCandidates(selectedSkills);
});

// fonction qui permet de filter les candidats selon les skills selectionnes
function filterCandidates(selectedSkills) {
	console.log('lay lay');
	candidateCardss.forEach((cardElement) => {
		if (cardElement.style.display !== 'none') {
			// prendre les skills de chaque card affiché d'apres datasetattribut
			const cardSkills = JSON.parse(cardElement.dataset.skills);
			
			console.log('cardskill', cardSkills);
			console.log('selecteed ', selectedSkills);

			// Check si les selected skills sont inclus dans les card skills
			const includesAllSelectedSkills = selectedSkills.every((skill) =>
			 	cardSkills.some((cardSkill) => cardSkill.text === skill)

			);
			console.log(includesAllSelectedSkills);
			// si card contient au moins une skill selectione on affiche card
			// ou bien si non skills est selectionnes on affiche card
			if (selectedSkills.length === 0 || includesAllSelectedSkills) {
				console.log('yes');
				cardElement.style.dispy = 'block';la

			} else {
				cardElement.style.display = 'none';
				console.log('khd');
			}
		}
	});
}

document.addEventListener('click', (event) => {
	dropdownss.forEach((dropdown) => {
		if (!dropdown.contains(event.target)) {
			dropdown.classList.remove('active');
		}
	});
});

// fonction qui permet de faire un reset des filters

function resetFilters() {
	const checkedItems = document.querySelectorAll('.checked');
	checkedItems.forEach((item) => item.classList.remove('checked'));
	jobTitleOptionss.classList.remove('active');
	const main = document.getElementById('main');
	const detailsCard = document.querySelector('.info');
	main.classList.remove('active');

	console.log(detailsCard);
	detailsCard.classList.remove('active');

	const jobTitleBtn = document.querySelector('.selectbox:first-child button');
	jobTitleBtn.textContent = 'Select job title';

	const skillBtnss = document.querySelector('.selectbox:nth-child(2) button');
	skillBtnss.textContent = 'Select skill';

	const candidateCardss = document.querySelectorAll('.wrapper');
	candidateCardss.forEach((candidateCard) => (candidateCard.style.display = 'block'));
	
	
}
// listener sur bouton  reset
const resetBtn = document.getElementById('resetBtn');
resetBtn.addEventListener('click', resetFilters);
