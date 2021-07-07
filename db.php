<?php
@session_start();
// Hàm tả về kết nối với csdl
function getDbConnect(){
    $host = "127.0.0.1";
    $dbname = "duan2";
    $db_username = "root";
    $db_password = "";
   return new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $db_username, $db_password);
}
define('BASE_URL',"http://localhost:/duan2/");
?>
<?php
function day($time)
{
    return $time->format('Y/m/d');
}