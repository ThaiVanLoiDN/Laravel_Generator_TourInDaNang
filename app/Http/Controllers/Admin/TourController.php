<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\Admin\CreateTourRequest;
use App\Http\Requests\Admin\UpdateTourRequest;
use App\Repositories\Admin\TourRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Flash;
use Illuminate\Support\Facades\Storage;
use Prettus\Repository\Criteria\RequestCriteria;
use Illuminate\Support\Facades\DB;
use App\Models\Admin\City;
use App\Models\Admin\Tour;
use App\Models\Admin\City_Tour;
use Response;

use App\Repositories\Admin\CategoryTourRepository;

class TourController extends AppBaseController
{
    /** @var  TourRepository */
    private $tourRepository;

    public function __construct(TourRepository $tourRepo, CategoryTourRepository $categoryTourRepo)
    {
        $this->tourRepository = $tourRepo;
        $this->categoryTourRepository = $categoryTourRepo;
    }

    /**
     * Display a listing of the Tour.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->tourRepository->pushCriteria(new RequestCriteria($request));
        $tours = $this->tourRepository->orderBy('id', 'desc')->paginate(15);

        return view('admin.tours.index')
            ->with('tours', $tours);
    }

    /**
     * Show the form for creating a new Tour.
     *
     * @return Response
     */
    public function create(Request $request)
    {
        $this->categoryTourRepository->pushCriteria(new RequestCriteria($request));
        $arCats = $this->categoryTourRepository->all();
        $arDMT = array_pluck($arCats, 'name', 'id');

        $arCities = City::all();
        $arCt = array_pluck($arCities, 'name', 'id');

        return view('admin.tours.create')->with('arDMT', $arDMT)->with('arCt', $arCt);
    }

    /**
     * Store a newly created Tour in storage.
     *
     * @param CreateTourRequest $request
     *
     * @return Response
     */
    public function store(CreateTourRequest $request)
    {
        $input = $request->all();

        /*Check Category*/
        $id_category = $input['id_category'];
        $this->categoryTourRepository->pushCriteria(new RequestCriteria($request));
        $arCats = $this->categoryTourRepository->findWhere(['id' => $id_category]);

        if (count($arCats) == 0) {
            Flash::error('Category Tour not found');

            return redirect(route('admin.tours.index'));
        }

        $input['id_user'] = Auth::id();

        if($request->image != "")
        {
            $path = $request->file('image')->store('files');
            $tmp = explode('/', $path);
            $image = end($tmp);
            $input['image'] = $image;
        }

        $tour = $this->tourRepository->create($input);

        //Add Cities

        $getMax = Tour::max('id'); 

        foreach ($request['cities'] as $key => $id_city) {

            /*check City*/

            $arCity = City::find($id_city);

            if (count($arCity) == 0) {
                Flash::error('City not found');

                return redirect(route('admin.tours.index'));
            }

            $arCityTour['city_id'] = $id_city;
            $arCityTour['tour_id'] = $getMax;

            City_Tour::insert($arCityTour);
        }


        Flash::success('Tour saved successfully.');

        return redirect(route('admin.tours.index'));
    }

    /**
     * Display the specified Tour.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $tour = $this->tourRepository->findWithoutFail($id);

        if (empty($tour)) {
            Flash::error('Tour not found');

            return redirect(route('admin.tours.index'));
        }

        return view('admin.tours.show')->with('tour', $tour);
    }

    /**
     * Show the form for editing the specified Tour.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id, Request $request)
    {
        $this->categoryTourRepository->pushCriteria(new RequestCriteria($request));
        $arCats = $this->categoryTourRepository->all();
        $arDMT = array_pluck($arCats, 'name', 'id');
        //dd($arDMT);
        $arCities = City::all();
        $arCt = array_pluck($arCities, 'name', 'id');
        //dd($arCt);

        $tour = $this->tourRepository->findWithoutFail($id);

        if (empty($tour)) {
            Flash::error('Tour not found');

            return redirect(route('admin.tours.index'));
        }

        return view('admin.tours.edit')->with('tour', $tour)->with('arDMT', $arDMT)->with('arCt', $arCt);
    }
    

    /**
     * Update the specified Tour in storage.
     *
     * @param  int              $id
     * @param UpdateTourRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateTourRequest $request)
    {
        $tour = $this->tourRepository->findWithoutFail($id);

        if (empty($tour)) {
            Flash::error('Tour not found');

            return redirect(route('admin.tours.index'));
        }

        $arRequest = $request->all();

        /*Check Category*/
        $id_category = $arRequest['id_category'];
        $this->categoryTourRepository->pushCriteria(new RequestCriteria($request));
        $arCats = $this->categoryTourRepository->findWhere(['id' => $id_category]);

        if (count($arCats) == 0) {
            Flash::error('Category Tour not found');

            return redirect(route('admin.tours.index'));
        }

        if($request->image != "")
        {
            $path = $request->file('image')->store('files');
            $tmp = explode('/', $path);
            $image = end($tmp);

            $arRequest['image'] = $image;

            $picName = $tour->image;

            if($picName != "")
            {
                $kq = Storage::delete('files/'.$picName);
            }
        }

        $tour = $this->tourRepository->update($arRequest, $id);


        City_Tour::where('tour_id', $id)->delete();
        foreach ($request['cities'] as $key => $id_city) {
            /*check City*/

            $arCity = City::find($id_city);

            if (count($arCity) == 0) {
                Flash::error('City not found');

                return redirect(route('admin.tours.index'));
            }
            
            $arCityTour['city_id'] = $id_city;
            $arCityTour['tour_id'] = $id;

            City_Tour::insert($arCityTour);
        }


        Flash::success('Tour updated successfully.');

        return redirect(route('admin.tours.index'));
    }

    /**
     * Remove the specified Tour from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $tour = $this->tourRepository->findWithoutFail($id);

        if (empty($tour)) {
            Flash::error('Tour not found');

            return redirect(route('admin.tours.index'));
        }

        $picName = $tour->image;

        if($picName != "")
        {
            $kq = Storage::delete('files/'.$picName);
        }

        City_Tour::where('tour_id', $id)->delete();

        $this->tourRepository->delete($id);

        Flash::success('Tour deleted successfully.');

        return redirect(route('admin.tours.index'));
    }
}
