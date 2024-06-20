<?php
namespace App\Controller\Blog;

use App\Entity\Post;
use App\Repository\PostRepository;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class PostController extends AbstractController
{
    #[Route('/', name:'post.index', methods:['GET'])]
    public function index(PostRepository $postRepository) : Response
    {
        $posts = $postRepository->findPublished();
        
        return $this->render('pages/post/index.html.twig',[
            'posts' => $posts
        ]);
    }
}