<?php include 'helpers.php'; ?>

<?php
$method = get_method();
$square_api = get_env('SQUARE_API_URL');
$square_api_key = get_env('SQUARE_API_KEY');

if ($method === 'GET') {
  $curl = curl_init();
  curl_setopt($curl, CURLOPT_URL, "$square_api/catalog/list?types=category,image,item");
  curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
  curl_setopt($curl, CURLOPT_HTTPHEADER, [
    'Accept: application/json',
    'Content-Type: application/json',
    "Authorization: Bearer $square_api_key"
  ]);
  $data = curl_exec($curl);
  curl_close($curl);
  $jsonData = json_decode($data);

  if (curl_getinfo($curl, CURLINFO_HTTP_CODE) == 200) {
    send_response([
      'status' => 'success',
      'data' => $jsonData,
    ]);
  } else {
    send_response(array(
      'code' => 422,
      'data' => $jsonData
    ), 422);
  }
}

send_response(array(
  'code' => 405,
  'data' => 'HTTP Method not allowed'
), 405);
