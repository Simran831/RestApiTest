<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
</head>
<body> 
    <h1>Data fetched from <a href=" https://jsonplaceholder.typicode.com/todos">this link</a></h1>
   <?php
    $curl = curl_init();
    curl_setopt_array($curl, array(
    CURLOPT_URL => "https://jsonplaceholder.typicode.com/todos",
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_HEADER => 'Content-Type:application/json',
    CURLOPT_CUSTOMREQUEST => "GET"));
    
    $response = curl_exec($curl);
        
    curl_close($curl);
    
    //echo "response: " . $response;
    
    $decoded_response = json_decode($response, true); 
    
    echo "<table border='1'>
        <tr>
        <th>User Id</th>
        <th>Id</th>
        <th>Title</th>
        <th>Completed</th>
        </tr>";
    
    foreach ($decoded_response as $key => $value) 
    {
        $user_id = $value["userId"];
        $Id = $value["id"];
        $Title = $value["title"];
        $comp = $value["completed"];
        
        echo '<tr>';
        echo '<td>'. $user_id.'</td>';
        echo '<td>'. $Id.'</td>';
        echo '<td>'. $Title.'</td>';
        echo '<td>'. $comp.'</td>';
        echo '</tr>';
    }
        echo '</table>';
    ?>
    
    <h2>Data fetched from <a href=" https://jsonplaceholder.typicode.com/users">this link</a></h2>
    
    <?php
    $curl = curl_init();
    curl_setopt_array($curl, array(
    CURLOPT_URL => "https://jsonplaceholder.typicode.com/users",
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_HEADER => 'Content-Type:application/json',
    CURLOPT_CUSTOMREQUEST => "GET"));
    
    $response1 = curl_exec($curl);
        
    curl_close($curl);
    
    //echo $response1;
    
    $decoded_response1 = json_decode($response1, true); 
    
    echo "<table border='1'>
        <tr>
        <th>Id</th>
        <th>Name</th>
        <th>Username</th>
        <th>Email</th>
        <th>Address</th>
        <th>Geo</th>
        <th>Phone</th>
        <th>Website</th>
        <th>Company</th>
        </tr>";
    
    foreach ($decoded_response1 as $key => $value) 
    {
        $Id = $value['id'];
        $Name = $value['name'];
        $User_name = $value['username'];
        $Email = $value['email'];
        $Address = $value['address']['suite'];
        $Address.= ", ". $value['address']['street'];
        $Address.= ", ". $value['address']['city'];
        $Address.= ", ". $value['address']['zipcode'];
        $Geo = $value['address']['geo']['lat'];
        $Geo.= ", ". $value['address']['geo']['lng'];
        $Phone = $value['phone'];
        $Website = $value['website'];
        $Company = $value['company']['name'];
        $Company.= ' ('. $value['company']['bs']. ' ) ';
        $Company.= '-'. $value['company']['catchPhrase'];
               
        echo '<tr>';
        echo '<td>'. $Id.'</td>';
        echo '<td>'. $Name.'</td>';
        echo '<td>'. $User_name.'</td>';
        echo '<td>'. $Email.'</td>';
        echo '<td>'. $Address.'</td>';
        echo '<td>'. $Geo.'</td>';
        echo '<td>'. $Phone.'</td>';
        echo '<td>'. $Website.'</td>';
        echo '<td>'. $Company.'</td>';
        echo '</tr>';
    }
    
    echo '</table>';
    
    ?>
    
</body>
</html>
