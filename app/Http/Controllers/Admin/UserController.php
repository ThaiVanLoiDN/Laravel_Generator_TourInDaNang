<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Requests\Admin\CreateUserRequest;
use App\Http\Requests\Admin\UpdateUserRequest;
use App\Http\Controllers\Controller;
use App\User;

use App\Repositories\Admin\UserRepositoryRepositoryEloquent;
use App\Http\Controllers\AppBaseController;

use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;
use App\Models\Admin\Tour;
use App\Models\Admin\Post;

class UserController extends Controller
{
    private $userRepository;

    public function __construct(UserRepositoryRepositoryEloquent $userRepo)
    {
        $this->userRepository = $userRepo;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $this->userRepository->pushCriteria(new RequestCriteria($request));
        $users = $this->userRepository->all();

        return view('admin.users.index')->with('users', $users);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.users.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateUserRequest $request)
    {
        $input = $request->all();
        $input['password'] = bcrypt($input['password']);

        $users = $this->userRepository->create($input);

        Flash::success('User saved successfully.');

        return redirect(route('admin.user.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $users = User::find($id);

        if (empty($users)) {
            Flash::error('User not found');

            return redirect(route('admin.user.index'));
        }

        return view('admin.users.show')->with('users', $users);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $users = User::find($id);

        if (empty($users)) {
            Flash::error('User not found');

            return redirect(route('admin.user.index'));
        }

        return view('admin.users.edit')->with('users', $users);
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateUserRequest $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $users = User::find($id);

        if (empty($users)) {
            Flash::error('User not found');

            return redirect(route('admin.user.index'));
        }

        Tour::where('id_user', $id)->delete();
        Post::where('id_user', $id)->delete();

        $users->delete($id);

        Flash::success('User deleted successfully.');

        return redirect(route('admin.user.index'));
    }
}
