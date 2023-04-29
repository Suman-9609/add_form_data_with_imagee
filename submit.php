<?php

// Default response 
$response = array(
    'status' => 0,
    'message' => 'Form submission failed, please try again.'
);

// directory
$uploadDir = "./uploads/";


$errorEmpty = false;
$errorEmail = false;


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
    isset($_FILES['frontend_logo']) ||
    isset($_FILES['logo'])
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
    $frontend_logo = $_FILES['frontend_logo'];
    $logo = $_FILES['logo'];

    // $response['status'] = 1;
    // $response['message'] = 'Data successfully send to php.';

    // Check whether submitted data is not empty 
    if (!empty($school_address) && !empty($phone) && !empty($email) && !empty($symbol) && !empty($language) && !empty($theme_name) && !empty($enable_online_adm)) {

        // Validate email 
        if (filter_var($email, FILTER_VALIDATE_EMAIL) === false) {
            $response['message'] = 'Please enter a valid email.';
            $errorEmail = true;
        } else {

            if ($errorEmpty == false && $errorEmail == false) {
                $uploadStatus = 1;

                // Upload file 
                $uploadedFile = '';

                if (!empty($_FILES["frontend_logo"]["name"]) && !empty($_FILES["logo"]["name"])) {
                    // File path config 
                    $fileName = basename($_FILES["frontend_logo"]["name"]);
                    $fileName2 = basename($_FILES["logo"]["name"]);
                    $targetFilePath = $uploadDir . $fileName;
                    $targetFilePath2 = $uploadDir . $fileName2; 
                    $fileType = pathinfo($targetFilePath, PATHINFO_EXTENSION);
                    $fileType2 = pathinfo($targetFilePath2, PATHINFO_EXTENSION);

                    if (move_uploaded_file($_FILES["frontend_logo"]["tmp_name"], $targetFilePath) && move_uploaded_file($_FILES["logo"]["tmp_name"], $targetFilePath2)) {
                        $uploadedFile = $fileName;
                        $uploadStatus = 1;
                        $response['status'] = 1;
                        $response['message'] = 'image successfully send to php.';
                    } else {
                        $uploadStatus = 0;
                        $response['status'] = 0;
                        $response['message'] = "Sorry! Something went wrong...";
                    }

                    // check is file exist
                    // if(file_exists($targetFilePath)) {
                    //     $uploadStatus = 0;
                    //     $response['message'] ="Sorry! file already exists";
                    // } else {

                    //     if($_FILES['frontend_logo'] > 500000) {
                    //         $uploadStatus = 0;
                    //         $response['message'] ="Sorry! file Sise is too many large"; 
                    //     } else {
                    //         //  Upload file to the server
                    //         if (move_uploaded_file($_FILES["frontend_logo"]["tmp_name"], $targetFilePath)) {
                    //             $uploadedFile = $fileName;
                    //             $uploadStatus = 1;
                    //         } else {

                    //             $response['message'] = "Sorry! an error occured";
                    //             $uploadStatus = 0;
                    //         }
                    //     }
                    // }

                }
            }
        }
    } else {
        $response['message'] = "Field name is empty";
        $errorEmpty = true;
    }
} else {
    $response['status'] = 0;
    $response['message'] = 'Please fill all the mandatory fields.';
}


echo json_encode($response);
