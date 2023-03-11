const form = document.querySelector('.form')
const email = document.querySelector('#email')
const password = document.querySelector('#password')
const errorMsg = document.querySelector('.error-msg')




/***********************
 * POST FUNCTION 
 ************************/

const PostData = async (url, formData) => { 

    return result = await fetch(url, { 
        method: 'POST', 
        body: JSON.stringify(formData), 
        headers : { 
        "Content-Type": "application/json",
        }
    })
}




/******************************
    FORM SUBMIT
*******************************/

form.addEventListener('submit', (event) => { 

    event.preventDefault()

    // get the values 
   const emailV = email.value
   const passwordV = password.value

    //  form empty 
    email.value= ""
    password.value= ""
      // verify the form data 



    // send the data to the server ( controller)
    const ControllerUrl = '../../../APP/controllers/SignIn.php'


    const formData = {
       email: emailV, 
        password: passwordV, 
    }


     // the the post function to send 
     PostData(ControllerUrl, formData)
     .then( response => { 
        return response.text()
    })
    .then(text => { 
        console.log(text)
        errorMsg.textContent = text
        errorMsg.style.display = "block"

        // remove the error msg after 1000ms 
        setTimeout(() => {
           errorMsg.style.display = 'none' 
        }, 1000);
    })





})


// print test
// console.log(firstNameV, lastNameV, emailV , passwordV,VerifyPasswordV , userRoleV); 