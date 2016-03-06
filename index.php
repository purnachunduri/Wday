<?php

require_once 'app/init.php';

$googleClient =new Google_Client;

$auth = new GoogleAuth($googleClient);

if($auth->checkRedirectCode()){
    die($_GET['code']);
}
?>

<!doctype html>
<html>
    <head>
        <meta charset="utf-8">
        <title> Sample Page</title>
    </head>
    <body>
        <?php if(!$auth->isLoggedIn()): ?>
            <a href="<?php echo $auth->getAuthUrl(); ?>">Sign-in With GOOGLE</a>
        <?php else: ?>
            You are Signed In <a href="logout.php">Sign Out</a>
        <?php endif; ?>
    </body>
</html>