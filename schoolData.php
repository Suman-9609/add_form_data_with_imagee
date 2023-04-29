<?php

// $jsonurl='http://website.com/international.json'; 
  
  $json = '
  {
    "apiId": "1111",
    "apiName": "School Master",
    "apiVersion": "1.0",
    "developedBy": "UDISE Plus Team, NIC, MoE",
    "method": "GET",
    "releasedOn": "25-04-2020 04:32:45 PM",
    "requestedOn": "01-03-2021 03:42:01 PM",
    "requestedBy": "",
    "authenticationType": "None",
    "responseId": 92737,
    "data": {
        "result": {
            "udiseCode": "16010102412",
            "schoolName": "SWAMI DYALANANDA J.B SCHOOL",
            "schoolCategory": 1,
            "schoolManagementCenter": 1,
            "schoolManagementState": 11,
            "schoolType": 3,
            "classFrom": 1,
            "classTo": 5,
            "stateCode": "16",
            "stateName": "Tripura",
            "districtName": "WEST TRIPURA",
            "blockName": "AGARTALA MUNICIPAL COORPORATION",
            "locationType": 2,
            "headOfSchoolMobile": "89******42",
            "respondentMobile": "88******96",
            "alternateMobile": "",
            "schoolEmail": ""
        }
    },
    "statusCode": 200,
    "statusMessage": "Successful"
}'  ;

  $json_output = json_encode($json); 
  echo $json_output;


?>

   