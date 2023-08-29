<?php

namespace App\Livewire;
use App\Models\Category;
use App\Models\Thread;

use Livewire\Component;

class ShowThreads extends Component
{   
    public  $search;
  
    //nueva propiedad
    public $category = "";

    
    public function postSearch(){
       
    }
    //metodo para click
    public function filterByCategory($category){
        $this->category = $category;
    }

   
    public function render()
    {  
        $categories = Category::get();
        //$threads    = Thread::latest()->get();
        //hacer pregunta contando cuantas respuestas tengo
       // $threads    = Thread::latest()->withCount('replies')->get();
       $threads    = Thread::query();
       $threads->where('title','like',"%$this->search%");
       if($this->category){
        $threads->where('category_id',$this->category);

       }
       $threads->withCount('replies');

       $threads->latest();
       

       // echo $threads->get();
        return view('livewire.show-threads',[
            'categories' =>$categories,
            'threads'    =>$threads->get()

        ]);
    }
}
