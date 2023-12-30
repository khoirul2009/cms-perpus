<?php

namespace App\Livewire;

use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination;

class ShowUsers extends Component
{
    use WithPagination;
    public bool $showToast = false;
    public function render()
    {
        return view('livewire.pages.user.show-users', [
            'users' => User::paginate(10)
        ]);
    }
    public function closeToast()
    {
        $this->showToast = false;
    }
    public function changeRole(User $user)
    {
        try {
            if (!$user->is_admin) {
                User::where('id', $user->id)->update([
                    'is_admin' => true
                ]);
                return session()->flash('success', 'Success promoted to Admin');
            }
            User::where('id', $user->id)->update([
                'is_admin' => false
            ]);
            return session()->flash('success', 'Success demoted to User');
        } catch (\Exception $e) {
            return session()->flash('error', ' Error to Update User!');
        } finally {
            $this->showToast = true;
        }
    }
    public function destroy($id)
    {
        try {
            User::find($id)->delete();

            session()->flash('success', 'User Deleted Successfully!!');
        } catch (\Exception $e) {

            session()->flash('error', 'User Error to Delete!!');
        } finally {
            $this->showToast = true;
        }
    }
}
