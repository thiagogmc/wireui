<?php

use Illuminate\Support\{MessageBag, ViewErrorBag};
use WireUi\View\Components\Errors;

it('should 1', function () {
    $errors = new Errors();

    expect($errors->title)->toBe(trans('wireui::messages.errors.title'));
});

it('should 2', function () {
    $errors = new Errors(only: 'name1|name2|name3');

    expect($errors->only->toArray())->toBe(['name1', 'name2', 'name3']);

    $errors = new Errors(only: ['name1', 'name2', 'name3']);

    expect($errors->only->toArray())->toBe(['name1', 'name2', 'name3']);
});

it('should 3', function () {
    $errors = new Errors();

    $errorBag = new ViewErrorBag();

    $messages = new MessageBag([
        'error1' => 'message1',
        'error2' => 'message2',
        'error3' => 'message3',
    ]);

    $errorBag->put('default', $messages);

    expect($errors->getErrorMessages($errorBag)->toArray())->toBe([
        'error1' => ['message1'],
        'error2' => ['message2'],
        'error3' => ['message3'],
    ]);
});
