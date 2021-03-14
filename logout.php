<?php
header("Content-Type:text/html;charset=utf-8");
session_start();
session_destroy();
echo "<script>alert('注销成功！');location.href='index.php';</script>"
?>