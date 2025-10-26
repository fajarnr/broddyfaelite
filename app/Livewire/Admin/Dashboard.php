<?php

namespace App\Livewire\Admin;

use Livewire\Component;

class Dashboard extends Component
{
    public function render()
    {
        // return view('livewire.admin.dashboard');
        return view('livewire.admin.dashboard')
            ->layout('layout.auth', ['title' => 'Admin Dashboard']);
    }
}
