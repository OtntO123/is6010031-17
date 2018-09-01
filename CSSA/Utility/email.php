<?php	namespace email;

		
	$to = "kz233@njit.edu";
	$subject = "My subject";
	$txt = "Hello world!";
	$headers = "From: kz233@njit.com";

	mail($to,$subject,$txt,$headers);
}
