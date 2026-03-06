<?php

namespace App\Livewire\Admin;

use Livewire\Component;
use App\Models\Musik;
use App\Models\Film;
use App\Models\Merch;
use App\Models\Collab;
use App\Models\Show;
use App\Models\Visitor;
use Carbon\Carbon;

class Dashboard extends Component
{
    public $total_musik, $total_film, $total_merch, $total_collab, $total_show;
    public $visitToday;
    public $visitMonth;

    public function mount()
    {
        $this->total_musik = Musik::count();
        $this->total_film = Film::count();
        $this->total_merch = Merch::count();
        $this->total_collab = Collab::count();
        $this->total_show = Show::count();

        $this->visitToday = Visitor::whereDate('created_at', Carbon::today())->count();

        $this->visitMonth = Visitor::whereMonth('created_at', Carbon::now()->month)->count();
    }


    public function render()
    {
        // return view('livewire.admin.dashboard');
        return view('livewire.admin.dashboard', [
            'totalmusik' => $this->total_musik,
            'totalfilm' => $this->total_film,
            'totalmerch' => $this->total_merch,
            'totalcollab' => $this->total_collab,
            'totalshow' => $this->total_show,
        ])
            ->layout('layout.auth', ['title' => 'Admin Dashboard']);
    }
}
