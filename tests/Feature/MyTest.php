<?php

it('shows an expectation', function () {
    expect(true)->toBe(true);
});

it('shows an expectation nested', function () {
    $id = 1;
    $name = "Jorge";
    expect($id)->toBe(1)->and($name)->toBe("Jorge");
});

it('shows an expectation each to be int', function () {
    $number = [1, 2, 3];

    expect($number)->each->toBeInt();
});

// test ERROR because there is a value that is an integer
// it('show an expection each values not to be int', function () {
//     $values = ['b', 'mação', 2];
//     expect($values)->each->not->toBeInt();
// });

it('checks each numbers are less than four', function () {
    $numbers = [0, 1, 2, 3];

    // there are also toBeLessThanOrEqual, toBeGreaterThan, toBeGreaterThanOrEqual
    expect($numbers)->each(fn ($n) => $n->toBeLessThan(4));
});

// test ERROR because the third item is not equal to "Jorge"
// it('checks in sequence if the three items are respective string', function () {
//     $items = ["b", "maçã", "Item3"];

//     expect($items)->sequence(
//         fn ($items) => $items->toBe("b"),
//         fn ($items) => $items->toBe("maçã"),
//         fn ($items) => $items->toBe("Jorge")
//     );
// });

it('checks if a value is empty', function () {
    $value = "";

    // it work also with array and collenction
    expect($value)->toBeEmpty();
});

it('checks if a value is true', function () {
    $value = true;

    // there is also "toBeFalse()"
    expect($value)->toBeTrue();
});

it('checks if a value contains "clear"', function () {
    $value = "People find pleasure in different ways. I find it in keeping my mind clear";

    expect($value)->toContain("clear");
});

it('check if values have theer items', function () {
    $count = 3;
    $values = ["Jorge", "Marta", "Bruna"];

    expect($values)->toHaveCount($count);
});

it('checks if a class has the property "name" and your value is "Flávia"', function () {
    $user = new class
    {
        public $name = "Flávia";
    };

    // works also with private property, but can't access its value to test
    expect($user)->toHaveProperty('name', 'Flávia');
});

it('checks to match between two arrays', function () {
    $user = [
        'id' => 1,
        'name' => 'Leandro',
        'email' => 'leandro@gmail'
    ];
    $user2 = [
        'name' => 'Leandro',
        'email' => 'leandro@gmail'
    ];

    // will accept because the method ignore the field 'id' in the check
    // there is also "toMatchObject()"
    expect($user)->toMatchArray($user2);
});

it('checks if it is an instance of a class', function () {
    $user = new \App\Models\User();

    expect($user)->toBeInstanceOf(\App\Models\User::class);
});

it('checks if response is a JSON', function () {
    $response = '{"success": true}';

    expect($response)->toBeJson();
});

it('checks if response has key(s)', function () {
    $response = [
        'success' => true,
        'message' => "Bom dia, Jorge"
    ];

    // there is also "toHaveKey()", in the singular, witch takes only one value to check
    expect($response)->toHaveKeys(['success', 'message']);
});


// *** Custom test
// define custom test
expect()->extend('toBeWithinRange', function ($min, $max) {
    return $this->toBeGreaterThanOrEqual($min)
        ->toBeLessThanOrEqual($max);
});
it('numerig range', function () {
    expect(100)->toBeWithinRange(90, 110);
});

// *** Higher order test
it('true is true')->assertEquals('oi', 'oi')->assertTrue(true);

// *** Exceptions
it('throws exception', function () {
    throw new Exception('Deu erro');
})->throws(Exception::class, 'Deu erro');

// *** Skip tests
it('has home', function () {
    // classico vou fazer depois
})->skip('The homepage has not yet been built');
// another way to write pending test
it('test peding');

// *** Dataset
// inline datasets
it('has emails (inline datasets)', function (string $email) {
    expect($email)->not->toBeEmpty();
})->with(['jorge@gmail.com', 'flavia@gmail.com']);
// sharing datasets
it('has emails (sharing datasets)', function (string $email) {
    expect($email)->not->toBeEmpty();
})->with('emails');
