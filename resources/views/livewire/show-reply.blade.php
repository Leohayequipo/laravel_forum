<div>
    <div class="rounded-md bg-gradient-to-r from-slate-800 to-slate-900 hover:to-slate-800 mb-4">
        <div class="px-4 flex gap-4">
            <div>
                <img src="{{$reply->user->avatar()}}" alt="{{$reply->user->name}}" class="rounded-md">
            </div>
            <div class="w-full">
                <p class="mb-2 text-blue-600 font-semibold text-xs">
                    {{$reply->user->name}} 
                </p>
                <p class="text-white/60 text-xs">
                    {{$reply->body}}
                </p>
                <p class="mt-4 text-white/60 text-xs flex gap-2 justify-end">
                    <a href="" class="hover:text-white">Responder</a>
                    <a href="" class="hover:text-white">Editar</a>

                    

                </p>
            </div>
        </div>
    </div>
    @foreach($reply->replies as $item)
        <div class="ml-8">
            @livewire('show-reply',['reply'=>$item],key('reply-'.$item->id))
        </div>
        
    @endforeach   
</div>
