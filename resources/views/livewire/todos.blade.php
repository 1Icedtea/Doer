<?php

use function Livewire\Volt\{state};

//

state(['task']);

$add = function() {
    $this->task = '';
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
</div>
