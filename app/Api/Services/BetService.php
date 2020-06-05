<?php

namespace App\Api\Services;

use App\Api\Repositories\BetRepository;

class BetService
{
    protected $betRepository;

    public function __construct(BetRepository $betRepository)
    {
        $this->betRepository = $betRepository;
    }

    public function index($input = [])
    {
        $listBet = $this->betRepository->index($input);
        return $listBet;
    }

    public function show($id, $input = [])
    {
        $detailBet = $this->betRepository->detail($id, $input);
        return $detailBet;
    }
}