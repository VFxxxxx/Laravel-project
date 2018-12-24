<?php

namespace App\Services;

use App\User;
use Yajra\Datatables\Datatables;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\EditUserRequest;

/**
 * 
 */
class UserService
{
  /**
   * Метод возвращает список пользователей для Datatables
   */
	public function getUsersList()
	{
		return Datatables::of(User::query())
        ->addColumn('intro', function(User $user) {
                return '
                <a href="'.route('users.show', $user->id).'" 
                   class="btn btn-info">
                   <span class="glyphicon glyphicon glyphicon-info-sign"></span> подробнее
                </a>
                <a href="'.route('users.edit', $user->id).'" 
                   type="button" 
                   class="btn btn-primary">
                   <span class="glyphicon glyphicon-edit"></span> редактировать
                </a>
                <button 
                   type="button" 
                   class="delete-user btn btn-danger" 
                   value="'.$user->id.'" onclick="destroyElement(this);">
                   <span class="glyphicon glyphicon-trash"></span> удалить
                </button>
                ';
            })
        ->rawColumns(['intro', 'action'])
        ->make(true);
	}

  /**
   * возвращает ошибку как json объект , есл пользователя не удалось обновить
   */
  public function userUpadateFall()
  {
    $error = array('current-password' => 'Please enter correct current password');
    return response()->json(array('error' => $error), 400);   
  }

  /**
   * метод обновления пользователя
   */
  public function userUpdate($request, $user)
  {
    //если хотят изменить пароль
    if (!empty($request->old_password)) {
      //проверяется введеный старый пароль и текующий пароль пользователя
      if(Hash::check($request->old_password, $user->password))
      {
          unset($request['old_password']);
          unset($request['password_confirm']);
          $user->update($request->all());
      }
    }
    else
    {
        unset($request['old_password']);
        unset($request['password_confirm']);
        unset($request['password']);
        $user->update($request->all());
    }
    return true;
  }
}