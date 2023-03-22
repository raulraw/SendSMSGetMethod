<?php


$array = '[{"message":"Hello 1","phone":"+40742488300","alias":"","start":"0","stop":"0"},{"message":"Hello 2","phone":"+40745766610","alias":"","start":"0","stop":"0"}]';

 $messages = json_encode($array);
foreach ((array)$messages as $key){
  echo $key;}
$sms = array (
    'apikey' => '91dd2b4d49b4418b5157fa7fcc951748',
    'messages' => $messages
  );

//  echo var_dump($sms);exit;
  $curl = curl_init();
  // You can also set the URL you want to communicate with by doing this:
  // $curl = curl_init('http://localhost/echoservice');

  // We POST the data
  curl_setopt($curl, CURLOPT_POST, 1);
  // Set the url path we want to call
  curl_setopt($curl, CURLOPT_URL, 'https://www.smsnewsletter.ro/smsapi/');
  // Make it so the data coming back is put into a string
  curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
  // Insert the data
  curl_setopt($curl, CURLOPT_POSTFIELDS, $sms);

  // You can also bunch the above commands into an array if you choose using: curl_setopt_array

  // Send the request
  $result = curl_exec($curl);

  // Get some cURL session information back
  $info = curl_getinfo($curl);
  echo 'content type: ' . $info['content_type'] . '<br />';
 echo 'http code: ' . $info['http_code'] . '<br />';

  // Free up the resources $curl is using
  curl_close($curl);

  echo $result;

  echo '<br><br> am trimis:<br>'.$messages;
?>
