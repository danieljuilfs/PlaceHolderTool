<?php

//get the variables
$name = $_POST['dev_name'];
$amount = $_POST['amount'];
$start = $_POST['start'];
$icon = $_POST['img'];

//if any of the variables are empty, let them know, and do . 
if (empty($name) || empty($amount) || empty($start) || empty($icon)) {
    echo 'You must fill in all fields'; 
}
else {
    //keep track of any item updates that fail
    $failed = "";

    $output = ""; 

    //keep track of how many fails there are to see what to print at end
    $fails = 0; 
    try {
        //connect to the database
        $conn = new PDO("mysql:host=localhost;dbname=eq25", );
        $name .= "-placeholder"; 
         
        //loop to create entries. 
        for($i = 0; $i < $amount; $i++) {
            $check = $conn->query("SELECT * FROM items_patch WHERE id = $start");
            
            //check to make sure the row is empty, if it is, run the query
            if ($check->rowcount() === 0) {
                //parameterized sql statement, sql injections NO THANK YOU
                $insert = "INSERT INTO eq25.items_patch  
                VALUES (:start,0,:name ,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,'',65535,0,'',0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,'',0,0,0,0, :icon,'',0,17,0,0,'',0,0,0,0,0,255,255,0,65535,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,'',0,0,0,0,0,0,0,0, '', '', '', '', '', '', '', '', '')";
            
                //prepare the statement
                $stmt = $conn->prepare($insert);

                //bind the parameters
                $stmt->bindParam(':start', $start, PDO::PARAM_INT);
                $stmt->bindParam(':name', $name, PDO::PARAM_STR);
                $stmt->bindParam(':icon', $icon, PDO::PARAM_INT);
                
                //execute the query
                $stmt->execute();
            }

            //if it isn't empty, log the failure
            else  {
                //store any failed inserts for reporting
                $failed = $failed . "Item id " . $start . " already exists. ";
                $fails++; 
        }
        //increment the starting point
        $start = $start + 1;
    }
    
    //output the status
    if ($fails == $amount) {
        $output = 'Complete Failure <br>' .  $failed; 
    }
    else if ($fails > 0) {
        $output = 'Partial Failure <br>' . $failed;
    }
    else $output = 'Success!';

    echo $output; 
}
    catch(PDOException $e) {
    echo "Connection failed: " . $e->getMessage();      
    }
}

