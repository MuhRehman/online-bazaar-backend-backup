
<?php
 
    header("Access-Control-Allow-Origin: *");
    header("Access-Control-Allow-Methods: GET, POST");
    header("Access-Control-Allow-Headers: Content-Type");
 
    $mysqli  = new mysqli("localhost", "root", "", "bazaar_db");
    // if(mysqli_connect_error()){
    //     echo mysqli_connect_error();
    //     exit();
    // }
    if ($mysqli -> connect_errno) {
        echo "Failed to connect to MySQL: " . $mysqli -> connect_error;
        exit();
    }else{
        error_reporting(E_ERROR | E_PARSE);
        $eData = file_get_contents("php://input");
        $dData = json_decode($eData, true);
          
    
        
        $productId = $dData['productIds'];

        $result = "";
        $resultProduct = "";
 
       
        if ($productId != "") {
            // $sql = "SELECT * FROM users WHERE email='$email' AND password='$pass';";

            // echo $productId;
            // exit();
            // $sql = "SELECT id,name,email,roleid,statusid FROM users WHERE email='$email' AND password='$pass';";
            $sql = "DELETE FROM productsinfo WHERE id = '$productId'";
   
            $res = mysqli_query($mysqli, $sql);
             
            
            
            if (mysqli_num_rows($res) != 0) {
             
                $data = mysqli_fetch_row($res);
                // http_response_code(401); // Unauthorized
                $result = $data;
                // $result = "login";
            } else {
                $result = "Delete Failed";
                http_response_code(200); // OK
            }
        } else {
            $result = "";
        }
     
            // $sql = "SELECT * FROM productsinfo";
            // $sql = "DELETE FROM productsinfo WHERE id = '$productId'";
            //     //   echo mysqli_connect_error();
            //     //    exit();
             
            // $res = mysqli_query($mysqli, $sql);
           
     
           
            // if (mysqli_num_rows($res) != 0) {
            
            // // Fetch all
            // $result  =  $res -> fetch_all(MYSQLI_ASSOC);
                 
            // } else {
            //     $result = "feedback failed ";
                
            //     $resultProduct = [];
            // }
      
 
        $mysqli -> close();
        // $response[] = $resultProduct;
        $response[] = array("result" => $result);

        echo json_encode($response);
    }
 
?>