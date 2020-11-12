<?php

function get_line_num($file, $find){
    $file_content = file_get_contents($file);
    $lines = explode("\n", $file_content);

    foreach($lines as $num => $line){
        $pos = strpos($line, $find);
        if($pos !== false)
            return $num;
    }
    return false;
}
$code = $_GET['code'];
$nameserverfile = fopen('database/nameserver.nsf', 'a+');
$nameserverlines = file('database/nameserver.nsf');
$line = get_line_num('database/nameserver.nsf', $code);
if ($nameserverlines["$line"] == false) {
    $domain = "Error: code not found in database";
} else {
    $domain = explode(" ", $nameserverlines["$line"])[0];
}

?>
<!DOCTYPE html>
<html  >
<head>
  <!-- Site made with Mobirise Website Builder v5.2.0, https://mobirise.com -->
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="generator" content="Mobirise v5.2.0, mobirise.com">
  <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1">
  <link rel="shortcut icon" href="assets/images/logo5.png" type="image/x-icon">
  <meta name="description" content="">
  
  
  <title>redirect</title>
  <link rel="stylesheet" href="assets/tether/tether.min.css">
  <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
  <link rel="stylesheet" href="assets/bootstrap/css/bootstrap-grid.min.css">
  <link rel="stylesheet" href="assets/bootstrap/css/bootstrap-reboot.min.css">
  <link rel="stylesheet" href="assets/theme/css/style.css">
  <link rel="preload" as="style" href="assets/mobirise/css/mbr-additional.css"><link rel="stylesheet" href="assets/mobirise/css/mbr-additional.css" type="text/css">
  
  
  
  
</head>
<body>
  
  <section class="header6 cid-sf6gHO1Sw0 mbr-fullscreen" id="header6-o">

    

    <div class="mbr-overlay" style="opacity: 0.2; background-color: rgb(68, 121, 217);"></div>

    <div class="align-center container">
        <div class="row justify-content-center">
            <div class="col-12 col-lg-10">
                <h1 class="mbr-section-title mbr-fonts-style mbr-white mb-3 display-1"><strong>Waiting for confirmation</strong></h1>
                
                <p class="mbr-text mbr-white mbr-fonts-style display-7">Please click the button below to confirm linking of <?php echo $domain; ?>. make sure you have downloaded domainiac before clicking the button</p>
                <div class="mbr-section-btn mt-3"><a class="btn btn-danger display-4" href="/downloads/domainiac.zip">Download domainiac (Windows)</a> <a class="btn btn-danger display-4" href="http://localhost:40515/link/<?php echo $code; ?>/<?php echo $domain; ?>/">Confirm</a> <a class="btn btn-danger display-4" href="/downloads/domainiac_linux.zip">Download domainiac (Linux)</a></div>
            </div>
        </div>
    </div>
</section><section style="background-color: #fff; font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', 'Roboto', 'Helvetica Neue', Arial, sans-serif; color:#aaa; font-size:12px; padding: 0; align-items: center; display: flex;"><a href="https://mobirise.site/r" style="flex: 1 1; height: 3rem; padding-left: 1rem;"></a><p style="flex: 0 0 auto; margin:0; padding-right:1rem;">Created with Mobirise <a href="https://mobirise.site/j" style="color:#aaa;">web</a> builder</p></section><script src="assets/web/assets/jquery/jquery.min.js"></script>  <script src="assets/popper/popper.min.js"></script>  <script src="assets/tether/tether.min.js"></script>  <script src="assets/bootstrap/js/bootstrap.min.js"></script>  <script src="assets/smoothscroll/smooth-scroll.js"></script>  <script src="assets/theme/js/script.js"></script>  
  
  
</body>
</html>