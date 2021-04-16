<?php

namespace App\Http\Repositories\User;

use App\Contracts\Repository\AbstractRepository;
use App\Models\User;

class UserRepository extends AbstractRepository
{
    /**
     * UserRepository constructor.
     */
    public function __construct()
    {
        $this->setModel(User::class);
    }


    /**
     * @param array $request
     * @param int $id
     */
    public function update(array $request, int $id)
    {
        $user = $this->find($id);

        $user->name = $request['name'];
        $user->email = $request['email'];
        $user->save();
    }

    /**
     * @param int $userId
     * @param array $request
     */
    public function changePassword(int $userId, array $request)
    {
        $user = User::findOrFail($userId);

        $currentPassword = $user->password;
        $currentPasswordRequest = $request['password'];
        $newPassword = $request['new_password'];
        $newPasswordConfirm = $request['new_password_confirm'];

        if (!\Hash::check($currentPasswordRequest, $currentPassword)) {
            toast('A senha atual não está correta', 'error');
        } elseif (\Hash::check($newPassword, $currentPassword)) {
            toast('A nova senha não pode ser a mesma que a atual', 'error');
        } elseif ($newPasswordConfirm !== $newPassword) {
            toast('A confirmação de Senha está diferente da Nova Senha', 'error');
        } else {
            $user->password = bcrypt($newPassword);
            $user->save();
            toast('Senha Atualizada com Sucesso', 'success');
        }
    }
}
