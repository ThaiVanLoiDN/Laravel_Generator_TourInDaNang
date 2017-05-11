<?php

namespace App\Http\Controllers\FrontEnd;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\Admin\PostRepository;
use App\Repositories\Admin\CategoryPostRepository;
use Flash;
use App\Models\Admin\Post;

class PostController extends Controller
{
	/** @var  PostRepository */
    private $postRepository;
    private $categoryPostRepository;

    public function __construct(PostRepository $postRepo, CategoryPostRepository $categoryPostRepo)
    {
        $this->postRepository = $postRepo;
        $this->categoryPostRepository = $categoryPostRepo;
    }

    public function detail($slug, $id)
    {
    	$post = $this->postRepository->findWithoutFail($id);

        if (empty($post)) {
            Flash::error('Post not found');

            return redirect(route('frontend.index.index'));
        }

        $otherPosts = Post::where('id_category', $post->id_category)->where('id', '!=', $id)->take(4)->get();

        return view('frontend.post.detail')->with('post', $post)->with('otherPosts', $otherPosts);
    }
    public function category($slug, $id)
    {
        $categoryPost = $this->categoryPostRepository->findWithoutFail($id);
        if (empty($categoryPost)) {
            return redirect(route('frontend.index.index'));
        }

        $posts = Post::where('id_category', $id)->orderBy('id', 'desc')->paginate(10);
    	return view('frontend.post.category')->with('posts', $posts)->with('categoryPost', $categoryPost);
    }

    public function index()
    {

        $posts = Post::orderBy('id', 'desc')->paginate(10);
        return view('frontend.post.index')->with('posts', $posts);
    }
}
