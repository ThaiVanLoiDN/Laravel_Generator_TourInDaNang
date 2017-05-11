<?php

namespace App\Http\Controllers\FrontEnd;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\Admin\InformationRepository;

class InformationController extends Controller
{
	private $informationRepository;

    public function __construct(InformationRepository $informationRepo)
    {
        $this->informationRepository = $informationRepo;

    }

    public function aboutus()
    {
    	$info = $this->informationRepository->findWithoutFail(1);

        if (empty($info)) {
            return redirect(route('frontend.index.index'));
        }
    	return view('frontend.info.info')->with('info', $info);
    }

    public function info($slug, $id)
    {
    	$info = $this->informationRepository->findWithoutFail($id);

        if (empty($info)) {
            return redirect(route('frontend.index.index'));
        }

        return view('frontend.info.info')->with('info', $info);
    }

}
