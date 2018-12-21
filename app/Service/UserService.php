<?php
/**
 * 
 */
class UserService
{
	static public function getUsersList()
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
}