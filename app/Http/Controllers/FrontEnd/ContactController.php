<?php

namespace App\Http\Controllers\FrontEnd;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\CreateContactRequest;
use App\Http\Requests\Admin\UpdateContactRequest;
use App\Repositories\Admin\ContactRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

class ContactController extends Controller
{
	/** @var  ContactRepository */
    private $contactRepository;

    public function __construct(ContactRepository $contactRepo)
    {
        $this->contactRepository = $contactRepo;
    }

    public function create()
    {
    	return view('frontend.contact.create');
    }

    public function store(CreateContactRequest $request)
    {
        $input = $request->all();
        //dd($input);

        $contact = $this->contactRepository->create($input);

        Flash::success('Contact sent successfully.');

        return redirect(route('frontend.contact.create'));
    }


}
