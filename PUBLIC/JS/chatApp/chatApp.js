const slideBtn = document.querySelectorAll(".slide-btn");
const main = document.querySelector(".main");
const contacts = document.querySelector(".contacts");
const headerConv = document.querySelector(".header-conv");
const SingleContact = document.querySelectorAll(".single-contact");
const ConversationContainer = document.querySelector(".conversation-body");
const ConverstationBody = document.querySelector(".conversation-body");
const contactName = document.querySelectorAll(".contact-name");
const sendBox = document.querySelector('.typing-box') 
const sendForm = document.querySelector('.form')

console.log(sendForm)

let userName;
let imageRec;
/*****************************************
  SET THE SCROLL TO THE BOTTOM default  
 ****************************************/
const scroll = document.querySelector(".conversation-body");
window.onload = function () {
  scroll.scrollTo({
    top: scroll.scrollHeight,
    left: 0,
    behavior: "smooth",
  });
};


/**********************
    RENDER PROFILES
**********************/

const RenderProfile = (id, fullName, lastMessage, image) => {
  contacts.innerHTML += `
          <div class="single-contact" id="${id}" >
                      <div class="profile-img">
                      <img src=${image}  alt="profile-img">
                      </div>
                      <div class="profile-info">
                          <h3 class="contact-name">${fullName}</h3>
                          <p class="last-msg">Lorem ipsum dolor sit amet consenter </p>
                      </div>
          </div>
      `;
};

/*************************
  CONTACT SECTION 
**************************/
const GetContact = async () => {
  const res = await fetch("../../../APP/controllers/contact.php", {
    method: "POST",
    body: JSON.stringify({ userId: 2 }),
    headers: {
      "Content-Type": "application/json",
    },
  });
  const data = await res.json();
  console.log(data)

  if (data.success) {

    data.data.forEach((el) => {
      console.log(el.Nom)
      let image ;

          el.photo  ? image = el.photo : image = "https://icon-library.com/images/anonymous-avatar-icon/anonymous-avatar-icon-25.jpg"
           RenderProfile(el.id, el.Nom + " " + el.Prenom, "hello from here",image );
       });

  } else {
    contacts.textContent = data.msg;
  }
};
GetContact();

/**********************
    THE SLIDER EFFECT
**********************/

slideBtn.forEach((el) => {
  el.addEventListener("click", (event) => {
    main.classList.toggle("slide");
  });
});

/***************************************
  FUNCTION CHANGE CONVERSATION  info
 ***************************************/
function changeContactInfo(fullName, IdContact,image) {

  const profileName = document.querySelector(".profile-name");
  profileName.textContent = fullName;
  const profileImage = document.querySelector('.img-profile')
  profileImage.setAttribute('src',image)
  sendBox.setAttribute('id', IdContact)

}


/*************************************
  FUNCTION GROUPE MESSAGES BY MINUIT
*************************************/

function groupMessages(messages) {
  return (grouped = messages.reduce((groups, message) => {
    const timestamp = new Date(message.send_at);
    const minute = timestamp.toISOString().substr(0, 16);

    console.log(message[0])
  // console.log(groups[minute] && groups[minute][0][0])

    if (groups[minute] && groups[minute][0][0] == message[0]) {
      groups[minute].push({
        ...message,
        send_at: timestamp.getTime(),
      });
    }else{ 
   groups[minute] = [];
   groups[minute].push({
    ...message,
    send_at: timestamp.getTime(),
  });
    }
    
    return groups;
  }, {}));
}

/******************************
        MESSAGES BOX 
******************************/

const receiverMessage = (fullName, time, text,image) => {
  return `
  <div class="receiver-box">
  <div class="profile-img rec-img">
    <img src=${image} alt=""  />
  </div>
  <div class="">
    <div class="receiver-info">
      <h3 class="receiver-name">${fullName}</h3>
      <p class="status">${time}</p>
    </div>
    <div class="receiver-msg">
      <p>${text}</p>
    </div>
  </div>
</div>
  `;
};

const receiverSingleMessage = (text) => {
  return `
  <div class="receiver-msg-single">
    <p>${text}</p>
  </div>
  `;
};

const senderMessage = (fullName,time,text,image) => {
  return`
  <div class="sender-container">
  <div class="sender-box">
    <div class="">
      <div class="sender-info">
        <h3 class="sender-name">${fullName}</h3>
        <p class="sender-date">${time}</p>
      </div>
      <div class="sender-msg">
        <p>${text}</p>
      </div>
    </div>
    <div class="profile-img">
      <img
        src=${image}
        alt=""
        class="img-profile"
      />
    </div>
  </div>
</div>
  `
};

const senderSingleMessage = (text) => {
  return `
     <div class="sender-single-msg-wraper">
              <div class="sender-msg-single">
                <p>
                ${text}
               </p>
              </div>
      </div>
  `;
};

/******************************
        RENDER MESSAGES
******************************/
function RenderMessages(groupeMessages, receiverName,IdReceiver,image) {
    Object.entries(groupeMessages).forEach(([timestamp, groupe]) => {
      groupe.forEach( (message, i) => { 

        const time = new Intl.DateTimeFormat('default',
        {
            hour12: true,
            hour: 'numeric',
            minute: 'numeric'
        }).format(message.send_at) 


          if(message.SENDER == IdReceiver){ 
            
          i==0 ? ConversationContainer.innerHTML += receiverMessage(receiverName,time,message.BODY,image):
              ConversationContainer.innerHTML += receiverSingleMessage(message.BODY)
          }else{ 
          i==0 ? 

            ConversationContainer.innerHTML += senderMessage(userName,time,message.BODY,imageRec):
            ConversationContainer.innerHTML += senderSingleMessage(message.BODY)
            console.log(message.BODY)

            
          }
      })
    });
}


/************************************
  MESSAGE AND CONTACT INFORMATION  
***********************************/
const GetMessages = async (sender, receiver,image) => {
  const res = await fetch("../../../APP/controllers/messages.php", {
    method: "POST",
    body: JSON.stringify({ sender, receiver }),
    headers: {
      "Content-Type": "application/json",
    },
  });
  const data = await res.json();

  if (data.success) {
    const IdReceiver = data.data['ID-USER']
    const fullName = `${data.data[1]} ${data.data[2]}`;
    // add image
    changeContactInfo(fullName,IdReceiver,image);
    //messages
    const groupedMessages = groupMessages(data.messages);

    ConversationContainer.innerHTML = ''
    RenderMessages(groupedMessages, fullName,IdReceiver,image);
  } else {
    alert(data.msg);
  }
};

/****************************
EVENT LISTENER ON THE PROFILE
****************************/
let image ;
contacts.addEventListener("click", (event) => {
  event.stopPropagation();

  if (event.target.classList.contains("single-contact")) {
    // the toggle animation
    main.classList.toggle("slide");

    // the the contact information clicked
    const receiverId = event.target.id;
    console.log(event.target.childNodes[1].childNodes[1])
      image = event.target.childNodes[1].childNodes[1]
     image = image.getAttribute('src')
     console.log(image)
    ConversationContainer.innerHTML =''
    GetMessages(2, +receiverId,image);

    // scroll bar to the bottom
    setTimeout(() => {
    scroll.scrollTop = scroll.scrollHeight;
    }, 200);
  }
});

/********************************
    SEND MESSAGE ICON
********************************/

sendForm.addEventListener('submit' ,(e) => { 

  e.preventDefault();
  // get the id of the user and the input 
  const IdContact = sendBox.getAttribute('id')
  const sendInput = document.querySelector('#send-input')
  const InputValue= sendInput.value

 
      // send a request to the controller
  const SendMessage = async ()=>{
      const res = await fetch("../../../APP/controllers/sendMessage.php", {
          method: "POST",
          body: JSON.stringify({ 
            text:InputValue, 
            receiverId:IdContact
          }),
          headers: {
            "Content-Type": "application/json",
          },
        });
      const data = await res.json();

      if(data.success){ 
        console.log(data)
 
 GetMessages(2, +IdContact,image);
sendInput.value  = ''
        setTimeout(() => {
          scroll.scrollTop = scroll.scrollHeight;
          }, 1600);
      }else{ 
        console.log(data)
      }
   }

   // send
   SendMessage()



})



/*********************************
  Get the user Name  
 *********************************/

const getUserName = async () => { 

  const res  = await fetch('../../../PUBLIC/util/getUserName.php')
   const data = await res.json()
   userName = data.userName;
  imageRec = data.photo

  
}

getUserName()
// ConversationContainer.innerHTML += `

//     ${receiverMessage('oussama jodar', '11 AM', 'Lorem ipsum dolor sit amet consectetur adipisicing elit')}
//     ${senderMessage('salim amin','12 AM','Lorem ipsum dolor sit amet consectetur adipisicing elit.' )}
//     ${receiverMessage('oussama jodar', '12 AM', 'Lorem ipsum dolor koadipisicing elit')}
//     ${receiverSingleMessage('oussama jodar', '12 AM', 'Lorem ipsum dolor koadipisicing elit')}
//     ${receiverSingleMessage('oussama jodar', '12 AM', 'Lorem ipsum dolor.')}
//     ${senderMessage('salim amin','12 AM','Lorem ipsum dolor sit amet consectetur adipisicing elit.' )}
//     ${senderSingleMessage('salim amin','12 AM','Lorem ipsum dolor sit amet consectetur adipisicing elit.' )}
    
// `