<html><head>
<meta name="keywords" content="domain free hosts forever no credit card required">
<meta name="description" content="Get free domains using this software! 100% free forever and no credit card required!
Manipulates the hosts file to reroute existing or non exsistant domains to IP's">
<meta name="google-site-verification" content="dYIsMapXTr7yid-He42h-_PUvu2OLznIBDpP1WM9jos" />
<title>Domainiac - free domains</title>
</head></html>

<?php

$header = $_SERVER['HTTP_USER_AGENT'];
if (preg_match('/Mac OS/i', $header) == 1) {
    echo '<h1>Sorry but apple devices cannot support the software on this website. please visit on a different device!</h1>';
} else {
    echo file_get_contents('index.html');
}

?>