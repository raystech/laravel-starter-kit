<?php 

namespace Raystech\StarterKit\Traits;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphMany;
use Illuminate\Database\Query\JoinClause;
use Cocur\Slugify\Slugify;

trait CustomSlugify
{

  /*
   * Rerurn slug string with support TH language
   */
  private function slugify_th($string, $separator)
  {
    $string = trim($string);
    $string = mb_strtolower($string, 'UTF-8');

    // Make alphanumeric (removes all other characters)
    // this makes the string safe especially when used as a part of a URL
    // this keeps latin characters and Persian characters as well
    $string = preg_replace("/[^a-z0-9_\s-ๅภถุึคตจขชๆไำพะัีรนยบลฃฟหกดเ้่าสวงผปแอิืทมใฝูฎฑธ๊ณญฐฅฤฆฏโฌ็๋ษศซฉฮ์ฒฬฦ]/u", '', $string);

    // Remove multiple dashes or whitespaces or underscores
    $string = preg_replace("/[\s-_]+/", ' ', $string);

    // Convert whitespaces and underscore to the given separator
    $string = preg_replace("/[\s_]/", $separator, $string);

    return $string;
  }

  public function customizeSlugEngine(Slugify $engine, $attribute)
  {
    $reg_str = '/([^A-Za-z0-9ภถุึคตจขชๆไำพะัีรนยบลฃฟหกดเ้่าสวงผปแอิืทมใฝูฎฑธ๊ณญฐฅฤฆฏโฌ็๋ษศซฉฮ์ฒฬฦ]|-)+/';
    $engine = new Slugify(['regexp' => $reg_str]);
    return $engine;
  }
}