<script type="text/javascript">     
    /*function PrintDiv() {    
       var divToPrint = document.getElementById('divToPrint');
       var popupWin = window.open('', '_blank', 'width=300,height=300');
       popupWin.document.open();
       popupWin.document.write('<html><body onload="window.print()">' + divToPrint.innerHTML + '</html>');
        popupWin.document.close();
            }*/




function printDiv(divName) {
     var printContents = document.getElementById(divName).innerHTML;
     var originalContents = document.body.innerHTML;

     document.body.innerHTML = printContents;

     window.print();

     document.body.innerHTML = originalContents;
}

 </script>
<?php 
  $name = "";
 if(isset($_REQUEST['sub_name'])){
  $name = $_REQUEST['sub_name'];
 }
/* $rating = "";
 if (isset($_POST['text1'])) {
  echo $rating = $_POST['text1'];
 }*/

?>

<!DOCTYPE html>
<html>
<head>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" type="text/css" href="css/style.css">
   <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.1/css/select2.min.css" rel="stylesheet" />
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script src="https://code.jquery.com/jquery-2.1.1.min.js" type="text/javascript"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.1/js/select2.min.js"></script>
    <script type="text/javascript">
      $(document).ready(function() {
        var country = [""];
        $("#country").select2({
          data: country
        });
      });
    </script>
</head>
<body>
  <br>
  <div class="container_fluid">
      <div id="printableArea">
<form method="GET" id="select_form">

  <label>Select Name:</label>
  <select name="sub_name"  style="width:auto;" id="country">
    <option>Select Name...</option>
    <?php
     include('config.php');
           $sql = "select DISTINCT Name from test WHERE Name not IN('On time payments','Accounting upkeep','SOD','Expenses summarry','Auditing support','Reconciliations','Payables','Recivables') AND Name IS NOT NULL";
           $res = mysqli_query($conn,$sql);
           while ($row = mysqli_fetch_array($res)) {  ?>
           <option <?php echo ($row['Name'] == $name) ? 'selected':""; ?> value="<?php echo $row['Name']; ?>"><?php echo $row['Name'] ?></option>
         <?php }
        
         ?>
  </select><br>
</form>
 <br>
  <table class="table table-bordered">
    <tr>
  <th rowspan="2">Performance factors</th>
  <th rowspan="2">Rating for 50</th>
  <th colspan="3">Quarter 1</th>
  <th colspan="3">Quarter 2</th>
  <th colspan="3">Quarter 3</th>
  <th colspan="3">Quarter 4</th>
  <th rowspan="2">Cumulative</th>
  <th rowspan="2">year 17-18 Final Score</th>
 </tr>
  <tr>
      
        <td>Target</td>
      <td>Achived</td>
      <td>Rating</td>
      <td>Target</td>
      <td>Achived</td>
      <td>Rating</td>
      <td>Target</td>
      <td>Achived</td>
      <td>Rating</td>
       <td>Target</td>
      <td>Achived</td>
      <td>Rating</td>
      </tr>
     
      <?php
           include('config.php');
           $sql = "SELECT Factor,Q1_cumulative_target,Q1_cumulative_acheived,Q2_cumulative_target,Q2_cumulative_acheived,
                   Q3_cumulative_target,Q3_cumulative_acheived, Q4_cumulative_target,Q4_cumulative_acheived  
                  FROM `test` WHERE Name not IN('On time payments','Accounting upkeep','SOD','Expenses summarry','Auditing support',
                  'Reconciliations','Payables','Recivables') AND Name IS NOT NULL AND name='".$name."'";
           $res = mysqli_query($conn,$sql);
           while ($row = mysqli_fetch_array($res)) {  ?>

           <tr class="primary">
           <td><?php echo $row['Factor']; ?></td>
            <td>
              <form name="input_form" method="POST" />
              <input type="text" id="rate" value="" name="rate" style="width: 50px;"/>
            </form>
             <?php
             ?>

            </td>
            <td id='q1targ'><?php echo $row['Q1_cumulative_target']; ?></td>
            <td id='q1achiv'><?php echo $row['Q1_cumulative_acheived']; ?></td>
            <td id="ans">
               <?php
               /*if(($row['Q1_cumulative_target'])<>0 && ($row['Q1_cumulative_acheived'])<>0){
              $q=(($row['Q1_cumulative_target']/$row['Q1_cumulative_acheived'])*$rating); echo (round($q,2));
            }*/
              ?>
            </td>
            <td id='q2targ'><?php echo $row['Q2_cumulative_target']; ?></td>
            <td id='q2achiv'><?php echo $row['Q2_cumulative_acheived']; ?></td>
            <td id="ans1"> <?php
            /*if(($row['Q2_cumulative_target'])<>0 && ($row['Q2_cumulative_acheived'])<>0){
              $qq=(($row['Q2_cumulative_target']/$row['Q2_cumulative_acheived'])* $rating); echo (round($qq,2));
            }*/
              ?>
            </td>
            <td id='q3targ'><?php echo $row['Q3_cumulative_target']; ?></td>
            <td id='q3achiv'><?php echo $row['Q3_cumulative_acheived']; ?></td>
            <td id="ans2">
              <?php
              /*if(($row['Q3_cumulative_target'])<>0 && ($row['Q3_cumulative_acheived'])<>0){
              $qq1=(($row['Q3_cumulative_target']/$row['Q3_cumulative_acheived'])* $rating); echo (round($qq1,2));
            }*/
              ?>
            </td>
            
            <td id='q4targ'><?php echo $row['Q4_cumulative_target']; ?></td>
             <td id='q4achiv'><?php echo $row['Q4_cumulative_acheived']; ?></td>
             <td id="ans3">
              <?php
              /*if(($row['Q4_cumulative_target'])<>0 && ($row['Q4_cumulative_acheived'])<>0){
              $qq2=(($row['Q4_cumulative_target']/$row['Q4_cumulative_acheived'])* $rating);echo (round($qq2,2));
            }*/
              ?>
             </td>
             <td>
              <?php
              /* $a=($row['Q1_cumulative_acheived']+$row['Q2_cumulative_acheived']+$row['Q3_cumulative_acheived']+$row['Q4_cumulative_acheived']);
               $b=($row['Q1_cumulative_target']+$row['Q2_cumulative_target']+$row['Q3_cumulative_target']+$row['Q4_cumulative_target']);
               if($a<>0 && $b<>0){
               $c = (($a/$b)* $rating); 
                echo (round($c,2));
               //echo(round($c));
           }*/
              
              ?>
            </td>
             <td>12</td>
            </tr>
      <?php }
           ?>
            <tr>
              <td colspan="1">Experience</td>
               <td colspan="1">5</td>
               <td colspan="14" align="right"><input value="" style="width: 50px;" ></td>
            </tr>
             <tr>
              <td colspan="1">Future prospects </td>
               <td colspan="1">5</td>
               <td colspan="14" align="right"><input value="" style="width: 50px;" ></td>
            </tr>
            <tr>
              <td colspan = "15" align="right">Performance Score Out of 50</td>
              <td colspan="1">45</td>

            </tr>
     


           
          

  </table>
 
</div>
<div>
  <p align="right"><input type="button" value="Print" onclick="printDiv('printableArea')" class="btn btn-success btn-lg" /> 
    </p>
</div>
  </form>
</div>
<script type="text/javascript">
  $(document).ready(function(){
    $('select').on('change', function() {
      $('#select_form').submit();
    })


  $("#rate").on("input", function(e) {  
  var mul = parseInt($("#q1achiv").text()) / parseInt($("#q1targ").text());
  $("#ans").text(mul * parseInt($(e.target).val()));
   var mul1 = parseInt($("#q2achiv").text()) / parseInt($("#q2targ").text());
  $("#ans1").text(mul1 * parseInt($(e.target).val()));
   var mul2= parseInt($("#q3achiv").text()) / parseInt($("#q3targ").text());
  $("#ans2").text(mul2 * parseInt($(e.target).val()));
   var mul3 = parseInt($("#q4achiv").text()) / parseInt($("#q4targ").text());
  $("#ans3").text(mul3 * parseInt($(e.target).val()));
   var mul4 = parseInt($("#q5achiv").text()) / parseInt($("#q5targ").text());
  $("#ans4").text(mul4 * parseInt($(e.target).val()));
});
  })
  </script>
</body>
</html>


