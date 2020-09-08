<?php

namespace App\Repositories;

use App\Models\Article;

class AdRepository
{
    
     /**
     * Get an ad by id.
     *
     * @param integer $id
     */
    public function getById($id)
    {
        return Article::find($id);
    }

    /**
     * Create an ad.
     *
     * @param Array $data
     */
    public function create($data)
    {
        return Article::create($data);
    }
}


