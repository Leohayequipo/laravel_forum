<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 flex gap-10 py-12">
    <div class="w-64">
        <a href="" class="block w-full py-4 mb-10 bg-gradient-to-r from-blue-600 to-blue-700 hover:to-blue-600 text-white/90 font-bold text-xs text-center rounded-md">
            Preguntar
        </a>
        
        <ul>
             @foreach($categories as $category)
            <li class="mb-2">
                <a href="#" wire:click.prevent="filterByCategory('{{$category->id}}')" class="p-2 rounded-md flex bg-slate-800 items-center gap-2 text-white/60 hover:text-white font-semibold text-xs capitalize">
                    <span class="w-2 h-2 rounded-full" style="background-color: {{$category->color}};"></span>
                   {{$category->name}}
                </a>
            </li>
            @endforeach
            <li>
                <a href="#" wire:click.prevent="filterByCategory('')" class="p-2 rounded-md flex bg-slate-800 items-center gap-2 text-white/60 hover:text-white font-semibold text-xs capitalize">
                    <span class="w-2 h-2 rounded-full" style="background-color: #000;"></span>
                    Todos los resultados
                </a>
            </li>
        </ul>
    </div>
    <div class="w-full">
        <!-- Formulario -->
        <form class="mb-4" >
            <input 
                type="text" 
                placeholder="// ..." 
                class="bg-slate-800 border-0 rounded-md w-1/3 p-3 text-white/60 text-xs"
                wire:model="search">

        </form>
       
        @foreach($threads as $thread)
        <div class="rounded-md bg-gradient-to-r from-slate-800 to-slate-900 hover:to-slate-800 mb-4">
            <div class="px-4 flex gap-4">

                <div>
                    <img src="{{$thread->user->avatar()}}" alt="{{$thread->user->name}}" class="rounded-md">
                </div>
                <div class="w-full">
                    <h2 class="mb-4 flex items-start justify-between">
                        <a href="" class="text-xl font-semibold text-white/90 ">
                            {{$thread->title}}
                        </a>
                        <span class="rounded-full text-xs py-2 px-4 capitalize" 
                              style="color: {{$thread->category->color}}; border: 1px solid {{$thread->category->color}};">
                            {{$thread->category->name}}
                        </span>
                    </h2>
                    <p class="flex items-center justify-between w-full text-xs">
                        <span class="text-blue-600 font-semibold">
                            {{$thread->user->name}} 
                            <span class="text-white/90">{{$thread->created_at->diffForHumans()}}</span>
                        </span>
                        <span class="flex items-center gap-1 text-slate-700">
                          <svg class="h-4" aria-hidden="true" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path d="M8.625 9.75a.375.375 0 11-.75 0 .375.375 0 01.75 0zm0 0H8.25m4.125 0a.375.375 0 11-.75 0 .375.375 0 01.75 0zm0 0H12m4.125 0a.375.375 0 11-.75 0 .375.375 0 01.75 0zm0 0h-.375m-13.5 3.01c0 1.6 1.123 2.994 2.707 3.227 1.087.16 2.185.283 3.293.369V21l4.184-4.183a1.14 1.14 0 01.778-.332 48.294 48.294 0 005.83-.498c1.585-.233 2.708-1.626 2.708-3.228V6.741c0-1.602-1.123-2.995-2.707-3.228A48.394 48.394 0 0012 3c-2.392 0-4.744.175-7.043.513C3.373 3.746 2.25 5.14 2.25 6.741v6.018z" stroke-linecap="round" stroke-linejoin="round"></path>
                          </svg>
                           {{$thread->replies_count}}
                           Respuesta{{$thread->replies_count != 1 ? 's': ''}}
                           |
                           <a href="" class="hover:text-white">editar</a>
                        </span>

                    </p>
                </div>

            </div>

        </div>
        @endforeach
    </div>
</div>