const slideBtn = document.querySelectorAll(".slide-btn");
const main = document.querySelector(".main");
const contacts = document.querySelector(".contacts");
const headerConv = document.querySelector(".header-conv");
const SingleContact = document.querySelectorAll(".single-contact");
const ConversationContainer = document.querySelector(".conversation-body");
const ConverstationBody = document.querySelector(".conversation-body");
const contactName = document.querySelectorAll(".contact-name");

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

const RenderProfile = (id, fullName, lastMessage) => {
  contacts.innerHTML += `
          <div class="single-contact" id="${id}" >
                      <div class="profile-img">
                          <img src="../../../PUBLIC/Images/chatApp/profile-img1.png" alt="profile-img">
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

  if (data.success) {
    data.data.forEach((el) => {
      RenderProfile(el["ID-USER"], el.Nom + " " + el.Prenom, "hello from here");
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
function changeContactInfo(fullName) {
  const profileName = document.querySelector(".profile-name");
  profileName.textContent = fullName;
}

/*************************************
  FUNCTION GROUPE MESSAGES BY MINUIT
*************************************/

function groupMessages(messages) {
  return (grouped = messages.reduce((groups, message) => {
    const timestamp = new Date(message.send_at);
    const minute = timestamp.toISOString().substr(0, 16);
    if (!groups[minute]) {
      groups[minute] = [];
    }
    groups[minute].push({
      ...message,
      send_at: timestamp.getTime(),
    });
    return groups;
  }, {}));
}

/******************************
        MESSAGES BOX 
******************************/

const receiverMessage = (fullName, time, text) => {
  return `
  <div class="receiver-box">
  <div class="profile-img">
    <img src="../../../PUBLIC/Images/chatApp/pexels-photo-771742.jpeg" alt="" />
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

const senderMessage = (fullName,time,text) => {
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
        src="../../../PUBLIC/Images/chatApp/profile-img1.png"
        alt=""
        srcset=""
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
function RenderMessages(groupeMessages) {
  Object.entries(groupeMessages).forEach(([timestamp, groupe]) => {
    groupe.reduce((prev, curr, i, a) => {
      if (i === 0) {
        if (curr.RECIVER == 2) console.log("display right", curr.BODY);
        else console.log("Display Left:", curr.BODY);
      } else {
        if (a[i - 1].RECIVER == curr.RECIVER)
          console.log("single right:", curr.BODY);
        else console.log("Left: ", curr.BODY);
      }
    });
  });
}

/************************************
  MESSAGE AND CONTACT INFORMATION  
***********************************/
const GetMessages = async (sender, receiver) => {
  const res = await fetch("../../../APP/controllers/messages.php", {
    method: "POST",
    body: JSON.stringify({ sender, receiver }),
    headers: {
      "Content-Type": "application/json",
    },
  });
  const data = await res.json();

  if (data.success) {
    const fullName = `${data.data[1]} ${data.data[2]}`;
    changeContactInfo(fullName);

    //messages
    console.log(data.messages);
    const groupedMessages = groupMessages(data.messages);
    console.log("grouped: ", groupedMessages);
    RenderMessages(groupedMessages);
  } else {
    alert(data.msg);
  }
};

/****************************
EVENT LISTENER ON THE PROFILE
****************************/

contacts.addEventListener("click", (event) => {
  event.stopPropagation();

  if (event.target.classList.contains("single-contact")) {
    // the toggle animation
    main.classList.toggle("slide");

    // the the contact information clicked
    const receiverId = event.target.id;
    GetMessages(2, +receiverId);

    // scroll bar to the bottom
    scroll.scrollTop = scroll.scrollHeight;
  }
});



ConversationContainer.innerHTML += `

    ${receiverMessage('oussama jodar', '11 AM', 'Lorem ipsum dolor sit amet consectetur adipisicing elit')}
    ${senderMessage('salim amin','12 AM','Lorem ipsum dolor sit amet consectetur adipisicing elit.' )}
    ${receiverMessage('oussama jodar', '12 AM', 'Lorem ipsum dolor koadipisicing elit')}
    ${receiverSingleMessage('oussama jodar', '12 AM', 'Lorem ipsum dolor.')}
`