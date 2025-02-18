<?php

namespace App\Repositories;

use App\Models\AITask;
use App\Repositories\BaseRepository;

class AITaskRepository extends BaseRepository
{
    protected $fieldSearchable = [
        
    ];

    public function getFieldsSearchable(): array
    {
        return $this->fieldSearchable;
    }

    public function model(): string
    {
        return AITask::class;
    }
}
