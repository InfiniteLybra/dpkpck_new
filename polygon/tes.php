<?php
// Define the paths to ogr2ogr and your input/output files
$ogr2ogr = '/path/to/ogr2ogr'; // Replace with the actual path to ogr2ogr
$inputShapefile = '/path/to/your/input.shp'; // Replace with the path to your Shapefile
$outputCsv = '/path/to/your/output.csv'; // Replace with the desired output CSV file path

// Execute the ogr2ogr command to convert SHP to CSV
$command = "$ogr2ogr -f CSV $outputCsv $inputShapefile";
exec($command, $output, $returnCode);

if ($returnCode === 0) {
    echo "Conversion successful. CSV file created at $outputCsv";
} else {
    echo "Conversion failed. Error: " . implode("\n", $output);
}
?>
