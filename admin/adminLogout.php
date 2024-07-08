<?php 
session_start();
session_destroy();
echo "<script>
			alert('Logged Out!');
			setTimeout(function() {
				window.location.href = 'adminLogin.php';
			}, 100); 
		</script>";
?>