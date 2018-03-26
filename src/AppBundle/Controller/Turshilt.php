<?php
require_once "Classes/PHPExcel.php";
$tmpfname = "test.xlsx";
try {
    $excelReader = PHPExcel_IOFactory::createReaderForFile($tmpfname);
} catch (PHPExcel_Reader_Exception $e) {
}
$excelObj = $excelReader->load($tmpfname);
$worksheet = $excelObj->getSheet(0);
$lastRow = $worksheet->getHighestRow();

echo "<table>";
for ($row = 1; $row <= $lastRow; $row++) {
    echo "<tr><td>";
    try {
        echo $worksheet->getCell('A' . $row)->getValue();
    } catch (PHPExcel_Exception $e) {
    }
    echo "</td><td>";
    try {
        echo $worksheet->getCell('B' . $row)->getValue();
    } catch (PHPExcel_Exception $e) {
    }
    echo "</td><tr>";
}
echo "</table>";