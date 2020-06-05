<?php

namespace App\Api\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\Response as IlluminateResponse;
use App\Api\Services\BetService;
use App\Api\Transformers\Bets\BetListTransformer;
use App\Api\Transformers\Bets\BetDetailTransformer;

class BetController extends Controller
{
    protected $request;
    protected $betService;

    public function __construct(
        Request $request,
        BetService $betService
    ) {
        $this->request = $request;
        $this->betService = $betService;
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
            $items = $this->betService->index($input);
            return $this->response->paginator($items, new BetListTransformer());
        } catch (Exception $e) {
            return $this->response->errorBadRequest($e->getMessage());
        }
    }

    public function show($id)
    {
        $input = $this->_getInputRequest();
        try {
            $item = $this->betService->show($id, $input);
            return $this->response->item($item, new BetDetailTransformer());
        } catch (Exception $e) {
            return $this->response->errorBadRequest($e->getMessage());
        }
    }

    private function _getInputRequest()
    {
        return $this->request->all();
    }
}