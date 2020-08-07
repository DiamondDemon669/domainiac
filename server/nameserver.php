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
function randomString($length = 10) {
    $characters = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
    return $randomString;
}
$nameserverfile = fopen("nameserver.txt", "a+");
$nameserverlines = file("nameserver.txt");
if (preg_match('/link/', $_POST["command"]) == 1) {
    $line = get_line_num('nameserver.txt', $_POST['content']);
    if ($nameserverlines["$line"] == false) {
    	echo "Error: code not found in database";
    } else {
    	echo $nameserverlines["$line"];
    }
} else if (preg_match('/add/', $_POST["command"]) == 1) {
    $code = randomString($length = 6);
    $newdata = PHP_EOL . $_POST["content"] . ' ' . $code;
    fwrite($nameserverfile, $newdata);
    echo $code;
}
?>
    
