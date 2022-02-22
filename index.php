<?php
    $url = "https://api.freegeoip.app/json/?apikey=<your_api_key>";
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
    curl_setopt($ch, CURLOPT_HEADER, FALSE);
    curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
    $response = curl_exec($ch);
    curl_close($ch);
    $exploded_response = explode('"', $response);
    $country_code = strtolower($exploded_response[7]);
    $ip = $exploded_response[3];
    $country_name = $exploded_response[11];
    $city_name = $exploded_response[19];
    $latitude = explode(",", $exploded_response[34]);
    $longitude = explode(",", $exploded_response[36]);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Public IP Address</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
    <div class="container">
        <a class="navbar-brand" href="#">What is my Public IP Address</a>
    </div>
    </nav>
    <div class="container mt-5">
        <div class="card" style="width: 18rem;">
            <img src="https://flagcdn.com/w160/<?php echo $country_code ?>.png" alt=""> 
        </div>
        <div class="card mt-3" style="width: 18rem;">
            <div class="card-body">
                <h5 class="card-title"><?php echo $ip ?></h5>
                <p class="card-text"><?php echo $city_name ?>, <?php echo $country_name ?></p>
                <p>Latitude <?php echo $latitude[0] ?></p>
                <p>Longitude <?php echo $longitude[0] ?></p>
                <a href="#" class="btn btn-primary">Visit Source Code</a>
            </div>
        </div>
    </div>
</body>
</html>