<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
$routes->get('login', 'Admin\Auth::login');
$routes->get('about', 'Pages::about');
$routes->get('contact', 'Pages::contact');
$routes->get('pharmacy', 'Pages::pharmacy');
$routes->get('gallery', 'Pages::gallery');
$routes->get('privacy-policy', 'Pages::privacy');
$routes->get('disclaimer', 'Pages::disclaimer');

$routes->get('services', 'Services::index');

$routes->get('doctors', 'Doctors::index');
$routes->get('doctors/(:any)', 'Doctors::detail/$1');

$routes->get('blog', 'Blog::index');
$routes->get('blog/(:any)', 'Blog::detail/$1');

// Admin Auth
$routes->get('admin/login', 'Admin\Auth::login');
$routes->post('admin/login', 'Admin\Auth::attemptLogin');
$routes->get('admin/logout', 'Admin\Auth::logout');

$routes->group('admin', ['filter' => 'admin'], function($routes) {
    $routes->get('/', 'Admin\Dashboard::index');
    
    // Services
    $routes->group('services', ['filter' => 'role:manage_services'], function($routes) {
        $routes->get('/', 'Admin\Services::index');
        $routes->get('new', 'Admin\Services::new');
        $routes->post('create', 'Admin\Services::create');
        $routes->get('edit/(:num)', 'Admin\Services::edit/$1');
        $routes->post('update/(:num)', 'Admin\Services::update/$1');
        $routes->get('delete/(:num)', 'Admin\Services::delete/$1');
    });

    // Doctors
    $routes->group('doctors', ['filter' => 'role:manage_doctors'], function($routes) {
        $routes->get('/', 'Admin\Doctors::index');
        $routes->get('new', 'Admin\Doctors::new');
        $routes->post('create', 'Admin\Doctors::create');
        $routes->get('edit/(:num)', 'Admin\Doctors::edit/$1');
        $routes->post('update/(:num)', 'Admin\Doctors::update/$1');
        $routes->get('delete/(:num)', 'Admin\Doctors::delete/$1');
    });

    // Blog
    $routes->group('blog', ['filter' => 'role:manage_blog'], function($routes) {
        $routes->get('/', 'Admin\Blog::index');
        $routes->get('new', 'Admin\Blog::new');
        $routes->post('create', 'Admin\Blog::create');
        $routes->get('edit/(:num)', 'Admin\Blog::edit/$1');
        $routes->post('update/(:num)', 'Admin\Blog::update/$1');
        $routes->get('delete/(:num)', 'Admin\Blog::delete/$1');
    });

    // Gallery
    $routes->group('gallery', ['filter' => 'role:manage_gallery'], function($routes) {
        $routes->get('/', 'Admin\Gallery::index');
        $routes->post('create', 'Admin\Gallery::create');
        $routes->get('delete/(:num)', 'Admin\Gallery::delete/$1');
    });

    // Testimonials
    $routes->group('testimonials', ['filter' => 'role:manage_testimonials'], function($routes) {
        $routes->get('/', 'Admin\Testimonials::index');
        $routes->get('new', 'Admin\Testimonials::new');
        $routes->post('create', 'Admin\Testimonials::create');
        $routes->get('edit/(:num)', 'Admin\Testimonials::edit/$1');
        $routes->post('update/(:num)', 'Admin\Testimonials::update/$1');
        $routes->get('toggle/(:num)', 'Admin\Testimonials::toggle/$1');
        $routes->get('delete/(:num)', 'Admin\Testimonials::delete/$1');
    });

    // Users (Superadmin only)
    $routes->group('users', ['filter' => 'role:manage_users'], function($routes) {
        $routes->get('/', 'Admin\Users::index');
        $routes->get('new', 'Admin\Users::new');
        $routes->post('create', 'Admin\Users::create');
        $routes->get('delete/(:num)', 'Admin\Users::delete/$1');
    });

    // Settings
    $routes->group('settings', ['filter' => 'role:manage_settings'], function($routes) {
        $routes->get('/', 'Admin\Settings::index');
        $routes->post('update', 'Admin\Settings::update');
    });
});

// Sitemap & Robots
$routes->get('sitemap.xml', 'Seo::sitemap');
$routes->get('robots.txt', 'Seo::robots');
