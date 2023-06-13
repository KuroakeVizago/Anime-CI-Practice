<?php

namespace App\Models;

use CodeIgniter\Model;

class AnimeModel extends Model
{
    protected $table = 'animelist';
    protected $useTimestamps = true;
    protected $allowedFields = ["title", "slug", "author", "studio", "cover"];

    public function getAnime($slug = false)
    {
        if ($slug == false) {
            return $this->findAll();
        }

        return $this->where(["slug" => $slug])->first();
    }
}
