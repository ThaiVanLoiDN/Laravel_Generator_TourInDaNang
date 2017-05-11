<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\Admin\CreateCategoryPostRequest;
use App\Http\Requests\Admin\UpdateCategoryPostRequest;
use App\Repositories\Admin\CategoryPostRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;
use App\Models\Admin\Post;
use Illuminate\Support\Facades\Storage;
use App\Repositories\Admin\PostRepository;

class CategoryPostController extends AppBaseController
{
    /** @var  CategoryPostRepository */
    private $categoryPostRepository;
    private $postRepository;

    public function __construct(CategoryPostRepository $categoryPostRepo, PostRepository $postRepo)
    {
        $this->categoryPostRepository = $categoryPostRepo;
        $this->postRepository = $postRepo;
    }

    /**
     * Display a listing of the CategoryPost.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->categoryPostRepository->pushCriteria(new RequestCriteria($request));
        $categoryPosts = $this->categoryPostRepository->all();

        return view('admin.category_posts.index')
            ->with('categoryPosts', $categoryPosts);
    }

    /**
     * Show the form for creating a new CategoryPost.
     *
     * @return Response
     */
    public function create()
    {
        return view('admin.category_posts.create');
    }

    /**
     * Store a newly created CategoryPost in storage.
     *
     * @param CreateCategoryPostRequest $request
     *
     * @return Response
     */
    public function store(CreateCategoryPostRequest $request)
    {
        $input = $request->all();

        $categoryPost = $this->categoryPostRepository->create($input);

        Flash::success('Category Post saved successfully.');

        return redirect(route('admin.categoryPosts.index'));
    }

    /**
     * Display the specified CategoryPost.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $categoryPost = $this->categoryPostRepository->findWithoutFail($id);

        if (empty($categoryPost)) {
            Flash::error('Category Post not found');

            return redirect(route('admin.categoryPosts.index'));
        }

        return view('admin.category_posts.show')->with('categoryPost', $categoryPost);
    }

    /**
     * Show the form for editing the specified CategoryPost.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $categoryPost = $this->categoryPostRepository->findWithoutFail($id);

        if (empty($categoryPost)) {
            Flash::error('Category Post not found');

            return redirect(route('admin.categoryPosts.index'));
        }

        return view('admin.category_posts.edit')->with('categoryPost', $categoryPost);
    }

    /**
     * Update the specified CategoryPost in storage.
     *
     * @param  int              $id
     * @param UpdateCategoryPostRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateCategoryPostRequest $request)
    {
        $categoryPost = $this->categoryPostRepository->findWithoutFail($id);

        if (empty($categoryPost)) {
            Flash::error('Category Post not found');

            return redirect(route('admin.categoryPosts.index'));
        }

        $categoryPost = $this->categoryPostRepository->update($request->all(), $id);

        Flash::success('Category Post updated successfully.');

        return redirect(route('admin.categoryPosts.index'));
    }

    /**
     * Remove the specified CategoryPost from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id, Request $request)
    {
        $categoryPost = $this->categoryPostRepository->findWithoutFail($id);

        if (empty($categoryPost)) {
            Flash::error('Category Post not found');

            return redirect(route('admin.categoryPosts.index'));
        }

        $arImages = Post::where('id_category', $id)->select('image')->get();

        foreach ($arImages as $key => $Image) {
            if($Image['image'] != "")
            {
                $kq = Storage::delete('files/'.$Image['image']);
            }
        }


        Post::where('id_category', $id)->delete();

        $this->categoryPostRepository->delete($id);

        Flash::success('Category Post deleted successfully.');

        return redirect(route('admin.categoryPosts.index'));
    }
}
