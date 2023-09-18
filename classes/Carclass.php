<?php

require_once('Databaseclass.php');

class Carclass extends Databaseclass{
    
    public function addBrand(){
        
      $name = $_POST['name'];
        
      $errors = [];
        
      if(strlen($name) == 0){
          $errors['name'] = 'Please mention car brand';
      }
        
      if(count($errors) > 0){
          return[
              'status' => 'error',
              'message' => $errors
          ];
      }
        
      $success = [];
      $connection = $this->connection;
        
      $add_car_brand_query = "INSERT INTO car_brand(name) VALUES ('$name')";
        
      $result = $connection->query($add_car_brand_query);
        
      if($connection->error){
          die('Table error: '.$connection->error);
      }
        
      $success['success'] = 'Car brand inserted successfully';
        
      return[
          'status' => 'success',
          'message' => $success['success']
      ];
    }
    
    
   public function index(){
        
      $connection = $this->connection;
        
      $car_brand_view_query = "SELECT * FROM car_brand";
        
      $result = $connection->query($car_brand_view_query);
        
      if($connection->error){
          die('Table error: '.$connection->error);
      }
        
      return $result;
    }
   
    public function update(){
        $update_id = $_POST['updateid'];
        $name = $_POST['name'];
        $errors = [];
        
        if(strlen($name) > 100){
            $errors['name'] = 'Car brand name should be in range 0-99';
        }
        
        if(count($errors) == 1){
            return[
                'status' => 'error',
                'message' => $errors
            ];
        }
        
        $connection = $this->connection;
        
        $customer_view_query = "SELECT * FROM car_brand WHERE id='$update_id'";
        
        $result = $connection->query($customer_view_query);
        
        if($connection->error){
          die('Table error: '.$connection->error);
       }
        
       $success = [];
        
       $update_carbrand_query = "UPDATE car_brand SET name='$name' WHERE id='$update_id'";
        
       $result = $connection->query($update_carbrand_query);
        
        if($connection->error){
          die('Table error: '.$connection->error);
       }
        
       $view_finalcarbrand = "SELECT * FROM car_brand WHERE id='$update_id'";
        
       $result = $connection->query($view_finalcarbrand);
        
        if($connection->error){
          die('Table error: '.$connection->error);
       }
        
       $success['success'] = 'Car brand updated successfully';
        
       return[
           'status' => 'success',
           'message' => $success['success']
       ];
        
    }
    
    
    public function delete(){
        $delete_id = $_POST['DeletedID'];
        
        $connection = $this->connection;
        
        $customer_view_query = "SELECT * FROM car_brand WHERE id='$delete_id'";
        
        $result = $connection->query($customer_view_query);
        
        if($connection->error){
          die('Table error: '.$connection->error);
       }
        
       $success = [];
        
       if($result->num_rows == 1){
           
           $delete_carbrand_query = "DELETE FROM car_brand WHERE id='$delete_id'";
        
           $result = $connection->query($delete_carbrand_query);
        
           if($connection->error){
              die('Table error: '.$connection->error);
           }
        
           
       }
        
       $success['success'] = 'Car brand deleted successfully';
           
       return[
         'status' => 'success',
         'message' => $success['success']
       ];    
       
        
    }
   
    
    public function addDetails(){
        $brand = $_POST['brand'];
        $name = $_POST['name'];
        $price = $_POST['price'];
        $details = $_POST['details'];
        
        $real_name = $_FILES['car_img']['name'];
        $tmp_name = $_FILES['car_img']['tmp_name'];
        $size = $_FILES['car_img']['size'];
        
        $errors = [];
        
        if(strlen($name) == 0){
            $errors['name'] = 'Please insert car name';
        }
        if(strlen($name) > 250){
            $errors['name'] = 'Can not exceed 250 characters';
        }
        if(strlen($price) == 0){
            $errors['price'] = 'Please mention car price';
        }
        if(strlen($details) == 0){
            $errors['details'] = 'Please mention car details';
        }
        if(strlen($details) > 500){
            $errors['details'] = 'Can not exceed 500 characters';
        }
        
        $img_extension = strtolower(pathinfo($real_name,PATHINFO_EXTENSION));
        echo $img_extension;
        $targeted_extension = ['jpg', 'jpeg', 'png', 'JPG', 'JPEG'];
        
        if(!in_array($img_extension, $targeted_extension)){
            $errors['image'] = 'Image format should be jpg/jpeg/png/JPG/JPEG';
        }
        if($size > 1048576){
            $errors['image'] = 'Image size can not exceed 1MB';
        }
        
        $connection = $this->connection;
        
       $carbrand_view_query = "SELECT * FROM car_brand";
        
       $result = $connection->query($carbrand_view_query);
        
       if($connection->error){
          die('Table error: '.$connection->error);
       }
        
       $checkbrandid = [];
       if($result->num_rows == 0){
           $errors['brand'] = 'Invalid brand';
       }else{
           while($Brand = $result->fetch_assoc()){
               $checkbrandid = $Brand['id'];
           }
           
       }
            
        if(count($errors) > 0){
            return[
                'status' => 'error',
                'message' => $errors
            ];
        }
        
        $img_name = time().$name.'.'.$img_extension;
        
        $dir = '../images/car_img';
        if(!file_exists($dir)){
            mkdir($dir);
        }
        
        $path = $dir.'/'.$img_name;
        
        move_uploaded_file($tmp_name, $path); 
        
        $success = [];
        
        
        $add_car_details_query = "INSERT INTO car_details(car_name, price, details, image, car_brand_id) VALUES ('$name', '$price', '$details', '$img_name', '$brand')";
        
        $result = $connection->query($add_car_details_query);
        
        if($connection->error){
            die('Table error: '.$connection->error);
        }
        
        $success['success'] = 'Car details inserted successfully';
        
        return[
            'status' => 'success',
            'message' => $success['success']
        ];
    
    }
    
    
    public function Detailsindex(){
        
      $connection = $this->connection;
        
      $car_details_view_query = "SELECT * FROM car_details";
        
      $result = $connection->query($car_details_view_query);
        
      if($connection->error){
          die('Table error: '.$connection->error);
      }
        
      return $result;
    }
    
    
    public function targetData($id){
           
           $id = $_GET['id'];
        
           $connection = $this->connection;
           //print_r($Connection);
    
           $view_cardetails_query = "SELECT * FROM car_details WHERE id='$id'";
    
           $result = $connection->query($view_cardetails_query);
    
           if($connection->error){
               die('Table Error:'.$connection->error);
           }   
     
           if($result->num_rows == 0){
               header('Location:Create_car_details.php');
           }
        
        
           return $result->fetch_assoc();
     
           
 }
    
    
    public function updateDetails(){
        $update_id = $_POST['car_details_id'];
        $name = $_POST['name'];
        $price = $_POST['price'];
        $details = $_POST['details'];
        
        $real_name = $_FILES['car_img']['name'];
        $tmp_name = $_FILES['car_img']['tmp_name'];
        $size = $_FILES['car_img']['size'];
        
        
        $connection = $this->connection;
        
        $errors = [];
        
        if(strlen($name) == 0){
            $errors['name'] = 'Please provide car name';
        }
        if(strlen($price) == 0){
            $errors['price'] = 'Please mention car price';
        }
        if(strlen($details) == 0){
            $errors['details'] = 'Please describe about car';
        }
        if(strlen($name) > 250){
            $errors['name'] = 'Car name can not exceed 250 characters';
        }
        if(strlen($details) > 500){
            $errors['details'] = 'Details should be in 0-500 characters';
        }
        $get_img_extension = strtolower(pathinfo($real_name,PATHINFO_EXTENSION));
        
        $target_extension = ['jpg','jpeg','png','JPEG','JPG'];
        
        if($tmp_name){
        
            if(!in_array($get_img_extension,$target_extension)){
                $errors['car_img'] = 'File format should be jpg/jpeg/png/JPEG/JPG';
            }
            if($size>1048576){
                $errors['car_img'] = 'Image size can not exceed 1Mb';
            }
            
             $image_name = time().$real_name.'.'.$get_img_extension;
        }else{
             
        
             $car_view_query = "SELECT * FROM car_details WHERE id='$update_id'";
        
             $result = $connection->query($car_view_query);
        
             if($connection->error){
               die('Table error: '.$connection->error);
             }
        
        
             $car_info = $result->fetch_assoc();
            
             $image_name = time().$car_info['car_name'].'.'.$get_img_extension;
        }
        
        
        if(count($errors) > 0){
            return[
                'status' => 'error',
                'message' => $errors
            ];
        }
        
       
        
        $make_path = '../images/car_img';
            
        if(!file_exists($make_path)){
             mkdir($make_path);
        }
            
            
        $path = $make_path.'/'.$image_name;
        
        if(file_exists($path)){
           unlink($path);
        }
        
        move_uploaded_file($tmp_name, $path);
        
        
       $success = [];
        
       $update_cardetails_query = "UPDATE car_details SET car_name='$name', price='$price', details='$details', image='$image_name' WHERE id='$update_id'";
        
       $result = $connection->query($update_cardetails_query);
        
        if($connection->error){
          die('Table error: '.$connection->error);
       }
        
       $success['success'] = 'Car details updated successfully';
        
      
       return[
           'status' => 'success',
           'message' => $success['success']
       ];
        
    }
    
    
    public function deleteDetails(){
        $delete_id = $_POST['DeletedID'];
        
        $connection = $this->connection;
        
        $cardetails_view_query = "SELECT * FROM car_details WHERE id='$delete_id'";
        
        $result = $connection->query($cardetails_view_query);
        
        if($connection->error){
          die('Table error: '.$connection->error);
       }
        
       $success = [];
        
       if($result->num_rows == 1){
           
           $delete_cardetails_query = "DELETE FROM car_details WHERE id='$delete_id'";
        
           $result = $connection->query($delete_cardetails_query);
        
           if($connection->error){
              die('Table error: '.$connection->error);
           }
        
           
       }
        
       $success['success'] = 'Car details deleted successfully';
           
       return[
         'status' => 'success',
         'message' => $success['success']
       ];    
       
        
    }
    
    public function brand_status(){
        $id = $_POST['StatusID'];
        
        $connection = $this->connection;
        
        $success=[];
        $get_brand = "SELECT * FROM car_brand WHERE id = '$id'";
        $result = $connection->query($get_brand);
        
         if($connection->error){
            die('Table error: '.$connection->error);
         }
        
        $brand = $result->fetch_assoc();
        $status = $brand['status'] == 0 ? 1 : 0;
        
        $update_brand_status = "UPDATE car_brand SET status='$status' WHERE id='$id'";
        $result = $connection->query($update_brand_status);
        
        if($connection->error){
            die('Table error: '.$connection->error);
         }
        
         $success['success'] = 'Status update completed';
        
         return[
         'status' => 'success',
         'message' => $success['success']
       ];    
    }
    
    
     public function statusDetails(){
        $id = $_POST['StatusID'];
        
        $connection = $this->connection;
        
        $success=[];
        $get_details = "SELECT * FROM car_details WHERE id = '$id'";
        $result = $connection->query($get_details);
        
         if($connection->error){
            die('Table error: '.$connection->error);
         }
        
        $details = $result->fetch_assoc();
        $status = $details['status'] == 0 ? 1 : 0;
        
        $update_details_status = "UPDATE car_details SET status='$status' WHERE id='$id'";
        $result = $connection->query($update_details_status);
        
        if($connection->error){
            die('Table error: '.$connection->error);
         }
        
         $success['success'] = 'Status update completed';
        
         return[
         'status' => 'success',
         'message' => $success['success']
       ];    
    }
}

?>