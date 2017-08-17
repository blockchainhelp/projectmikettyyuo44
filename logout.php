<?
session_start();
ob_start();
 
 session_destroy();
 header('Location:index.php');
 //echo "<script>window.locaton.href='index.php'</script>";
?>