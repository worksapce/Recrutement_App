<?php 
// get the from data from the request
$formData = json_decode(file_get_contents('php://input'), true);

http_response_code(200); 


if(isset($formData['email'])){ 
echo "from the sign In page".$formData['email'];
}

