<?php

namespace App\Livewire\Admin\Auth;

use Livewire\Component;
use Livewire\Attributes\Layout;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class Index extends Component
{
    public $name, $email, $password;
    public $users;

    public function mount()
    {
        $this->loadUsers();
    }

    public function loadUsers()
    {
        $this->users = User::all();
    }

    public function store()
    {
        $this->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:6',
        ]);

        User::create([
            'name' => $this->name,
            'email' => $this->email,
            'password' => Hash::make($this->password),
        ]);

        $this->reset(['name', 'email', 'password']);
        $this->loadUsers();

        session()->flash('success', 'Akun baru berhasil ditambahkan!');
    }

    public function delete($id)
    {
        User::find($id)?->delete();
        $this->loadUsers();
    }

    #[Layout('layout.auth')]
    public function render()
    {
        return view('livewire.admin.auth.index');
    }
}
