<?
namespace App\Http\Services;

use App\Models\User;


class AutorisationService {
    public static  function isCandidat($id){

        $user = User::where('id', $id)->first();
        if ($user->role == 'candidat') {
            return true;
        }
        return false;
    }

}
