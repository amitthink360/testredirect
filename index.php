<?php
class Database
{
    private static $dbName = 'domain_system';
    private static $dbHost = '147.182.189.109';
    private static $dbUsername = 'domain_user';
    private static $dbUserPassword = 'Jbp=aZb1QZ={96Pi';

    private static $cont = null;

    public function __construct()
    {
        exit('Init function is not allowed');
    }

    public static function connect()
    {
        // One connection through whole application
        if (null == self::$cont) {
            try {
                self::$cont = new PDO("mysql:host=" . self::$dbHost . ";" . "dbname=" . self::$dbName, self::$dbUsername, self::$dbUserPassword, [PDO::MYSQL_ATTR_LOCAL_INFILE => true]);
            } catch (PDOException $e) {
                die($e->getMessage());
            }
        }
        return self::$cont;
    }

    public static function disconnect()
    {
        self::$cont = null;
    }
}

$pdo = Database::connect();
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

try {
	$sql = "INSERT INTO clicker_phone (phone,date_added) values (?,?)";
	$q = $pdo->prepare($sql);
	$q->execute(array($_GET['phone'],date('Y-m-d H:i:s')));
}catch(Exception $e) {
	//echo 'Message: ' .$e->getMessage();
}
echo"<pre/>";print_r($_GET);die;
$queryString =  http_build_query($_GET);
if($_GET['dig'] == 'za'){
	$redirect_link = "https://go.myquickresource.com/4d2d4d65-8271-4f15-9046-0be935eeaa74?optin_domain=050522_055_com&gender=050522_com&filename=POPEYE_050522_com&email=POPEYE_050522_&".$queryString;
}elseif($_GET['dig'] == 'ya'){
	$redirect_link = "https://go.myquickresource.com/8816826c-618f-45be-b429-68a19646f7d3?optin_domain=050522_055_com&gender=050522_com&filename=MCD_050522_com&email=MCD_050522_&".$queryString;
}

header("Location:".$redirect_link);

?>