<?php
require 'vendor/autoload.php';

$fb = new Facebook\Facebook([
    'app_id' => '298728266149089',
    'app_secret' => 'e1af3f27769dd2e2ec35484ec0e5ec6f',
    'default_graph_version' => 'v12.0', // Use the appropriate Graph API version
]);

$helper = $fb->getRedirectLoginHelper();

$redirectUrl = 'callback.php'; // Replace with your actual callback URL

$loginUrl = $helper->getLoginUrl($redirectUrl, ['publish_pages']); // Specify required permissions here

echo '<a href="' . htmlspecialchars($loginUrl) . '">Log in with Facebook</a>';
