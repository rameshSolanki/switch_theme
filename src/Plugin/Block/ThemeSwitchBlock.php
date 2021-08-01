<?php

namespace Drupal\switch_theme\Plugin\Block;

use Drupal\Core\Block\BlockBase;

    /**
     * Provides a 'ThemeSwitchBlock' block.
     *
     * @Block(
     *   id = "theme_switch_block",
     *   admin_label = @Translation("Theme Switch block"),
     *   category = @Translation("Switch Theme block")
     * )
    */
class ThemeSwitchBlock extends BlockBase
{

 /**
  * {@inheritdoc}
 */

    public function build()
    {
        
        $default_css = \Drupal::config('switch_theme.settings')->get('default_css');
        $dark_css = \Drupal::config('switch_theme.settings')->get('dark_css');

        $build = [];
        $build['#theme'] = 'switch_theme_block';

    // You would not do both of these things...
        $build['#default_css'] = $default_css;
        $build['#dark_css'] = $dark_css;
        $build['#attached']['drupalSettings']['default_css'] = $default_css;
        $build['#attached']['drupalSettings']['dark_css'] = $dark_css;
        return $build;
    }
}
