<?php
header('Content-type:text/html;charset=utf-8');

$row = 1;
$handle = fopen("a.csv","r");
while ($data = fgetcsv($handle, 1000, ",")) {
    $num = count($data);
    if($row == 1) $title = $data;
    //echo "<p> $num fields in line $row: <br>\n";
    echo "'".strtolower($data[1]).'\' => ['. "<br>\n";
    $row++;
    for ($c=0; $c < $num; $c++) {
        echo "'{$title[$c]}' => '{$data[$c]}'" . ",<br>\n";
    }
    echo '],'. "<br>\n";
}
fclose($handle);

