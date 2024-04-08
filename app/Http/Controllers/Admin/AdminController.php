<?php

namespace App\Http\Controllers\Admin;

use App\Entities\User;
use App\Facades\UserFacade;
use App\Http\Requests\AUser\UpdateRequest;
use Illuminate\Http\Request; 
use App\Http\Controllers\Controller;

class AdminController extends Controller
{
     

    /**
     * Create a new controller instance.
     *
     * @param UserFacade $userFacade
     */
    public function __construct()
    {
        
    }

    /**
     * Display options of admin view
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.home');
    }

    public function editAccount(User $user)
    {
        return view('account.form', [
            'user' => $user,
            'formData' => ['route' => ['users.update', $user], 'method' => 'POST', 'files' => true]
        ]);
    }

    /**
     * @param UpdateRequest $request
     * @param User $user
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function postEditAccount(UpdateRequest $request, User $user)
    {
        $this->userFacade->updateUser($request->all(), $user);

        if($user->isJobseeker()) {
            return redirect()->route('admin.registers');
        }

        return redirect()->route('admin.companies.index');
    }
}