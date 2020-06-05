<?php

namespace App\Api\Services;

use App\Api\Repositories\TransactionRepository;

class TransactionService
{
    protected $transactionRepository;

    public function __construct(TransactionRepository $transactionRepository)
    {
        $this->transactionRepository = $transactionRepository;
    }

    public function index($input = [])
    {
        $listBet = $this->transactionRepository->index($input);
        return $listBet;
    }

    public function show($id, $input = [])
    {
        $detailBet = $this->transactionRepository->detail($id, $input);
        return $detailBet;
    }
}