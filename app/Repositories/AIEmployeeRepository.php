<?php

namespace App\Repositories;

use App\Models\AIEmployee;
use App\Repositories\BaseRepository;

class AIEmployeeRepository extends BaseRepository
{
    protected $fieldSearchable = [
        
    ];

    public function getFieldsSearchable(): array
    {
        return $this->fieldSearchable;
    }

    public function model(): string
    {
        return AIEmployee::class;
    }
}
