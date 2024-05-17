<?php

// get uploaded files from name="xml_file" and name="schema_file" inputs
$xml_file = $_FILES['xml_file'];
$schema_file = $_FILES['schema_file'];

// print content of the variables
echo "<h3>XML File</h3>";
echo "<pre>";
print_r($xml_file);
echo "</pre>";

echo "<h3>Schema File</h3>";
echo "<pre>";
print_r($schema_file);
echo "</pre>";

// check the xml validity
$xml = new DOMDocument();
$xml->load($xml_file['tmp_name']);
if ($xml->schemaValidate($schema_file['tmp_name'])) {
  echo "The XML file is valid";
} else {
  echo "The XML file is invalid";
}

// return after 10 seconds
header("Refresh:10; url=index.php");