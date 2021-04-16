<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Repositories\User\UserRepository;
use Illuminate\Http\Request;

class UserController extends Controller
{
    private UserRepository $repository;

    public function __construct(UserRepository $repository)
    {
        $this->repository = $repository;
    }

    /**
     * @param int $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function userProfile()
    {
        $userId = auth()->user()->id;

        $user = $this->repository->find($userId);

        return view('config.user.profile', compact('user'));
    }

    /**
     * @param Request $request
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, int $id)
    {
        try {
            $this->repository->update($request->only('name', 'email'), $id);
        } catch (\Exception $e) {

            return redirect()
                ->back()
                ->withInput()
                ->withErrors($e->getMessage());

        }

        toast('Atualizado com Sucesso', 'success');

        return redirect()
            ->route('user.profile');
    }

    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function usersPasswords()
    {
        $user = auth()->user()->id;

        return view('config.user.changePassword', compact('user'));
    }

    /**
     * @param int $userId
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function changePassword(int $userId, Request $request)
    {
        try {
            $this->repository->changePassword($userId, $request->only('password', 'new_password', 'new_password_confirm'));
        } catch (\Exception $e) {

            return redirect()
                ->back()
                ->withInput()
                ->withErrors($e->getMessage());
        }

        return redirect()
            ->route('user.passwords.index');
    }
}
