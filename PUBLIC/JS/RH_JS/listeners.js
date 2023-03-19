
const info = document.querySelector('.info');
console.log(info);
info.addEventListener('click' , (e)=>{
    console.log(e.target);
    if(e.target.id == "uu"){
        const dataIdValue = e.target.getAttribute('data-id');
        console.log(dataIdValue);
        window.location.href=`http://localhost/recrutement_App/APP/views/chatApp/Chat_app.php?id_receiver=${dataIdValue}`;
        
    }
})
