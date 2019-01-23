<?php

namespace Raystech\StarterKit\Traits;
use Image;

trait ImageTrait
{

  /*
   |------------------------------------------------------------
   | @param  mixed  $image
   | @param  int    $width
   | @param  int    $height
   | @param  string $mode ['constrain', 'expand']
   | @param  int    $quality [0-100]
   |
   | @return \Intervention\Image\Image
   |------------------------------------------------------------
   */
  private function imageResize($image, $width, $height = null, $mode = 'expand', $quality = 85) {
    if($height == null && $mode == 'expand') {
      $height = $width;
    }

    $img    = Image::make($image->getRealPath());
    // $img = $image;

    $margin = 0;

    $img_width  = $img->width();
    $img_height = $img->height();

    /*
    *  canvas
    */
    $dimension  = $width;
    $desire_width = $width;
    $desire_height = $height;

    $vertical   = ($img_width < $img_height);
    $horizontal = ($img_width > $img_height);
    $square     = ($img_width = $img_height);

    if($mode == 'expand') {
      if ($vertical) {
        $top = $bottom = $margin;
        $newHeight = ($dimension) - ($bottom + $top);
        $img->resize(null, $newHeight, function ($constraint) {
          $constraint->aspectRatio();
        });

      } else if ($horizontal) {
        $right = $left = $margin;
        $newWidth = ($dimension) - ($right + $left);
        $img->resize($newWidth, null, function ($constraint) {
          $constraint->aspectRatio();
        });

      } else if ($square) {
        $right = $left = $margin;
        $newWidth = ($dimension) - ($left + $right);
        $img->resize($newWidth, null, function ($constraint) {
          $constraint->aspectRatio();
        });

      }

      $img->resizeCanvas($dimension, $dimension, 'center', false, '#ffffff');
      $img->encode('jpg', $quality);

    } else if($mode == 'constrain') {
      if ($vertical) {
        $top = $bottom = $margin;
        $newHeight = ($desire_height) - ($bottom + $top);
        $img->resize(null, $newHeight, function ($constraint) {
          $constraint->aspectRatio();
        });

      } else if ($horizontal) {
        $right = $left = $margin;
        $newWidth = ($desire_width) - ($right + $left);
        $img->resize($newWidth, null, function ($constraint) {
          $constraint->aspectRatio();
        });

      } else if ($square) {
        $right = $left = $margin;
        $newWidth = ($desire_width) - ($left + $right);
        $img->resize($newWidth, null, function ($constraint) {
          $constraint->aspectRatio();
        });

      }

      $img->resizeCanvas($desire_width, $desire_height, 'center', false, '#ffffff');
      $img->encode('jpg', $quality);
    }


    return $img;
    // $img->save(public_path("storage/{$token}/{$origFilename}"));
  }
}