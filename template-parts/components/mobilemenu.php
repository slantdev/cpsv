<div class="mobile-nav--div fixed bg-white top-0 left-0 bottom-0 w-60 z-50">
  <?php
  $current_post_id = get_queried_object_id();
  $post_ancestors = get_post_ancestors($current_post_id);
  $menu_items = get_field('menu_items', 'option');

  if ($menu_items) :
  ?>
    <div class="mobile-nav--ul flex flex-col py-4">
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
          $link_class = get_mobilemenu_link_class($current_post_id, $link_post_id, $post_ancestors, $megamenu_items, $dropdown_menu_items);

          // Output menu item
          echo '<div tabindex="0" class="px-4 py-2 ' . $li_class . '">
                <a href="' . esc_url($menu_url) . '" target="' . esc_attr($menu_item['target']) . '" data-id="' . esc_attr($link_post_id) . '" class="' . esc_attr($link_class) . '">' . esc_html($menu_item['title']) . '</a>';

          // Output submenu if exists
          if ($submenu_type == 'megamenu' && $megamenu_items) {
            output_mobilemenu($megamenu_items);
          } elseif ($submenu_type == 'dropdown' && $dropdown_menu_items) {
            output_mobiledropdown_menu($dropdown_menu_items);
          }

          echo '</div>';
        endif;
      endforeach; ?>
    </div>
  <?php endif; ?>

  <!-- <div class="flex-none pl-16 pb-3 ml-auto">
    <div class="relative">
      <form action="#" class="relative">
        <input type="text" placeholder="Search Website" class="w-64 border-none shadow-inner rounded-full bg-white px-6 py-3">
        <button class="absolute right-4 top-3"><?php echo coact_icon(array('icon' => 'search', 'group' => 'utilities', 'size' => '24', 'class' => 'text-brand-sea')); ?></button>
      </form>
    </div>
  </div> -->
</div>

<?php
function get_mobilemenu_link_class($current_post_id, $link_post_id, $post_ancestors, $megamenu_items, $dropdown_menu_items)
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

function output_mobilemenu($megamenu_items)
{
  if (empty($megamenu_items)) {
    return;
  }
?>
  <div class="mega-menu" tabindex="0">
    <div class="bg-white">
      <div class="flex flex-col">
        <?php
        $menu_heading = isset($megamenu_items['menu_heading']) ? $megamenu_items['menu_heading'] : '';
        $menu_heading_link = isset($megamenu_items['menu_heading_link']) ? $megamenu_items['menu_heading_link'] : '';
        $menu_description = isset($megamenu_items['menu_description']) ? $megamenu_items['menu_description'] : '';
        $menu_background = isset($megamenu_items['menu_background']) ? 'background-color:' . $megamenu_items['menu_background'] . ';' : '';
        $menu_cta_button = isset($megamenu_items['menu_cta_button']) ? $megamenu_items['menu_cta_button'] : [];
        $submenu_group = isset($megamenu_items['submenu_group']) ? $megamenu_items['submenu_group'] : [];

        $menu_heading_style = $menu_background ? 'style="' . esc_attr($menu_background) . '"' : '';
        ?>
        <div class="w-full p-12 bg-brand-sea" <?= $menu_heading_style ?>>
          <?php
          if (!empty($menu_heading)) {
            echo '<h4 class="text-[34px] font-bold text-white">';
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
            echo '<div class="mt-6 text-white text-lg">' . esc_html($menu_description) . '</div>';
          }
          if (!empty($menu_cta_button['button_link']['url'])) {
            echo '<div class="mt-6"><a href="' . esc_url($menu_cta_button['button_link']['url']) . '" class="inline-flex items-center gap-x-3 py-2 px-6 rounded-full bg-white shadow-md font-medium hover:shadow-lg transition duration-300 cursor-pointer">';
            if (!empty($menu_cta_button['button_icon'])) {
              echo coact_icon(array('icon' => $menu_cta_button['button_icon'], 'group' => 'content', 'size' => '16', 'class' => 'mx-auto'));
            }
            echo esc_html($menu_cta_button['button_link']['title']) . '</a></div>';
          }
          ?>
        </div>
        <div class="w-full p-12 bg-white">
          <?php
          if (!empty($submenu_group)) {
            echo '<div class="grid grid-cols-1 lg:grid-cols-3 lg:gap-10 xl:grid-cols-4 gap-12">';
            foreach ($submenu_group as $submenu) {
              $submenu_heading = isset($submenu['submenu_heading']) ? $submenu['submenu_heading'] : '';
              $submenu_items = isset($submenu['submenu_items']) ? $submenu['submenu_items'] : [];
              echo '<div>';
              if (!empty($submenu_heading)) {
                echo '<h4 class="text-xl font-bold text-brand-sea mb-4">' . esc_html($submenu_heading) . '</h4>';
              }
              if (!empty($submenu_items)) {
                foreach ($submenu_items as $item) {
                  if (!empty($item['submenu_link']['url'])) {
                    echo '<ul><li><a href="' . esc_url($item['submenu_link']['url']) . '" target="' . esc_attr($item['submenu_link']['target']) . '" class="block text-[15px] hover:underline cursor-pointer py-1.5">' . esc_html($item['submenu_link']['title']) . '</a></li></ul>';
                  }
                }
              }
              echo '</div>';
            }
            echo '</div>';
          }
          ?>
        </div>
      </div>
    </div>
  </div>
<?php
}

function output_mobiledropdown_menu($dropdown_menu_items)
{
  if (empty($dropdown_menu_items)) {
    return;
  }
?>
  <div class="dropdown-menu" tabindex="0">
    <div class="p-2 bg-white min-w-[200px]">
      <ul>
        <?php foreach ($dropdown_menu_items as $item) : ?>
          <?php
          $submenu_link = isset($item['submenu_link']) ? $item['submenu_link'] : [];
          if (empty($submenu_link['url'])) {
            continue;
          }
          ?>
          <li><a href="<?php echo esc_url($submenu_link['url']); ?>" target="<?php echo esc_attr($submenu_link['target']); ?>" class="block py-2 px-3 rounded text-base leading-snug hover:bg-slate-100"><?php echo esc_html($submenu_link['title']); ?></a></li>
        <?php endforeach; ?>
      </ul>
    </div>
  </div>
<?php
}
?>