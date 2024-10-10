<?php 
include_once("connect.php");
// Include the AWS SDK autoloader 
require '../vendor/autoload.php'; 
use Aws\S3\S3Client; 
 
// Amazon S3 API credentials 
$region = 'region of s3'; 
$version = 'latest'; 
$access_key_id = 'your id'; 
$secret_access_key = ' your key';  
$bucket = 'backet name'; 
 
 
$statusMsg = ''; 
$status = 'danger'; 
 
// If file upload form is submitted 
if(isset($_POST["submit"])){ 
    $tm = $_POST["tm"];
    $tn = $_POST["tn"];
    // Check whether user inputs are empty 
    if(!empty($_FILES["image"]["name"])) { 
        // File info 
        $file_name = basename($_FILES["image"]["name"]); 
        $file_type = pathinfo($file_name, PATHINFO_EXTENSION); 
        $name = $_SESSION['name'];
        $nammmm = $name."-".$file_name;
         
        // Allow certain file formats 
        $allowTypes = array('jpg','png','jpeg','gif','webp'); 
        $im_s = $_FILES["image"]["size"]/(1024*1024);
        if($im_s<=1){
            if(in_array($file_type, $allowTypes)){ 
                // File temp source 
                $file_temp_src = $_FILES["image"]["tmp_name"]; 
                
                if(is_uploaded_file($file_temp_src)){ 
                    // Instantiate an Amazon S3 client 
                    $s3 = new S3Client([ 
                        'version' => $version, 
                        'region'  => $region, 
                        'credentials' => [ 
                            'key'    => $access_key_id, 
                            'secret' => $secret_access_key, 
                        ] 
                    ]); 
    
                    // Upload file to S3 bucket 
                    try { 
                        $result = $s3->putObject([ 
                            'Bucket' => $bucket, 
                            'Key'    => $nammmm, 
                            'ACL'    => 'public-read', 
                            'SourceFile' => $file_temp_src 
                        ]); 
                        $result_arr = $result->toArray(); 
                        
                        if(!empty($result_arr['ObjectURL'])) { 
                            $s3_file_link = $result_arr['ObjectURL']; 
                        } else { 
                            $api_error = 'Upload Failed! S3 Object URL not found.'; 
                        } 
                        $query = "INSERT INTO live3(sn, logo, teamname) VALUES ('$tm', '$s3_file_link', '$tn')";
                        if(mysqli_query($conn, $query)){
                            header("Location: ../live3/index.php");
                        }else{
                            echo "Something is wrong";
                        }
                    } catch (Aws\S3\Exception\S3Exception $e) { 
                        $api_error = $e->getMessage(); 
                    } 
                    
                    if(empty($api_error)){ 
                        $status = 'success'; 
                        $statusMsg = "File was uploaded to the S3 bucket successfully!"; 
                    }else{ 
                        $statusMsg = $api_error; 
                    } 
                }else{ 
                    $statusMsg = "File upload failed!"; 
                } 
            }else{ 
                echo "Your files are not allowed, Go Back <a href='../live3/index.php'>Home</a> or <a href='index.php'>Add Again</a>";
            }
        }else{
            echo "Size should not exceed 1 MB; it is too large. Go Back <a href='../live3/index.php'>Home</a> or <a href='index.php'>Add Again</a>";
        }
    }else{ 
        $query = "INSERT INTO live3(sn, teamname) VALUES ('$tm', '$tn')";
        if(mysqli_query($conn, $query)){
            header("Location: ../live3/index.php");
        }else{
            echo "Something is wrong";
        }
    } 
} 
?>