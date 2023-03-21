const jobTitles = [
	{
		title: 'Software Engineer',
		skills: [ 'Java', 'Python', 'JavaScript', 'SQL', 'HTML', 'CSS' ]
	},
	{
		title: 'Web Developer',
		skills: [ 'JavaScript', 'HTML', 'CSS', 'React', 'Angular', 'Vue' ]
	},
	{
		title: 'Data Scientist',
		skills: [ 'Python', 'R', 'SQL', 'Machine Learning', 'Data Visualization' ]
	},
	{
		title: 'Computer Systems Analyst',
		skills: [ 'IT Systems', 'Networking', 'Databases', 'Security', 'Business Analysis' ]
	}
];

const jobTitleBtn = document.querySelector('.selectbox:first-child button');
const skillBtn = document.querySelector('.selectbox:nth-child(2) button');
const jobTitleOptions = document.querySelector('.selectbox:first-child .options');
const inputSelect = document.getElementById('inputSelectSkill');
const skillsOptions = document.querySelector('.selectbox:nth-child(2) .options');

// implementation de filter de jobtitle par donnees d'un array (jobTitles)
jobTitles.forEach((job) => {
	console.log('data');

	const li = document.createElement('li');
	li.textContent = job.title;
	jobTitleOptions.appendChild(li);
});

// fonction permet de detecter le choix du jobtitle
jobTitleOptions.addEventListener('click', (event) => {
	if (event.target.tagName === 'LI') {
		const selectedJobTitle = event.target.textContent;
		jobTitleBtn.textContent = selectedJobTitle;
		jobTitleOptions.classList.remove('active');
		//   faire appel  au fonction qui permet de implementer content du filtre skills
		displaySkillsForJobTitle(selectedJobTitle);
	}
});

//  fonction qui prend le jobtitle selectionne est affiche les  dropdown skills content selon le selection du job

function displaySkillsForJobTitle(selectedJobTitle) {

	skillsOptions.innerHTML = '';
	jobTitles.forEach((job) => {
		if (job.title === selectedJobTitle) {
			job.skills.forEach((skill) => {
				const li = document.createElement('li');
				const iconSpan = document.createElement('span');
				const skillSpan = document.createElement('span');
				iconSpan.innerHTML = '<ion-icon name="checkmark-outline" class="check-icon"></ion-icon>'; // replace "checkmark-outline" with the appropriate icon name
				iconSpan.classList.add('checkbox');
				li.classList.add('item');
				skillSpan.textContent = skill;
				li.appendChild(iconSpan);
				li.appendChild(skillSpan);
				skillsOptions.appendChild(li);
			});
		}
	});
	const items = document.querySelectorAll('.item');
	items.forEach((item) => {
		item.addEventListener('click', () => {
			item.classList.toggle('checked');

			let checked = document.querySelectorAll('.checked');
			if (checked && checked.length > 0) {
				skillBtn.innerText = `${checked.length} Selected`;
			} else {
				skillBtn.innerText = 'Select skill';
			}
		});
	});
}



export {  displaySkillsForJobTitle } 
