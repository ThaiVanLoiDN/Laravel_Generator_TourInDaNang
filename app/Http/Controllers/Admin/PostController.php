<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\Admin\CreatePostRequest;
use App\Http\Requests\Admin\UpdatePostRequest;
use App\Repositories\Admin\PostRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use App\Repositories\Admin\CategoryPostRepository;

class PostController extends AppBaseController
{
    /** @var  PostRepository */
    private $postRepository;
    private $categoryPostRepository;

    public function __construct(PostRepository $postRepo, CategoryPostRepository $categoryPostRepo)
    {
        $this->postRepository = $postRepo;
        $this->categoryPostRepository = $categoryPostRepo;
    }

    /**
     * Display a listing of the Post.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->postRepository->pushCriteria(new RequestCriteria($request));
        $posts = $this->postRepository->orderBy('id', 'desc')->paginate(15);

        return view('admin.posts.index')->with('posts', $posts);
    }

    /**
     * Show the form for creating a new Post.
     *
     * @return Response
     */
    public function create(Request $request)
    {
        $this->categoryPostRepository->pushCriteria(new RequestCriteria($request));
        $arCats = $this->categoryPostRepository->all();

        $arDMT = array();
        foreach ($arCats as $key => $arCat) {
            $arDMT[$arCat['id']] = $arCat['name'];
        }
        return view('admin.posts.create')->with('arDMT', $arDMT);
    }

    /**
     * Store a newly created Post in storage.
     *
     * @param CreatePostRequest $request
     *
     * @return Response
     */
    public function store(CreatePostRequest $request)
    {
        $input = $request->all();

        /*Check Category*/
        $id_category = $input['id_category'];
        $this->categoryPostRepository->pushCriteria(new RequestCriteria($request));
        $arCats = $this->categoryPostRepository->findWhere(['id' => $id_category]);

        if (count($arCats) == 0) {
            Flash::error('Category Post not found');

            return redirect(route('admin.posts.index'));
        }


        $input['id_user'] = Auth::id();

        if($request->image != "")
        {
            $path = $request->file('image')->store('files');
            $tmp = explode('/', $path);
            $image = end($tmp);
            $input['image'] = $image;
        }


        $post = $this->postRepository->create($input);

        Flash::success('Post saved successfully.');

        return redirect(route('admin.posts.index'));
    }

    /**
     * Display the specified Post.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $post = $this->postRepository->findWithoutFail($id);

        if (empty($post)) {
            Flash::error('Post not found');

            return redirect(route('admin.posts.index'));
        }

        return view('admin.posts.show')->with('post', $post);
    }

    /**
     * Show the form for editing the specified Post.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id, Request $request)
    {
        $this->categoryPostRepository->pushCriteria(new RequestCriteria($request));
        $arCats = $this->categoryPostRepository->all();

        $arDMT = array();
        foreach ($arCats as $key => $arCat) {
            $arDMT[$arCat['id']] = $arCat['name'];
        }

        $post = $this->postRepository->findWithoutFail($id);

        if (empty($post)) {
            Flash::error('Post not found');

            return redirect(route('admin.posts.index'));
        }

        return view('admin.posts.edit')->with('post', $post)->with('arDMT', $arDMT);
    }

    /**
     * Update the specified Post in storage.
     *
     * @param  int              $id
     * @param UpdatePostRequest $request
     *
     * @return Response
     */
    public function update($id, UpdatePostRequest $request)
    {
        $post = $this->postRepository->findWithoutFail($id);

        if (empty($post)) {
            Flash::error('Post not found');

            return redirect(route('admin.posts.index'));
        }

        $arRequest = $request->all();

        /*Check Category*/
        $id_category = $arRequest['id_category'];
        $this->categoryPostRepository->pushCriteria(new RequestCriteria($request));
        $arCats = $this->categoryPostRepository->findWhere(['id' => $id_category]);

        if (count($arCats) == 0) {
            Flash::error('Category Post not found');

            return redirect(route('admin.posts.index'));
        }

        /*Image*/

        if($request->image != "")
        {
            $path = $request->file('image')->store('files');
            $tmp = explode('/', $path);
            $image = end($tmp);
            $arRequest['image'] = $image;

            $picName = $post->image;

            if($picName != "")
            {
                $kq = Storage::delete('files/'.$picName);
            }
        }


        $post = $this->postRepository->update($arRequest, $id);

        Flash::success('Post updated successfully.');

        return redirect(route('admin.posts.index'));
    }

    /**
     * Remove the specified Post from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $post = $this->postRepository->findWithoutFail($id);

        if (empty($post)) {
            Flash::error('Post not found');

            return redirect(route('admin.posts.index'));
        }

        $picName = $post->image;

        if($picName != "")
        {
            $kq = Storage::delete('files/'.$picName);
        }

        $this->postRepository->delete($id);

        Flash::success('Post deleted successfully.');

        return redirect(route('admin.posts.index'));
    }
}
