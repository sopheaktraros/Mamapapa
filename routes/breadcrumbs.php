<?php

// Dashboard
Breadcrumbs::for('dashboard', function ($trail) {
	$trail->push('Dashboard', route('dashboard'));
});

// Customer
Breadcrumbs::for('customers.index', function ($trail) {
    $trail->push('Customers', route('customers.index'));
});
Breadcrumbs::for('customers.create', function ($trail) {
    $trail->parent('customers.index');
    $trail->push('Create', route('customers.create'));
});
Breadcrumbs::for('customers.edit', function ($trail, $customer) {
    $trail->parent('customers.index');
    $trail->push('Edit', route('customers.edit', $customer->id));
});
Breadcrumbs::for('customers.show', function ($trail, $customer) {
    $trail->parent('customers.index');
    $trail->push('Show', route('customers.show', $customer->id));
});



// Slider
Breadcrumbs::for('sliders.index', function ($trail) {
    $trail->push('Sliders', route('sliders.index'));
});
Breadcrumbs::for('sliders.create', function ($trail) {
    $trail->parent('sliders.index');
    $trail->push('Create', route('sliders.create'));
});
Breadcrumbs::for('sliders.edit', function ($trail, $slider) {
    $trail->parent('sliders.index');
    $trail->push('Edit', route('sliders.edit', $slider->id));
});













