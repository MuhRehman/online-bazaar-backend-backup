
<?php
 
    header("Access-Control-Allow-Origin: *"); //add this CORS header to enable any domain to send HTTP requests to these endpoints:
    header("Access-Control-Allow-Methods: GET, POST");
    header("Access-Control-Allow-Headers: Content-Type");
 
    // $conn = new mysqli("localhost", "root", "", "bazaar_db");
    // if(mysqli_connect_error()){
    //     echo mysqli_connect_error();
    //     exit();
    // }
    // else{

        $mysqli = new mysqli("localhost", "root", "", "bazaar_db");
        if ($mysqli -> connect_errno) {
            echo "Failed to connect to MySQL: " . $mysqli -> connect_error;
            exit();
        }else{


 
    
            error_reporting(E_ERROR | E_PARSE);
        $eData = file_get_contents("php://input");
        $dData = json_decode($eData, true);
 
          




        // $productname = "testing1";
        $feedbackId = $dData['userid'];
        // $productmname = "testing2";
        $feeddbackuserId = $dData['feeddbackuserId'];
        $usernamefeedback = $dData['usernamefeedback'];
        // $productmodel = "testing3";
        $productfeedback = $dData['userfeedback'];
        // $productfeedback = "sssssssssssssssssssssssssssssssssssss ds dksd ks dlskdn ";
        // $productprice = "testing4";
        $productrating = $dData['userratings'];
        // $productrating = "45";
        // $productimg = "testing11";
        $feedbackdatatime = $dData['feedbackDatetime'];
        // $feedbackdatatime = "Sun May 19 2024 03:42:36 GMT+0500 (Pakistan Standard Time)";
        // echo  $productfeedback ;
            
        // exit();
 
        $result = "";

      
 
        // if($productfeedback != ""  ){
            // $sql = "INSERT INTO productsinfo(pname, pmname, pmodel, pprice, pimg ) VALUES('productname1','productmname1',' 'productmodel1', 'productprice1','1productimg');";
            // id		feedback	rating	datetime
            $sql = "INSERT INTO feedbackdetails( userId,feedbacktext,ratingstar) VALUES('$feedbackId','$productfeedback','$productrating')";
            // $sql = "INSERT INTO feedback(id, userId,feedback, rating, datetimetext,usernamefeedback) VALUES 
            // ('$feedbackId','$feedbackId','$productfeedback','$productrating','$feedbackdatatime','$usernamefeedback')";
       
            // $sql = "INSERT INTO productsinfo(pname, pmname, pmodel, pprice, pimg ) VALUES('$productname','$productmname',' '$productmodel', '$productprice','$productimg');";
            
            $res = mysqli_query($mysqli, $sql);


            // echo "Failed to connect to MySQL: " .$res;
        
            if($res){
                $result = "You have Insert a record successfully!";
                echo $result;
            }
            
            else{
                $result = "Failed ";
            }
        // }
        // else{
        //     $result = "Successfull ";
        // }
 
        $mysqli -> close();
        $response[] = array("result" => $result);
        echo json_encode($response);
    }
 
?>