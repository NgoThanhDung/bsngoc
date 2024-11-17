<?php
defined('BASEPATH') or exit('No direct script access allowed');

/*
| -------------------------------------------------------------------------
| URI ROUTING
| -------------------------------------------------------------------------
| This file lets you re-map URI requests to specific controller functions.
|
| Typically there is a one-to-one relationship between a URL string
| and its corresponding controller class/method. The segments in a
| URL normally follow this pattern:
|
|	example.com/class/method/id/
|
| In some instances, however, you may want to remap this relationship
| so that a different class/function is called than the one
| corresponding to the URL.
|
| Please see the user guide for complete user ro:
|
|	https://codeigniter.com/user_guide/general/routing.html
|
| -------------------------------------------------------------------------
| RESERVED ROUTES
| -------------------------------------------------------------------------
|
| There are three reserved routes:
|
|	$route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
|	$route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router which controller/method to use if those
| provided in the URL cannot be matched to a valid route.
|
|	$route['translate_uri_dashes'] = FALSE;
|
| This is not exactly a route, but allows you to automatically route
| controller and method names that contain dashes. '-' isn't a valid
| class or method name character, so it requires translation.
| When you set this option to TRUE, it will replace ALL dashes in the
| controller and method URI segments.
|
| Examples:	my-controller/index	-> my_controller/index
|		my-controller/my-method	-> my_controller/my_method
*/
$route['default_controller']   = 'home/index';
$route['404_override']         = '';
$route['translate_uri_dashes'] = FALSE;



// ========= ========= ADMIN ROUTES ========= ========= //


// Login
$route['admin/login'] = 'backend/auth/render_login_page';

// Register
$route['admin/register'] = 'backend/auth/render_register_page';

// Forgot Password
$route['admin/forgot-password'] = 'backend/auth/render_forgot_password_page';

// Reset Password
$route['admin/reset-password']         = 'backend/auth/render_reset_password_page';
$route['admin/reset-password-by-code'] = 'backend/auth/reset_password_by_code';

// Confirm email
$route['admin/confirm-email']             = 'backend/auth/render_confirm_email_page';
$route['admin/send-confirmation-email']   = 'backend/auth/send_confirmation_email';
$route['admin/resend-confirmation-email'] = 'backend/auth/resend_confirmation_email';

// Logout - Đăng xuất
$route['admin/logout'] = 'backend/auth/logout';

// Verify email - Xác nhận email - Kích hoạt tài khoản.
$route['admin/confirm-verification/(:any)'] = 'backend/auth/confirm_verification/$1';

// Admin Dashboard - index
$route['admin']           = 'backend/dashboard';
$route['admin/dashboard'] = 'backend/dashboard';

// Dashboard - User : profile, update profile, ...
$route['admin']                         = 'backend/dashboard';
$route['admin/profile']                 = 'backend/user/render_profile_page';
$route['admin/profile/update/info']     = 'backend/user/update_personal_information';
$route['admin/profile/update/password'] = 'backend/user/update_password';
$route['admin/profile/update/avatar']   = 'backend/user/update_avatar';


// Dashboard - User : Danh sách user, chỉnh sửa user, ...
$route['admin/users']                = 'backend/user/render_user_list_page';
$route['admin/users/datatable_json'] = 'backend/user/user_list_datatable_json';

$route['admin/users/(:num)/edit']    = 'backend/user/render_edit_user_page/$1';
$route['admin/users/update']         = 'backend/user/update_user';

$route['admin/users/new']            = 'backend/user/render_create_user_page';
$route['admin/users/create']         = 'backend/user/create_user';

// Dashboard - User Group : Danh sách nhóm thành viên, chỉnh sửa nhóm thành viên, ...
$route['admin/user-groups']                = 'backend/user/render_user_group_list_page';
$route['admin/user-groups/datatable_json'] = 'backend/user/user_group_list_datatable_json';

$route['admin/user-groups/(:num)/delete']  = 'backend/user/delete_user_group/$1';
$route['admin/user-groups/(:num)/edit']    = 'backend/user/render_edit_user_group_page/$1';
$route['admin/user-groups/update']         = 'backend/user/update_user_group';

$route['admin/user-groups/new']            = 'backend/user/render_create_user_group_page';
$route['admin/user-groups/create']         = 'backend/user/create_user_group';

// Dashboard - News Category : Danh sách danh mục tin tức, chỉnh sửa Danh mục tin tức, ...
$route['admin/news/categories']              = 'backend/news/render_news_category_list_page';
$route['admin/news/category/datatable_json'] = 'backend/news/news_categories_datatable_json';

$route['admin/news/category/(:num)/delete']  = 'backend/news/delete_news_category/$1';
$route['admin/news/category/(:num)/edit']    = 'backend/news/render_edit_news_category_page/$1';
$route['admin/news/category/update']         = 'backend/news/update_news_category';

$route['admin/news/category/new']            = 'backend/news/render_create_news_category_page';
$route['admin/news/category/create']         = 'backend/news/create_news_category';
// Dashboard - News : Danh sách tin tức, chỉnh sửa tin tức, ...
$route['admin/news']                = 'backend/news/render_news_list_page';
$route['admin/news/datatable_json'] = 'backend/news/news_datatable_json';
$route['admin/news/(:num)/delete']  = 'backend/news/delete_news/$1';
$route['admin/news/(:num)/edit']    = 'backend/news/render_edit_news_page/$1';
$route['admin/news/update']         = 'backend/news/update_news';
$route['admin/news/new']            = 'backend/news/render_create_news_page';
$route['admin/news/create']         = 'backend/news/create_news';

//// Dashboard - treatment : Danh sách, chỉnh sửa chuyên điều trị
$route['admin/treatment']    = 'backend/treatment';
$route['admin/treatment/update']         = 'backend/treatment/update';
// Dashboard - doctor : Danh sách, chỉnh sửa bác sĩ, ...
$route['admin/doctor']                = 'backend/doctor/render_doctor_list_page';
$route['admin/doctor/datatable_json'] = 'backend/doctor/doctor_datatable_json';
$route['admin/doctor/(:num)/edit']    = 'backend/doctor/render_edit_doctor_page/$1';
$route['admin/doctor/update']         = 'backend/doctor/update_doctor';
$route['admin/doctor/new']            = 'backend/doctor/render_create_doctor_page';
$route['admin/doctor/create']         = 'backend/doctor/create_doctor';
$route['admin/doctor/(:num)/delete']  = 'backend/doctor/delete_doctor/$1';

// Dashboard - Menu : Danh sách menu, chỉnh sửa menu, ...
$route['admin/menu/create']        = 'backend/menu/create_menu';
$route['admin/menu/update']        = 'backend/menu/update_menu';
$route['admin/menu/(:any)']        = 'backend/menu/render_menu_list_page/$1';

$route['admin/menu/(:num)/delete'] = 'backend/menu/delete_menu/$1';
$route['admin/menu/(:num)/edit']   = 'backend/menu/render_edit_menu_page/$1';

$route['admin/menu/(:any)/new']    = 'backend/menu/render_create_menu_page/$1';
$route['ajax/get-links-for-menu']  = 'backend/menu/ajax_get_links_for_menu';


// Dashboard - Slideshow : Danh sách Slides, chỉnh sửa Slides ,...
$route['admin/slideshow']                = 'backend/slideshow/render_slideshow_list_page';
$route['admin/slideshow/datatable_json'] = 'backend/slideshow/slideshow_datatable_json';

$route['admin/slideshow/(:num)/delete']  = 'backend/slideshow/delete_slideshow/$1';
$route['admin/slideshow/(:num)/edit']    = 'backend/slideshow/render_edit_slideshow_page/$1';
$route['admin/slideshow/update']         = 'backend/slideshow/update_slideshow';

$route['admin/slideshow/new']            = 'backend/slideshow/render_create_slideshow_page';
$route['admin/slideshow/create']         = 'backend/slideshow/create_slideshow';
$route['admin/slideshow/(:num)/preview'] = 'backend/slideshow/preview_slideshow/$1';

//--- ajax - add more slide to slideshow (when creating)
$route['ajax/admin/slideshow/add-slide'] = 'backend/slideshow/add_more_slide';
//--- ajax - select slideshow (slideshow_list.php - trang danh sách slideshow)
$route['ajax/admin/slideshow/select'] = 'backend/slideshow/select';

// Dashboard - Images : Danh sách Hình ảnh trên trang web (banner, quảng cáo,...), chỉnh sửa Hình ảnh ,...
$route['admin/images']               = 'backend/image/render_image_list_page';
$route['admin/image/datatable_json'] = 'backend/image/image_datatable_json';

$route['admin/image/(:num)/edit']    = 'backend/image/render_edit_image_page/$1';
$route['admin/image/update']         = 'backend/image/update_image';

$route['admin/image/new']            = 'backend/image/render_create_image_page';
$route['admin/image/create']         = 'backend/image/create_image';

//CONFIG: thông tin liên lạc, ...
$route['admin/config/contact']        = 'backend/config/get_contact_info';
$route['admin/config/contact/update'] = 'backend/config/update_contact_info';

$route['admin/config/logo']           = 'backend/config/get_logo';
$route['admin/config/logo/update']    = 'backend/config/update_logos';

$route['admin/config/seo']            = 'backend/config/get_seo';
$route['admin/config/seo/update']     = 'backend/config/update_seo';

// == AJAX ROUTE ==

// AJAX - Tạo alias (tin tức, sản phẩm,...) // Cũ, thay thế = ajax/create-slug
$route['ajax/create-alias'] = 'ajax/create_alias';
// AJAX - Tạo alias (tin tức, sản phẩm,...) // 02/04/2019
$route['ajax/create-slug'] = 'ajax/create_slug';

// AJAX - MENU
$route['ajax/get-menu-children-by-parent-id/(:num)/(:num)/(:any)'] = 'ajax/get_menu_children_by_parent_id/$1/$2/$3';

// AJAX - Tạo phiên bản cho sản phẩm khi sản phẩm mới (màu sắc, kích thước)
$route['ajax/create-products-version'] = 'ajax/create_products_version';

// AJAX - Xóa một phiên bản của sản phẩm khi thêm sản phẩm mới (màu sắc, kích thước)
$route['ajax/remove-product-version'] = 'ajax/remove_product_version';

// AJAX - Cập nhật đơn hàng đã thanh toán hay chưa thanh toán
$route['ajax/update-is-paid-status'] = 'ajax/update_order_is_paid_status';

// ========= ========= END ADMIN ROUTES ========= ========= //

// ========= ========= USER ROUTES ========= ========= //

// Controller User.php
$route['trang-ca-nhan']              = 'frontend/user';
$route['mat-khau']                   = 'frontend/user/render_reset_password_page';
$route['mat-khau/cap-nhat']          = 'frontend/user/update_password';
$route['thong-tin-ca-nhan']          = 'frontend/user/render_user_profile_page';
$route['thong-tin-ca-nhan/cap-nhat'] = 'frontend/user/update_user_profile';

$route['email']                 = 'frontend/user/render_user_email_page';
$route['email/cap-nhat']        = 'frontend/user/update_user_email';
$route['email/cap-nhat/(:any)'] = 'frontend/user/update_new_email/$1';

// Register đăng ký
$route['dang-ky']               = 'frontend/auth/register';
$route['dang-ky/xu-ly-dang-ky'] = 'frontend/auth/register/register';

// Verify - Xác thực tài khoản
$route['xac-thuc']        = 'frontend/auth/verify';
$route['xac-thuc/gui-lai'] = 'frontend/auth/verify/resend_verification_email';
$route['xac-thuc/(:any)'] = 'frontend/auth/verify/verify/$1';

// Lấy lại mật khẩu
$route['mat-khau/quen']                    = 'frontend/auth/forget_password';
$route['mat-khau/giup-khoi-phuc-mat-khau'] = 'frontend/auth/forget_password/help_restore_password';
$route['mat-khau/khoi-phuc/(:any)']        = 'frontend/auth/forget_password/verify_password_resetting_code/$1';

// Login đăng nhập
$route['dang-nhap']           = 'frontend/auth/login';
$route['dang-nhap/facebook']  = 'frontend/auth/login/login_with_facebook';
$route['dang-nhap/dang-nhap'] = 'frontend/auth/login/login_normally';

// Logout đăng xuất
$route['dang-xuat'] = 'frontend/auth/logout';

//News - Tin tức
$route['(:any)-(:num)'] = 'frontend/blog/get_news_detail/$1/$2';
$route['bai-viet'] = 'frontend/blog/search_news_by_name';

//$route['tin-tuc']        = 'frontend/blog/get_all_news';
$route['ve-chung-toi']        = 'frontend/blog/get_news_about';
$route['tin-tuc/trang']        = 'frontend/blog/get_all_news';
$route['tin-tuc/(:any)/(:num)']        = 'frontend/blog/load_blog/$1/$2';
$route['(:any)/(:num)']        = 'frontend/blog/get_news_by_category/$1/$2';

//Rice - gạo sạch
$route['gao-sach'] = 'frontend/rice/get_all_shop';
$route['gao-sach/trang']        = 'frontend/rice/get_all_shop';
$route['gao-sach/(:any)/(:num)']        = 'frontend/rice/load_shop/$1/$2';
// trang error
$route['error404']   = 'frontend/error/index';

// Contact us - Liên hệ
$route['lien-he']     = 'frontend/contact';

// About us - Giới thiệu
$route['gioi-thieu'] = 'frontend/about';

// Security - Chính sách

$route['chinh-sach-bao-mat'] = 'frontend/security/security_1';
$route['chinh-sach-ban-quyen'] = 'frontend/security/security_2';
$route['chinh-sach-quang-cao'] = 'frontend/security/security_3';

$route['thong-tin-bac-si'] = 'frontend/doctor';

$route['dat-lich-hen'] = 'frontend/booking';
