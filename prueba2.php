<?php

$ips = array(
	'192.168.10.188',
	'192.168.10.189',
	'192.168.11.12',
	'192.168.11.14',
	'192.168.11.117',
	'192.168.11.166',
	'192.168.11.210',
	'192.168.12.53',
	'192.168.12.56',
	'192.168.12.140',
	'192.168.12.141',
	'192.168.12.154',
	'192.168.12.211',
	'192.168.13.17',
	'192.168.13.19',
	'192.168.14.140',
	'192.168.15.111',
	'192.168.15.164',
	'192.168.15.179',
	'192.168.16.37',
	'192.168.17.44',
	'192.168.17.66',
	'192.168.17.116',
	'192.168.17.213',
	'192.168.17.229',
	'192.168.17.246',
	'192.168.18.86',
	'192.168.18.140',
	'192.168.19.55',
	'192.168.19.122',
	'192.168.19.131',
	'192.168.19.186',
);

escaneaIPS($ips);

function escaneaIPS($ips){
	foreach ($ips as $ip) {

		if (filter_var($ip, FILTER_VALIDATE_IP, FILTER_FLAG_IPV4)) {

			$ch = curl_init();
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
			curl_setopt($ch, CURLOPT_URL, $ip);
			curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 1);
			curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);

// Petición HEAD
			curl_setopt($ch, CURLOPT_HEADER, true);
			curl_setopt($ch, CURLOPT_NOBODY, true);

			$content = curl_exec($ch);

			if (!curl_errno($ch)) {
				$info = curl_getinfo($ch);

				print_r("\nSe recibió respuesta " . $info['http_code'] . ' en ' . $info['total_time'] . " segundos IP ". $ip ."\n");
			} else {
				print_r("\nError en petición: " . curl_error($ch) . "\n");
			}

			curl_close($ch);

		} else {
			print_r("\nDirección IP no válida: " . $ip . "\n");
		}
	}
}

function escaneaPuertos($ip)
{

	for ($i=0;$i<100;$i++) {

		if ($port = @fsockopen ($ip, $i, $errno, $errstr, 0.2)) {

			$Msg = fgets($port, 1024);

			if ($Msg==""){ $Mensaje = "Puerto abierto, no emite respuesta."; }else{ $Mensaje = $Msg; }

			echo 'Abierto';

			fclose ();

		}else{

			echo 'CerradoEl puerto está cerrado.</td></tr>';

		}
		echo $i . PHP_EOL;
	}
}

//escaneaPuertos('192.168.11.14');
?>
