<?php
/**
 * Created by PhpStorm.
 * User: Purna Ch
 * Date: 06-03-2016
 * Time: 04:25
 */
class GoogleAuth {
    protected $client;
    public function __construct(Google_Client $googleClient = null) //google_Client
    {
        $this->client =$googleClient;
        if ($this->client) {
            echo 'ok';
            $this->client->setClientId('191222242830-rbc70p6d5q4770c7tgsq6cimdraiuepm.apps.googleusercontent.com');
            $this->client->setClientSecret('iv8rZ_vfsB6b5WO3DPRFZ32i');
            $this->client->setRedirectUri('http://localhost:49217/Wday/index.php');
            $this->client->setScopes('email');
        }
    }

    public function isLoggedIn() {
        return isset($__session['access_token']);
    }

    public function getAuthUrl(){
        return $this->client->createAuthUrl();
    }

    public function checkRedirectCode() {
        if(isset($_GET['code'])){
            echo 'code';
            $this->client->authenticate($_GET['code']);
            echo 'return';
            return true;
        }
        return false;
    }
}