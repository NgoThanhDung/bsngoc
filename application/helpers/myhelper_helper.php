<?php

defined('BASEPATH') OR exit('No direct script access allowed');


function frontend($path = '') {
	return base_url('public/frontend/'.$path);
}

function assets($path='') {
	return base_url('public/'.$path);
}

function plugins($path='') {
	return base_url('public/plugins/'.$path);
}

function plugin_css($path='') {
	return base_url('public/plugins/css/'.$path);
}

function plugin_js($path='') {
	return base_url('public/plugins/js/'.$path);
}

function myplugin_js($path='') {
	return base_url('public/myplugins/js/'.$path);
}
function myplugin_css($path='') {
	return base_url('public/myplugins/css/'.$path);
}

function generate_news_link($alias, $id)
{
	return base_url('tin-tuc/'.$alias.'-'.$id);
}

function generate_article_link($alias, $id)
{
	return base_url('tin-tuc/'.$alias.'-'.$id);
}

function generate_product_link($alias, $id, $type="full")
{
	if ($type == "short") {
		return 'san-pham/'.$alias.'-'.$id;
	}
	return base_url('san-pham/'.$alias.'-'.$id);
}

function generate_news_category_link($alias, $type="full")
{
	if ($type == "short") {
		return 'tin-tuc/'.$alias;
	}
	return base_url('tin-tuc/'.$alias);
}


function generate_product_category_link($alias, $type="full")
{
	if ($type == "short") {
		return 'san-pham/'.$alias;
	}
	return base_url('san-pham/'.$alias);
}

/**
 * @param array $menu
 * @param int $parent_id
 * @param array $recursive_menu
 * @param string $id
 * @param string $name
 * @param string $parent
 * @return array
 */

function get_recursive_menu($menu = array(), $parent_id = 0, &$recursive_menu = [], $id = "id", $name = "name", $parent = "parent_id") {
	foreach ($menu as $item) {
		if ($item[$parent] == $parent_id) {
			$item['submenu'] = [];
			$recursive_menu[$item['name']] = $item;
			get_recursive_menu($menu, $item[$id], $recursive_menu[$item[$name]]['submenu']);
		}
	}
	return $recursive_menu;
}

function render_menu_tree($node) {
	if (count($node['submenu']) > 0) {
		echo "<ul>";
		foreach ($node['submenu'] as $submenu) {
			$dropdown_button = $submenu['submenu'] ? "<i class='fas fa-chevron-right dropdown-button'></i>" : "";

			echo "<li> <a href='".base_url($submenu['link'])."'> ".$dropdown_button." ".$submenu['name']."</a>";

			render_menu_tree($submenu);
			echo "</li>";
		}
		echo "</ul>";
	}
}

function get_recursive_categories($categories = array(), $parent_id = 0, &$recursive_menu = []) {
	foreach ($categories as $item) {
		if ($item['parent_id'] == $parent_id) {
			$item['submenu']               = [];
			$recursive_menu[$item['name']] = $item;
			get_recursive_categories($categories, $item['id'], $recursive_menu[$item['name']]['submenu']);
		}
	}
	return $recursive_menu;
}

function render_category_tree($node) {
	if (count($node['submenu']) > 0) {
		echo "<ul>";
		foreach ($node['submenu'] as $submenu) {
			$dropdown_button = $submenu['submenu'] ? "<i class='fas fa-chevron-right dropdown-button'></i>" : "";

			echo "<li> <a href='".base_url('san-pham/'.$submenu['alias'])."'> ".$dropdown_button." ".$submenu['name']."</a>";

			render_category_tree($submenu);
			echo "</li>";
		}
		echo "</ul>";
	}
}

function render_header_menu($node) {
	if (count($node['submenu']) > 0) {
		echo "<ul class='submenu'>";
		foreach ($node['submenu'] as $submenu) {
			$dropdown_button = $submenu['submenu'] ? "<i class='fas fa-chevron-right dropdown-button'></i>" : "";

			echo "<li> <a href='".base_url($submenu['link'])."'> ".$submenu['name']."&nbsp;&nbsp;".$dropdown_button."</a>";

			render_header_menu($submenu);
			echo "</li>";
		}
		echo "</ul>";
	}
}

// function render_header_menu($node) {
// 	if (count($node['submenu']) > 0) {
// 		echo "<ul class='submenu depth1'>";
// 		foreach ($node['submenu'] as $submenu) {
// 			echo "<li>";
//
// 				echo "<div class='img text-center'>";
// 					echo "
// 						<a href='".base_url($submenu['link'])."'>
// 							<img src='".base_url($submenu['image'])."'>
// 						</a>
// 					";
// 				echo "</div>";
//
// 				echo "<div class='name text-center'>";
// 					echo "<a href='".base_url($submenu['link'])."'>".$submenu['name']."</a>";
// 				echo "</div>";
//
// 			echo "</li>";
// 		}
// 		echo "</ul>";
// 	}
// }

function render_mobile_menu($node) {
	if (count($node['submenu']) > 0) {
		echo "<ul class='submenu'>";
		foreach ($node['submenu'] as $submenu) {
			echo "<li>";
				echo "<a href='".base_url($submenu['link'])."'>".$submenu['name']."</a>";
			echo "</li>";
		}
		echo "</ul>";
	}
}

// admin
function render_menu_table($node, &$i = 2) {
	if (count($node['submenu']) > 0) {
		foreach ($node['submenu'] as $submenu) {
			$status = $submenu['status'] ? "<span class='badge badge-success'>Hiện</span>" : "<span class='badge badge-dark'>Ẩn</span>";
			$action = '<div class="action-buttons td-actions text-right">
				<a href="'.base_url("admin/menu/".$submenu['id']."/edit").'" class="edit-action"><i class="la la-edit edit"></i></a>
				<a data-menu-name="'.$submenu['name'].'" data-href="'.base_url("admin/menu/".$submenu['id']."/delete").'" href="#/" class="delete-action"><i class="la la-close delete"></i></a>
			</div>';
			echo "<tr data-lv='".$i."' class='submenu".$i."'>";
			// echo "<td>".$submenu['id']."</td>";
			echo "<td class='menu-name'><span class='submenu-sign'>&#8627;</span> <span class='badge badge".$i."'>".$i." </span> ".$submenu['name']."</td>";
			echo "<td>".$submenu['link']."</td>";
			echo "<td>".$node['name']."</td>";
			// echo "<td>".$node['orders']." - ".$submenu['orders']."</td>";
			echo "<td>".$status."</td>";
			echo "<td>$action</td>";
			echo "</tr>";
			if (count($submenu['submenu']) > 0) {
				$i++;
			}
			render_menu_table($submenu, $i);
		}
		$i -= 1;
	}
}

/**
 * Tạo danh sách select-option menu đệ quy từ danh sách menu lấy từ database
 * @param  array  $menu_list   [danh sách menu lấy từ database]
 * @param  integer $position   [vị trí xuất hiện: 1=menu chính; 2=menu sidebar]
 * @param  int  $choosen_id 	 [dùng trong trường hợp muốn sửa 1 menu-item nào đó $choosen_id = $id]
 * @param  integer $i          [level]
 */
function render_selection_menu($menu_list, $choosen_id = "", $current_id = "", $i = 1)
{
	foreach ($menu_list as $key => $menu) {
		echo "<option data-lv='".$i."' value='".$menu['id']."' ";
		if ($choosen_id && $choosen_id == $menu['id']) {
			echo "selected ";
		}
		if ($current_id && $current_id == $menu['id']) {
			echo "disabled ";
		}
		echo ">"; // <option data-lv="1" value="2" selected>
		if ($menu['parent_id'] != 0) {
			echo "&#8627;";
		}
		echo $menu['name']."</option>";
		if (count($menu['submenu']) > 0) {
			$i++;
			render_selection_menu($menu['submenu'], $choosen_id, $current_id, $i);
			$i -= 1;
		}
		// $i = 1;
	}

	// echo "<option>------------------</option>";
}


function render_recursive_cate($node) {
	if (count($node['submenu']) > 0) {
		echo "<ul class='submenu'>";
		foreach ($node['submenu'] as $submenu) {
			$checked = !empty($submenu['is_selected']) ? 'checked' : NULL;
			echo "<li>
				<input type='checkbox' name=\"cates[]\" value='".$submenu['id']."' ".$checked.">
				<span class='label-bold'>".$submenu['name']."</span>";
			render_recursive_cate($submenu);
			echo "</li>";
		}
		echo "</ul>";
	}
}


function server_path($value='') {
	return str_replace(basename($_SERVER["SCRIPT_FILENAME"]),"",$_SERVER["SCRIPT_FILENAME"]);
}

function make_alias($string) {
	// url helper : url_title
	// text helper : convert
	return url_title(convert_accented_characters($string), 'dash', TRUE);
}

function format_money($number, $symbol="&#8363;")
{
	return number_format($number, '0','.',',').$symbol;
}
