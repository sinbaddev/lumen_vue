<?php

namespace App\Api\Services;

use App\Api\Repositories\PostRepository;
use App\Api\Validators\Posts\PostCreateValidator;
use App\Api\Validators\Posts\PostUpdateValidator;

class PostService
{
    protected $postRepository;

    public function __construct(PostRepository $postRepository)
    {
        $this->postRepository = $postRepository;
    }

    public function index($input = [])
    {
        $listPost = $this->postRepository->index($input);
        return $listPost;
    }

    public function show($id, $input = [])
    {
        $detailPost = $this->postRepository->detail($id, $input);
        return $detailPost;
    }

    public function store($input = [])
    {
        $this->_validateCreatePost($input);
        $newPost = $this->postRepository->create($input);
        return $newPost;
    }

    public function update($id, $input = [])
    {
        $this->_validateUpdatePost($input);
        $detailPost = $this->postRepository->update($input);
        return $detailPost;
    }

    private function _validateCreatePost($input)
    {
        $validator = new PostCreateValidator($input);
        $validator->validate($input);
    }

    private function _validateUpdatePost($input)
    {
        $validator = new PostUpdateValidator($input);
        $validator->validate($input);
    }
}