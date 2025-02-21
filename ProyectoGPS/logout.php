<?php
session_start();
session_destroy();
header("Location: index.php?pagina=1");
exit;
?>
