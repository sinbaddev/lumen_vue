<?php

namespace App\Api\Repositories;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use App\Api\Models\Jackpot;

class JackpotRepository extends BaseRepository
{
    protected $model;
    
    public function __construct(Jackpot $model)
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