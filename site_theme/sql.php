<?php

$doit = $db->query("SELECT password, username FROM members WHERE username = 'beesch' AND password = 'a665a45920422f9d417e4867efdc4fb8a04a1f3fff1fa07e998e86f7f7a27ae3'");
echo $doit;
?>