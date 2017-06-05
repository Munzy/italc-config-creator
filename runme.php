<?php

// #############################################################################
//          Variables
// #############################################################################
$intID = 1000;
$filePut = "./GlobalConfig.xml";


// #############################################################################
//          Getting arguments.
// #############################################################################

if($argv[1] == null)
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
if($argv[2] == null) 
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
    $clients = null;
    foreach($data as $value)
    {
        $clients .= '           <client type="0" name="' . $value[0] . '" id="' . $intID++ . '" mac="' . $value[2] . '" hostname="' . $value[1] . '"/>' . "\n";
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
    <body>';
    
$xmlFooter =
'       </classroom>        
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
