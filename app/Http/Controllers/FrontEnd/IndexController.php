<?php

namespace App\Http\Controllers\FrontEnd;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\Admin\TourRepository;
use Prettus\Repository\Criteria\RequestCriteria;

use App\Repositories\Admin\CategoryTourRepository;
use Illuminate\Support\Facades\DB;
use App\Models\Admin\Tour;

class IndexController extends Controller
{
    /** @var  ContactRepository */
    private $tourRepository;

    public function __construct(TourRepository $tourRepo, CategoryTourRepository $categoryTourRepo)
    {
        $this->tourRepository = $tourRepo;
        $this->categoryTourRepository = $categoryTourRepo;
    }

    /**
     * Display a listing of the Contact.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->tourRepository->pushCriteria(new RequestCriteria($request));
        $tours = $this->tourRepository->orderBy('id', 'desc')->paginate(10);

        $newTour = Tour::take(1)->get();

        return view('frontend.index.index')
            ->with('tours', $tours)->with('newTour', $newTour);
    }
}
