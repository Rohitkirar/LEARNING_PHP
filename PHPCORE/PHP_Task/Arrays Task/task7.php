<?php 

$product = [
	[
		'id' => 1,
		'name' => 's23',
		'category' => 'mobile',
		'price' => '30000'
	],
	[
		'id' => 2,
		'name' => 's24',
		'category' => 'mobile',
		'price' => '40000'
	],
	[
		'id' => 3,
		'name' => 'mi a32',
		'category' => 'television',
		'price' => '0400'
	],
	[
		'id' => 4,
		'name' => 'lg 102',
		'category' => 'refregrator',
		'price' => '20000',
	],
	[
		'id' => 5,
		'name' => 'samsung 42',
		'category' => 'television',
		'price' => '24000',
    ],
	[
		'id' => 6,
		'name' => 'goodrej',
		'category' => 'refregrator',
		'price' => '15000'
    ],
    [
        'id' => 4,
		'name' => 'lg 102',
		'category' => 'refregrator',
		'price' => '20000',
    ]
    ];

    for($i = 0 ; $i < count($product) ; $i++){
        $category[$product[$i]['category']] = $category[$product[$i]['category']] ?? 0;
        $category[$product[$i]['category']] += $product[$i]['price'] ;    
    }
    asort($category);
    print_r($category);

?>