
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
        $productname = $dData['productName'];
        // $productmname = "testing2";
        $productmname = $dData['menufacturerName'];
        // $productmodel = "testing3";
        $productmodel = $dData['modelName'];
        // $productprice = "testing4";
        $productprice = $dData['productPrice'];
        // $productimg = "testing11";
        $productimg = $dData['productImg'];
        
        $producttype = $dData['productType'];
        $dataId = $dData['dataId'];
        // $productid = "23";
 
        $result = "";

      
 
        if($productname != "" ){
             


        //   $sql = "INSERT INTO productsinfo (pname, pmname, pmodel,ptype, pprice, pimg)
        //    VALUES ('$productname', '$productmname', '$productmodel','$producttype', '$productprice', '$productimg')
        //    WHERE id=2;
        //    ";
        //   $sql = "UPDATE productsinfo (pname, pmname, pmodel,ptype, pprice)
        //    VALUES ('$productname', '$productmname', '$productmodel','$producttype', '$productprice')
        //    WHERE id='$productid';";

   
            $sql = " UPDATE productsinfo
            SET pname = '$productname', pmname= '$productmname', pmodel= '$productmodel', ptype= '$producttype', pprice= '$productprice'
            WHERE id = '$dataId'";
            // WHERE id = '15'";

          $res = mysqli_query($mysqli, $sql);


            // echo "Failed to connect to MySQL: " .$res;
        
            if($res){
                $result = "Update record successfully!";
                echo $result;
            }
            else{
                $result = "Failed ";
            }
        }
        else{
            $result = "Update record Successfully ";
        }
 
        $mysqli -> close();
        $response[] = array("result" => $result);
        echo json_encode($response);
    }
 
?>