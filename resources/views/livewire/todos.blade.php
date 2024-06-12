<?php

use function Livewire\Volt\{state, with};

state(['task']);

with([
    'todos'=>fn()=>\App\Models\Todo::all()
]);

$add = function() {
    \App\Models\Todo::create([
        'user_id' => auth()->id(),
        'task' => $this->task
    ]);
    // $this->task = '';
};

?>

<div>
    <form wire:submit="add">
        <input type="text" wire:model="task"/>
        <button type="submit">OK</button>
    </form>
    <div class="mt-2">
        {{ $task }}
    </div>
    <div>   
        <div>
            @foreach ($todos as $todo)
                {{ $todo->task  }}
            @endforeach
        </div>
    </div>
</div>
