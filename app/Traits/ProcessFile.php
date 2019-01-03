<?php
/**
 * Created by PhpStorm.
 * User: jakelagger
 * Date: 27/12/2018
 * Time: 22:30
 */

namespace App\Traits;

use Illuminate\Support\Facades\File;

trait ProcessFile
{
    public function readContentOfChap($path, $chap)
    {
        $content = File::get($path . $chap->story_id . '/' . $chap->content);

        return $content;
    }

    public function writeContentOfChap($path, $content, $chap)
    {
        return File::put($path . $chap->story_id . '/' . $chap->name . '.txt', $content);
    }
}
