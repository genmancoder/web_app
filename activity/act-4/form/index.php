<?php
// Function to read file content line by line
function phpReadFile($filename){
  $myfile = fopen($filename, "r") or die("Unable to open the file!!");
  $filecontent = "";
  // Read each line until the end of the file
  while (!feof($myfile)) {
    $filecontent .= fgets($myfile);
  }
  fclose($myfile);
  return $filecontent;
}

echo nl2br(phpReadFile("data.txt"));

?>
