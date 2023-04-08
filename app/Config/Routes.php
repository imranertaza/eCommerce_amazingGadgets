<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

// Load the system's routing file first, so that the app and ENVIRONMENT
// can override as needed.
if (is_file(SYSTEMPATH . 'Config/Routes.php')) {
    require SYSTEMPATH . 'Config/Routes.php';
}

/*
 * --------------------------------------------------------------------
 * Router Setup
 * --------------------------------------------------------------------
 */
$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('Home');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override();
$routes->setAutoRoute(true);
// The Auto Routing (Legacy) is very dangerous. It is easy to create vulnerable apps
// where controller filters or CSRF protection are bypassed.
// If you don't want to define all routes, please use the Auto Routing (Improved).
// Set `$autoRoutesImproved` to true in `app/Config/Feature.php` and set the following to true.
//$routes->setAutoRoute(false);

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.
$routes->get('/', 'Home::index');

$routes->get('/admin', 'Admin\Login::index');
$routes->post('/admin_login_action', 'Admin\Login::login_action');
$routes->get('/admin_logout', 'Admin\Login::logout');
$routes->get('/admin_dashboard', 'Admin\Dashboard::index');

//Attribute_group
$routes->get('/attribute_group', 'Admin\Attribute_group::index');
$routes->get('/attribute_create', 'Admin\Attribute_group::create');
$routes->post('/attribute_create_action', 'Admin\Attribute_group::create_action');
$routes->post('/attribute_update_action', 'Admin\Attribute_group::update_action');
$routes->get('/attribute_update/(:num)', 'Admin\Attribute_group::update/$1');
$routes->get('/attribute_delete/(:num)', 'Admin\Attribute_group::delete/$1');

//Brand
$routes->get('/brand', 'Admin\Brand::index');
$routes->get('/brand_create', 'Admin\Brand::create');
$routes->post('/brand_create_action', 'Admin\Brand::create_action');
$routes->post('/brand_update_action', 'Admin\Brand::update_action');
$routes->get('/brand_update/(:num)', 'Admin\Brand::update/$1');
$routes->get('/brand_delete/(:num)', 'Admin\Brand::delete/$1');

//Color_family
$routes->get('/color_family', 'Admin\Color_family::index');
$routes->get('/color_family_create', 'Admin\Color_family::create');
$routes->post('/color_family_create_action', 'Admin\Color_family::create_action');
$routes->post('/color_family_update_action', 'Admin\Color_family::update_action');
$routes->get('/color_family_update/(:num)', 'Admin\Color_family::update/$1');
$routes->get('/color_family_delete/(:num)', 'Admin\Color_family::delete/$1');

//Product_category
$routes->get('/product_category', 'Admin\Product_category::index');
$routes->get('/product_category_create', 'Admin\Product_category::create');
$routes->post('/product_category_create_action', 'Admin\Product_category::create_action');
$routes->post('/product_category_update_action', 'Admin\Product_category::update_action');
$routes->post('/product_category_update_action_others', 'Admin\Product_category::update_action_others');
$routes->get('/product_category_update/(:num)', 'Admin\Product_category::update/$1');
$routes->get('/product_category_delete/(:num)', 'Admin\Product_category::delete/$1');

//Products
$routes->get('/products', 'Admin\Products::index');
$routes->get('/product_create', 'Admin\Products::create');
$routes->post('/product_create_action', 'Admin\Products::create_action');
$routes->post('/product_update_action', 'Admin\Products::update_action');
$routes->get('/product_update/(:num)', 'Admin\Products::update/$1');
$routes->get('/product_delete/(:num)', 'Admin\Products::delete/$1');
$routes->get('/related_product', 'Admin\Products::related_product');

//User
$routes->get('/user', 'Admin\User::index');
$routes->get('/user_create', 'Admin\User::create');
$routes->post('/user_create_action', 'Admin\User::create_action');
$routes->post('/user_update_action', 'Admin\User::update_action');
$routes->post('/user_general_action', 'Admin\User::general_action');
$routes->post('/user_image_action', 'Admin\User::image_action');
$routes->get('/user_update/(:num)', 'Admin\User::update/$1');
$routes->get('/user_delete/(:num)', 'Admin\User::delete/$1');

//Role
$routes->get('/role', 'Admin\Role::index');
$routes->get('/role_create', 'Admin\Role::create');
$routes->post('/role_create_action', 'Admin\Role::create_action');
$routes->post('/role_update_action', 'Admin\Role::update_action');
$routes->get('/role_update/(:num)', 'Admin\Role::update/$1');
$routes->get('/role_delete/(:num)', 'Admin\Role::delete/$1');

//Customers
$routes->get('/customers', 'Admin\Customers::index');
$routes->get('/customers_create', 'Admin\Customers::create');
$routes->post('/customers_create_action', 'Admin\Customers::create_action');
$routes->post('/customers_update_action', 'Admin\Customers::update_action');
$routes->post('/customers_general_action', 'Admin\Customers::general_action');
$routes->get('/customers_update/(:num)', 'Admin\Customers::update/$1');
$routes->get('/customers_delete/(:num)', 'Admin\Customers::delete/$1');

//Settings
$routes->get('/settings', 'Admin\Settings::index');
$routes->post('/settings_update_action', 'Admin\Settings::update_action');


$routes->post('/settings_update_action', 'Admin\Settings::update_action');

//Ajax
$routes->get('/page_list', 'Admin\Page_settings::index');
$routes->get('/page_create', 'Admin\Page_settings::create');
$routes->get('/page_update/(:num)', 'Admin\Page_settings::update/$1');
$routes->get('/page_delete/(:num)', 'Admin\Page_settings::delete/$1');
$routes->post('/page_create_action', 'Admin\Page_settings::create_action');
$routes->post('/page_update_action', 'Admin\Page_settings::update_action');

//Coupon
$routes->get('/coupon', 'Admin\Coupon::index');
$routes->get('/coupon_create', 'Admin\Coupon::create');
$routes->post('/coupon_create_action', 'Admin\Coupon::create_action');
$routes->post('/coupon_update_action', 'Admin\Coupon::update_action');
$routes->get('/coupon_update/(:num)', 'Admin\Coupon::update/$1');
$routes->get('/coupon_delete/(:num)', 'Admin\Coupon::delete/$1');

//
$routes->get('/module', 'Admin\Module::index');
$routes->post('/module_update_action', 'Admin\Module::update_action');


$routes->post('/module_update', 'Admin\Ajax::module_update');









//login routes
$routes->get('/register', 'Login::register');
$routes->get('/login', 'Login::index');
$routes->post('/login_action', 'Login::login_action');
$routes->post('/register_action', 'Login::register_action');
$routes->get('/logout', 'Login::logout');

//Customer Dashboard routes
$routes->get('/dashboard', 'Customer\Dashboard::index');
$routes->post('/addtoWishlist', 'Customer\Dashboard::addtoWishlist');


$routes->get('/favorite', 'Customer\Favorite::index');
$routes->get('/my_order', 'Customer\Order::index');
$routes->get('/profile', 'Customer\Profile::index');
$routes->post('/profile_update_action', 'Customer\Profile::update_action');



//cart routes
$routes->get('/cart', 'Cart\Cart::index');
$routes->post('/addtocart', 'Cart\Cart::addToCart');
$routes->post('/updateToCart', 'Cart\Cart::updateToCart');
$routes->post('/removeToCart', 'Cart\Cart::removeToCart');

//pages routes
$routes->get('/about', 'Pages\Pages::about');
$routes->get('/contact', 'Pages\Pages::contact');
$routes->get('/page/(:any)', 'Pages\Pages::page/$1');

//products routes
$routes->get('/detail/(:num)', 'Products\Products::detail/$1');
$routes->post('/review', 'Products\Products::review');

$routes->get('/featuredproducts', 'Featuredproducts::index');

//Compare
$routes->get('/compare', 'Compare::index');
$routes->post('/addtoCompare', 'Compare::addtoCompare');
$routes->post('/removeToCompare', 'Compare::removeToCompare');

//Category
$routes->get('/category/(:num)', 'Category::index/$1');

//Search top
$routes->post('/top_search', 'Search::search_action');




/*
 * --------------------------------------------------------------------
 * Additional Routing
 * --------------------------------------------------------------------
 *
 * There will often be times that you need additional routing and you
 * need it to be able to override any defaults in this file. Environment
 * based routes is one such time. require() additional route files here
 * to make that happen.
 *
 * You will have access to the $routes object within that file without
 * needing to reload it.
 */
if (is_file(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php')) {
    require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}
