
<?php
 
    header("Access-Control-Allow-Origin: *"); //add this CORS header to enable any domain to send HTTP requests to these endpoints:
    header("Access-Control-Allow-Methods: GET, POST");
    header("Access-Control-Allow-Headers: Content-Type");
 


        $mysqli = new mysqli("localhost", "root", "", "bazaar_db");
        if ($mysqli -> connect_errno) {
            echo "Failed to connect to MySQL: " . $mysqli -> connect_error;
            exit();
        }else{


 
    
            error_reporting(E_ERROR | E_PARSE);
        $eData = file_get_contents("php://input");
        $dData = json_decode($eData, true);
 
          




        // $productname = "testing1";
        $customerName = $dData['customerName'];
        // $productmname = "testing2";
        $customerEmail = $dData['customerEmail'];
        // $productmodel = "testing3";
        $customerProductimage = $dData['customerProductimage'];
        // $productprice = "testing4";
        $customerComplaint = $dData['customerComplaint'];
 
        $result = "";

      
 
        if($customerName != "" and $customerEmail != "" and $customerComplaint != "" ){
           
           
            $sql = "INSERT INTO customercomplaint(cname,cemail, cproductimage, ccomplaint) VALUES ('$customerName', '$customerEmail', '$customerProductimage','$customerComplaint')";
            // $sql = "INSERT INTO customercomplaint(cname,cemail, cproductimage, ccomplaint) VALUES ('awawc', 'asdsad', 'dddwawd','dd')";
       
            $res = mysqli_query($mysqli, $sql);


            // echo "Failed to connect to MySQL: " .$res;
        
            if($res){
                $result = "You have  customer Complaint Insert a record successfully!";
                echo $result;
            }
            else{
                $result = "Failed ";
            }
        }
        else{
            $result = "Successfull ";
        }
 
        $mysqli -> close();
        $response[] = array("result" => $result);
        echo json_encode($response);
    }
 
?>