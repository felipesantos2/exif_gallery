<?php

it('that true is true', function (): void {
    $true = true;
    expect($true)->tobe(true);
});

describe('suite tests of sum unit function', function (): void {
    $sum = function (int $a, int $b): int {
        return $a + $b;
    };

    it('sum', function () use ($sum): void {
        $result = $sum(1, 2);
        expect($result)->toBe(3);
    });

    it('sum with negative numbers', function () use ($sum): void {
        $result = $sum(-1, 2);
        expect($result)->tobe(1);
    });
});
