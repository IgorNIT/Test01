<?php

namespace Modules\News\Repositories;

use Modules\News\Enums\NewsStatus;
use Modules\News\Models\News;
use Prettus\Repository\Eloquent\BaseRepository;

class NewsRepository extends BaseRepository
{

    public function model()
    {
        return News::class;
    }

}
