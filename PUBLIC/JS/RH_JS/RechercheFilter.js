	const selectboxs = document.querySelectorAll('.selectbox');
	let i=0;
	// boucle pour iterer sur les dropdown filters
	selectboxs.forEach(function(selectbox) {
		i++;
		console.log('cosncdn' , i);
		const selectOption = selectbox.querySelector('.selectOption');
		const inputSelect = selectbox.querySelector('.inputSelect');
		const optionsearch = selectbox.querySelector('.optionsearch');
		const options = selectbox.querySelector('.options');
		// const optionslist = options.querySelectorAll('li');
		if(i !== 3){
			selectOption.addEventListener('click', function() {
				selectbox.classList.toggle('active');
				console.log('change');
			});
		}
		
		//Listener pour afficher dropdown content
		

		// //
		// optionslist.forEach(function (optionListSingle) {
		//     optionListSingle.addEventListener('click', function () {
		//         // text = this.textContent;
		//         // // inputSelect.value = text;
		//         // // console.log(inputSelect.value)
		//         console.log('logeed ')
		//         selectbox.classList.remove('active');

		//     })
		// })

		// rechercher dans un filter
		if(i !== 3){
			optionsearch.addEventListener('keyup', function() {
				var filter, li, i, textvalue;
				filter = optionsearch.value.toUpperCase();
				li = options.getElementsByTagName('li');
				for (i = 0; i < li.length; i++) {
					licount = li[i];
					textvalue = licount.textContent || licount.innerText;
					if (textvalue.toUpperCase().indexOf(filter) > -1) {
						li[i].style.display = '';
					} else {
						li[i].style.display = 'none';
					}
				}
			});
		}
		
		
	});
