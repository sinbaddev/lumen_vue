<?php

namespace App\Api\Services;

use App\Api\Repositories\RoundRepository;

class RoundService
{
    protected $roundRepository;

    public function __construct(RoundRepository $roundRepository)
    {
        $this->roundRepository = $roundRepository;
    }

    public function index($input = [])
    {
        $listBet = $this->roundRepository->index($input);
        return $listBet;
    }

    public function show($id, $input = [])
    {
        $detailBet = $this->roundRepository->detail($id, $input);
        return $detailBet;
    }

    public function getAmount($input = [])
    {
        $amount = $this->roundRepository->getAmount($input);
        return $amount;
    }
}