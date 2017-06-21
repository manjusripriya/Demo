<?php  

//connect to the database 
$connect = mysqli_connect("localhost","root","","project"); //select the table 
// 
if (isset($_POST['Submit'])) {
  
   //get the csv file 
   echo $file = $_FILES['csv']['tmp_name']; echo "<br>";
    $handle = fopen($file,"r"); 
     
     $fact="";
    /* $count="";*/
    //loop through the csv file and insert into database 
    while ($data = fgetcsv($handle,1000,",","'"))  { 
      
       if ($data[0] == "On time payments") { 
            $fact="On time payments";
        }
        elseif ($data[0] == "Accounting upkeep") { 
            $fact="Accounting upkeep";
        } 
         elseif ($data[0] == "SOD") { 
            $fact="SOD";
        } 
         elseif ($data[0] == "Expenses summarry") { 
            $fact="Expenses summarry";
        } 
         elseif ($data[0] == "Auditing support") { 
            $fact="Auditing support";
        } 
         elseif ($data[0] == "Reconciliations") { 
            $fact="Reconciliations";
        } 
         elseif ($data[0] == "Payables") { 
            $fact="Payables";
        } 
         elseif ($data[0] == "Recivables") { 
            $fact="Recivables";
        }

        $count =mysqli_query($connect,"SELECT COUNT(*) FROM test ");
        echo $count; exit;
        
        
        
           
        if ($count == "0") {

            mysqli_query($connect,"INSERT INTO test (Factor,Name,Jul_target,Jul_acheived,Aug_target,Aug_acheived,Sep_target,Sep_acheived,Q2_cumulative_target,Q2_cumulative_acheived,Oct_target,Oct_acheived,Nov_target,Nov_acheived,Dec_target,Dec_acheived,Q3_cumulative_target,Q3_cumulative_acheived,Jan_target,Jan_acheived,Feb_target,Feb_acheived,Mar_target,Mar_acheived,Q4_cumulative_target,Q4_cumulative_acheived,Apr_target,Apr_acheived,May_target,May_acheived,Jun_target,Jun_acheived,Q1_cumulative_target,Q1_cumulative_acheived) VALUES 
                ( 
                    '".addslashes($fact)."',
                    '".addslashes($data[0])."',
                    '".addslashes($data[9])."', 
                    '".addslashes($data[10])."', 
                    '".addslashes($data[11])."',
                    '".addslashes($data[12])."',
                    '".addslashes($data[13])."',
                    '".addslashes($data[14])."',
                    '".addslashes($data[15])."',
                    '".addslashes($data[16])."',
                    '".addslashes($data[17])."',
                    '".addslashes($data[18])."',
                    '".addslashes($data[19])."',
                    '".addslashes($data[20])."',
                    '".addslashes($data[21])."',
                    '".addslashes($data[22])."',
                    '".addslashes($data[23])."',
                    '".addslashes($data[24])."',
                    '".addslashes($data[25])."',
                    '".addslashes($data[26])."',
                    '".addslashes($data[27])."',
                    '".addslashes($data[28])."',
                    '".addslashes($data[29])."',
                    '".addslashes($data[30])."',
                    '".addslashes($data[31])."',
                    '".addslashes($data[32])."',
                    '".addslashes($data[1])."',
                    '".addslashes($data[2])."',
                    '".addslashes($data[3])."',
                    '".addslashes($data[4])."',
                    '".addslashes($data[5])."',
                    '".addslashes($data[6])."',
                    '".addslashes($data[7])."',
                    '".addslashes($data[8])."'
                    "); 
                                    

        
        }
        else{

            mysqli_query($connect,"UPDATE test SET 
                Jul_target=$data[9],
                Jul_acheived=$data[10],
                Aug_target=$data[11],
                Aug_acheived=$data[12],
                Sep_target=$data[13],
                Sep_acheived=$data[14],
                Q2_cumulative_target=$data[15],
                Q2_cumulative_acheived=$data[16],
                Oct_target=$data[17],
                Oct_acheived=$data[18],
                Nov_target=$data[19],
                Nov_acheived=$data[20],
                Dec_target=$data[21],
                Dec_acheived=$data[22],
                Q3_cumulative_target=$data[23],
                Q3_cumulative_acheived=$data[24],
                Jan_target=$data[25],
                Jan_acheived=$data[26],
                Feb_target=$data[27],
                Feb_acheived=$data[28],
                Mar_target=$data[29],
                Mar_acheived=$data[30],
                Q4_cumulative_target=$data[31],
                Q4_cumulative_acheived=$data[32],
                Apr_target=$data[1],
                Apr_acheived=$data[2],
                May_target=$data[3],
                May_acheived=$data[4],
                Jun_target=$data[5],
                Jun_acheived=$data[6],
                Q1_cumulative_target=$data[7],
                Q1_cumulative_acheived=$data[8]

             WHERE Name='$data[0]' AND Factor='$fact'");
        }       
            
      
    } 
    // 

    //redirect 
    header('Location: import_data.php?success=1'); die; 

} 

?> 

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd"> 
<html xmlns="http://www.w3.org/1999/xhtml"> 
<head> 
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" /> 
<title>Import a CSV File with PHP & MySQL</title> 
</head> 

<body> 

<?php if (!empty($_GET['success'])) { echo "<b>Your file has been imported.</b><br><br>"; } //generic success notice ?> 

<form action="" method="post" enctype="multipart/form-data" name="form1" id="form1"> 
  Choose your file: <br /> 
  <input name="csv" type="file" id="csv" /> 
  <input type="submit" name="Submit" value="Submit" /> 
</form> 

</body> 
</html> 
