<?php
$session= new Classes\CLassSessions();
$session->destructSessions();
echo "<script>
alert('Você efetuou o logout!');
window.location.href='".DIRPAGE."login';
</script>";