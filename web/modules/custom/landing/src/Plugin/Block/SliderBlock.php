<?php

namespace Drupal\landing\Plugin\Block;

use Drupal\Core\Block\BlockBase;

/**
 * Provides a 'SliderBlock' block.
 *
 * @Block(
 *  id = "slider_block",
 *  admin_label = @Translation("Slider Homepage Block"),
 * )
 */
class SliderBlock extends BlockBase {

    const SLIDER_CONTENT_VIEW = 'view_landing_slider';
    const SLIDER_BLOCK_VIEW = 'block_1';

    public function build() {
        return [
            '#theme' => 'landing_slider',
            '#slider_contents' => $this->fetchSliderContents(),
        ];
    }

    /**
     * Fetching slider contents from the `slider` content type.
     *
     * The id of the slider is the title in lowercase.
     *
     * @return array $slider_contents
     */
    public function fetchSliderContents() {
        $view = \Drupal\views\Views::getView(self::SLIDER_CONTENT_VIEW);
        $view->execute();
        $slider_contents = [];

        foreach ($view->result as $v) {
            $title = $v->_entity->get('field_slider_title')->getValue()[0]['value'];
            $id = strtolower($title);
            $description = $v->_entity->get('field_slider_description')->getValue()[0]['value'];
            $link = $v->_entity->get('field_slider_link')->getValue()[0]['uri'];
            $slider_contents[$id] = [
                'title' => $title,
                'description' => $description,
                'link' => $link,
            ];
        }

        return $slider_contents;
    }
}