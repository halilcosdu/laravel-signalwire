<?php

it('filters out null and empty values', function () {
    $dateCreateAfter = '2021-01-01';
    $dateCreatedOnOrBefore = null;
    $from = '';
    $to = '2022-01-01';

    $data = array_filter([
        'DateCreateAfter' => $dateCreateAfter,
        'DateCreatedOnOrBefore' => $dateCreatedOnOrBefore,
        'From' => $from,
        'To' => $to,
    ]);

    expect($data)->toBe([
        'DateCreateAfter' => $dateCreateAfter,
        'To' => $to,
    ]);
});

it('includes all values if they are not null or empty', function () {
    $dateCreateAfter = '2021-01-01';
    $dateCreatedOnOrBefore = '2021-12-31';
    $from = 'From';
    $to = 'To';

    $data = array_filter([
        'DateCreateAfter' => $dateCreateAfter,
        'DateCreatedOnOrBefore' => $dateCreatedOnOrBefore,
        'From' => $from,
        'To' => $to,
    ]);

    expect($data)->toBe([
        'DateCreateAfter' => $dateCreateAfter,
        'DateCreatedOnOrBefore' => $dateCreatedOnOrBefore,
        'From' => $from,
        'To' => $to,
    ]);
});

it('returns an empty array if all values are null or empty', function () {
    $dateCreateAfter = null;
    $dateCreatedOnOrBefore = '';
    $from = null;
    $to = '';

    $data = array_filter([
        'DateCreateAfter' => $dateCreateAfter,
        'DateCreatedOnOrBefore' => $dateCreatedOnOrBefore,
        'From' => $from,
        'To' => $to,
    ]);

    expect($data)->toBe([]);
});
