<?php
require 'vendor/autoload.php';

$fb = new Facebook\Facebook([
    'app_id' => '298728266149089',
    'app_secret' => 'e1af3f27769dd2e2ec35484ec0e5ec6f',
    'default_graph_version' => 'v12.0', // Use the appropriate Graph API version
]);

$helper = $fb->getRedirectLoginHelper();

try {
    $accessToken = $helper->getAccessToken();
} catch (Facebook\Exceptions\FacebookResponseException $e) {
    // When Graph returns an error
    echo 'Graph returned an error: ' . $e->getMessage();
    exit;
} catch (Facebook\Exceptions\FacebookSDKException $e) {
    // When validation fails or other local issues
    echo 'Facebook SDK returned an error: ' . $e->getMessage();
    exit;
}

if (!isset($accessToken)) {
    // The user did not grant permissions
    echo 'User denied the request.';
    exit;
}

// You have the user access token, which you can save for later use
$userAccessToken = (string) $accessToken;

// Redirect the user to a page where they can start using your social media manager
header('Location: https://yourwebsite.com/social_media_manager.php');
exit;
