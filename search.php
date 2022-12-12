
 

 <?php
 $conn = new mysqli('localhost', 'root', '', 'management_traines');

 if (! empty($_POST["gare"])) {
     $sql = $conn->prepare("SELECT * FROM gares WHERE nom like ? ORDER BY nom");
     $gare = "%{$_POST['gare']}%";
     $sql->execute(array($gare));
     $result = $sql->get_result();
     $count=$result->num_rows;
     
     if (!empty($result)) {
        if($count>0){
         ?>
         
        
  <select  multiple="" class="form-select w-50" id="select-gare">
 <?php
         foreach ($result as $gare) {
             ?>
    <option  onClick="selectgare('<?php echo $gare["nom"]; ?>');">
    <?php  echo $gare["nom"]?>
     </option>
 <?php
         } // end for
         ?>
  </select>
 <?php
     } // end if count of gares sup a zero 
     else{
        echo ' <div
        
        data-gare='.$count.'
         class="text-danger"  id="suggesstion-gare-error">gare non exist!</div>';
        // echo 'no suggess';
     }
 }     //end if not empty 

}
 ?>

