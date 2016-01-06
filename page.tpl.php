<?php
/**
 * @file
 * Default theme implementation to display a single Drupal page.
 *
 * The doctype, html, head and body tags are not in this template. Instead they
 * can be found in the html.tpl.php template in this directory.
 *
 * Available variables:
 *
 * General utility variables:
 * - $base_path: The base URL path of the Drupal installation. At the very
 *   least, this will always default to /.
 * - $directory: The directory the template is located in, e.g. modules/system
 *   or themes/bartik.
 * - $is_front: TRUE if the current page is the front page.
 * - $logged_in: TRUE if the user is registered and signed in.
 * - $is_admin: TRUE if the user has permission to access administration pages.
 *
 * Site identity:
 * - $front_page: The URL of the front page. Use this instead of $base_path,
 *   when linking to the front page. This includes the language domain or
 *   prefix.
 * - $logo: The path to the logo image, as defined in theme configuration.
 * - $site_name: The name of the site, empty when display has been disabled
 *   in theme settings.
 * - $site_slogan: The slogan of the site, empty when display has been disabled
 *   in theme settings.
 *
 * Navigation:
 * - $main_menu (array): An array containing the Main menu links for the
 *   site, if they have been configured.
 * - $secondary_menu (array): An array containing the Secondary menu links for
 *   the site, if they have been configured.
 * - $breadcrumb: The breadcrumb trail for the current page.
 *
 * Page content (in order of occurrence in the default page.tpl.php):
 * - $title_prefix (array): An array containing additional output populated by
 *   modules, intended to be displayed in front of the main title tag that
 *   appears in the template.
 * - $title: The page title, for use in the actual HTML content.
 * - $title_suffix (array): An array containing additional output populated by
 *   modules, intended to be displayed after the main title tag that appears in
 *   the template.
 * - $messages: HTML for status and error messages. Should be displayed
 *   prominently.
 * - $tabs (array): Tabs linking to any sub-pages beneath the current page
 *   (e.g., the view and edit tabs when displaying a node).
 * - $action_links (array): Actions local to the page, such as 'Add menu' on the
 *   menu administration interface.
 * - $feed_icons: A string of all feed icons for the current page.
 * - $node: The node object, if there is an automatically-loaded node
 *   associated with the page, and the node ID is the second argument
 *   in the page's path (e.g. node/12345 and node/12345/revisions, but not
 *   comment/reply/12345).
 *
 * Regions:
 * - $page['help']: Dynamic help text, mostly for admin pages.
 * - $page['highlighted']: Items for the highlighted content region.
 * - $page['content']: The main content of the current page.
 * - $page['sidebar_first']: Items for the first sidebar.
 * - $page['sidebar_second']: Items for the second sidebar.
 * - $page['header']: Items for the header region.
 * - $page['footer']: Items for the footer region.
 *
 * @see bootstrap_preprocess_page()
 * @see template_preprocess()
 * @see template_preprocess_page()
 * @see bootstrap_process_page()
 * @see template_process()
 * @see html.tpl.php
 *
 * @ingroup themeable
 */
?>

  


<div class="main-container container">

<div class="row main-row">

  <header id="navbar" role="banner" class="encabezado">

    <div class="sidebar-nav">

      <div class="<?php print $navbar_classes;?>" role="navigation">

        <div class="navbar-header">
          <!--
           div#tools>(div#social-bar>(span.fa-stack>(i.fa.fa-circle.fa-stack-2x+i.fa.fa-facebook.fa-stack-1x.fa-inverse.icono)))+div#search.input-group.input-group-sm>(span.input-group-addon.fa.fa-search+input[placeholder=text][type=text].form-control)  
          -->
          <div id="social-search">
            <div id="social-bar">
              <span class="fa-stack"><i class="fa fa-circle fa-stack-2x"></i><i class="fa fa-facebook fa-stack-1x fa-inverse icono"></i></span>
              <span class="fa-stack"><i class="fa fa-circle fa-stack-2x"></i><i class="fa fa-twitter fa-stack-1x fa-inverse icono"></i></span>
              <span class="fa-stack"><i class="fa fa-circle fa-stack-2x"></i><i class="fa fa-youtube-play fa-stack-1x fa-inverse icono"></i></span>
              <span class="fa-stack"><i class="fa fa-circle fa-stack-2x"></i><i class="fa fa-flickr fa-stack-1x fa-inverse icono"></i></span>
            </div>
            <div id="search" class="input-group input-group-sm">
              <span id="busqueda-trigger" class="input-group-addon fa fa-search icono"></span><input id="busqueda-campo" type="text" placeholder="BUSCAR" class="form-control" onfocus="this.placeholder='';"><i id="flecha-derecha" class="fa fa-chevron-right"></i>
            </div>
          </div>   
  

          <?php if ($logo): ?>
          <a class="logo navbar-btn pull-left" href="<?php print $front_page; ?>" title="<?php print t('Home'); ?>">
            <img src="<?php print $logo; ?>" alt="<?php print t('Home'); ?>" />
          </a>
          <?php endif; ?>

          <?php if (!empty($site_name)): ?>
          <a class="name navbar-brand" href="<?php print $front_page; ?>" title="<?php print t('Home'); ?>"><?php print $site_name; ?></a>
          <?php endif; ?>

          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".sidebar-navbar-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          

        </div>

        <?php if (!empty($primary_nav) || !empty($secondary_nav) || !empty($page['navigation'])): ?>
        <div class="navbar-collapse collapse sidebar-navbar-collapse">
          <nav role="navigation">
            <?php if (!empty($primary_nav)): ?>
            <?php print render($primary_nav); ?>
            <?php endif; ?>
            
            <?php if (!empty($secondary_nav)): ?>
              <?php print render($secondary_nav); ?>
            <?php endif; ?>


            <?php if (!empty($page['navigation'])): ?>
              <?php print render($page['navigation']); ?>
            <?php endif; ?>
            
            

          </nav>



        </div><!--/.nav-collapse -->


        <?php endif; ?>




        <div id="nav-footer">
          <?php  

            $main_menu = variable_get('menu_main_links_source', 'main-menu');
            $tree = menu_tree_all_data($main_menu);

            print '<ul id="areas-menu" class="menu nav navbar-nav navbar-collapse">';
            foreach ($tree as $key => $branch) {
              if($branch['link']['mlid'] == '367'){
                foreach ($branch['below'] as $key => $childitem) {

                  $name_id = 'menu-'.sanitaze($childitem['link']['link_title']);

                  $alias = drupal_get_path_alias($childitem['link']['link_path']);
                  


                  print '<li id="menu-'.$childitem['link']['mlid'].'" class="'.$name_id.'" >';
                  print '<a href="/'.$alias.'">'.$childitem['link']['link_title'].'</a>';
                  print '</li>';
                }
              }
              
            }
            print '</ul>';

          ?>

          <div id="culturas">
            <img src="/sites/all/themes/fna/assets/imgs/nacion-cultura.png" alt="Cultura Argentina" id="nacion-cultura">
            <img src="/sites/all/themes/fna/assets/imgs/ministerio-cultura.png" alt="Ministero de Cultura" id="ministerio-cultura">
          </div>

        </div>
      </div>

    </div>

  </header>


  <div class="contenido">
    <div class="container">

      <header role="banner" id="page-header">
        <?php if (!empty($site_slogan)): ?>
          <p class="lead"><?php print $site_slogan; ?></p>
        <?php endif; ?>

        <?php print render($page['header']); ?>
      </header> <!-- /#page-header -->

      <div class="row">

        <?php if (!empty($page['sidebar_first'])): ?>
          <aside class="col-sm-3" role="complementary">
            <?php print render($page['sidebar_first']); ?>
          </aside>  <!-- /#sidebar-first -->
        <?php endif; ?>

        <section<?php print $content_column_class; ?>>
          <?php if (!empty($page['highlighted'])): ?>
            <div class="highlighted jumbotron"><?php print render($page['highlighted']); ?></div>
          <?php endif; ?>
         
          <?php if (!empty($breadcrumb)): print $breadcrumb; endif;?>
         
          <a id="main-content"></a>
          <?php print render($title_prefix); ?>
          
          <?php 
            if (arg(0) == 'taxonomy' && arg(1) == 'term'){
              $tid = arg(2);
              $term_node = taxonomy_term_load($tid);

              $title = $term_node->field_nombre_plural["und"][0]["safe_value"];
            }       
          ?>

          <?php if (!empty($title)): ?>
            <h1 class="page-header"><?php print $title; ?></h1>
          <?php endif; ?>


          <?php print render($title_suffix); ?>
          <?php print $messages; ?>
          <?php if (!empty($tabs)): ?>
            <?php print render($tabs); ?>
          <?php endif; ?>
          <?php if (!empty($page['help'])): ?>
            <?php print render($page['help']); ?>
          <?php endif; ?>

<?php 
/* ------------------------------------------------------------------
Esta sección carga los anchors de los titulos de los field collections 
presentes y depues van derecho al bloque del sidebar_second.
 ------------------------------------------------------------------ */
          $hacer_menu = 0;

          if(!empty( $page['content']['system_main']['term_heading']['term']['field_seccion']['#items'])){
              $hacer_menu++; // Esto va a ser usado despues. 
              $items_field_collection = $page['content']['system_main']['term_heading']['term']['field_seccion']['#items'];
          } elseif ( !empty( $node->nid ) ){
              $nid_shit = $node->nid;
              $hacer_menu++;
              if(!empty($page['content']['system_main']['nodes'][$nid_shit]['field_seccion']['#items']))$items_field_collection = $page['content']['system_main']['nodes'][$nid_shit]['field_seccion']['#items'];
          } else {
              $hacer_menu = 0;
              $items_field_collection = '';
          }

          if (!empty($items_field_collection)){
              $array_index_mine = 0;
              $field_collections_pra_page = array();
              foreach ($items_field_collection as $elemento_items_fc){
                  $field_collections_pra_page[$array_index_mine]=$elemento_items_fc['value'];
                  $array_index_mine++;
              }
              $pp = entity_load('field_collection_item',$field_collections_pra_page); 
              $array_index_mine = 0;
              $linkys_titulos_fc = array();
              $menu_navegacion_ul_is = '<ul id="spy-menu" class="nav navegacion-del-contenido-fc">'; // CLASE PAL CSS !!!!!
              foreach ($pp as $field_collections_pra_page => $Entity_items_field_collection){
                  if (empty($Entity_items_field_collection->field_seccion_titulo['und'][0]['value'])){
                      continue;
                  }
                  $nombre_del_titulo_seccion_del_field_collection = $Entity_items_field_collection->field_seccion_titulo['und'][0]['value'];
                  $link_titulo_anchor = '<a title="'. $nombre_del_titulo_seccion_del_field_collection. '" href="#' .  sanitaze($nombre_del_titulo_seccion_del_field_collection) . '">' . $nombre_del_titulo_seccion_del_field_collection . '</a>';
                  $menu_navegacion_ul_is .= "<li>" . $link_titulo_anchor . "</li>";
                  //$linkys_titulos_fc[$array_index_mine] = $link_titulo_anchor;
                  //$array_index_mine++; 
              }
              $menu_navegacion_ul_is .= '</ul>';
          }
      
?> 
          
          
          <?php if (!empty($action_links)): ?>
            <ul class="action-links"><?php print render($action_links); ?></ul>
          <?php endif; ?>
          <?php print render($page['content']); 
          ?>

        </section>


<?php
/* ------------------------------------------------------------------
 ------------------------------------------------------------------ */
    if(empty($menu_navegacion_ul_is)){ 
        $hacer_menu = 0;
    }
    if ($hacer_menu == 0) {
        // Vaciar el bloque bastardo que tiene.
        $page['sidebar_second'] = '';
    } else {
        // K.O.
        $page['sidebar_second']['block_2']['#markup'] = $menu_navegacion_ul_is;
    }

    //-----------------

        if (!empty($page['sidebar_second'])): ?>
          <aside class="col-sm-3" role="complementary">
            <?php print render($page['sidebar_second']);
            ?>
          </aside>  <!-- /#sidebar-second -->
        <?php endif; ?>

      </div>
    </div> <!--/main-container -->

  </div> <!--/.content col -->



 </div> <!--/main-container -->
</div> <!--/main row -->



<!-- <footer class="footer container"> -->
  <?php //print render($page['footer']); ?>
<!-- </footer> -->
