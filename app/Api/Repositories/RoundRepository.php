<?php

namespace App\Api\Repositories;

use Illuminate\Support\Facades\DB;
use App\Api\Models\Round;

class RoundRepository extends BaseRepository
{
    protected $model;
    
    public function __construct(Round $model)
    {
        $this->model = $model;
    }

    public function index($input)
    {
        $limit = $input['limit'] ?? config('constants.DEFAULT_LIMIT');

        $query = $this->model->paginate($limit);
    
        return $query;
    }

    public function detail($id, $request)
    {
        $query = $this->model->findOrFail($id);

        return $query;
    }
}