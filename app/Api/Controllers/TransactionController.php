<?php

namespace App\Api\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\Response as IlluminateResponse;
use App\Api\Services\TransactionService;
use App\Api\Transformers\Transactions\TransactionListTransformer;
use App\Api\Transformers\Transactions\TransactionDetailTransformer;

class TransactionController extends Controller
{
    protected $request;
    protected $transactionService;

    public function __construct(
        Request $request,
        TransactionService $transactionService
    ) {
        $this->request = $request;
        $this->transactionService = $transactionService;
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
            $items = $this->transactionService->index($input);
            return $this->response->paginator($items, new TransactionListTransformer());
        } catch (Exception $e) {
            return $this->response->errorBadRequest($e->getMessage());
        }
    }

    public function show($id)
    {
        $input = $this->_getInputRequest();
        try {
            $item = $this->transactionService->show($id, $input);
            return $this->response->item($item, new TransactionDetailTransformer());
        } catch (Exception $e) {
            return $this->response->errorBadRequest($e->getMessage());
        }
    }

    private function _getInputRequest()
    {
        return $this->request->all();
    }
}