const slideBtn = document.querySelectorAll('.slide-btn')
const main = document.querySelector('.main')
const contacts = document.querySelector('.contacts')
const headerConv= document.querySelector('.header-conv')
const SingleContact = document.querySelectorAll('.single-contact')
const ConversationContainer= document.querySelector('.conversation-body')
const ConverstationBody = document.querySelector('.conversation-body')

console.log(contacts)

/**************************************
 * SET THE SCROLL TO THE BOTTOM default  
 *************************************/
console.log(ConverstationBody)
// ConverstationBody.scrollTop= ConverstationBody.scrollHeight - ConverstationBody.clientHeight;
// document.body.scrollIntoView(document.body.scrollHeight,0)

/**********************
    THE SLIDER EFFECT
**********************/

slideBtn.forEach( el=>{
el.addEventListener('click', (event ) => { 

    main.classList.toggle('slide')
  

 })
})

/**********************
    RENDER PROFAILES
**********************/

const RenderProfils = () => { 

    let content =""
    for(let i =1;i<10 ;i++) { 
        content += `
            <div class="single-contact" id=profile-${i}>
                        <div class="profile-img">
                            <img src="../../../PUBLIC/Images/chatApp/profile-img1.png" alt="profile-img">
                        </div>
                        <div class="profile-info">
                            <h3 class="contact-name">Oussama Jodar</h3>
                            <p class="last-msg">I’m a student in  fsts , and working on this design</p>
                        </div>
            </div>
        `
    }


    contacts.innerHTML += content;
}

RenderProfils()


/****************************
EVENT LISTENER ON THE PROFILE
****************************/
console.log(SingleContact)

contacts.addEventListener('click', (event) => { 
    event.stopPropagation()
    

    if(event.target.classList.contains('single-contact')){ 
        console.log(event.target.id)

        // headerConc.innerText = " "+ event.target.id;
        main.classList.toggle('slide')

    }
})
// for test
ConversationContainer.innerHTML += `
<div class="receiver-box">
<div class="profile-img">
  <img src="../../../PUBLIC/Images/chatApp/pexels-photo-771742.jpeg" alt="" />

</div>
<div class="">
  <div class="receiver-info">
    <h3 class="receiver-name">Oussama Jodar</h3>
    <p class="status">12 PM</p>
  </div>
  <div class="receiver-msg">
    <p>
      Lorem ipsum dolor sit, amet consectetur adipisicing elit.
      Vitae temporibus natus fugit dolor esse itaque est porro,
      nisi, reiciendis, ipsa facere dolorem. Unde illo eveniet aut
      architecto maxime voluptate est, optio, aspernatur error
      aperiam aliquam! Nulla dolores doloribus expedita.
    </p>
  </div>
</div>
</div>

<!--  -->
<div class="receiver-box">
<div class="profile-img">
  <img src="../../../PUBLIC/Images/chatApp/pexels-photo-771742.jpeg" alt=""  />
</div>
<div class="">
  <div class="receiver-info">
    <h3 class="receiver-name">Oussama Jodar</h3>
    <p class="status">12 PM</p>
  </div>
  <div class="receiver-msg">
    <p>Lorem, ipsum dolor.</p>
  </div>
</div>
</div>
<!-- end of rec box  -->
<div class="receiver-box">
  <div class="profile-img">
    <img src="../../../PUBLIC/Images/chatApp/pexels-photo-771742.jpeg" alt="" />
  </div>
  <div class="">
    <div class="receiver-info">
      <h3 class="receiver-name">Oussama Jodar</h3>
      <p class="status">12 PM</p>
    </div>
    <div class="receiver-msg">
      <p>Lorem, ipsum dolor.</p>
    </div>
  </div>
</div>
<!--  -->
<div class="receiver-msg-single">
  <p>Lorem, ipsum dolor.</p>
</div>
<div class="receiver-msg-single">
  <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Placeat, explicabo qui officiis mollitia esse illum exercitationem voluptatibus. Quam, dolores mollitia?</p>
</div>
<!-- end of the reciver box -->
<!-- sender-container -->
<div class="sender-container">
  <div class="sender-box">
     
      <div class="">
        <div class="sender-info">
          <h3 class="sender-name">Oussama Jodar</h3>
          <p class="sender-date">12 PM</p>
        </div>
        <div class="sender-msg">
        
          <p>Lorem, ipsum dolor.</p>
        </div>
      </div>


      <div class="profile-img">
          <img src="../../../PUBLIC/Images/chatApp/pexels-photo-771742.jpeg" alt="" />
        </div>
    </div>

</div>`;

