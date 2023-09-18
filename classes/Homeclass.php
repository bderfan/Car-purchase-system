<?php

require_once('Databaseclass.php');

class Homeclass extends Databaseclass{
    
    public function index(){
        
      $connection = $this->connection;
        
      $car_brand_view_query = "SELECT * FROM car_brand WHERE status='1'";
        
      $result = $connection->query($car_brand_view_query);
        
      if($connection->error){
          die('Table error: '.$connection->error);
      }
        
      return $result;
    }
    
    public function Car_details($x){
        $connection = $this->connection;
        
        $car_details_view_query = "SELECT * FROM car_details WHERE car_brand_id='$x' and status='1'";
        
        $result = $connection->query($car_details_view_query);
        
        if($connection->error){
            die('Table error: '.$connection->error);
        }
        
        return $result;
    }
    
    public function Customer_update(){
        $updateemail = $_POST['updateemail'];
        
        $first_name = $_POST['first_name'];
        $last_name = $_POST['last_name'];
        $age = $_POST['age'];
        $gender = $_POST['gender'];
        $phone_number = $_POST['phone_number'];
        $address = $_POST['address'];
      
        $real_name = $_FILES['image']['name'];
        $tmp_name = $_FILES['image']['tmp_name'];
        $img_size = $_FILES['image']['size'];
        
        $errors = [];
        
        if(strlen($first_name) == 0){
            $errors['first_name'] = 'Field can not be empty...';
        }
        if(strlen($last_name) == 0){
            $errors['last_name'] = 'Field can not be empty...';
        }
        if(strlen($age) == 0){
            $errors['age'] = 'Field can not be empty...';
        }
        if(strlen($gender) == 0){
            $errors['gender'] = 'Field can not be empty...';
        }
        if(strlen($phone_number) == 0){
            $errors['phone_number'] = 'Field can not be empty...';
        }
        if(strlen($address) == 0){
            $errors['address'] = 'Field can not be empty...';
        }
        
        if($tmp_name){
            $get_img_extension = strtolower(pathinfo($real_name,PATHINFO_EXTENSION));
        
            $target_extension = ['jpg','jpeg','png','JPEG','JPG'];
        
            if(!in_array($get_img_extension,$target_extension)){
                echo $errors['image'] = 'File format should be jpg/jpeg/png/JPEG/JPG';
            }
            if($img_size>1048576){
                echo $errors['image'] = 'Image size can not exceed 1Mb';
            }
        }
        
        if(count($errors) > 0){
         return[
              'status' => 'error',
              'message' => $errors
         ];
        }
        
        $success = [];
        $connection = $this->connection;
        
        $customer_view_query = "SELECT * FROM customer_info WHERE email='$updateemail'";
        
        $result = $connection->query($customer_view_query);
        
        if($connection->error){
            die('Table error: '.$connection->error);
        }
        
        
        $customer_info = $result->fetch_assoc();
        
        
        
       
        $make_path = '../images/customer_img';
            
        if(!file_exists($make_path)){
             mkdir($make_path);
        }
            
        $image_name = time().$customer_info['first_name'].$customer_info['last_name'].'.'.$get_img_extension;
            
        $path = $make_path.'/'.$image_name;
      
        
        
        
        move_uploaded_file($tmp_name, $path);
      

        $update_customer_query = "UPDATE customer_info SET first_name='$first_name', last_name='$last_name', age='$age', gender='$gender', phone_number='$phone_number', address='$address', image='$image_name' WHERE email='$updateemail'";
        
        $result = $connection->query($update_customer_query);
        
        if($connection->error){
            die('Table error: '.$connection->error);
        }
        
       
         $success['success'] = 'Customer data updated succesfully!';
        
         return[
             'status' => 'success',
             'message' => $success['success']
         ];
    }
    
    
    public function allBrands($z){
        
      $connection = $this->connection;
        
      $car_brand_view_query = "SELECT * FROM car_brand WHERE id='$z'";
        
      $result = $connection->query($car_brand_view_query);
        
      if($connection->error){
          die('Table error: '.$connection->error);
      }
        
      return $result;
    }  
    
    
    public function Getselectedcar($z){
        $connection = $this->connection;
        
        $car_details_view_query = "SELECT * FROM car_details WHERE id='$z'";
        
        $result = $connection->query($car_details_view_query);
        
        if($connection->error){
            die('Table error: '.$connection->error);
        }
        
        return $result;
    }
    
    public function GetCustomer($r){
        $connection = $this->connection;
        
        $customer_view_query = "SELECT * FROM customer_info WHERE email='$r'";
        
        $result = $connection->query($customer_view_query);
        
        if($connection->error){
            die('Table error: '.$connection->error);
        }
        
        return $result->fetch_assoc();
    }
    
    
    public function Customerdata($m,$n){
        $connection = $this->connection;
        
        $car_details_view_query = "SELECT * FROM car_details WHERE id='$m'";
        
        $result = $connection->query($car_details_view_query);
        
        if($connection->error){
            die('Table error: '.$connection->error);
        }
        
        
        $get_car_details = $result->fetch_assoc();
        
        $car_id = $m;
        $car_name = $get_car_details['car_name'];
        $car_price = $get_car_details['price'];
        $car_details = $get_car_details['details'];
        $car_image = $get_car_details['image'];
        
        $customer_view_query = "SELECT * FROM customer_info WHERE email='$n'";
        
        $result = $connection->query($customer_view_query);
        
        if($connection->error){
            die('Table error: '.$connection->error);
        }
        
        
        $get_customer_info = $result->fetch_assoc();
        
        $first_name = $get_customer_info['first_name'];
        $last_name = $get_customer_info['last_name'];
        $phone_no = $get_customer_info['phone_number'];
        $address = $get_customer_info['address'];
        
        
        $insert_customerinformation_query = "INSERT INTO customer_information(first_name, last_name, phone_no, address, car_id, car_name, car_price, car_details, car_image)VALUES('$first_name', '$last_name', '$phone_no', '$address', '$car_id', '$car_name', '$car_price', '$car_details', '$car_image')";
        
        $result = $connection->query($insert_customerinformation_query);
        
        if($connection->error){
            die('Table error: '.$connection->error);
        }
        
        
        
        $update_customerinformation_query = "UPDATE customer_information SET status='1'";
        
        $result = $connection->query($update_customerinformation_query);
        
        if($connection->error){
            die('Table error: '.$connection->error);
        }
        
        
        $customer_information_view_query = "SELECT * FROM customer_information WHERE first_name='$first_name'";
        
        $result = $connection->query($customer_information_view_query);
        
        if($connection->error){
            die('Table error: '.$connection->error);
        }
         
        
        
        return true;
        
    }
    
    
     public function get_Selectedcar($v){
        $connection = $this->connection;
        
        $car_details_view_query = "SELECT * FROM car_details WHERE id='$v'";
        
        $result = $connection->query($car_details_view_query);
        
        if($connection->error){
            die('Table error: '.$connection->error);
        }
        
        return $result->fetch_assoc();
    }
    
    
    public function Paymentmethod($t,$h){
        
        $payment_method = $_POST['payment_method'];
        $bankloan_payment_profession = $_POST['bankloan_payment_profession'];
        $cash_payment = $_POST['cash_payment'];
        
        $city = $_POST['city'];
        $period = $_POST['period'];
        $bank_name = $_POST['bank_name'];
        $branch_name = $_POST['branch_name'];
        $account_no = $_POST['account_no'];
        $account_type = $_POST['account_type'];
        $currency = $_POST['currency'];
        $account_status = $_POST['account_status'];
        $generation_date = $_POST['generation_date'];
        $total_amount = $_POST['total_amount'];
        $City = $_POST['City'];
        $Period = $_POST['Period'];
        $Bank_name = $_POST['Bank_name'];
        $Branch_name = $_POST['Branch_name'];
        $Account_no = $_POST['Account_no'];
        $Account_type = $_POST['Account_type'];
        $Currency = $_POST['Currency'];
        $Account_status = $_POST['Account_status'];
        $Generation_date = $_POST['Generation_date'];
        $Total_amount = $_POST['Total_amount'];
        $card_number = $_POST['card_number'];
        $expired_date = $_POST['expired_date'];
        $cvv = $_POST['cvv'];
        $account_number = $_POST['account_number'];
        $BANK_name = $_POST['BANK_name'];
        $swift_code = $_POST['swift_code'];
        $branch_code = $_POST['branch_code'];
              
                
        $errors = [];
    
        
        
        if(!$payment_method && !in_array($payment_method,['bl' , 'cp'])){
              $errors['payment_method'] = 'Empty payment method';
        }
        if($payment_method && $payment_method == 'bl'){
            if(!$bankloan_payment_profession && !in_array($bankloan_payment_profession,['officer' , 'businessman'])){
                $errors['bankloan_payment_profession'] = 'Please select your Profession';
            }
            
            if($bankloan_payment_profession && $bankloan_payment_profession == 'officer'){
               
                
               if(strlen($city) == 0){
                   $errors['city'] = 'Please enter your city';
               }
               if(strlen($city) > 100){
                  $errors['city'] = 'Your city can not exceed 100 characters';
               }
               if(strlen($period) == 0){
                   $errors['period'] = 'Please enter your bank account period';
               }
               if(strlen($period) > 255){
                 $errors['period'] = 'Your bank account period can not exceed 255 characters';
               }
               if(strlen($bank_name) == 0){
                   $errors['bank_name'] = 'Please enter your bank name';
               }
               if(strlen($bank_name) > 255){
                 $errors['bank_name'] = 'Your bank name can not exceed 255 characters';
               }
               if(strlen($branch_name) == 0){
                   $errors['branch_name'] = 'Please enter your bank branch name';
               }
               if(strlen($branch_name) > 100){
                 $errors['branch_name'] = 'Your bank branch name can not exceed 100 characters';
               }
               if(strlen($account_no) == 0){
                   $errors['account_no'] = 'Please enter your bank account number';
               }
               if(strlen($account_no) > 255){
                  $errors['account_no'] = 'Your bank account number can not exceed 255 digits';
               }
               if(strlen($account_type) == 0){
                   $errors['account_type'] = 'Please mention your bank account type';
               }
               if(strlen($account_type) > 100){
                  $errors['account_type'] = 'Your bank account type can not exceed 100 characters';
               }
               if(strlen($currency) == 0){
                   $errors['currency'] = 'Please enter your bank currency';
               }
               if(strlen($currency) > 100){
                  $errors['$currency'] = 'Your bank currency can not exceed 100 characters';
               }
               if(strlen($account_status) == 0){
                   $errors['account_status'] = 'Please enter your bank account status';
               }
               if(strlen($account_status) > 100){
                  $errors['account_status'] = 'Your bank account status can not exceed 100 characters';
               }
               if(strlen($generation_date) == 0){
                   $errors['generation_date'] = 'Please enter generation date';
               }
               if(strlen($generation_date) > 255){
                  $errors['generation_date'] = 'Generation date can not exceed 255 characters';
               }
               if(strlen($total_amount) == 0){
                   $errors['total_amount'] = 'Please enter your total amount';
               }
               if(strlen($total_amount) > 255){
                  $errors['total_amount'] = 'Your total amount can not exceed 255 characters';
               }
            }
            
            
            
            if($bankloan_payment_profession && $bankloan_payment_profession == 'businessman'){
               
                
               if(strlen($City) == 0){
                   $errors['City'] = 'Please enter your city';
               }
               if(strlen($City) > 100){
                  $errors['City'] = 'Your city can not exceed 100 characters';
               }
               if(strlen($Period) == 0){
                   $errors['Period'] = 'Please enter your bank account period';
               }
               if(strlen($Period) > 255){
                 $errors['Period'] = 'Your bank account period can not exceed 255 characters';
               }
               if(strlen($Bank_name) == 0){
                   $errors['Bank_name'] = 'Please enter your bank name';
               }
               if(strlen($Bank_name) > 255){
                 $errors['Bank_name'] = 'Your bank name can not exceed 255 characters';
               }
               if(strlen($Branch_name) == 0){
                   $errors['Branch_name'] = 'Please enter your bank branch name';
               }
               if(strlen($Branch_name) > 100){
                 $errors['Branch_name'] = 'Your bank branch name can not exceed 100 characters';
               }
               if(strlen($Account_no) == 0){
                   $errors['Account_no'] = 'Please enter your bank account number';
               }
               if(strlen($Account_no) > 255){
                  $errors['Account_no'] = 'Your bank account number can not exceed 255 digits';
               }
               if(strlen($Account_type) == 0){
                   $errors['Account_type'] = 'Please mention your bank account type';
               }
               if(strlen($Account_type) > 100){
                  $errors['Account_type'] = 'Your bank account type can not exceed 100 characters';
               }
               if(strlen($Currency) == 0){
                   $errors['Currency'] = 'Please enter your bank currency';
               }
               if(strlen($Currency) > 100){
                  $errors['$Currency'] = 'Your bank currency can not exceed 100 characters';
               }
               if(strlen($Account_status) == 0){
                   $errors['Account_status'] = 'Please enter your bank account status';
               }
               if(strlen($Account_status) > 100){
                  $errors['Account_status'] = 'Your bank account status can not exceed 100 characters';
               }
               if(strlen($Generation_date) == 0){
                   $errors['Generation_date'] = 'Please enter generation date';
               }
               if(strlen($Generation_date) > 255){
                  $errors['Generation_date'] = 'Generation date can not exceed 255 characters';
               }
               if(strlen($Total_amount) == 0){
                   $errors['Total_amount'] = 'Please enter your total amount';
               }
               if(strlen($Total_amount) > 255){
                  $errors['Total_amount'] = 'Your total amount can not exceed 255 characters';
               }
            }
        }
        
        
        if($payment_method && $payment_method == 'cp'){
            if(!$cash_payment && !in_array($cash_payment,['dp' , 'ft'])){
                $errors['cash_payment'] = 'Please select cash payment system';
            }
            
            if($cash_payment && $cash_payment == 'dp'){
               
                
               if(strlen($card_number) == 0){
                   $errors['card_number'] = 'Please enter your card number';
               }
               if(strlen($card_number) > 100){
                  $errors['card_number'] = 'Your card number can not exceed 100 characters';
               }
               if(strlen($expired_date) == 0){
                   $errors['expired_date'] = 'Please enter your account expired date';
               }
               if(strlen($expired_date) > 20){
                 $errors['expired_date'] = 'Your account expired date can not exceed 20 characters';
               }
               if(strlen($cvv) == 0){
                   $errors['cvv'] = 'Please enter your account card cvv number';
               }
               if(strlen($cvv) > 10){
                 $errors['cvv'] = 'Your account card cvv number can not exceed 10 characters';
               }
            }
            
            
            
            if($cash_payment && $cash_payment == 'ft'){
               
                
               if(strlen($account_number) == 0){
                   $errors['account_number'] = 'Please enter your account number';
               }
               if(strlen($account_number) > 100){
                  $errors['account_number'] = 'Your account number can not exceed 100 characters';
               }
               if(strlen($BANK_name) == 0){
                   $errors['BANK_name'] = 'Please enter your bank name';
               }
               if(strlen($BANK_name) > 150){
                 $errors['BANK_name'] = 'Your bank name can not exceed 150 characters';
               }
               if(strlen($swift_code) == 0){
                   $errors['swift_code'] = 'Please enter your bank account swift code';
               }
               if(strlen($swift_code) > 100){
                 $errors['swift_code'] = 'Your bank account swift code can not exceed 100 characters';
               }
               if(strlen($branch_code) == 0){
                   $errors['$branch_code'] = 'Please enter your bank branch code';
               }
               if(strlen($branch_code) > 100){
                 $errors['$branch_code'] = 'Your bank branch code can not exceed 100 characters';
               }
               
            }
        }
        
        if(count($errors) > 0){
            return[
                'status' => 'error',
                'message'=> $errors
            ];
        }
        
        $connection = $this->connection;
        
        $customer_view_query = "SELECT * FROM customer_info WHERE email='$t'";
        
        $result = $connection->query($customer_view_query);
        
        if($connection->error){
            die('Table error: '.$connection->error);
        }
        
        $customer_info = $result->fetch_assoc();
        
        $first_name = $customer_info['first_name'];
        $last_name = $customer_info['last_name'];
        $Address = $customer_info['address'];
        $mobile_no = $customer_info['phone_number'];
        
        $customers_view_query = "SELECT * FROM customer_information WHERE car_id='$h'";
        
        $result = $connection->query($customers_view_query);
        
        if($connection->error){
            die('Table error: '.$connection->error);
        }
        
        $customer_information = $result->fetch_assoc();
        
        $car_price = $customer_information['car_price'];
        
        
        
        if($bankloan_payment_profession && $bankloan_payment_profession == 'officer'){
            
            $success = [];
             
            if($total_amount == $car_price*0.3 || $total_amount == $car_price*0.7){
               $bankloan_payment_query = "INSERT INTO payment_method(profession,customer_name,customer_address,customer_city,customer_mobile_no,period,bank_name,branch_name,account_no,account_type,currency,account_status,generation_date,total_amount)VALUES('$bankloan_payment_profession','$first_name $last_name','$Address','$city','$mobile_no','$period','$bank_name','$branch_name','$account_no','$account_type','$currency','$account_status','$generation_date','$total_amount')";
        
               $result = $connection->query($bankloan_payment_query);
        
               if($connection->error){
                   die('Table error: '.$connection->error);
               }  
        
                $success['success'] = 'Payment information inserted successfully!';
                
                return[
                    'status' => 'success',
                    'message' => $success['success']
                ];
            }
            
            
        
        }
        
        
        if($bankloan_payment_profession && $bankloan_payment_profession == 'businessman'){
            
            $success = [];
            if($Total_amount == $car_price*0.3 || $Total_amount == $car_price*0.7){
               $bankloan_payment_query2 = "INSERT INTO payment_method3(profession,customer_name,customer_address,customer_mobile_no,customer_City,Period,Bank_name,Branch_name,Account_no,Account_type,Currency,Account_status,Generation_date,Total_amount)VALUES('$bankloan_payment_profession','$first_name $last_name','$Address','$mobile_no','$City','$Period','$Bank_name','$Branch_name','$Account_no','$Account_type','$Currency','$Account_status','$Generation_date','$Total_amount')";
        
               $result = $connection->query($bankloan_payment_query2);
        
               if($connection->error){
                   die('Table error: '.$connection->error);
               }  
            
            
               $success['success'] = 'Payment information inserted successfully!';
            }
            
            return[
                'status' => 'success',
                'message' => $success['success']
            ];
        
        }
        
        
        
        if($cash_payment && $cash_payment == 'dp'){
            
            $success = [];
            
            $cashpayment_query = "INSERT INTO payment_method2(cash_method,card_number,expired_date,cvv,full_name)VALUES('$cash_payment','$card_number','$expired_date','$cvv','$first_name $last_name')";
        
            $result = $connection->query($cashpayment_query);
        
            if($connection->error){
                die('Table error: '.$connection->error);
            } 
            
            $success['success'] = 'Payment information inserted successfully!';
            
            return[
                'status' => 'success',
                'message' => $success['success']
            ];
        
        }
        
        
        if($cash_payment && $cash_payment == 'ft'){
            
            $success = [];
            
            $cashpayment_query2 = "INSERT INTO payment_method2(cash_method,account_number,bank_name,account_name,swift_code,branch_code)VALUES('$cash_payment','$account_number','$BANK_name','$first_name $last_name','$swift_code','$branch_code')";
        
            $result = $connection->query($cashpayment_query2);
        
            if($connection->error){
                die('Table error: '.$connection->error);
            } 
            
            $success['success'] = 'Payment information inserted successfully!';
            
            return[
                'status' => 'success',
                'message' => $success['success']
            ];
        
        }
         
            
        
    }
         
    }
    


?>