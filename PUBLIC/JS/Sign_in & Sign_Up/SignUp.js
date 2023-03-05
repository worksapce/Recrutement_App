const form = document.querySelector('.form')
const firstName = document.querySelector('#firstName')
const lastName = document.querySelector('#lastName')
const email = document.querySelector('#email')
const password = document.querySelector('#password')
const VerifyPassword = document.querySelector('#VerifyPassword')
const userRole = document.querySelector('#role')
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
    const firstNameV = firstName.value 
    const lastNameV  = lastName.value
    const emailV = email.value
    const passwordV = password.value
    const VerifyPasswordV = VerifyPassword.value
    const userRoleV = userRole.value

    //  form empty 
    firstName.value  =  ""
    lastName.value = ""
    email.value= ""
    password.value= ""
    VerifyPassword.value= ""
    userRole.value = ""

    // verify the form data 



    // send the data to the server ( controller)
    const ControllerUrl = '../../../APP/controllers/SignUp.php'

    const formData = {
        firstName: firstNameV, 
        lastName:  lastNameV, 
        email: emailV, 
        password: passwordV, 
        VerifyPassword: VerifyPasswordV, 
        userRole: userRoleV
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