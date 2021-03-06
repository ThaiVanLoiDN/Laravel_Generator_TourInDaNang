<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\Admin\CreateCategoryTourRequest;
use App\Http\Requests\Admin\UpdateCategoryTourRequest;
use App\Repositories\Admin\CategoryTourRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

use Illuminate\Support\Facades\Storage;
use App\Models\Admin\Tour;

class CategoryTourController extends AppBaseController
{
    /** @var  CategoryTourRepository */
    private $categoryTourRepository;

    public function __construct(CategoryTourRepository $categoryTourRepo)
    {
        $this->categoryTourRepository = $categoryTourRepo;
    }

    /**
     * Display a listing of the CategoryTour.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->categoryTourRepository->pushCriteria(new RequestCriteria($request));
        $categoryTours = $this->categoryTourRepository->all();

        return view('admin.category_tours.index')
            ->with('categoryTours', $categoryTours);
    }

    /**
     * Show the form for creating a new CategoryTour.
     *
     * @return Response
     */
    public function create()
    {
        return view('admin.category_tours.create');
    }

    /**
     * Store a newly created CategoryTour in storage.
     *
     * @param CreateCategoryTourRequest $request
     *
     * @return Response
     */
    public function store(CreateCategoryTourRequest $request)
    {
        $input = $request->all();

        $categoryTour = $this->categoryTourRepository->create($input);

        Flash::success('Category Tour saved successfully.');

        return redirect(route('admin.categoryTours.index'));
    }

    /**
     * Display the specified CategoryTour.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $categoryTour = $this->categoryTourRepository->findWithoutFail($id);

        if (empty($categoryTour)) {
            Flash::error('Category Tour not found');

            return redirect(route('admin.categoryTours.index'));
        }

        return view('admin.category_tours.show')->with('categoryTour', $categoryTour);
    }

    /**
     * Show the form for editing the specified CategoryTour.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $categoryTour = $this->categoryTourRepository->findWithoutFail($id);

        if (empty($categoryTour)) {
            Flash::error('Category Tour not found');

            return redirect(route('admin.categoryTours.index'));
        }

        return view('admin.category_tours.edit')->with('categoryTour', $categoryTour);
    }

    /**
     * Update the specified CategoryTour in storage.
     *
     * @param  int              $id
     * @param UpdateCategoryTourRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateCategoryTourRequest $request)
    {
        $categoryTour = $this->categoryTourRepository->findWithoutFail($id);

        if (empty($categoryTour)) {
            Flash::error('Category Tour not found');

            return redirect(route('admin.categoryTours.index'));
        }

        $categoryTour = $this->categoryTourRepository->update($request->all(), $id);

        Flash::success('Category Tour updated successfully.');

        return redirect(route('admin.categoryTours.index'));
    }

    /**
     * Remove the specified CategoryTour from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $categoryTour = $this->categoryTourRepository->findWithoutFail($id);

        if (empty($categoryTour)) {
            Flash::error('Category Tour not found');

            return redirect(route('admin.categoryTours.index'));
        }

        $arImages = Tour::where('id_category', $id)->select('image')->get();

        foreach ($arImages as $key => $Image) {
            if($Image['image'] != "")
            {
                $kq = Storage::delete('files/'.$Image['image']);
            }
        }


        Tour::where('id_category', $id)->delete();

        $this->categoryTourRepository->delete($id);

        Flash::success('Category Tour deleted successfully.');

        return redirect(route('admin.categoryTours.index'));
    }
}
