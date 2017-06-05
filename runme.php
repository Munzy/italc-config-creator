<?php

// #############################################################################
//          Variables
// #############################################################################
$filePut = "./GlobalConfig.xml";


// #############################################################################
//          Getting arguments.
// #############################################################################

if(!array_key_exists(1, $argv)) 
{
    exit(1);
}
elseif($argv[1] == "help")
{
    echo 'runme.php "classroom name" "./path/to/file.txt"';
}
else {
    $classroomName = $argv[1];
}


// Getting file path
if(!array_key_exists(2, $argv)) 
{
    $filePath = "./ids.txt";
}
else
{
    $filePath = $argv[2];
}



// #############################################################################
//      Functions
// #############################################################################

function explodeArray($file)
{
    $data = explode(PHP_EOL, $file);
    foreach($data as $key => $value)
    {
        $data[$key] = explode(",", $value);
    }
    return $data;
}
function clientXML($data)
{
    $intID = 1000;
    $clients = null;
    foreach($data as $value)
    {
        if(!array_key_exists(2, $value)){
            continue;
        }
        $macAddr = str_replace("-", ":", $value[2]);
        $clients .= "\n";  // New line
        $clients .= '           <client type="0" name="' . $value[0] . '" id="' . $intID++ . '" mac="' . $macAddr . '" hostname="' . $value[1] . '"/>';
    }
    return $clients;
}


// #############################################################################
//          Creating XML
// #############################################################################

$xmlHeader = 
'<?xml version="1.0"?>
<!DOCTYPE italc-config-file>
<globalclientconfig version"3.0.3">
    <body>
';
    
$xmlFooter =
'
        </classroom>        
    </body>
</globalclientconfig>';

$xmlClassroom =
'       <classrom name="' . $classroomName . '">';



// #############################################################################
//      Creation
// #############################################################################

$file = file_get_contents($filePath);
$dataArray = explodeArray($file);
$clientConfig = clientXML($dataArray);

$xml = $xmlHeader;
$xml .= $xmlClassroom;
$xml .=$clientConfig;
$xml .=$xmlFooter;

file_put_contents($filePut, $xml);

echo "Creation completed....";
exit(0);
