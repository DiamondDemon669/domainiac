<?php
$nameserverfile = fopen("nameserver.nsf", "a+");
$nameserverlines = file("nameserver.nsf");
$explodedcontent = explode(" ", $_POST["content"]);
$content = $_POST["content"];
$command = $_POST["command"];

class Useful {
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
        $line = $this->get_line_num($file, $text);
        unset($file["$line"]);
        file_put_contents("nameserver.nsf", implode("", $file));
    }
}


$useful = new Useful();

class Server {
    function link($content = "") {
        $line = $useful->get_line_num('nameserver.nsf', $content);
    	if ($nameserverlines["$line"] == false) {
    		echo "Error: code not found in database";
    	} else {
    		echo $nameserverlines["$line"];
    	}
    }
    function add($content = "") {
        $code = $useful->randomString($length = 6);
    	$delcode = $useful->randomString($legnth = 8);
    	$newdata = PHP_EOL . $content . ' ' . $code . " " . $delcode;
    	if (substr_count($content, " ") == 1) {
            if (filter_var($explodedcontent[1], FILTER_VALIDATE_IP, FILTER_FLAG_IPV4) == $explodedcontent[1]) {
            	fwrite($nameserverfile, $newdata);
            	echo "$code $delcode";
            } else {
                echo "Error: failed to bypass filter";
            }
        } else {
            echo "Error: failed to bypass filter";
        }
    }
    function delete($content = "") {
        $line = $useful->get_line_num("nameserver.nsf", $content);
    	$eline = explode(" ", $nameserverlines["$line"]);
    	if ($content == $eline[3]) {
            $useful->removeLine($nameserverlines["$line"], $nameserverlines);
            echo "Deleted!";
    	} else {
            echo "Error: code not found in database";
    	}
    }
}

$server = new Server();

if ($command == "link") {
    $server->link($content = $content);
} else if ($command == "add") {
    $server->add($content = $content);
} else if ($command == "delete") {
    $server->delete($content = $content);
}


foreach ($nameserverlines as $line) {
    if (strpos(file_get_contents("protected.txt"), $line) !== false) {
        removeLine($line, $nameserverlines);
    }
}
?>
