<div class="main-nav--div">
  <div class="menu-close-wrapper">
    <button class="menu-close-btn">
      <?php echo coact_icon(array('icon' => 'close', 'group' => 'utilities', 'size' => '24', 'class' => 'w-6 h-6')); ?>
    </button>
  </div>
  <?php
  $current_post_id = get_queried_object_id();
  $post_ancestors = get_post_ancestors($current_post_id);
  $menu_items = get_field('menu_items', 'option');

  if ($menu_items) :
  ?>
    <ul class="main-nav--ul">
      <?php foreach ($menu_items as $menu_id => $menu) :
        $menu_item = $menu['menu_item'];
        $submenu_type = $menu['submenu_type'];
        $megamenu_items = $menu['megamenu_items'];
        $dropdown_menu_items = $menu['dropdown_menu_items']['submenu_items'];
        $li_class = '';

        if ($submenu_type && ($megamenu_items || $dropdown_menu_items)) {
          $li_class = 'has_submenu';
        }

        if ($menu_item) :
          $menu_url = $menu_item['url'];
          $link_post_id = url_to_postid($menu_url);
          $link_class = get_menu_link_class($current_post_id, $link_post_id, $post_ancestors, $megamenu_items, $dropdown_menu_items);

          // Output menu item
          echo '<li class="' . $li_class . '">';
          echo '<a href="' . esc_url($menu_url) . '" target="' . esc_attr($menu_item['target']) . '" data-id="' . esc_attr($link_post_id) . '" class="' . esc_attr($link_class) . '">' . esc_html($menu_item['title']) . '</a>';
          echo '<button class="menu-right-btn">';
          echo coact_icon(array('icon' => 'chevron-down', 'group' => 'utilities', 'size' => '12', 'class' => 'w-3 h-3 -rotate-90'));
          echo '</button>';

          // Output submenu if exists
          if ($submenu_type == 'megamenu' && $megamenu_items) {
            output_megamenu($megamenu_items);
          } elseif ($submenu_type == 'dropdown' && $dropdown_menu_items) {
            output_dropdown_menu($dropdown_menu_items);
          }

          echo '</li>';
        endif;
      endforeach; ?>
    </ul>
  <?php endif; ?>

  <div class="flex-none border-t border-solid border-slate-200 px-4 py-6 mt-4 xl:border-0 xl:pl-16 xl:pr-0 xl:pt-0 xl:pb-3 xl:mt-0 xl:ml-auto">
    <div class="relative">
      <form id="header-searchform" class="relative" method="get" action="<?php echo esc_url(home_url('/')); ?>">
        <input id="searchform-input" type="text" class="w-auto xl:w-64 border-none shadow-inner rounded-full bg-white px-6 py-3 focus:border-brand-sea focus:ring-brand-sea" name="s" placeholder="Search" value="">
        <button type="submit" class="absolute right-4 top-3" style="<?php echo $search_icon_style ?>">
          <?php echo coact_icon(array('icon' => 'search', 'group' => 'utilities', 'size' => '24', 'class' => 'text-brand-sea')); ?>
        </button>
      </form>
    </div>
  </div>
</div>

<?php
function get_menu_link_class($current_post_id, $link_post_id, $post_ancestors, $megamenu_items, $dropdown_menu_items)
{
  $megamenu_submenu_items = isset($megamenu_items['submenu_group']) ? $megamenu_items['submenu_group'] : [];
  $megamenu_link_ids = [];
  if (!empty($megamenu_submenu_items)) {
    foreach ($megamenu_submenu_items as $submenu) {
      $submenu_items = isset($submenu['submenu_items']) ? $submenu['submenu_items'] : [];
      if (!empty($submenu_items)) {
        foreach ($submenu_items as $item) {
          if (!empty($item['submenu_link']['url'])) {
            $submenu_post_id = url_to_postid($item['submenu_link']['url']);
            if ($submenu_post_id !== 0) {
              array_push($megamenu_link_ids, $submenu_post_id);
            }
          }
        }
      }
    }
  }

  $dropdown_menu_items = isset($dropdown_menu_items) ? $dropdown_menu_items : [];
  $dropdown_menu_link_ids = [];
  if (!empty($dropdown_menu_items)) {
    foreach ($dropdown_menu_items as $submenu) {
      if (!empty($submenu['submenu_link']['url'])) {
        $submenu_post_id = url_to_postid($submenu['submenu_link']['url']);
        if ($submenu_post_id !== 0) {
          array_push($dropdown_menu_link_ids, $submenu_post_id);
        }
      }
    }
  }

  $link_class = '';

  if ($current_post_id == $link_post_id) {
    $link_class = 'current-menu';
  } elseif (in_array($link_post_id, $post_ancestors) || in_array($current_post_id, $megamenu_link_ids) || in_array($current_post_id, $dropdown_menu_link_ids)) {
    $link_class = 'current-menu-ancestor';
  }


  return $link_class;
}

function output_megamenu($megamenu_items)
{
  if (empty($megamenu_items)) {
    return;
  }
?>
  <div class="mega-menu" tabindex="0">
    <div class="menu-back-wrapper">
      <button class="menu-back-btn">
        <?php echo coact_icon(array('icon' => 'chevron-down', 'group' => 'utilities', 'size' => '12', 'class' => 'w-3 h-3 rotate-90')); ?><span class="text-sm font-semibold">Back</span>
      </button>
    </div>
    <div class="mega-menu--wrapper">
      <?php
      $menu_heading = isset($megamenu_items['menu_heading']) ? $megamenu_items['menu_heading'] : '';
      $menu_heading_link = isset($megamenu_items['menu_heading_link']) ? $megamenu_items['menu_heading_link'] : '';
      $menu_description = isset($megamenu_items['menu_description']) ? $megamenu_items['menu_description'] : '';
      $menu_background = isset($megamenu_items['menu_background']) ? 'background-color:' . $megamenu_items['menu_background'] . ';' : '';
      $menu_cta_button = isset($megamenu_items['menu_cta_button']) ? $megamenu_items['menu_cta_button'] : [];
      $submenu_group = isset($megamenu_items['submenu_group']) ? $megamenu_items['submenu_group'] : [];

      $menu_heading_style = $menu_background ? 'style="' . esc_attr($menu_background) . '"' : '';
      ?>
      <div class="mega-menu--col-header" <?= $menu_heading_style ?>>
        <?php
        if (!empty($menu_heading)) {
          echo '<h4 class="col-header--heading">';
          if (isset($menu_heading_link['url'])) {
            echo '<a href="' . $menu_heading_link['url'] . '" class="hover:underline">';
          }
          echo esc_html($menu_heading);
          if (isset($menu_heading_link['url'])) {
            echo '</a>';
          }
          echo '</h4>';
        }
        if (!empty($menu_description)) {
          echo '<div class="col-header--desc">' . esc_html($menu_description) . '</div>';
        }
        if (!empty($menu_cta_button['button_link']['url'])) {
          echo '<div class="col-header--button"><a href="' . esc_url($menu_cta_button['button_link']['url']) . '" class="col-header--btn">';
          if (!empty($menu_cta_button['button_icon'])) {
            echo coact_icon(array('icon' => $menu_cta_button['button_icon'], 'group' => 'content', 'size' => '16', 'class' => 'mx-auto'));
          }
          echo esc_html($menu_cta_button['button_link']['title']) . '</a></div>';
        }
        ?>
      </div>
      <div class="mega-menu--col-content">
        <?php
        if (!empty($submenu_group)) {
          echo '<div class="col-content--grid">';
          foreach ($submenu_group as $submenu) {
            $submenu_heading = isset($submenu['submenu_heading']) ? $submenu['submenu_heading'] : '';
            $submenu_items = isset($submenu['submenu_items']) ? $submenu['submenu_items'] : [];
            echo '<div>';
            if (!empty($submenu_heading)) {
              echo '<h4 class="col-content--heading">' . esc_html($submenu_heading) . '</h4>';
            }
            if (!empty($submenu_items)) {
              echo '<ul>';
              foreach ($submenu_items as $item) {
                if (!empty($item['submenu_link']['url'])) {
                  echo '<li><a href="' . esc_url($item['submenu_link']['url']) . '" target="' . esc_attr($item['submenu_link']['target']) . '" class="col-content--link">' . esc_html($item['submenu_link']['title']) . '</a></li>';
                }
              }
              echo '</ul>';
            }
            echo '</div>';
          }
          echo '</div>';
        }
        ?>
      </div>
    </div>
  </div>
<?php
}

function output_dropdown_menu($dropdown_menu_items)
{
  if (empty($dropdown_menu_items)) {
    return;
  }
?>
  <div class="dropdown-menu" tabindex="0">
    <div class="menu-back-wrapper">
      <button class="menu-back-btn">
        <?php echo coact_icon(array('icon' => 'chevron-down', 'group' => 'utilities', 'size' => '12', 'class' => 'w-3 h-3 rotate-90')); ?><span class="text-sm font-semibold">Back</span>
      </button>
    </div>
    <div class="dropdown-wrapper">
      <ul>
        <?php foreach ($dropdown_menu_items as $item) : ?>
          <?php
          $submenu_link = isset($item['submenu_link']) ? $item['submenu_link'] : [];
          if (empty($submenu_link['url'])) {
            continue;
          }
          ?>
          <li><a href="<?php echo esc_url($submenu_link['url']); ?>" target="<?php echo esc_attr($submenu_link['target']); ?>" class=""><?php echo esc_html($submenu_link['title']); ?></a></li>
        <?php endforeach; ?>
      </ul>
    </div>
  </div>
<?php
}
?>