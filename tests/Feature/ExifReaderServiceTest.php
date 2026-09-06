<?php

use App\Services\ExifReaderService;

it('file exists', function () {
    $service = new ExifReaderService();
    $file = $service->fileExists('IMG_20250506_080517.jpg');
    expect($file)->toEqual(true);
});

it('file is returned correctally', function () {
    $service = new ExifReaderService();
    $file = $service->getFile('IMG_20250506_080517.jpg');
    expect(ctype_print($file))->toEqual(false);
});

it('read meta exif data', function () {
    $service = new ExifReaderService();
    $file = $service->getFile('IMG_20250506_080517.jpg');

    dump(@exif_read_data(__DIR__ . "/../../images/{$file}"));
});
