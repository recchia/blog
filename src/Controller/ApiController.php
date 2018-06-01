<?php

namespace App\Controller;

use App\Entity\Post;
use App\Repository\PostRepository;
use Symfony\Component\Routing\Annotation\Route;

/**
 * Class ApiController
 * @package App\Controller
 *
 * @Route("/api")
 */
class ApiController
{
    /**
     * @Route("/blogs", name="blogs_list")
     * @param PostRepository $postRepository
     * @return \App\Entity\Post[]
     */
    public function index(PostRepository $postRepository)
    {
        return $postRepository->findPosts();
    }

    /**
     * @Route("/blogs/{id}", name="blogs_show")
     * @param int $id
     * @param PostRepository $postRepository
     * @return array
     */
    public function show(int $id, PostRepository $postRepository)
    {
        $post = $postRepository->find($id);

        if (!$post instanceof Post) {
            return [];
        }

        return [
            'title' => $post->getTitle(),
            'body' => $post->getBody(),
        ];
    }
}
