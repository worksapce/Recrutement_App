let field = document.querySelector('.items');
let li = Array.from(field.children);
let select= document.getElementById('select');
let ar = [];

for (let i of li){
    let scoreElement  = i.querySelector('.card_right h1').textContent;
    const x =Number(scoreElement);
    console.log(x);
    i.setAttribute('data-price' , x);
    
    ar.push(i);
}

select.onchange = sortingValue;

function sortingValue(){
    if(this.value === 'tout')   {
        while(field.firstChild){
            field.removeChild(field.firstChild);
        }
        field.append(...ar);

    }
    if (this.value === 'Fscore'){
        sortele(field , li , true);
    }
    if (this.value === 'Mscore'){
        sortele(field , li , false);
    }
}
function sortele(field , li , asc){
    let dm , sorli ; 
    dm = asc ? 1 : -1;
    sorli = li.sort((a,b)=>{
        const ax = a.getAttribute('data-price');
        const bx = b.getAttribute('data-price');

        return  ax> bx ? (1*dm) : (-1*dm);
    });
    while(field.firstChild){
        field.removeChild(field.firstChild);
    }
    field.append(...sorli);
}

