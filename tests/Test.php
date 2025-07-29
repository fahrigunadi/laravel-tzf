<?php

use FahriGunadi\TimezoneFinder\Facades\TimezoneFinder;


it('can test', function () {
    expect(true)->toBeTrue();
});

it('can get timezone', function () {
    expect( TimezoneFinder::timezoneName(-4.8644237,138.2578241))->toBeString();
});

it('valid timezone', function () {
    expect( TimezoneFinder::timezoneName(-4.8644237,138.2578241))->toBe('Asia/Jayapura');
});

it('null timezone', function () {
    expect( TimezoneFinder::timezoneName(432432432432, 473284638))->toBeNull();
});
