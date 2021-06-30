<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\Models\Category;
use App\Models\Shopall;
use Illuminate\Support\Str;

class Addcategory extends Component
{
    public $category=null;
    public $categoryshopall=null;
    public function render()
    {
        return view('livewire.admin.addcategory');
    }
    public function updated($field)
    {
        $this->validateOnly($field,[
             'category'=>'required|min:3|max:100 |unique:categories',
             'categoryshopall'=>'required|min:3|max:100 |unique:shopalls',
            ]);
    }
    public function createCategory()
    {
        $validate = $this->validate([
            'category'=>'required|min:3|max:100|unique:categories',
        ]);
        if($validate)
        {
            Category::create([
                'category'=>Str::upper($this->category)
                ]);
            session()->flash('message', 'Category for collections "'.$this->category.'" has been added successfully.');
        }
        
    }
    public function createShopallCategory()
    {
        $validate = $this->validate([
            'categoryshopall'=>'required|min:3|max:100|unique:shopalls',
        ]);
        if($validate)
        {
            Shopall::create([
                'categoryshopall'=>Str::upper($this->categoryshopall)
                ]);
            session()->flash('message', 'For Shop all "'.$this->categoryshopall.'" has been added successfully.');
        }
        
    }
}
