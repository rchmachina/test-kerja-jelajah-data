<?php
$query = http_build_query(array(
    'client_id' => '10',
    'redirect_uri' => 'http://localhost/oauth2_client/callback.php',
    'response_type' => 'code',
    'scope' => '',
));
 
header('Location: http://127.0.0.1:8000/api/news/'.$query);