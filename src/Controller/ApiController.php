<?php

namespace App\Controller;

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
        return $postRepository->findAll();
    }

    /**
     * @Route("/blogs/{id}", name="blogs_show")
     * @param int $id
     * @param PostRepository $postRepository
     * @return \App\Entity\Post|null
     */
    public function show(int $id, PostRepository $postRepository)
    {
        return $postRepository->find($id);
    }
}
