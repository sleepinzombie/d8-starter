<?php

namespace Drupal\landing\Plugin\Block;

use Drupal\Core\Block\BlockBase;
use Drupal\Core\Url as DrupalCoreUrl;

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
    const IMAGE_FILE_SERVICE = 'services.image_file_custom';

    public function build() {
        return [
            '#theme' => 'landing_slider',
            '#slider_contents' => $this->fetchSliderContents(),
            '#attached' => [
                'library' => ['landing/slider'],
            ],
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
            $image = \Drupal::service(self::IMAGE_FILE_SERVICE)
                ->getUriFromImage($v->_entity->get('field_slider_image')->entity);
            $slider_contents[$id] = [
                'title' => $title,
                'description' => $description,
                'link' => DrupalCoreUrl::fromUri($link),
                'image' => $image,
            ];
        }

        return $slider_contents;
    }
}