<?php

namespace App\Api\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\Response as IlluminateResponse;
use App\Api\Services\PostService;
use App\Api\Transformers\Posts\PostListTransformer;
use App\Api\Transformers\Posts\PostDetailTransformer;

class PostController extends Controller
{
    protected $request;
    protected $postService;

    public function __construct(
        Request $request,
        PostService $postService
    ) {
        $this->request = $request;
        $this->postService = $postService;
    }
    
    /**
     * get list of all the posts.
     *
     * @param $request: Illuminate\Http\Request
     * @return json response
     */
    public function index()
    {
        $input = $this->_getInputRequest();
        try {
            $items = $this->postService->index($input);
            return $this->response->paginator($items, new PostListTransformer());
        } catch (Exception $e) {
            return $this->response->errorBadRequest($e->getMessage());
        }
    }

    public function show($id)
    {
        $input = $this->_getInputRequest();
        try {
            $item = $this->postService->show($id, $input);
            return $this->response->item($item, new PostDetailTransformer());
        } catch (Exception $e) {
            return $this->response->errorBadRequest($e->getMessage());
        }
    }

    public function store()
    {
        $input = $this->_getInputRequest();
        try {
            $item = $this->postService->store($input);
            return $this->response->item($item, new PostDetailTransformer())->setStatusCode(IlluminateResponse::HTTP_CREATED);
        } catch (Exception $e) {
            return $this->response->errorBadRequest($e->getMessage());
        }
    }

    public function update($id)
    {
        $input = $this->_getInputRequest();
        try {
            $item = $this->postService->update($id, $input);
            return $this->response->item($item, new PostDetailTransformer())->setStatusCode(IlluminateResponse::HTTP_CREATED);
        } catch (Exception $e) {
            return $this->response->errorBadRequest($e->getMessage());
        }
    }

    public function destroy($id)
    {
        try {
            $msg = $this->postService->destroy($id);
            return $this->response->noContent()->setContent([
                'data' => $msg,
            ])->statusCode(IlluminateResponse::HTTP_OK);
        } catch (Exception $e) {
            return $this->response->errorBadRequest($e->getMessage());
        }
    }

    private function _getInputRequest()
    {
        return $this->request->all();
    }
}