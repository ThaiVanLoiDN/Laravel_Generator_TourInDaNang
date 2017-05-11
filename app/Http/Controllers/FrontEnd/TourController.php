<?php

namespace App\Http\Controllers\FrontEnd;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\Admin\TourRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use Flash;
use App\Models\Admin\Tour;
use App\Models\Admin\City_Tour;
use App\Models\Admin\City;
use Illuminate\Support\Facades\DB;

use App\Repositories\Admin\CategoryTourRepository;

class TourController extends Controller
{
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
    public function detail($slug, $id)
    {
    	$tours = $this->tourRepository->findWithoutFail($id);

        if (empty($tours)) {
            Flash::error('Tour not found');

            return redirect(route('frontend.index.index'));
        }

        $arTours = Tour::orderBy('id', 'desc')->take(4)->get();

    	return view('frontend.tour.detail')->with('tours', $tours)->with('arTours', $arTours);
    }

    public function category($slug, $id, Request $request)
    {
        $categoryTour = $this->categoryTourRepository->findWithoutFail($id);
        if (empty($categoryTour)) {
            Flash::error('Category Tour not found');

            return redirect(route('frontend.index.index'));
        }

        $tours = Tour::where('id_category', $id)->orderBy('id', 'desc')->paginate(10);

        return view('frontend.tour.category')
            ->with('tours', $tours)->with('categoryTour', $categoryTour);
    }

    public function daytour()
    {

        $tours = Tour::where('daytour', 1)->orderBy('id', 'desc')->paginate(10);

        if (empty($tours)) {
            Flash::error('Tour not found');

            return redirect(route('frontend.index.index'));
        }
        

        return view('frontend.tour.daytour')
            ->with('tours', $tours);
    }

    public function daytrips($id)
    {
        if($id == 1){
            return redirect(route('frontend.tour.daytour'));
        }

        $tours = Tour::where('daytour', $id)->orderBy('id', 'desc')->paginate(10);

        if (empty($tours)) {
            return redirect(route('frontend.index.index'));
        }
        

        return view('frontend.tour.daytrips')
            ->with('tours', $tours)->with('daytrips', $id);
    }

    public function tourCity($slug, $id){
        $cities = City::find($id);
        if (empty($cities)) {
            return redirect(route('frontend.index.index'));
        }

        $tours = DB::table('tours')->join('cities_tours', 'tours.id', '=', 'cities_tours.tour_id')->where('city_id', $id)->orderBy('id', 'desc')->select('tours.*')->paginate(10);

        return view('frontend.tour.city')
            ->with('tours', $tours)->with('cities', $cities);
    }
}
