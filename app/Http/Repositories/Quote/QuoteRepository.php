<?php

namespace App\Http\Repositories\Quote;

use App\Contracts\Repository\AbstractRepository;
use App\Models\Quote;

class QuoteRepository extends AbstractRepository
{
    /**
     * QuoteRepository constructor.
     */
    public function __construct()
    {
        $this->setModel(Quote::class);
    }
}
