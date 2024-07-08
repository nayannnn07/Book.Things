<?php
session_start();
unset($_SESSION[$fname]);
session_destroy();
	echo "<script>
			alert('Logged Out!');
			setTimeout(function() {
				window.location.href = '../userLogin.php';
			}, 100); 
		</script>";

?>