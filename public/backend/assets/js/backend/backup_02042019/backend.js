
var datatableLanguage = {
	"lengthMenu": "Hiển thị _MENU_ dòng",
	"zeroRecords": "Không có dữ liệu",
	// "info": "Showing page _PAGE_ of _PAGES_",
	"info": "Từ dòng _START_ tới _END_ của _TOTAL_ dòng",
	"infoEmpty": "Không có dữ liệu",
	"search": "Tìm kiếm",
	"infoFiltered": "",
	"paginate" : {
		"first": "Đầu",
		"last": "Cuối",
		"next": "Sau",
		"previous": "Trước"
	}
	// "infoFiltered": "(filtered from _MAX_ total records)"
};


$(document).ready(function() {
	$('.js-input-swtich').change(function() {
		let text;
		if ($(this).prop('checked')) {
			text = $(this).data('enabled-text');
		} else {
			text = $(this).data('disabled-text');
		}
		$(this).parent().next('.show-text').html(text);
	});
});

// Active sidebar menu
$(document).ready(function() {
	var tab = $('input#menu_tab').val();
	if (tab) {
		var tabs = tab.split(',');
		if (tabs[0]) {
			var primaryTab = $('.side-navbar li[data-primary-tab=' + tabs[0] + ']');
			$(primaryTab).addClass('active');
			$(primaryTab).children('ul').addClass('show');
		}
		if (tabs[1]) {
			var secondaryTab = $('.side-navbar li[data-secondary-tab=' + tabs[1] + ']');
			$(secondaryTab).children('a').addClass('active');
		}
	}
});


$(document).ready(function() {
	var msg = $('.msg-from-server').html().trim();
	if (msg) {
		new Noty({
			text: msg,
			layout:"top",
			type: 'info',
			closeWith: ['button', 'click'],
			timeout: 2000,
			animation: {
				open: "animated slideInDown",
				close: "animated slideOutUp"
			},
			modal: false,
		}).show();
	}
});

// stand alone file manager
$(document).ready(function() {
	$().fancybox({
		selector    : '[data-fancybox="stand-alone-filemanager"]',
		'width'		  : 900,
		'height'	  : 600,
		'type'		  : 'iframe',
		'autoScale' : false
	})
	if ($('.stand-alone-filemanager')[0]) {
		$('.stand-alone-filemanager').fancybox({
			'width'		  : 900,
			'height'	  : 600,
			'type'		  : 'iframe',
			'autoScale' : false
		});
	}
});
function responsive_filemanager_callback(field_id){
	var src = $('#'+field_id).val();
	var src = escape_regexp(src);
	console.log(src);
	// return;

	if (field_id == "gallery_src") {
		$.each(src, function(index, val) {
			val = '/source/'+val;
			retrieve_uploaded_product_gallery_link(val);
		});
	} else {
		src = '/source/'+src[0];
		$('#'+field_id).val(src);
		$('img.'+field_id).attr('src', src);
	}

	// $.fancybox.close();
}
function escape_regexp(str) {
 	var output = str.replace(/([\[\]\"])/g, "");
  return output.split(',');
}





// Tinymce textarea
$(document).ready(function() {
	if($(".tinymce_content").length > 0) {
		tinymce.init({

			selector: "textarea.tinymce_content",
			// block_formats: 'Paragraph=p;Heading 1=h1;Heading 2=h2;Heading 3=h3;Heading 4=h4;Heading 5=h5;Heading 6=h6;Preformatted=pre',
			theme: "modern",
			height:200,
			fontsize_formats: "8pt 10pt 12pt 14pt 18pt 24pt 36pt",
			plugins: [
				"advlist autolink link image lists charmap print preview hr anchor pagebreak spellchecker",
				"searchreplace wordcount visualblocks visualchars code fullscreen insertdatetime media nonbreaking",
				"save table contextmenu directionality emoticons template paste textcolor ",
				"responsivefilemanager",
				"toc"
			],
			toolbar: "toc | insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image | print preview media fullpage | forecolor backcolor| responsivefilemanager | sizeselect | fontsizeselect anchor",
				// fontselect
				formats: {
					// Changes the default format for h1 to have a class of heading
					h1: { block: 'h1', classes: 'heading' },
					h2: { block: 'h2', classes: 'heading' },
					h3: { block: 'h3', classes: 'heading' },
					h4: { block: 'h4', classes: 'heading' },
					h5: { block: 'h5', classes: 'heading' }
				  },
				style_formats: [
					{ title: 'H1', format: 'h1' },
					{ title: 'H2', format: 'h2' },
					{ title: 'H3', format: 'h3' },
					{ title: 'H4', format: 'h4' },
					{ title: 'H5', format: 'h5' },
				],
			templates: [
				{title: 'Some title 1', description: 'Some desc 1111111111', content: 'My content hahaha'},
				{title: 'Some title 2', description: 'Some desc 2222222222', content: 'asdasdasd'}
			],

			relative_urls:false,
			filemanager_title: "Angel Media - File Manager",
			external_filemanager_path: baseUrl+"/filemanager/",
			external_plugins: { "filemanager" : baseUrl+"filemanager/plugin.min.js"}
		});
	}
});



// Datatable Danh sách thành viên
$(document).ready(function() {
	//---------------------------------------------------
	if ($('#user_list_datatable')[0]) {
		var table = $('#user_list_datatable').DataTable( {
			"processing": true,
			"serverSide": true,
			"ajax": baseUrl+"/admin/users/datatable_json",
			"order": [[2,'desc']],
			"columnDefs": [
				{ "targets": 0, "name": "U.id", 'searchable':true, 'orderable':true},
				{ "targets": 1, "name": "email", 'searchable':true, 'orderable':true,},
				{ "targets": 2, "name": "created_at", 'searchable':true, 'orderable':true,},
				{ "targets": 3, "name": "status", 'searchable':false, 'orderable':false,},
				{ "targets": 4, "name": "group_name", 'searchable':true, 'orderable':true,},
				{ "targets": 5, "name": "Action", 'searchable':false, 'orderable':false,},
			]
		});
		$('#user_list_datatable').on('click', '.btn.btn-info.btn-square', function(event) {
			event.preventDefault();
			keyword = $(this).html();
			$('input[type=search]').val(keyword);
			// table.fnFilter(keyword,4,true,false);
			table.search(keyword).draw();
		});
	}
});

// Datatable Danh sách nhóm thành viên
$(document).ready(function() {
	//---------------------------------------------------
	if ($('#user_group_list_datatable')[0]) {
		var table = $('#user_group_list_datatable').DataTable( {
			"language" : datatableLanguage,
			"processing": true,
			"serverSide": true,
			"ajax": baseUrl+"/admin/user-groups/datatable_json",
			"order": [[1,'asc']],
			"columnDefs": [
				{ "targets": 0, "name": "no", 'searchable':false, 'orderable':false},
				{ "targets": 1, "name": "group_name", 'searchable':true, 'orderable':true,},
				{ "targets": 2, "name": "Chức năng", 'searchable':false, 'orderable':false,},
			]
		});
	}
});

// Xóa nhóm thành viên
$(document).ready(function() {
	$('table#user_group_list_datatable').on('click', '.action-buttons .delete-action', function(event) {
		event.preventDefault();
		var href = $(this).attr('data-href');
		var groupName = $(this).attr('data-group-name') ? '"'+$(this).attr('data-group-name')+'"' : 'này';
		var deleteNoty = new Noty({
			text: 'Bạn muốn xóa nhóm: '+groupName+' ? Nếu xóa sẽ không thể khôi phục lại được. Tất cả thành viên trong nhóm sẽ được chuyển tới nhóm "Thành viên"',
			layout:'centerRight',
			buttons: [
				Noty.button('Xóa', 'btn btn-danger', function () {
					window.location.href=href;
				}, {id: 'button1', 'data-status': 'ok'}),

				Noty.button('Bỏ qua', 'btn btn-success', function () {
					deleteNoty.close();
				})
			]
		});
		deleteNoty.show();

	});
});



// Tạo alias cho 1 chuỗi tin tức (Trang thêm danh mục và trang sửa danh mục)
$(document).ready(function() {
	$('input.unicode').keyup(function(event) {
		var unicodeString = $(this).val();
		var prefix = $('input.alias').attr('data-alias-prefix');
		// alert(prefix); return;

		if (unicodeString) {
			$.ajax({
				url: baseUrl + 'ajax/create-alias',
				type: 'GET',
				data: {'unicode' : unicodeString},
				success: function(response) {
					alias = response.trim();
					$('input.alias').val(prefix+alias);
				}
			})
		} else {
			$('input.alias').val(prefix);
		}
	});
});


// Datatable Danh sách danh mục tin tức
$(document).ready(function() {
	//---------------------------------------------------
	if ($('#news_category_list_datatable')[0]) {
		var table = $('#news_category_list_datatable').DataTable( {
			"language" : datatableLanguage,
			"processing": true,
			"serverSide": true,
			"ajax": baseUrl+"/admin/news/category/datatable_json",
			// "order": [[2,'desc']],
			"columnDefs": [
				{ "targets": 0, "name": "id", 'searchable':true, 'orderable':true},
				{ "targets": 1, "name": "name", 'searchable':true, 'orderable':true,},
				{ "targets": 2, "name": "alias", 'searchable':true, 'orderable':true,},
				{ "targets": 3, "name": "Action", 'searchable':false, 'orderable':false,},
			]
		});
		// $('#news_category_list_datatable').on('click', '.btn.btn-info.btn-square', function(event) {
		// 	event.preventDefault();
		// 	keyword = $(this).html();
		// 	$('input[type=search]').val(keyword);
		// 	// table.fnFilter(keyword,4,true,false);
		// 	table.search(keyword).draw();
		// });
	}
});

// Xóa danh mục tin tức
$(document).ready(function() {
	$('table#news_category_list_datatable').on('click', '.action-buttons .delete-action', function(event) {
		event.preventDefault();
		var href = $(this).attr('data-href');
		var categoryName = $(this).attr('data-category-name') ? '"'+$(this).attr('data-category-name')+'"' : 'này';
		var deleteNoty = new Noty({
			text: 'Bạn muốn xóa danh mục: '+categoryName+' ? Nếu xóa sẽ không thể khôi phục lại được',
			layout:'centerRight',
			buttons: [
				Noty.button('Xóa', 'btn btn-danger', function () {
					window.location.href=href;
				}, {id: 'button1', 'data-status': 'ok'}),

				Noty.button('Bỏ qua', 'btn btn-success', function () {
					deleteNoty.close();
				})
			]
		});
		deleteNoty.show();

	});
});

// ======================= TIN TỨC ========================= //

// Datatable Danh sách tin tức
$(document).ready(function() {
	//---------------------------------------------------
	if ($('#news_list_datatable')[0]) {
		var table = $('#news_list_datatable').DataTable( {
			"language" : datatableLanguage,
			"processing": true,
			"serverSide": true,
			"ajax": baseUrl+"/admin/news/datatable_json",
			"order": [[0,'asc']],
			"columnDefs": [
				{ "targets": 0, "name": "N.id", 'searchable':true, 'orderable':true},
				{ "targets": 1, "name": "N.name", 'searchable':true, 'orderable':true,},
				{ "targets": 2, "name": "N.alias", 'searchable':true, 'orderable':true,},
				{ "targets": 3, "name": "NC.name", 'searchable':true, 'orderable':true,},
				{ "targets": 4, "name": "N.created_at", 'searchable':true, 'orderable':true,},
				{ "targets": 5, "name": "Action", 'searchable':false, 'orderable':false,},
			]
		});
		// $('#news_list_datatable').on('click', '.btn.btn-info.btn-square', function(event) {
		// 	event.preventDefault();
		// 	keyword = $(this).html();
		// 	$('input[type=search]').val(keyword);
		// 	// table.fnFilter(keyword,4,true,false);
		// 	table.search(keyword).draw();
		// });
	}
});

// Xóa tin tức
$(document).ready(function() {
	$('table#news_list_datatable').on('click', '.action-buttons .delete-action', function(event) {
		event.preventDefault();
		var href = $(this).attr('data-href');
		var newsName = $(this).attr('data-news-name') ? '"'+$(this).attr('data-news-name')+'"' : 'này';
		var deleteNoty = new Noty({
			text: 'Bạn muốn xóa tin tức: '+newsName+' ? Nếu xóa sẽ không thể khôi phục lại được',
			layout:'centerRight',
			buttons: [
				Noty.button('Xóa', 'btn btn-danger', function () {
					window.location.href=href;
				}, {id: 'button1', 'data-status': 'ok'}),

				Noty.button('Bỏ qua', 'btn btn-success', function () {
					deleteNoty.close();
				})
			]
		});
		deleteNoty.show();

	});
});


// ======================== MENU ======================== //
// Recursive MENU - table
$(document).ready(function() {
	var menu = $('table#menu_list tbody tr');
	var margin = 0;
	$(menu).each(function(index, item) {
		margin = ($(item).attr('data-lv') - 1) * 20;
		$(item).find('td.menu-name').css('padding-left', margin);
	});
});


// Recursive MENU - select option
$(document).ready(function() {
	var menu = $('select.select-menu-parent option');
	var lv = 0;
	$(menu).filter("[data-lv=1]").css('color', '#dc3545');
	$(menu).each(function(index, item) {
		lv = ($(item).attr('data-lv') - 1);
		for (var i = 0; i < lv; i++) {
			$(item).prepend('&nbsp;&nbsp;&nbsp;&nbsp;');
		}
		// console.log(item);
	});
});

// Phát sinh vị trí khi chọn menu cha
$(document).ready(function () {
	var menuParentID = $('select[name=select_menu_parent]').attr('data-parent') ? $('select[name=select_menu_parent]').attr('data-parent') : 0;
	var exceptionID = $('select[name=select_menu_parent]').attr('data-exception') ? $('select[name=select_menu_parent]').attr('data-exception') : 0;
	var menuType = $('input[name=menu_type]')[0] ? $('input[name=menu_type]').val() : '';
	// alert(exceptionID); return;

	get_children(menuParentID, exceptionID, menuType);

	$('select[name=select_menu_parent]').change(function () {
		var menuParentID = $(this).val();
		get_children(menuParentID, exceptionID, menuType);
	});

	$('.js-menu-link-selection').click(function(event) {
		$('#add_menu_link_modal').modal('show');
	});
});

function get_children(menuParentID = 0, exceptionID, menuType) {
	var url = baseUrl+'ajax/get-menu-children-by-parent-id/'+menuParentID+'/'+exceptionID+'/'+menuType;
	$('.create-menu-form select[name=select_orders]').load(url, function (response, status, request) {
		// alert('load vi tri thanh cong');
		var orderValue = $('select[name=select_orders]').attr('data-order');
		if (orderValue) {
			$('.create-menu-form select[name=select_orders] option[value='+orderValue+']').prop('selected', true);
		}
		console.log(response);
	});
}


// Delete menu Xóa menu
$(document).ready(function() {
	$('table#menu_list').on('click', '.action-buttons .delete-action', function(event) {
		event.preventDefault();
		var href = $(this).attr('data-href');
		var menuName = $(this).attr('data-menu-name') ? '"'+$(this).attr('data-menu-name')+'"' : 'này';
		var deleteNoty = new Noty({
			text: 'Bạn muốn xóa tin tức: '+menuName+' ? Nếu xóa sẽ không thể khôi phục lại được',
			layout:'centerRight',
			buttons: [
				Noty.button('Xóa', 'btn btn-danger', function () {
					window.location.href=href;
				}, {id: 'button1', 'data-status': 'ok'}),

				Noty.button('Bỏ qua', 'btn btn-success', function () {
					deleteNoty.close();
				})
			]
		});
		deleteNoty.show();

	});
});

$(document).ready(function() {
	// SELECT LINK TYPES
	$('select[name=select_link_type]').change(function(event) {
		var type = $(this).val();
		var params = {link_type: type};
		get_links_for_menu(params);
	});

	// SELECT LINK
	$('.js-result-list').on('click', 'li', function(event) {
		var link = $(this).data('short-link');
		$('input[name=link]').val(link);
		$('#add_menu_link_modal').modal('hide');
	});

	// SEARCH LINKS
	$('.js-search-for-link').on('keyup', 'input[name=search]', function(event) {
		var keyword = $(this).val();
		var type;
		var params;
		type = $('select[name=select_link_type]').val();
		params = {link_type: type, keyword: keyword};
		get_links_for_menu(params);
	});
});

function get_links_for_menu(params = {}) {
	$.ajax({
		url: baseUrl+'ajax/get-links-for-menu',
		type: 'GET',
		data: params
	})
	.done(function(response) {
		console.log("success");
		response = JSON.parse(response);
		// console.log(params);
		// return;
		var menuLinks = response.menuLinks;
		$('.result-container').removeClass('hide');
		$('.result-list').html(menuLinks);
	})
	.fail(function() {
		console.log("error");
	});
}


// ========================= Trang nội dung ============================= //

// Datatable Danh sách Trang nội dung
$(document).ready(function() {
	//---------------------------------------------------
	if ($('#landing_list_datatable')[0]) {
		var table = $('#landing_list_datatable').DataTable( {
			"language" : datatableLanguage,
			"processing": true,
			"serverSide": true,
			"ajax": baseUrl+"/admin/landing/datatable_json",
			"order": [[3,'DESC']],
			"columnDefs": [
				{ "targets": 0, "name": "L.id", 'searchable':true, 'orderable':true},
				{ "targets": 1, "name": "L.name", 'searchable':true, 'orderable':true,},
				{ "targets": 2, "name": "L.alias", 'searchable':true, 'orderable':true,},
				{ "targets": 3, "name": "L.created_at", 'searchable':true, 'orderable':true,},
				{ "targets": 4, "name": "L.status", 'searchable':false, 'orderable':true,},
				{ "targets": 5, "name": "Action", 'searchable':false, 'orderable':false,},
			]
		});
	}
});

// Xóa Trang nội dung
$(document).ready(function() {
	$('table#landing_list_datatable').on('click', '.action-buttons .delete-action', function(event) {
		event.preventDefault();
		var href = $(this).attr('data-href');
		var landing_name = $(this).attr('data-landing-name') ? '"'+$(this).attr('data-landing-name')+'"' : 'này';
		var deleteNoty = new Noty({
			text: 'Bạn muốn xóa Trang: '+landing_name+' ? Nếu xóa sẽ không thể khôi phục lại được.',
			layout:'centerRight',
			buttons: [
				Noty.button('Xóa', 'btn btn-danger', function () {
					window.location.href=href;
				}, {id: 'button1', 'data-status': 'ok'}),

				Noty.button('Bỏ qua', 'btn btn-success', function () {
					deleteNoty.close();
				})
			]
		});
		deleteNoty.show();

	});
});


// SLIDESHOW
// Datatable Danh sách slides
$(document).ready(function() {
	//---------------------------------------------------
	if ($('#slideshow_datatable')[0]) {
		var table = $('#slideshow_datatable').DataTable( {
			"language" : datatableLanguage,
			"processing": true,
			"serverSide": true,
			"ajax": baseUrl+"/admin/slideshow/datatable_json",
			"order": [[3,'desc']],
			"columnDefs": [
				{ "targets": 0, "name": "S.id", 'searchable':true, 'orderable':true},
				{ "targets": 1, "name": "S.name", 'searchable':true, 'orderable':true,},
				{ "targets": 2, "name": "total_slide", 'searchable':false, 'orderable':false,},
				{ "targets": 3, "name": "S.status", 'searchable':true, 'orderable':true,},
				{ "targets": 4, "name": "Chức năng", 'searchable':false, 'orderable':false,},
			]
		});
	}
});

$(document).ready(function() {
	// Xóa Sldieshow
	$('table#slideshow_datatable').on('click', '.action-buttons .delete-action', function(event) {
		event.preventDefault();
		var href = $(this).attr('data-href');
		var slide_name = $(this).attr('data-slideshow-name') ? '"'+$(this).attr('data-slideshow-name')+'"' : 'này';
		var deleteNoty = new Noty({
			text: 'Bạn muốn xóa Slide: '+slide_name+' ? Nếu xóa sẽ không thể khôi phục lại được.',
			layout:'centerRight',
			buttons: [
				Noty.button('Xóa', 'btn btn-danger', function () {
					window.location.href=href;
				}, {id: 'button1', 'data-status': 'ok'}),

				Noty.button('Bỏ qua', 'btn btn-success', function () {
					deleteNoty.close();
				})
			]
		});
		deleteNoty.show();

	});

	// Change status
	$('table#slideshow_datatable').on('change', '.checkbox-status', function() {
		if ($(this).prop('checked') == false) {
			$(this).prop('checked', 'true');
			return;
		} else {
			var slideshowID = $(this).data('id');
			selectSlideshow(slideshowID);
		}
	});
});

function selectSlideshow(slideshowID) {
	var slideshowID = parseInt(slideshowID);
	if (!slideshowID || isNaN(slideshowID)) {
		return;
	}

	$.ajax({
		url: baseUrl+'/ajax/admin/slideshow/select',
		data: {slideshowID: slideshowID}
	})
	.done(function(res) {
		console.log(res);
		location.reload();
	})
	.fail(function() {
		console.log("error");
	});

}

//================= Hình ảnh Images Image
// Datatable Danh sách slides
$(document).ready(function() {
	//---------------------------------------------------
	if ($('#image_datatable')[0]) {
		var table = $('#image_datatable').DataTable( {
			"language" : datatableLanguage,
			"processing": true,
			"serverSide": true,
			"ajax": baseUrl+"admin/image/datatable_json",
			// "order": [[0,'desc']],
			"columnDefs": [
				{ "targets": 0, "name": "id", 'searchable'    :true, 'orderable' :true},
				{ "targets": 1, "name": "name", 'searchable'  :false, 'orderable':false,},
				{ "targets": 2, "name": "link", 'searchable'  :false, 'orderable':false,},
				{ "targets": 3, "name": "image", 'searchable' :false, 'orderable':false,},
				{ "targets": 4, "name": "note", 'searchable'  :false, 'orderable':false,},
				{ "targets": 4, "name": "Action", 'searchable'  :false, 'orderable':false,},
			]
		});
	}
});


//  ================= SẢN PHÂM ================ //
// Danh mục sản phẩm
// Datatable Danh sách danh mục sản phẩm
$(document).ready(function() {
	//---------------------------------------------------
	if ($('#product_category_list_datatable')[0]) {
		var table = $('#product_category_list_datatable').DataTable( {
			"language" : datatableLanguage,
			"processing": true,
			"serverSide": true,
			"ajax": baseUrl+"/admin/product/category/datatable_json",
			// "order": [[2,'desc']],
			"columnDefs": [
				{ "targets": 0, "name": "Cate.id", 'searchable'    :true, 'orderable' :true},
				{ "targets": 1, "name": "Cate.name", 'searchable'  :true, 'orderable' :true,},
				{ "targets": 2, "name": "Cate.alias", 'searchable' :true, 'orderable' :true,},
				{ "targets": 3, "name": "Parent.id", 'searchable' :false, 'orderable' :false,},
				{ "targets": 4, "name": "Cate.status", 'searchable' :false, 'orderable' :false,},
				{ "targets": 5, "name": "Action", 'searchable':false, 'orderable':false,},
			]
		});
	}
});


// Xóa danh mục sản phẩm
$(document).ready(function() {
	$('table#product_category_list_datatable').on('click', '.action-buttons .delete-action', function(event) {
		event.preventDefault();
		var href = $(this).attr('data-href');
		var categoryName = $(this).attr('data-category-name') ? '"'+$(this).attr('data-category-name')+'"' : 'này';
		var deleteNoty = new Noty({
			text: 'Bạn muốn xóa danh mục: '+categoryName+' ? Nếu xóa sẽ không thể khôi phục lại được',
			layout:'centerRight',
			buttons: [
				Noty.button('Xóa', 'btn btn-danger', function () {
					window.location.href=href;
				}, {id: 'button1', 'data-status': 'ok'}),

				Noty.button('Bỏ qua', 'btn btn-success', function () {
					deleteNoty.close();
				})
			]
		});
		deleteNoty.show();

	});
});


// END DANH MỤC SẢN PHẨM



// SẢN PHẨM
function unique(array) {
	var result = [];
	$.each(array, function(i, e) {
		if ($.inArray(e, result) == -1) result.push(e);
	});
	return result;
}
$(document).ready(function() {

	var optionModal = $('#options_modal');

	// Toggle modal options - Bật modal để thêm màu sắc kích thước cho sản phẩm
	$('.toggle-modal-options').click(function(event) {
		event.preventDefault();
		var modal = $(this).attr('data-modal');
		$(modal).modal('show');
	});

	optionModal.on('show.bs.modal', function()
	{
		$.ajax({
			url: baseUrl+'/ajax/get-color-and-size-list',
			type: 'GET',
		})
		.done(function(res) {
			res = JSON.parse(res);
			var colors = res['colors'];
			var sizes  = res['sizes'];
			// console.log(sizes);
			// console.log(colors);
			$('.color-box').html('').append(colors);
			$('.size-box').html('').append(sizes);
		})
		.fail(function(err) {
			console.log("error");
		});
	});

	// Xóa 1 checkbox (màu sắc hoặc kích thước)
	optionModal.on('click', '.remove-option-item', function(event) {
		event.preventDefault();
		var checkbox_to_delete = $(this).attr('data-parent');
		$('.'+checkbox_to_delete).remove();
	});

	// enter khi đang focus input => gọi hàm thêm (màu/kích thước):
	optionModal.on('keypress', 'input.add-more-value', function(event) {
		// event.preventDefault();
		if (event.which == 13) {
			var addButton = $(this).closest('div').find('button.add-more-button');
			$(addButton).trigger('click');
		}
	});

	// Thêm checkbox màu sắc
	$('.add-more-color').click(function(event) {
		var value = $('.add-more-color-value').val();
		var colors = $("input[name='color[]']");
		var num = colors.length + 1;
		if (!value) {
			return;
		}
		var checkbox = "<div class='mb-3 color"+num+"'> <div class='styled-checkbox'> <input value='"+value+"' type='checkbox' name='color[]' id='color"+num+"' checked> <label for='color"+num+"'>"+value+" <i data-parent='color"+num+"' class='la la-times remove-option-item'></i> </label> </div> </div>";
		$('.color-box').append(checkbox);
		$('.add-more-color-value').val('');
	});

	// Thêm checkbox kích thước
	$('.add-more-size').click(function(event) {
		var value = $('.add-more-size-value').val();
		var sizes = $("input[name='size[]']");
		var num = sizes.length + 1;
		if (!value) {
			return;
		}
		var checkbox = "<div class='mb-3 size"+num+"'> <div class='styled-checkbox'> <input checked value='"+value+"' type='checkbox' name='size[]' id='size"+num+"' checked> <label for='size"+num+"'>"+value+" <i data-parent='size"+num+"' class='la la-times remove-option-item'></i> </label> </div> </div>";
		$('.size-box').append(checkbox);
		$('.add-more-size-value').val('');
	});

	// Tạo phiên bản sản phẩm (màu sắc + kích thước + ...)
	$('.save-product-options-button').click(function(event) {
		// Lấy mảng màu sắc (các checkbox màu sắc đã được checked)
		var colors = $("input[name='color[]']:checked").map(function() {
			return $(this).val();
		}).get();
		// Lấy mảng kích thước (các checkbox kích thước đã được checked)
		var sizes = $("input[name='size[]']:checked").map(function() {
			return $(this).val();
		}).get();
		// Remove duplicate(s)
		var colors_array = unique(colors);
		var sizes_array = unique(sizes);
		// console.log(colors_array);
		// console.log(sizes_array);
		// return;

		var productName = $("input[name='name']").val();
		if (colors_array.length == 0 || sizes_array.length == 0) {
			return;
		}

		$.ajax({
			url: baseUrl+'/ajax/create-products-version',
			type: 'GET',
			data: {
				color_str_list: colors_array.join(','),
				size_str_list: sizes_array.join(','),
				product_name: productName
			}
		})
		.done(function(response) {
			console.log("success");
			alert('Tạo thành công');
			$('.size-box > div, .color-box > div').remove();
			// $('#options_modal, .modal-backdrop').hide();
			// $('body').removeClass('modal-open');
			// $('body, html').focus();
			// Load bảng các phiên bản của sản phẩm
			$('.versions-table').html(response);
		})
		.fail(function(err) {
			console.log("error");
			alert("error");
		});

	});

	$('.versions-table').on('click', '.btn-remove-item', function(event) {
		var rowID = $(this).attr('data-rowid');
		$.ajax({
			url: baseUrl+'/ajax/remove-product-version',
			type: 'GET',
			data: {rowid: rowID}
		})
		.done(function(response) {
			console.log("success");
			alert('success');
			// Load bảng các phiên bản của sản phẩm
			$('.versions-table').html(response);
		})
		.fail(function(err) {
			console.log(err);
			alert('error');
		});

	});
});

// Datatable Danh sách sản phẩm
$(document).ready(function() {
	//---------------------------------------------------
	if ($('#product_list_datatable')[0]) {
		var table = $('#product_list_datatable').DataTable( {
			"language" : datatableLanguage,
			"processing": true,
			"serverSide": true,
			"ajax": baseUrl+"/admin/products/datatable_json",
			"order": [[5,'desc']],
			"columnDefs": [
				// { "targets": 0, "name": "P.id", 'searchable'    :true, 'orderable' :true},
				{ "targets": 0, "name": "PC.name", 'searchable'      :true, 'orderable' :true},
				{ "targets": 1, "name": "P.name", 'searchable'       :true, 'orderable' :true},
				{ "targets": 2, "name": "P.alias", 'searchable'      :false, 'orderable':false},
				{ "targets": 3, "name": "P.image", 'searchable'      :false, 'orderable':false},
				{ "targets": 4, "name": "version", 'searchable'      :false, 'orderable':false},
				{ "targets": 5, "name": "P.created_at", 'searchable' :true, 'orderable':true},
				{ "targets": 6, "name": "Action", 'searchable'       :false, 'orderable':false},
			]
		});
	}
});

// XÓA SẢN PHẨM
$(document).ready(function() {
	// XÓA SẢN PHẨM:
	$('#product_list_datatable').on('click', '.action-buttons .delete-action', function(event) {
		// alert('a'); return;
		event.preventDefault();
		var href = $(this).attr('data-href');
		var productName = $(this).attr('data-product-name') ? '"'+$(this).attr('data-product-name')+'"' : 'này';
		var deleteNoty = new Noty({
			text: 'Bạn muốn xóa Sản phẩm '+productName+' ? Tất cả phiên bản cũng sẽ bị xóa và không thể khôi phục lại được',
			layout:'centerRight',
			buttons: [
				Noty.button('Xóa', 'btn btn-danger', function () {
					window.location.href=href;
				}, {id: 'button1', 'data-status': 'ok'}),

				Noty.button('Bỏ qua', 'btn btn-success', function () {
					deleteNoty.close();
				})
			]
		});
		deleteNoty.show();
	});
});

// VERSIONS
$(document).ready(function() {
	var versionID = $('input[name=version_id]').val();
	$('.version-list').find('.version'+versionID).addClass('active');


	// XÓA PHIÊN BẢN:
	$('.update-product-version-form').on('click', '.delete-version-button', function(event) {
		event.preventDefault();
		var href = $(this).attr('data-href');
		// var versionName = $(this).attr('data-version-name') ? '"'+$(this).attr('data-version-name')+'"' : 'này';
		var deleteNoty = new Noty({
			// text: 'Bạn muốn xóa phiên bản: '+versionName+' ? Nếu xóa sẽ không thể khôi phục lại được',
			text: 'Bạn muốn xóa tất cả phiên bản ? Nếu xóa sẽ không thể khôi phục lại được',
			layout:'centerRight',
			buttons: [
				Noty.button('Xóa', 'btn btn-danger', function () {
					window.location.href=href;
				}, {id: 'button1', 'data-status': 'ok'}),

				Noty.button('Bỏ qua', 'btn btn-success', function () {
					deleteNoty.close();
				})
			]
		});
		deleteNoty.show();
	});

});

//  ================= SẢN PHÂM ================ //

// ========================= MÀU SẮC ============================= //

// Datatable Danh sách Màu sắc
$(document).ready(function() {
	//---------------------------------------------------
	if ($('#color_list_datatable')[0]) {
		var table = $('#color_list_datatable').DataTable( {
			"language" : datatableLanguage,
			"processing": true,
			"serverSide": true,
			"ajax": baseUrl+"/admin/color/datatable_json",
			"order": [[1,'DESC']],
			"columnDefs": [
				{ "targets": 0, "name": "id", 'searchable':true, 'orderable':true},
				{ "targets": 1, "name": "name", 'searchable':true, 'orderable':true,},
				{ "targets": 2, "name": "hex", 'searchable':true, 'orderable':true,},
				{ "targets": 3, "name": "Action", 'searchable':false, 'orderable':false,},
			]
		});
	}
});

// Xóa Màu sắc
$(document).ready(function() {
	$('table#color_list_datatable').on('click', '.action-buttons .delete-action', function(event) {
		event.preventDefault();
		var href = $(this).attr('data-href');
		var color_name = $(this).attr('data-color-name') ? '"'+$(this).attr('data-color-name')+'"' : 'này';
		var deleteNoty = new Noty({
			text: 'Bạn muốn xóa Màu: '+color_name+' ? Nếu xóa sẽ không thể khôi phục lại được.',
			layout:'centerRight',
			buttons: [
				Noty.button('Xóa', 'btn btn-danger', function () {
					window.location.href=href;
				}, {id: 'button1', 'data-status': 'ok'}),

				Noty.button('Bỏ qua', 'btn btn-success', function () {
					deleteNoty.close();
				})
			]
		});
		deleteNoty.show();

	});
});

// ========================= KÍCH THƯỚC ============================= //

// Datatable Danh sách Màu sắc
$(document).ready(function() {
	//---------------------------------------------------
	if ($('#size_list_datatable')[0]) {
		var table = $('#size_list_datatable').DataTable( {
			"language" : datatableLanguage,
			"processing": true,
			"serverSide": true,
			"ajax": baseUrl+"/admin/size/datatable_json",
			"order": [[1,'DESC']],
			"columnDefs": [
				{ "targets": 0, "name": "id", 'searchable':true, 'orderable':true},
				{ "targets": 1, "name": "name", 'searchable':true, 'orderable':true,},
				{ "targets": 2, "name": "Action", 'searchable':false, 'orderable':false,},
			]
		});
	}
});

// Xóa Màu sắc
$(document).ready(function() {
	$('table#size_list_datatable').on('click', '.action-buttons .delete-action', function(event) {
		event.preventDefault();
		var href = $(this).attr('data-href');
		var size_name = $(this).attr('data-size-name') ? '"'+$(this).attr('data-size-name')+'"' : 'này';
		var deleteNoty = new Noty({
			text: 'Bạn muốn xóa KT: '+size_name+' ? Nếu xóa sẽ không thể khôi phục lại được.',
			layout:'centerRight',
			buttons: [
				Noty.button('Xóa', 'btn btn-danger', function () {
					window.location.href=href;
				}, {id: 'button1', 'data-status': 'ok'}),

				Noty.button('Bỏ qua', 'btn btn-success', function () {
					deleteNoty.close();
				})
			]
		});
		deleteNoty.show();

	});
});

// ========================= END KÍCH THƯỚC ============================= //








//  ================= ĐƠN HÀNG ================ //

// Datatable Danh sách sản phẩm
$(document).ready(function() {
	//---------------------------------------------------
	if ($('#order_list_datatable')[0]) {
		var table = $('#order_list_datatable').DataTable( {
			"language" : datatableLanguage,
			"processing": true,
			"serverSide": true,
			"ajax": baseUrl+"/admin/orders/datatable_json",
			"order": [[4,'desc']],
			"columnDefs": [
				// { "targets": 0, "name": "P.id", 'searchable'    :true, 'orderable' :true},
				{ "targets": 0, "name": "id", 'searchable' :false, 'orderable' :false},
				{ "targets": 1, "name": "name", 'searchable'  :true, 'orderable' :true},
				{ "targets": 2, "name": "phone", 'searchable'  :true, 'orderable' :false},
				{ "targets": 3, "name": "total", 'searchable' :true, 'orderable':true},
				{ "targets": 4, "name": "created_at", 'searchable' :true, 'orderable':true},
				{ "targets": 5, "name": "Action", 'searchable'  :false, 'orderable':false},
			]
		});
	}

	$('#order_list_datatable').on('click', '.is-paid-button', function(event) {
		event.preventDefault();

		var orderID = $(this).attr('data-order-id');
		update_is_paid_status(orderID);

		var paid = $(this).attr('data-paid');
		if (paid == 1) {
			// alert('Thanh toán -> Chưa thanh toán');
			$(this).attr('data-paid', 0);
			$(this).html('Chưa thanh toán');
			$(this).removeClass('badge-success').addClass('badge-dark');
		} else {
			// alert('Chưa Thanh toán ->  Thanh toán');
			$(this).attr('data-paid', 1);
			$(this).html('Đã thanh toán');
			$(this).removeClass('badge-dark').addClass('badge-success');
		}

	});
});

function update_is_paid_status(orderID) {
	$.ajax({
		url: baseUrl+'ajax/update-is-paid-status',
		type: 'GET',
		data: {order_id: orderID}
	})
	.done(function(response) {
		console.log("success");
		// alert('Cập nhật trạng thái thành công');
	})
	.fail(function(err) {
		console.log(err);
	});

}



//  ================= ĐƠN HÀNG ================ //






// Thêm gallery cho sản phẩm - Chỉnh sửa gallery cho sản phẩm
// Làm lại 07.01.2019 09:23
function retrieve_uploaded_product_gallery_link(src) {
	input = "<input type='hidden' name='gallery[]' value='"+src+"'></input>";
	img = "<img class='product-gallery-images' src='"+src+"' />";
	$('.product-gallery-preview').append(input);
	$('.product-gallery-preview').append(img);
}


$(document).ready(function() {
	$('.clear-product-gallery').click(function(event) {
		event.preventDefault();
		$('.product-gallery-preview').html('');
	});
});
// Thêm gallery cho sản phẩm - Chỉnh sửa gallery cho sản phẩm
// Làm lại 07.01.2019 09:23



// ADMIN - Tạo giá sỉ
$(document).ready(function() {
	$('form.wholesale-js').on('input', 'input.quantity', function(event) {
		event.preventDefault();
		var quantity = parseInt($(this).val());
		if (quantity < 1 || isNaN(quantity)) {
			$(this).val('');
			console.log('không phải số hợp lệ');
			return;
		}

		if ($(this).hasClass('to-quantity')) {
			if (set_limit($(this), quantity)) {
				set_next_from_quantity($(this), quantity);
			} else {
				return;
			}
		}

	});
});

function set_limit(toQuantityInput, quantity) {
	var size = $(toQuantityInput).attr('data-size');
	var index = parseInt($(toQuantityInput).attr('data-index'));
	var fromQuantity = $('input.from-quantity[data-size='+size+'][data-index='+index+']').val();
	fromQuantity = parseInt(fromQuantity);
	if (quantity <= fromQuantity) {
		return false;
	}
	return true;
}

function set_next_from_quantity(prevToQuantityInput, quantity) {
	var size = $(prevToQuantityInput).attr('data-size');
	var index = parseInt($(prevToQuantityInput).attr('data-index'));
	index += 1;
	$('input.from-quantity[data-size='+size+'][data-index='+index+']').val(quantity+1);
}


// COLOR CONTRACT TEXT COLOR AND BGCOLOR



function idealTextColor(bgColor) {

	var nThreshold = 105;
	var components = getRGBComponents(bgColor);
	var bgDelta = (components.R * 0.299) + (components.G * 0.587) + (components.B * 0.114);

	return ((255 - bgDelta) < nThreshold) ? "#000000" : "#ffffff";
}

function getRGBComponents(color) {

	var r = color.substring(1, 3);
	var g = color.substring(3, 5);
	var b = color.substring(5, 7);

	return {
		R: parseInt(r, 16),
		G: parseInt(g, 16),
		B: parseInt(b, 16)
	};
}


// SLIDESHOW
$(document).ready(function() {
	$('.add-more-slide').click(function(event) {
		event.preventDefault();
		var container = $(this).attr('data-container');
		// alert(container);return;
		addMoreSlide(container);
	});

	$(document).on('click', '.remove-slide-button', function(event) {
		$(this).parents('.slide-container').remove();
	});
});


/**
 * Add more slide to slideshow
 */
function addMoreSlide(container) {
	$.ajax({
		url: baseUrl + '/ajax/admin/slideshow/add-slide',
	})
	.done(function(res) {
		var slideTemplate = JSON.parse(res);
		appendToContainer(container, slideTemplate);
	})
	.fail(function() {
		console.log("error");
	});
}

function appendToContainer(container = '.slides-container', data) {
	$(container).append(data);
}
