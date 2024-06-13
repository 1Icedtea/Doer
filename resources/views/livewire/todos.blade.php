<?php

use function Livewire\Volt\{state, with};

state(['task']);

with([
    // 'todos'=> fn() => \App\Models\Todo::all()
    'todos' => fn() => auth() -> user() -> todos
]);

$add = function() {
    auth() -> user() -> todos() -> create([
        'task' => $this->task
    ]);

    $this->task = '';
};

$delete = fn(\App\Models\Todo $todo) => $todo->delete();

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
                <div>
                    {{ $todo->task  }}
                    <button wire:click='delete({{ $todo->id }})' >x</button>
                </div>
            @endforeach
        </div>
    </div>
</div>
