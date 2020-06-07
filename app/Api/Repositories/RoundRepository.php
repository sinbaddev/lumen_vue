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
        $limit = $input['limit'] ?? 10;

        $query = $this->model->paginate($limit);
    
        return $query;
    }

    public function detail($id, $request)
    {
        $query = $this->model->findOrFail($id);

        return $query;
    }

    public function getAmount($input)
    {
        $query = $this->model->select([
            DB::raw('SUM(amount) AS total_amount'),
            DB::raw('SUM(amount_win) AS total_amount_win'),
        ]);

        if (!empty($input['month'])) {
            $query->where(DB::raw('MONTH(bet_at)'), '=', $input['month']);
        }

        return $query->first();
    }
}