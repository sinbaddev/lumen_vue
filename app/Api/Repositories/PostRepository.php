<?php

namespace App\Api\Repositories;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use App\Api\Models\Post;

class PostRepository extends BaseRepository
{
    protected $model;
    
    public function __construct(Post $model)
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

    public function create($data)
    {
        try {
            DB::beginTransaction();
            $item = $this->model->create($data);
            DB::commit();

            return $item;
        } catch (\Exception $exception) {
            DB::rollBack();
            throw $exception;
        }
    }

    public function update($id, $data)
    {
        try {
            DB::beginTransaction();
            $item = $this->model->where('id', $id)->update($data);
            DB::commit();

            return $item;
        } catch (\Exception $exception) {
            DB::rollBack();
            throw $exception;
        }
    }
}