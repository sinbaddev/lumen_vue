<?php

namespace App\Api\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\Response as IlluminateResponse;
use App\Api\Services\RoundService;
use App\Api\Transformers\Rounds\RoundListTransformer;
use App\Api\Transformers\Rounds\RoundDetailTransformer;
use App\Api\Transformers\Rounds\RoundAmountTransformer;

class RoundController extends Controller
{
    protected $request;
    protected $roundService;

    public function __construct(
        Request $request,
        RoundService $roundService
    ) {
        $this->request = $request;
        $this->roundService = $roundService;
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
            $items = $this->roundService->index($input);
            return $this->response->paginator($items, new RoundListTransformer());
        } catch (Exception $e) {
            return $this->response->errorBadRequest($e->getMessage());
        }
    }

    public function show($id)
    {
        $input = $this->_getInputRequest();
        try {
            $item = $this->roundService->show($id, $input);
            return $this->response->item($item, new RoundDetailTransformer());
        } catch (Exception $e) {
            return $this->response->errorBadRequest($e->getMessage());
        }
    }

    public function getAmount()
    {
        $input = $this->_getInputRequest();
        try {
            $item = $this->roundService->getAmount($input);
            return $this->response->item($item, new RoundAmountTransformer());
        } catch (Exception $e) {
            return $this->response->errorBadRequest($e->getMessage());
        }
    }

    private function _getInputRequest()
    {
        return $this->request->all();
    }
}