<?php

/*

--------------------------
Basic Information
--------------------------
School Code : school_code
School Name : school_name
Address : address
Phone : phone
Registration Date : registration_date
Email : email   
Fax : school_fax
Footer : footer
-------------------------
Setting Information:
-------------------------
Currency : currency
Currency Symbol : currency_symbol
Enable Frontend : enable_frontend
Exam final result : final_result_type
Latitude : school_lat
Longitude : school_lng
Api Key [ Get Api Key] : map_api_key
Language : language
Theme : theme_name
Online Admission : enable_online_admission
Zoom Api Key : zoom_api_key
Zoom Secret : zoom_secret
Enable RTL : enable_rtl
--------------------------
Social Information:
--------------------------
Facebook URL : facebook_url
Twitter URL : twitter_url
Linkedin URL : linkedin_url
Google Plus URL : google_plus_url
Youtube URL : youtube_url
Instagram URL : instagram_url
Pinterest URL : pinterest_url
-------------------------
Other Information: : 
-------------------------
Frontend Logo : frontend_logo
Admin Logo : logo




*/

// File upload folder 
$uploadDir = 'uploads/';

// Allowed file types 
// $allowTypes = array('pdf', 'doc', 'docx', 'jpg', 'png', 'jpeg'); 

// Default response 
$response = array(
    'status' => 0,
    'message' => 'Form submission failed, please try again.'
);


$errorEmpty = false;
$errorEmail = false;



// If form is submitted 
if (
    isset($_POST['school_code']) ||
    isset($_POST['school_name']) ||
    isset($_POST['address']) ||
    isset($_POST['phone']) ||
    isset($_POST['registration_date']) ||
    isset($_POST['email']) ||
    isset($_POST['school_fax']) ||
    isset($_POST['footer']) ||
    isset($_POST['currency']) ||
    isset($_POST['currency_symbol']) ||
    isset($_POST['enable_frontend']) ||
    isset($_POST['final_result_type']) ||
    isset($_POST['school_lat']) ||
    isset($_POST['school_lng']) ||
    isset($_POST['map_api_key']) ||
    isset($_POST['language']) ||
    isset($_POST['theme_name']) ||
    isset($_POST['enable_online_admission']) ||
    isset($_POST['zoom_api_key']) ||
    isset($_POST['zoom_secret']) ||
    isset($_POST['enable_rtl']) ||
    isset($_POST['facebook_url']) ||
    isset($_POST['twitter_url']) ||
    isset($_POST['linkedin_url']) ||
    isset($_POST['google_plus_url']) ||
    isset($_POST['youtube_url']) ||
    isset($_POST['instagram_url']) ||
    isset($_POST['pinterest_url']) ||
    isset($_POST['frontend_logo']) ||
    isset($_POST['logo'])
) {

    // Get the submitted form data 
    $school_code = $_POST['school_code'];
    $school_name = $_POST['school_name'];
    $school_address = $_POST['address'];
    $phone = $_POST['phone'];
    $registration_date = $_POST['registration_date'];
    $email = $_POST['email'];
    $fax  = $_POST['school_fax'];
    $footer = $_POST['footer'];
    $currency = $_POST['currency'];
    $symbol = $_POST['currency_symbol'];
    $enable_frontend = $_POST['enable_frontend'];
    $final_result = $_POST['final_result_type'];
    $school_lat = $_POST['school_lat'];
    $school_lan = $_POST['school_lng'];
    $map_api_key = $_POST['map_api_key'];
    $language = $_POST['language'];
    $theme_name = $_POST['theme_name'];
    $enable_online_adm = $_POST['enable_online_admission'];
    $zoom_api_key = $_POST['zoom_api_key'];
    $zoom_secret = $_POST['zoom_secret'];
    $enable_rtl = $_POST['enable_rtl'];
    $facebook = $_POST['facebook_url'];
    $twitter = $_POST['twitter_url'];
    $linkedIn = $_POST['linkedin_url'];
    $google = $_POST['google_plus_url'];
    $youtube = $_POST['youtube_url'];
    $instagram = $_POST['instagram_url'];
    $pinterest = $_POST['pinterest_url'];
    $frontend_logo = $_POST['frontend_logo'];
    $logo = $_POST['logo'];


    // echo $school_code;
    // echo $school_name;
    // echo $school_address;
    // echo $phone;
    // echo $registration_date;
    // echo $email;
    // echo $fax;
    // echo $footer;
    // echo $currency;
    // echo $symbol;
    // echo $enable_frontend;
    // echo $final_result;
    // echo $school_lat;
    // echo $school_lan;
    // echo $map_api_key;
    // echo $language;
    // echo $theme_name;
    // echo $enable_online_adm;
    // echo $zoom_api_key;
    // echo $zoom_secret;
    // echo $enable_rtl;
    // echo $facebook;
    // echo $twitter;
    // echo $linkedIn;
    // echo $google;
    // echo $youtube;
    // echo $instagram;
    // echo $pinterest;
    // echo $frontend_logo;
    // echo $logo;

    // Check whether submitted data is not empty 
    if (
        !empty($school_address) &&
        !empty($phone) &&
        !empty($email) &&
        !empty($symbol) &&
        !empty($language) &&
        !empty($theme_name) &&
        !empty($enable_online_adm)
    ) {

        $response['message'] = "not empty";
        Validate email 
        if (filter_var($email, FILTER_VALIDATE_EMAIL) === false) {
            $response['message'] = 'Please enter a valid email.';
            $errorEmail = true;
        } else {

            if ($errorEmpty == false && $errorEmail == false) {
                $uploadStatus = 1;

                // Upload file 
                $uploadedFile = '';

                if (!empty($_FILES["frontend_logo"]["name"])) {

                    // File path config 
                    $fileName = basename($_FILES["frontend_logo"]["name"]);
                    $targetFilePath = $uploadDir . $fileName;
                    $fileType = pathinfo($targetFilePath, PATHINFO_EXTENSION);

                    // check is file exists
                    if (file_exists($targetFilePath)) {
                        $response['message'] = "Sorry! file already exists";
                        $uploadStatus = 0;
                    } else {

                        // check is file size exeeds
                        if ($_FILES['frontend_logo']['size'] > 500000) { // 500kb 
                            $response['message'] = "Sorry! your file is too large";
                            $uploadStatus = 0;
                        } else {

                            // Upload file to the server
                            if (move_uploaded_file($_FILES["file"]["tmp_name"], $targetFilePath)) {
                                $uploadedFile = $fileName;
                                $uploadStatus = 1;
                            } else {

                                $response['message'] = "Sorry! an error occured";
                                $uploadStatus = 0;
                            }
                        }
                    }
                }

                if ($uploadStatus == 1) {
                    // Include the database config file 
                    // include_once 'dbConfig.php';

                    // // Insert form data in the database 
                    // $sqlQ = "INSERT INTO form_data (name,email,file_name,submitted_on) VALUES (?,?,?,NOW())";
                    // $stmt = $db->prepare($sqlQ);
                    // $stmt->bind_param("sss", $name, $email, $uploadedFile);
                    // $insert = $stmt->execute();

                    // if ($insert) {
                        $response['status'] = 1;
                        $response['message'] = 'Form data submitted successfully!';
                    // }
                }
            }
        }
    } else {
        $response['message'] = 'Please fill all the mandatory fields.';
        $errorEmpty = true;
    }
} 
 
// Return response 
echo json_encode($response);
