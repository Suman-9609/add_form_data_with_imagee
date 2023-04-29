<?php




if(isset($_GET["id"])) {

    if(!empty($_GET['id'])) {
        $data = $_GET['id'];
    } else {
        echo "Alert you can't leave with school code";
    }

    echo json_encode($data);
    
}
