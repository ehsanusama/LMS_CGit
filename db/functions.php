<?php
function redirect($url, $time = 0)
{
?>
    <script>
        setTimeout(function() {
            window.location = '<?= $url ?>';
        }, <?= $time ?>)
    </script>
<?php
}
?>
<?php
function getQR($data, $size = 200, $padding)
{
?>
    <img src="qrcode.php?data=<?= $data ?>&size=<?= $size ?>&padding=<?= $padding ?>" alt="">
<?php
}
?>
<?php
function getQRURL($data, $size = 200, $padding = 10)
{
?>
    <img src="qrcode.php?data=URL:<?= $data ?>&size=<?= $size ?>&padding=<?= $padding ?>" alt="">
<?php
}
?>
<?php
function getQRTEL($number, $size = 200, $padding = 10)
{
?>
    <img src="qrcode.php?data=TEL:<?= $number ?>&size=<?= $size ?>&padding=<?= $padding ?>" alt="">
<?php
}
?>
<?php
function getQREmail($email, $size = 200, $padding = 10)
{
?>
    <img src="qrcode.php?data=mailto:<?= $email ?>&size=<?= $size ?>&padding=<?= $padding ?>" alt="">
<?php
}
?>
<?php
function getQRSMSTO($number, $msg, $size = 200, $padding = 10)
{
?>
    <img src="qrcode.php?data=SMSTO:<?= $number ?>:<?= $msg ?>&size=<?= $size ?>&padding=<?= $padding ?>" alt="">
<?php
}
?>
<?php
function getQRVCard($name = "", $number = "", $email = "", $company = "", $note = "", $size = 100, $padding = 10)
{
    $data = 'MECARD:N:' . $name . ';ORG:' . $company . ';TEL:' . $number . ';EMAIL:' . $email . ';NOTE' . $note . ';;';
?>
    <img src="qrcode.php?data=<?= $data ?>&size=<?= $size ?>&padding=<?= $padding ?>" alt="">
<?php
}
function fetchRecord($dbc, $table, $fld, $data)
{
    return  mysqli_fetch_assoc(mysqli_query($dbc, "SELECT * FROM $table WHERE $fld='$data'"));
}
function insert_data($dbc, $table, $data)
{
    global $msg;
    global $sts;
    $fld = $values = "";
    $i = 0;
    $comma = ",";
    $count = count($data);
    foreach ($data as $index => $value) {
        # code...
        if (($count - 1) == $i) {
            $comma = "";
        }
        $fld = $fld . $index . $comma;
        if ($index = !"post_body") {
            # code...
            $val = validate_data($dbc, $value);
        } else {
            $val = $value;
        }
        @$values = $values . "'" . $val . "'" . $comma;
        $i++;
    }
    return mysqli_query($dbc, "INSERT INTO $table($fld) VALUES($values)");
}
function update_data($dbc, $table, $data, $col, $val)
{
    $set_data = "";
    $i = 0;
    $comma = ",";
    $count = count($data);
    //debug_mode($data);
    foreach ($data as $index => $value) {
        # code...
        if (($count - 1) == $i) {
            $comma = "";
        }
        $set_data = $set_data . $index . "='" . validate_data($dbc, $value) . "'" . $comma;
        $i++;
    }
    return mysqli_query($dbc, "UPDATE $table SET $set_data WHERE $col='$val'");
}
function validate_data($dbc, $data)
{
    return mysqli_real_escape_string($dbc, strip_tags($data));
}
if (!function_exists('base_url')) {
    function base_url($atRoot = FALSE, $atCore = FALSE, $parse = FALSE)
    {
        if (isset($_SERVER['HTTP_HOST'])) {
            $http = isset($_SERVER['HTTPS']) && strtolower($_SERVER['HTTPS']) !== 'off' ? 'https' : 'http';
            $hostname = $_SERVER['HTTP_HOST'];
            $dir =  str_replace(basename($_SERVER['SCRIPT_NAME']), '', $_SERVER['SCRIPT_NAME']);

            $core = preg_split('@/@', str_replace($_SERVER['DOCUMENT_ROOT'], '', realpath(dirname(__FILE__))), NULL, PREG_SPLIT_NO_EMPTY);
            $core = $core[0];

            $tmplt = $atRoot ? ($atCore ? "%s://%s/%s/" : "%s://%s/") : ($atCore ? "%s://%s/%s/" : "%s://%s%s");
            $end = $atRoot ? ($atCore ? $core : $hostname) : ($atCore ? $core : $dir);
            $base_url = sprintf($tmplt, $http, $hostname, $end);
        } else $base_url = 'http://localhost/';

        if ($parse) {
            $base_url = parse_url($base_url);
            if (isset($base_url['path'])) if ($base_url['path'] == '/') $base_url['path'] = '';
        }

        return $base_url;
    }
}
?>