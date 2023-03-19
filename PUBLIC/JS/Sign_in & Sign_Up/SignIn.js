const form = document.querySelector('.form')
const email = document.querySelector('#email')
const password = document.querySelector('#password')
const errorMsg = document.querySelector('.error-msg')




/***********************
 * POST FUNCTION 
 ************************/
const PostData = async (url, formData,event) => { 

    const res = await fetch(url, { 
        method: 'POST', 
        body: JSON.stringify(formData), 
        headers : { 
        "Content-Type": "application/json",
        }
    })

    const data = await res.json()
    if(data.success){ 
        console.log('data when success: ' , data)
        event.submit();
        
    }else{ 
        if(res.ok){ 
             console.log(data.userRole)
             userRole = 'Candidate' ? window.location.href = "http://localhost/Recrutement_App/APP/views/Candidat/Downloadcv.php" : window.location.href = "http://localhost/Recrutement_App/APP/views/Candidat/inscriptionRh.php"
        
            console.log(data)
            errorMsg.textContent = data.msg
            errorMsg.style.display = 'block'
                setTimeout(() => { 
                    errorMsg.style.display = 'none'
                },2000) 
            }
        }

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
      // verify the form data 



    // send the data to the server ( controller)
    const ControllerUrl = '../../../APP/controllers/SignIn.php'


    const formData = {
       email: emailV, 
        password: passwordV, 
    }

   
     // the the post function to send 
     PostData(ControllerUrl, formData, event.target)


})
