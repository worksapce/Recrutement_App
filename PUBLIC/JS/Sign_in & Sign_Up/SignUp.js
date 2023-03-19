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
const PostData = async (url, formData, target) => { 

    const res = await fetch(url, { 
        method: 'POST', 
        body: JSON.stringify(formData), 
        headers : { 
        "Content-Type": "application/json",
        }
    })

    const data= await res.json()
    if(data.success){ 
        console.log(data.token)
        alert('successfully registered, please verify you Email')
         target.submit()
    }else{  
        
        errorMsg.textContent = data.msg
        errorMsg.style.display = 'block'
        setTimeout(() => {
        errorMsg.style.display = 'none'
        }, 1500);

    }
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
    
    console.log(passwordV, VerifyPasswordV)
    // verify the form data 
    if(passwordV != VerifyPasswordV){ 
        console.log('here....')
          errorMsg.textContent = 'password did not match.'
        errorMsg.style.display = 'block'
        setTimeout(() => {
        errorMsg.style.display = 'none'
        }, 1500);
    }


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
     PostData(ControllerUrl, formData, event.target)

})

