<?php
$input = $_REQUEST["content"];
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
function removeLine($text, $file) {
    $line = get_line_num($file);
    unset($file["$line"]);
    file_put_contents("../../database/nameserver.nsf", implode("", $file));
}
$nameserverfile = fopen("../../database/nameserver.nsf", "a+");
$nameserverlines = file("../../database/nameserver.nsf");
$explodedcontent = explode(" ", $input);
if ($_SERVER["REQUEST_METHOD"] == "GET") {
    $line = get_line_num('../../database/nameserver.nsf', $input);
    if ($nameserverlines["$line"] == false) {
    	echo "Error: code not found in database";
    } else {
    	echo $nameserverlines["$line"];
    }
} else if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $code = randomString($length = 6);
    $delcode = randomString($legnth = 8);
    $newdata = PHP_EOL . $input . ' ' . $code . " " . $delcode;
    if (substr_count($input, " ") == 1) {
        if (filter_var($explodedcontent[1], FILTER_VALIDATE_IP, FILTER_FLAG_IPV4) == $explodedcontent[1]) {
            fwrite($nameserverfile, $newdata);
            echo $code . " " . $delcode;
        } else {
            echo "Error: failed to bypass filter";
        }
    } else {
        echo "Error: failed to bypass filter";
    }
} else if ($_SERVER["REQUEST_METHOD"] == "DELETE") {
    $line = get_line_num("../../database/nameserver.nsf", $input);
    $eline = explode(" ", $nameserverlines["$line"]);
    if ($input == $eline[3]) {
        removeLine($nameserverlines["$line"], $nameserverlines);
        echo "Deleted!";
    } else {
        echo "Error: code not found in database";
    }
}
foreach ($nameserverlines as $line) {
    if (strpos(file_get_contents("../../database/protected.txt"), $line) !== false) {
        removeLine($line, $nameserverlines);
    }
}
?>