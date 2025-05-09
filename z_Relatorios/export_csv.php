<?php
session_start();

include_once '../php_action/db_connect.php';


/* vars for export */
// database record to be exported
$db_record = 'XXX_TABLE_NAME_XXX';
// optional where query
$where = 'WHERE 1 ORDER BY 1';
// filename for export
$csv_filename = 'db_export_'.$db_record.'_'.date('Y-m-d').'.csv';




// create empty variable to be filled with export data
$csv_export = '';

// query to get data from database

//$query = mysqli_query($conn, "SELECT * FROM ".$db_record." ".$where);
//$field = mysqli_field_count($conn);

$sql = $_SESSION['rel_cliente'];

$query = mysqli_query($connect, $sql);
$field = mysqli_field_count($connect);



// create line with field names
for($i = 0; $i < $field; $i++) {
    $csv_export.= mysqli_fetch_field_direct($query, $i)->name.';';
}

// newline (seems to work both on Linux & Windows servers)
$csv_export.= '
';

// loop through database query and fill export variable
while($row = mysqli_fetch_array($query)) {
    // create line with field values
    for($i = 0; $i < $field; $i++) {
        $csv_export.= '"'.$row[mysqli_fetch_field_direct($query, $i)->name].'";';
    }
    $csv_export.= '
';
}

// Export the data and prompt a csv file for download
header("Content-type: text/x-csv");
header("Content-Disposition: attachment; filename=".$csv_filename."");
echo($csv_export);

