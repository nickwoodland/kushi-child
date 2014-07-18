<?php require_once('../../../wp-load.php'); ?>

<?php 	
//$logname = "test-output-log-".date('Y-m-d-G-i');
//$updatelog = fopen($logname.".txt", "w");


if ( isset($_POST['uploadedfile']) ) :

$products_csv = array_map('str_getcsv', explode(PHP_EOL, $_POST['uploadedfile']));

epos_csv_update($products_csv);

else :

    echo "No file selected <br />";

endif;
//fwrite($updatelog, print_r($rows,true).PHP_EOL);
//fwrite($updatelog, print_r($_POST['uploadedfile'],true).PHP_EOL);
//fwrite($updatelog, print_r($_FILES,true).PHP_EOL);

 ?>

<?php // http://stackoverflow.com/questions/5593473/how-to-upload-and-parse-a-csv-file-in-php ?>

<?php /*
echo "<pre>"; 
print_r($_FILES); 
echo "</pre>";

echo "<pre>"; 
print_r($_POST); 
echo "</pre>";

if ( isset($_POST["submit"]) ) {

   if ( isset($_FILES["uploadedfile"])) {

            //if there was an error uploading the file
        if ($_FILES["uploadedfile"]["error"] > 0) {
            echo "Return Code: " . $_FILES["uploadedfile"]["error"] . "<br />";

        }
        else {
                 //Print file details
             echo "Upload: " . $_FILES["uploadedfile"]["name"] . "<br />";
             echo "Type: " . $_FILES["uploadedfile"]["type"] . "<br />";
             echo "Size: " . ($_FILES["uploadedfile"]["size"] / 1024) . " Kb<br />";
             echo "Temp file: " . $_FILES["uploadedfile"]["tmp_name"] . "<br />";

             epos_csv_parse($_FILES["uploadedfile"]["tmp_name"]);

                 //if file already exists
           /*  if (file_exists("upload/" . $_FILES["file"]["name"])) {
            echo $_FILES["file"]["name"] . " already exists. ";
             }
             else {
                    //Store file in directory "upload" with the name of "uploaded_file.txt"
            $storagename = "uploaded_file.txt";
            move_uploaded_file($_FILES["file"]["tmp_name"], "upload/" . $storagename);
            echo "Stored in: " . "upload/" . $_FILES["file"]["name"] . "<br />";
            }
        }
        }
    }    
} 
else {
    echo "No file selected <br />";
}
*/
?>