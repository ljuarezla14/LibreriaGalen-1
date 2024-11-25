<?php

namespace App\Livewire\Admin;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\WithPagination;

class UserComponent extends Component
{
    use WithPagination;
    public $search;

    public function updatingSearch(){
        $this->resetPage();
    }

    public function assignRole(User $user, $value){

        if($value == '1'){
            $user->removeRole('vendedor');
            $user->assignRole('admin');
        }elseif($value == '2'){
            $user->removeRole('admin');
            $user->assignRole('vendedor');
        }else{
            $user->removeRole('vendedor');
            $user->removeRole('admin');
        }
    }

    public function render()
    {
        $users = User::where('email', '<>', Auth::user()->email)
                    ->where(function($query){
                            $query->where('name', 'LIKE', '%'. $this->search . '%');
                            $query->orwhere('email', 'LIKE', '%'. $this->search . '%');
                    })
                    ->paginate();
        return view('livewire.admin.user-component', compact('users'))->layout('layouts.admin');
    }
}
