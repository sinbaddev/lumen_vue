<?php

namespace App\Api\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\Response as IlluminateResponse;
use App\Api\Services\JackpotService;
use App\Api\Transformers\Jackpots\JackpotListTransformer;
use App\Api\Transformers\Jackpots\JackpotDetailTransformer;

class JackpotController extends Controller
{
    protected $request;
    protected $jackpotService;

    public function __construct(
        Request $request,
        JackpotService $jackpotService
    ) {
        $this->request = $request;
        $this->jackpotService = $jackpotService;
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
            $items = $this->jackpotService->index($input);
            return $this->response->paginator($items, new JackpotListTransformer());
        } catch (Exception $e) {
            return $this->response->errorBadRequest($e->getMessage());
        }
    }

    public function show($id)
    {
        $input = $this->_getInputRequest();
        try {
            $item = $this->jackpotService->show($id, $input);
            return $this->response->item($item, new JackpotDetailTransformer());
        } catch (Exception $e) {
            return $this->response->errorBadRequest($e->getMessage());
        }
    }

    private function _getInputRequest()
    {
        return $this->request->all();
    }
}