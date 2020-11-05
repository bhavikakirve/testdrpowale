<?PHP
session_start();

error_reporting(0);

$_SESSION['logged_out'] = 'true';
session_start();
session_unset();
session_destroy();
session_write_close();
setcookie(session_name(),'',0,'/');
session_regenerate_id(true);
@session_start();
header('Location:index.php');
?>