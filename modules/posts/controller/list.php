
<?php defined('SUPERNATURAL') || exit;

/**
 *-------------------------------------------------------/
 * @file        modules\posts\controller\list.php     \
 * @author      Gilmer <gilmerfranko@hotmail.com>        |
 * @copyright   (c) 2020 Gilmer Franco                  /
 *                                                       /
 *=======================================================
 *
 * @Description Controlador principal de todos los Posts
 *
 *
 */
$page['name'] = 'Publicaciones';
$page['code'] = 'viewPost';

$posts = Core::model('post', 'posts')->getAllPosts(true);

