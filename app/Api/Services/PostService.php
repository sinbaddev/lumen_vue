<?php

namespace App\Api\Services;

use App\Api\Repositories\PostRepository;
use App\Api\Validators\Posts\PostCreateValidator;
use App\Api\Validators\Posts\PostUpdateValidator;
use App\Api\Helpers\Helper;

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
        $this->_validateInputPost($input, new PostCreateValidator());

        $input = Helper::addSlugToInput($input['title'], 'slug', $input);
        $newPost = $this->postRepository->create($input);

        return $newPost;
    }

    public function update($id, $input = [])
    {
        $input = Helper::addToArray($input, 'id', $id);
        $this->_validateInputPost($input, new PostUpdateValidator());

        $input = Helper::addSlugToInput($input['title'], 'slug', $input);
        $detailPost = $this->postRepository->update($id, $input);

        return $detailPost;
    }

    public function destroy($id)
    {
        $msg = $this->postRepository->delete($id);

        return $msg;
    }

    private function _validateInputPost($input, $validator)
    {
        $validator->validate($input);
    }
}