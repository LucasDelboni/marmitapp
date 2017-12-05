<?php
///////////////////////////////FACEBOOK///////////////////////////////////
$accessToken=266292053894169;

function getFriends($fbId){
    try {
        // Returns a `Facebook\FacebookResponse` object
        $response = $fb->get(
            '/'.$fbId.'/friends',
            $accessToken
        );
    } catch(Facebook\Exceptions\FacebookResponseException $e) {
      echo 'Graph returned an error: ' . $e->getMessage();
      exit;
    } catch(Facebook\Exceptions\FacebookSDKException $e) {
      echo 'Facebook SDK returned an error: ' . $e->getMessage();
      exit;
    }
    $graphNode = $response->getGraphNode();
    return $graphNode;
}

?>