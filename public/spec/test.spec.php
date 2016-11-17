<?php

require_once __DIR__ . '/../vendor/autoload.php';

describe("This is a basic test", function (){
    it("Should evaluate true as true", function () {
        expect(true)->toBe(true);
    });
});
