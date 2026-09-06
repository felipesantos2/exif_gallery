<?php

use Livewire\Livewire;

it('renders successfully', function () {
    Livewire::test('pages::media-gallery.index')
        ->assertStatus(200);
});
