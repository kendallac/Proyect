<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\categories;
class Navigation extends Component
{
    public function render()
    {
        $category=categories::all();
        return view('livewire.navigation',compact('category'));
    }
}
