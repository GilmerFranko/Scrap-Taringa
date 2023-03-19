
<?php defined('SUPERNATURAL') || exit;

/**
 *-------------------------------------------------------/
 * @file        modules\posts\controller\posts-no-added.php     \
 * @author      Gilmer <gilmerfranko@hotmail.com>        |
 * @copyright   (c) 2020 Gilmer Franco                  /
 *                                                       /
 *=======================================================
 *
 * @Description Controlador principal de todos los Posts no Añadidos a la sección Posts
 *
 *
 */
$page['name'] = 'Posts Scrapeados';
$page['code'] = 'viewPost';

$posts = Core::model('post', 'posts')->getAllPostsNoAdded(true);

if(isset($_GET['cronAddPosts']) AND $_GET['cronAddPosts'])
{
  Core::model('post', 'posts')->addPostScrap(4);
}
