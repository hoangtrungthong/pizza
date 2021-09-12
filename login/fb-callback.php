<?php
session_start();
require_once( 'Facebook/autoload.php' );
$fb = new Facebook\Facebook([
  'app_id' => '385940312930181',
  'app_secret' => '404d29e903a2abf152cfe2dcf9d41c75',
  'default_graph_version' => 'v2.9',
  ]);
$helper = $fb->getRedirectLoginHelper();
try {
  $accessToken = $helper->getAccessToken();
  $response = $fb->get('/me?fields=id,name,email', $accessToken);
} catch(Facebook\Exceptions\FacebookResponseException $e) {
  // When Graph returns an error
  echo 'Graph returned an error: ' . $e->getMessage();
  exit;
} catch(Facebook\Exceptions\FacebookSDKException $e) {
  // When validation fails or other local issues
  echo 'Facebook SDK returned an error: ' . $e->getMessage();
  exit;
}
if (! isset($accessToken)) {
  if ($helper->getError()) {
    header('HTTP/1.0 401 Unauthorized');
    echo "Error: " . $helper->getError() . "\n";
    echo "Error Code: " . $helper->getErrorCode() . "\n";
    echo "Error Reason: " . $helper->getErrorReason() . "\n";
    echo "Error Description: " . $helper->getErrorDescription() . "\n";
  } else {
    header('HTTP/1.0 400 Bad Request');
    echo 'Bad request';
  }
  exit;
}
// Logged in
$me = $response->getGraphUser();
echo 'Logged in as: ' . $me->getName();
echo 'ID:' . $me->getId();
echo 'Email:' . $me->getEmail();
$_SESSION['fb_access_token'] = (string) $accessToken;
// Từ đây bạn xử lý kiểm tra thông tin user trong database sau đó xử lý.
