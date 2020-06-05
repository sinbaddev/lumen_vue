<?php

namespace App\Api\Services;

use App\Api\Repositories\JackpotRepository;

class JackpotService
{
    protected $jackpotRepository;

    public function __construct(JackpotRepository $jackpotRepository)
    {
        $this->jackpotRepository = $jackpotRepository;
    }

    public function index($input = [])
    {
        $listBet = $this->jackpotRepository->index($input);
        return $listBet;
    }

    public function show($id, $input = [])
    {
        $detailBet = $this->jackpotRepository->detail($id, $input);
        return $detailBet;
    }
}