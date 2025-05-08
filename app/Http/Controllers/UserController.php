<?php

namespace App\Http\Controllers;

use App\Models\AccessLevel;
use App\Models\City;
use App\Models\State;
use App\Models\User;
use Exception;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\QueryException;
use Illuminate\Database\UniqueConstraintViolationException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class UserController extends Controller{

    public User $user;
    
    public function __construct(){
        $this->user = new User();
    }
    /**
     * Display a listing of the resource.
     */
    public function index(){
        $users = User::all();
        return view('user.list', ['users' => $users, 'title' => 'Users']);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function enterForm(int $id = null){
        $formParams = ['method' => 'store'];

        if(!empty($id)){
            $this->user = $this->user->find($id);

            $formParams = array_merge($formParams, [
                'title' => 'Atualização de Usuário',
                'btnTitle' => 'Atualizar',
                'method' => 'update'
            ]);
        }else{
            $formParams = array_merge($formParams, [
                'title' => 'Criação de Usuário',
                'btnTitle' => 'Criar'
            ]);
        }

        return view('user.user-form')
            ->with("user", $this->user)
            ->with("formParams", $formParams)
            ->with("title", $formParams["title"]);
    }

    // /**
    //  * Display the specified resource.
    //  */
    public function view(int $id){
        $user = $this->user->find($id);

        $formParams = [
            'title' => 'Visualizar',
            'method' => 'view'
        ];

        $user->accessLevel = $this->getAccessLevelName($user->access_level_id);
        $user->state = $this->getState($user->city_id)->name;
        $user->city = $this->getCity($user->city_id)->name;

        return view('user.user-form')
            ->with('user', $user)
            ->with('formParams', $formParams)
            ->with('user', $user);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(){

        $created = false;
        try{
            $created = $this->user->save();
            $msg = $created? 'Created Successfully.': 'Create Failed.';
        }catch(UniqueConstraintViolationException $ucvExc){
            $msg = "Login already registered.";
        }catch(QueryException $queryExc){
            $msg = "Required field not filled";
        }

        return redirect()->back()->with('message', $msg);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(){
        $updated = $this->user->update();
        $msg = $updated? 'Updated Successfully.': 'Update Failed.';
        return redirect()->back()->with('message', $msg);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(int $id){
        $this->user->where('id', $id)->delete();

        return redirect()->route('users.index');
    }

    public function inactivate(int $id){
        $user = $this->user->find($id);
        $user->active = 0;
        $user->update();
    }

    private function getAccessLevelName(int $accessLevelId){
        $accessLevelName = AccessLevel::query()
            ->where('access_levels.id', '=', $accessLevelId)
            ->limit(1)
            ->get('access_levels.name')[0]['name'];
        
        return $accessLevelName;
    }

    private function getState(int $cityId): State{
        $state = State::query()
            ->join('cities', 'states.id', '=', 'cities.state_id')
            ->where('cities.id', '=', $cityId)
            ->limit(1)
            ->get('states.*')[0];
        
        return $state;
    }

    private function getCity(int $cityId): City{
        $city = City::find($cityId);

        return $city;
    }
}
