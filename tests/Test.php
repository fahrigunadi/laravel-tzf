<?php

use FahriGunadi\TimezoneFinder\TimezoneFinder;

it('can test', function () {
    expect(true)->toBeTrue();
});

it('can get timezone', function () {
    expect( (new TimezoneFinder)->timezoneName(-4.8644237,138.2578241))->toBeString();
});

it('valid timezone', function () {
    expect( (new TimezoneFinder)->timezoneName(-4.8644237,138.2578241))->toBe('Asia/Jayapura');
});
