<h2 style="font-size: 1.75em; margin-bottom: 1em;">Who's coming</h2>
<?php

if (isset($_SERVER['HTTP_REFERER']) && ($_SERVER['HTTP_REFERER'] = 'http://192.168.56.111/alumni/events/' || $_SERVER['HTTP_REFERER'] = 'https://new.central.edu/alumni/events/' || $_SERVER['HTTP_REFERER'] = 'https://www.central.edu/alumni/events/')){
  if (isset($_GET['ID']) && strlen($_GET['ID']) > 0 ){

  $args = array(
    'apiKey' => '8tCn3VzJkxoQKSRGRZX6dppVR3qffuaLvkjy2SAQRWtj+jNP1g/Em8PHNpwQopyv',
    'arguments' => [
      '',
      $_GET['ID']
     ]
  );

  $ch = curl_init("https://web.central.edu/api/datatel/v1/subroutine/run/S.ALUMNI.ACTIVITIES.ATTEND.CUI");
  curl_setopt($ch, CURLOPT_POST, true);
  curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($args));
  curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
  $response = curl_exec($ch);
  curl_close($ch);

  //This needs to happen first or characters don't get converted correctly.
  $response = str_replace('\u00fd', '', $response);
  $response = json_decode($response);

  if(strlen($response->arguments[0]) == 0){
    echo 'No attendees.';
  } else{
    echo $response->arguments[0];
  }
  } else{
    echo '<p>Please tell us which event to look for.</p>';
  }
}
else{
  header("Location: https://www.central.edu/alumni/events");
  die();
}
 ?>
