<?php

/**
 * Edit this file in order to configure additional
 * image sizes for your theme.
 *
 * @see https://developer.wordpress.org/reference/functions/add_image_size/
 *
 * @key string The size name.
 *
 * @param int         $width  The image width.
 * @param int         $height The image height.
 * @param bool|array  $crop   Crop option. Since 3.9, define a crop position with an array.
 * @param bool|string $media  Add to media selection dropdown. Make it also available
 *                            to the media custom field. If string, used as the display name ;)
 */
return [
  'home_cover' => [1000, 1000, false],
  'post_thumbnail' => [400, 400, false],
  'card-thumbnail' => [400, 200, true],
  'card-thumbnail_2x' => [800, 400, true],
];
