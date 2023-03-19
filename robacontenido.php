<?php
/*function feed($feedURL,$fp){
	$storys = simplexml_load_file($feedURL);
	$a = 0;
	$links='';
	foreach($storys->sitemap as $story) {
		$i = 0;
		$filter="+ecologia"; // filtra la categoria
		if ($i < 1) {
			$rss = simplexml_load_file($story->loc);
			foreach($rss->url as $url) {
				$link = $url->loc;
				if (stripos($link, $filter)) { 
					$links.=$link . PHP_EOL;
					echo $link . '<br>';
				}
				$i++;
			}
		}
		$a++;
	}
	return $links;
}
// SI EL ARCHIVO NO ABRE MOSTRAR UN ERROR
if (!$fp = fopen("links.txt", "w+")){
	die("No se ha podido abrir el archivo");
}
//fwrite($fp,feed("https://taringa.net/smaps/taringa-sitemap-story-index.35.xml",$fp));
fclose($fp);
*/

function downloadFile($src, $dst) {
  //abrimos un fichero donde guardar la descarga de la web

	if(!$fp=fopen($dst, "w+")){
		echo "No se pudo abrir o no se localizo el archivo " + $dst + ". Revise los permisos del archivo solicitado";
	}

	// Se crea un manejador CURL
	$ch=curl_init();

	// Se establece la URL y algunas opciones
	curl_setopt($ch, CURLOPT_URL, $src);
	//determina si descargamos las cabeceras del servidor [0-No mostramos|1-mostramos]
	curl_setopt($ch, CURLOPT_HEADER, 0);
	//determina si mostramos el resultado en el nevagador [0-mostramos|1-NO mostramos]
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

	//determina donde guardar el fichero
	curl_setopt($ch, CURLOPT_FILE, $fp);

	//verificar https http
	curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
	curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);

	// Se obtiene la URL indicada
	$hola = curl_exec($ch);

	// Se cierra el recurso CURL y se liberan los recursos del sistema
	curl_close($ch);

	//se cierra el manejador de ficheros
	fclose($fp);
}
//downloadFile('https://taringa.net/smaps/taringa-sitemap-story-index.35.xml','links.txt');

  function file_get_contents_curl($url){
      $ch = curl_init();
      //curl_setopt($ch, CURLOPT_HEADER, 0);
      curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
      curl_setopt($ch, CURLOPT_URL, $url);
      curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
      $data = curl_exec($ch);
      curl_close($ch);
      return $data;
  }
  function limpiarString($String){
      $String = str_replace(array("|","|","[","^","´","`","¨","~","]","'","#","{","}",".",""),"",$String);
      return $String;
  }
  function BBCODE($String){
      $String = str_replace('<',"[",$String);
      $String = str_replace('>',"]",$String);
      return $String;
  }

  // FOR PARA TESTEAR LA VELOCIDAD
  for ($i=0; $i<1; $i++) {

  	echo PHP_EOL. $i . PHP_EOL;
	  $url 	=	'https://www.taringa.net/+ecologia/chile-se-asocia-con-empresa-uruguaya-para-construir-una-planta-solar_4rppyp?source=sidebar-recommended-normal';
	  // GUARDO EL HTML
	  $html 	= 	file_get_contents($url);
	  // LO CONVIERTO EN OBJETO
	  $doc 	= 	new DOMDocument();
	  @$doc->loadHTML($html);

	  //Selecciono el Titulo
	  $nodes 	= 	$doc->getElementsByTagName('h1');
	  $title 	= 	limpiarString($nodes->item(0)->nodeValue);
	  //Selecciono el cotenido
	  $divs 	= 	$doc->getElementsByTagName('div');
	  //Selecciono la fecha
	  $metas 	= 	$doc->getElementsByTagName('meta');
	  $article=   $doc->getElementsByTagName('article');
	  foreach($metas as $meta)
	  {
	  	if($meta->getAttribute('property') == 'article:published_time')
	  	{
	  		$time = $meta->getAttribute('content');
	  		break;
	  	}
	  }
	  if(count($article)>0)
	  {
	  	$content = $article->item(0)->ownerDocument->saveHTML($article->item(0));
	  }
	  else
	  {


		  for ($b = 0; $b < $divs->length; $b++):

		  	$div = $divs->item($b);

		  	if($div->getAttribute('class') == 'classic')

		  		$content = $div->ownerDocument->saveHTML($div);
		  		break;

		  endfor;
		}
	  $timeOuts = array('2009','2010','2011','2012','2013','2014','2015','2016','2017','2018');

	  // COMPRUEBA QUE EL POSTS NO SEA DESDE ANTES DEL 2019
		if(str_replace($timeOuts, '$time', $time) == $time)
		{
		}
		echo $content;
	  //require '../chat/prueba.php';
	  //echo "KEYWORDS :<br>".$keywords;
	}
