<?php

use Illuminate\Support\Collection;
use Livewire\Component;
use Livewire\WithFileUploads;
use Mary\Traits\WithMediaSync;

new class extends Component {
    use WithFileUploads, WithMediaSync;

    // Temporary files
    #[Rule(['files.*' => 'image|max:1024'])]
    public array $files = [];

    // Library metadata (optional validation)
    #[Rule('required')]
    public Collection $library;

    // Editing this user
    public User $user;

    public function mount(): void
    {
        $this->library = new Collection();
    }

    public function save(): void
    {
        $this->syncMedia($this->user);
    }
};
?>

<div>
    @php
        $images = [
            'pexels-danil-lysov-175964361-12377231.jpg',
            'IMG_20250506_080517.jpg',
            'pexels-ganajp-12167862.jpg',
            'IMG_20250506_080526_1.jpg',
            'pexels-ganajp-12167862.jpg',
            'pexels-danil-lysov-175964361-12377231.jpg',
            'pexels-ganajp-12167862.jpg',
            'pexels-busrasahjn-13248795.jpg',
            'pexels-ganajp-12167862.jpg',
            'pexels-cassius-cardoso-927917183-27017043.jpg',
            'pexels-ganajp-12167862.jpg',
            'pexels-busrasahjn-13248795.jpg',
            'pexels-busrasahjn-13248795.jpg',
            'pexels-cassius-cardoso-927917183-27017043.jpg',
            'pexels-cassius-cardoso-927917183-27017043.jpg',
            'pexels-ganajp-12167862.jpg',
            'pexels-danil-lysov-175964361-12377231.jpg',
            'IMG_20250506_080526_1.jpg',
            'IMG_20250506_080517.jpg',
        ];
    @endphp

    <div>
        <x-image-library wire:model="files" wire:library="library" :preview="$library" label="Adicione suas images"
            hint="Max 100Kb" />

        <div class="flex w-full flex-wrap justify-center gap-2 p-4" x-data="{}">
            @forelse ($images as $image)
                <x-card subtitle="Always triggers">
                    <div class="flex w-70 flex-col items-center gap-2 rounded bg-transparent">
                        <img class="h-60 w-50 cursor-pointer rounded-lg object-contain ring ring-sky-200"
                            src="images/{{ $image }}" alt="" />
                        {{-- <x-badge class="badge-soft h-auto w-50 cursor-pointer text-center text-xs"
                            value="{{ $image }}" /> --}}
                        <x-button label="Abrir" wire:click="save" />
                    </div>
                </x-card>
            @empty
                <x-badge class="badge-soft h-auto w-50 cursor-pointer text-center text-xs" value="Não há imagens" />
            @endforelse
        </div>
    </div>
</div>
