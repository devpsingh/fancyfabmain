<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\Models\Category;
use Illuminate\Support\Str;

class Addcategory extends Component
{
    public $category=null;
    public $maincategory=null;
    public function render()
    {
        return view('livewire.admin.addcategory');
    }
    public function updated($field)
    {
        $this->validateOnly($field,[ 'category'=>'required|min:3|max:20','maincategory'=>'required',]);
    }
    public function createCategory()
    {
        $validate = $this->validate([
            'maincategory'=>'required',
            'category'=>'required|min:3|max:40',
        ]);
        if($validate)
        {
            Category::create([
                'maincategory'=>Str::upper($this->maincategory),
                'category'=>Str::upper($this->category)
                ]);
            session()->flash('message', 'Main category "'.$this->maincategory.'" and Category "'.$this->category.'" have been added successfully.');
        }
        
    }
}
