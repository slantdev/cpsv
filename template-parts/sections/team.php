<?php
include get_template_directory() . '/template-parts/global/section_settings.php';
/*
 * Available section variables
 * $section_id
 * $section_style
 * $section_padding_top
 * $section_padding_bottom
*/
$section_id = $section_id ? 'id="' . $section_id . '"' : '';

$team = get_sub_field('team') ?: []; // Group

$heading_text = $team['heading']['heading_text'] ?? '';
$text_area = $team['text_area']['text_area'] ?? '';
$button_url = $team['button']['button_link']['url'] ?? '';
$team_settings = $team['team_settings'] ?? []; // Group
$layout_style = $team_settings['layout_style'] ?? '';
$team_members = $team_settings['team_members'] ?? []; // Repeater
//preint_r($team_members);

$uniqid = uniqid();
$section_class = 'section-team-' . $uniqid;

?>

<section <?php echo $section_id ?> class="<?php echo $section_class ?> section-wrapper relative" style="<?php echo $section_style ?>">
  <?php get_template_part('template-parts/global/separator', '', array('location' => 'top', 'active' => $top_separator, 'color' => $top_separator_color, 'class' => '')); ?>
  <div class="section-spacing relative <?php echo $section_padding_top . ' ' . $section_padding_bottom ?>">
    <?php get_template_part('template-parts/global/background_ornament', '', array('location' => 'top', 'shape' => $section_ornament_shape, 'color' => $section_ornament_color, 'position' => $section_ornament_position, 'class' => '')); ?>
    <div class="section-content">
      <div class="intro-container relative container mx-auto max-w-screen-lg mb-20">
        <?php
        if ($heading_text) {
          echo '<div class="mb-4">';
          get_template_part('template-parts/components/heading', '', array('field' => $team, 'align' => 'text-center'));
          echo '</div>';
        }
        ?>
        <?php
        if ($text_area) {
          echo '<div class="mt-6">';
          get_template_part('template-parts/components/textarea', '', array('field' => $team, 'align' => 'text-center'));
          echo '</div>';
        }
        ?>
      </div>
      <?php if ($team_members) : ?>

        <div class="team-container relative container max-w-screen-2xl my-8 xl:my-12">
          <?php if ($layout_style == 'boxed') : ?>
            <div class="grid grid-cols-1 lg:grid-cols-3">
              <?php
              foreach ($team_members as $team) :
                $id = $team ?? '';
                $team_post = get_field('team_post', $id);
                $image = $team_post['photo']['url'] ?? '';
                $image_alt = $team_post['photo']['alt'] ?? '';
                $name = $team_post['name'] ?? '';
                $designation = $team_post['designation'] ?? '';
                $bio = $team_post['bio'] ?? '';
              ?>
                <div class="bg-white flex flex-col border border-solid border-slate-300">
                  <button type="button" data-fancybox="team-<?php echo $uniqid ?>" data-src="#team-<?php echo $id ?>" class="group block relative p-8 xl:p-16 border-r border-b border-solid border-slate-300 text-left">
                    <div class="aspect-w-1 aspect-h-1 rounded-full overflow-clip">
                      <?php if ($image) : ?>
                        <img class="object-cover w-full h-full transition-all duration-300 group-hover:scale-105" src="<?php echo $image ?>" alt="<?php echo $image_alt ?>">
                      <?php else : ?>
                        <div class="w-full h-full bg-slate-50"></div>
                      <?php endif; ?>
                    </div>
                    <div class="mt-4 relative pr-6 after:content-['+'] after:text-5xl after:font-light after:absolute after:-top-2 after:right-0 after:block after:h-2 after:w-2 after:text-brand-teal">
                      <h4 class="mb-3 font-light text-lg leading-tight lg:text-2xl lg:leading-tight"><?php echo $name ?></h4>
                      <div class="text-sm font-bold"><?php echo $designation ?></div>
                    </div>
                  </button>
                </div>
              <?php endforeach ?>
            </div>
            <div class="modals">
              <?php
              foreach ($team_members as $team) :
                $id = $team ?? '';
                $team_post = get_field('team_post', $id);
                $image = $team_post['photo']['url'] ?? '';
                $image_alt = $team_post['photo']['alt'] ?? '';
                $name = $team_post['name'] ?? '';
                $designation = $team_post['designation'] ?? '';
                $bio = $team_post['bio'] ?? '';
              ?>
                <div id="team-<?php echo $id ?>" class="max-w-screen-lg bg-white rounded-xl overflow-clip !p-0" style="display:none;">
                  <div class="flex">
                    <div class="w-1/2">
                      <?php if ($image) : ?>
                        <img class="object-cover w-full h-full" src="<?php echo $image ?>" alt="<?php echo $image_alt ?>">
                      <?php else : ?>
                        <div class="w-full h-full bg-slate-50"></div>
                      <?php endif; ?>
                    </div>
                    <div class="w-1/2">
                      <div class="pl-6 pt-6 pr-4 pb-6 xl:pt-20 xl:pl-12 xl:pr-8 xl:pb-12">
                        <?php if ($name) : ?>
                          <h3 class="text-left text-3xl leading-tight font-light"><?php echo $name ?></h3>
                        <?php endif; ?>
                        <?php if ($designation) : ?>
                          <h3 class="text-left text-xl leading-tight font-semibold"><?php echo $designation ?></h3>
                        <?php endif; ?>
                        <?php if ($bio) : ?>
                          <div class="mt-6 prose max-h-[50vh] overflow-y-auto">
                            <?php echo $bio ?>
                          </div>
                        <?php endif; ?>
                      </div>
                    </div>
                  </div>
                </div>
              <?php endforeach ?>
            </div>
          <?php else : ?>
            <div class="grid grid-cols-1 lg:grid-cols-4 lg:gap-8">
              <?php
              foreach ($team_members as $team) :
                $id = $team ?? '';
                $team_post = get_field('team_post', $id);
                $image = $team_post['photo']['url'] ?? '';
                $image_alt = $team_post['photo']['alt'] ?? '';
                $name = $team_post['name'] ?? '';
                $designation = $team_post['designation'] ?? '';
                $bio = $team_post['bio'] ?? '';
              ?>
                <div class="bg-white flex flex-col">
                  <button type="button" data-fancybox="team-<?php echo $uniqid ?>" data-src="#team-<?php echo $id ?>" class="group block relative p-8 xl:p-12 text-left">
                    <div class="aspect-w-1 aspect-h-1 rounded-full overflow-clip">
                      <?php if ($image) : ?>
                        <img class="object-cover w-full h-full transition-all duration-300 group-hover:scale-105" src="<?php echo $image ?>" alt="<?php echo $image_alt ?>">
                      <?php else : ?>
                        <div class="w-full h-full bg-slate-50"></div>
                      <?php endif; ?>
                    </div>
                    <div class="mt-4 relative pr-6 after:content-['+'] after:text-5xl after:font-light after:absolute after:-top-2 after:right-0 after:block after:h-2 after:w-2 after:text-brand-teal">
                      <h4 class="mb-3 font-light text-lg leading-tight lg:text-xl lg:leading-tight"><?php echo $name ?></h4>
                      <div class="text-sm font-bold"><?php echo $designation ?></div>
                    </div>
                  </button>
                </div>
              <?php endforeach ?>
              <div class="modals">
                <?php
                foreach ($team_members as $team) :
                  $id = $team ?? '';
                  $team_post = get_field('team_post', $id);
                  $image = $team_post['photo']['url'] ?? '';
                  $image_alt = $team_post['photo']['alt'] ?? '';
                  $name = $team_post['name'] ?? '';
                  $designation = $team_post['designation'] ?? '';
                  $bio = $team_post['bio'] ?? '';
                ?>
                  <div id="team-<?php echo $id ?>" class="max-w-screen-lg bg-white rounded-xl overflow-clip !p-0" style="display:none;">
                    <div class="flex">
                      <div class="w-1/2">
                        <?php if ($image) : ?>
                          <img class="object-cover w-full h-full" src="<?php echo $image ?>" alt="<?php echo $image_alt ?>">
                        <?php else : ?>
                          <div class="w-full h-full bg-slate-50"></div>
                        <?php endif; ?>
                      </div>
                      <div class="w-1/2">
                        <div class="pl-6 pt-6 pr-4 pb-6 xl:pt-20 xl:pl-12 xl:pr-8 xl:pb-12">
                          <?php if ($name) : ?>
                            <h3 class="text-left text-3xl leading-tight font-light"><?php echo $name ?></h3>
                          <?php endif; ?>
                          <?php if ($designation) : ?>
                            <h3 class="text-left text-xl leading-tight font-semibold"><?php echo $designation ?></h3>
                          <?php endif; ?>
                          <?php if ($bio) : ?>
                            <div class="mt-6 prose max-h-[50vh] overflow-y-auto">
                              <?php echo $bio ?>
                            </div>
                          <?php endif; ?>
                        </div>
                      </div>
                    </div>
                  </div>
                <?php endforeach ?>
              </div>
            </div>
          <?php endif ?>
        </div>
        <style>
          .fancybox__content>.f-button.is-close-btn {
            top: 20px;
            right: 20px;
            height: 40px;
            width: 40px;
            border-radius: 999px;
            background: rgba(0, 0, 0, .5);
          }
        </style>


      <?php endif; ?>
    </div>
    <?php get_template_part('template-parts/global/background_ornament', '', array('location' => 'bottom', 'shape' => $section_ornament_shape, 'color' => $section_ornament_color, 'position' => $section_ornament_position, 'class' => '')); ?>
  </div>
  <?php get_template_part('template-parts/global/separator', '', array('location' => 'bottom', 'active' => $bottom_separator, 'color' => $bottom_separator_color, 'class' => '')); ?>
</section>