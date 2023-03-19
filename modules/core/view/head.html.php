<?php defined('SUPERNATURAL') || exit;

/**
 *-------------------------------------------------------/
 * @file        modules\core\view\head.html.php          \
 * @author      Gilmer <gilmerfranko@hotmail.com>        |
 * @copyright   (c) 2020 Gilmer Franco                  /
 *                                                       /
 *=======================================================
 *
 * @Description Archivo que incluye parte de la cabecera
*/

?><!DOCTYPE HTML>

<html lang="es">

   <head>
       
<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-168682834-1"></script>

<!-- import sweetalert2 -->
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>


<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-168682834-1');
</script>
<!-- Global site tag (gtag.js) - Google Analytics -->

      <meta charset="UTF-8">

      <title><?php echo isset($page['name']) ? $page['name'] : ucfirst($sModule) . ' - ' . $config['script_name'];?></title>

      <!--Import Google Icon Font-->

      <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

      <!--Import materialize.css-->

      <link type="text/css" rel="stylesheet" href="<?php echo $config['base_url']; ?>/static/css/materialize.min.css"  media="screen,projection"/>

      <!--Import custom.css-->

      <link type="text/css" rel="stylesheet" href="<?php echo $config['base_url']; ?>/static/css/custom.css?r=<?php echo time(); ?>" />

      <!--Import night.css-->

      <!--<link type="text/css" rel="stylesheet" href="<?php echo $config['base_url']; ?>/static/css/night.css" />-->

      <!--Sitio optimizado para moviles-->

      <meta name="viewport" content="width=device-width, initial-scale=1.0"/>

      <!-- Favicon -->

      <link rel="shortcut icon" href="<?php echo $config['base_url']; ?>/favicon.ico">

      <script>

         var global={

             url:  '<?php echo $config['base_url']; ?>',

             page: '<?php echo $page['name']; ?>',

             page_c: '<?php echo isset($page['code']) ? $page['code'] : $sSection; ?>',

             page_n: '<?php echo $page['number']; ?>',

             images: '<?php echo $config['images_url']; ?>'

         };

         var member={

             id: '<?php echo $session->memberData['member_id']; ?>',

             name: '<?php echo $session->memberData['name']; ?>',

             group: '<?php echo $session->memberData['group_id']; ?>',

             platform: '<?php echo $session->platform; ?>',

         };

      </script>

      <?php if($session->platform == 'android' || $session->platform == 'app') { ?>

      <style>

        nav a.left,

        nav a.right {

            width: 16.6666666667%;

        }

      </style>

      <?php } ?>

   </head>

<body>

<!-- mostrar preloader solo si no se esta en modo debug -->
<?php if($config['debug_mode'] == 0) { ?>
<div class="preloader-background">

    <div class="preloader-wrapper big active">

        <div class="spinner-layer spinner-blue-only">

            <div class="circle-clipper left">

                <div class="circle"></div>

            </div>

            <div class="gap-patch">

                <div class="circle"></div>

            </div>

            <div class="circle-clipper right">

                <div class="circle"></div>

            </div>

        </div>

    </div>

</div>
<?php } ?>
