var datatableLanguage = {
  lengthMenu: "Hiển thị _MENU_ dòng",
  zeroRecords: "Không có dữ liệu",
  // "info": "Showing page _PAGE_ of _PAGES_",
  info: "Từ dòng _START_ tới _END_ của _TOTAL_ dòng",
  infoEmpty: "Không có dữ liệu",
  search: "Tìm kiếm",
  infoFiltered: "",
  paginate: {
    first: "Đầu",
    last: "Cuối",
    next: "Sau",
    previous: "Trước",
  },
  // "infoFiltered": "(filtered from _MAX_ total records)"
};

// function triggerChange(){
//     $(".js-input-swtich").trigger("change");
// }
//
// $(".js-input-swtich").change(function() {
//    alert("triggered!");
// });
//
// triggerChange();

$(document).ready(function () {
  $(".js-input-swtich").change(function () {
    let text;
    if ($(this).prop("checked")) {
      text = $(this).data("enabled-text");
    } else {
      text = $(this).data("disabled-text");
    }
    $(this).parent().next(".show-text").html(text);
  });
  triggerInputSwitchChange();

  $(document).on("change", ".js-input-change-event", function (event) {
    event.preventDefault();
    let value = $(this).val();
    let targetClass = $(this).data("synce-value");
    let target = $("." + targetClass);
    target.html(value);
  });
});
function triggerInputSwitchChange() {
  $(".js-input-swtich").trigger("change");
}

// Active sidebar menu
$(document).ready(function () {
  var tab = $("input#menu_tab").val();
  if (tab) {
    var tabs = tab.split(",");
    if (tabs[0]) {
      var primaryTab = $(".side-navbar li[data-primary-tab=" + tabs[0] + "]");
      $(primaryTab).addClass("active");
      $(primaryTab).children("ul").addClass("show");
    }
    if (tabs[1]) {
      var secondaryTab = $(
        ".side-navbar li[data-secondary-tab=" + tabs[1] + "]"
      );
      $(secondaryTab).children("a").addClass("active");
    }
  }
});

$(document).ready(function () {
  var msg = $(".msg-from-server").html().trim();
  if (msg) {
    new Noty({
      text: msg,
      layout: "top",
      type: "info",
      closeWith: ["button", "click"],
      timeout: 2000,
      animation: {
        open: "animated slideInDown",
        close: "animated slideOutUp",
      },
      modal: false,
    }).show();
  }
});

// stand alone file manager
$(document).ready(function () {
  $().fancybox({
    selector: '[data-fancybox="stand-alone-filemanager"]',
    width: 900,
    height: 600,
    type: "iframe",
    autoScale: false,
  });
  if ($(".stand-alone-filemanager")[0]) {
    $(".stand-alone-filemanager").fancybox({
      width: 900,
      height: 600,
      type: "iframe",
      autoScale: false,
    });
  }
});
function responsive_filemanager_callback(field_id) {
  var src = $("#" + field_id).val();
  var src = escape_regexp(src);
  console.log(src);
  // return;

  if (field_id == "gallery_src") {
    $.each(src, function (index, val) {
      val = "/source/" + val;
      retrieve_uploaded_product_gallery_link(val);
    });
  } else {
    src = "/source/" + src[0];
    $("#" + field_id).val(src);
    $("img." + field_id).attr("src", src);
  }

  // $.fancybox.close();
}
function escape_regexp(str) {
  var output = str.replace(/([\[\]\"])/g, "");
  return output.split(",");
}

// Tinymce textarea
$(document).ready(function () {
  if ($(".tinymce_content").length > 0) {
    tinymce.init({
      selector: "textarea.tinymce_content",
      block_formats:
        "Paragraph=p;Heading 1=h1;Heading 2=h2;Heading 3=h3;Heading 4=h4;Heading 5=h5;Heading 6=h6;Preformatted=pre",
      theme: "modern",
      height: 200,
      fontsize_formats: "8pt 10pt 12pt 14pt 18pt 24pt 36pt",
      plugins: [
        "advlist autolink link image lists charmap print preview hr anchor pagebreak spellchecker",
        "searchreplace wordcount visualblocks visualchars code fullscreen insertdatetime media nonbreaking",
        "save table contextmenu directionality emoticons template paste textcolor ",
        "responsivefilemanager",
        "toc",
      ],
      toolbar:
        "toc | insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image | print preview media fullpage | forecolor backcolor| responsivefilemanager | sizeselect | fontsizeselect anchor",
      // fontselect
      formats: {
        // Changes the default format for h1 to have a class of heading
        h1: { block: "h1", classes: "heading" },
        h2: { block: "h2", classes: "heading" },
        h3: { block: "h3", classes: "heading" },
        h4: { block: "h4", classes: "heading" },
        h5: { block: "h5", classes: "heading" },
      },
      style_formats: [
        { title: "H1", format: "h1" },
        { title: "H2", format: "h2" },
        { title: "H3", format: "h3" },
        { title: "H4", format: "h4" },
        { title: "H5", format: "h5" },
      ],
      templates: [
        {
          title: "Some title 1",
          description: "Some desc 1111111111",
          content: "My content hahaha",
        },
        {
          title: "Some title 2",
          description: "Some desc 2222222222",
          content: "asdasdasd",
        },
      ],

      relative_urls: false,
      filemanager_title: "NTD - File Manager",
      external_filemanager_path: baseUrl + "/filemanager/",
      external_plugins: { filemanager: baseUrl + "filemanager/plugin.min.js" },
    });
  }
});

// Datatable Danh sách thành viên
$(document).ready(function () {
  //---------------------------------------------------
  if ($("#user_list_datatable")[0]) {
    var table = $("#user_list_datatable").DataTable({
      processing: true,
      serverSide: true,
      ajax: baseUrl + "/admin/users/datatable_json",
      order: [[2, "desc"]],
      columnDefs: [
        { targets: 0, name: "U.id", searchable: true, orderable: true },
        { targets: 1, name: "email", searchable: true, orderable: true },
        { targets: 2, name: "created_at", searchable: false, orderable: false },
        { targets: 3, name: "status", searchable: false, orderable: false },
        { targets: 4, name: "group_name", searchable: true, orderable: true },
        { targets: 5, name: "Action", searchable: false, orderable: false },
      ],
    });
    $("#user_list_datatable").on(
      "click",
      ".btn.btn-info.btn-square",
      function (event) {
        event.preventDefault();
        keyword = $(this).html();
        $("input[type=search]").val(keyword);
        // table.fnFilter(keyword,4,true,false);
        table.search(keyword).draw();
      }
    );
  }
});

// Datatable Danh sách nhóm thành viên
$(document).ready(function () {
  //---------------------------------------------------
  if ($("#user_group_list_datatable")[0]) {
    var table = $("#user_group_list_datatable").DataTable({
      language: datatableLanguage,
      processing: true,
      serverSide: true,
      ajax: baseUrl + "/admin/user-groups/datatable_json",
      order: [[1, "asc"]],
      columnDefs: [
        { targets: 0, name: "no", searchable: false, orderable: false },
        { targets: 1, name: "group_name", searchable: true, orderable: true },
        { targets: 2, name: "Chức năng", searchable: false, orderable: false },
      ],
    });
  }
});

// Xóa nhóm thành viên
$(document).ready(function () {
  $("table#user_group_list_datatable").on(
    "click",
    ".action-buttons .delete-action",
    function (event) {
      event.preventDefault();
      var href = $(this).attr("data-href");
      var groupName = $(this).attr("data-group-name")
        ? '"' + $(this).attr("data-group-name") + '"'
        : "này";
      var deleteNoty = new Noty({
        text:
          "Bạn muốn xóa nhóm: " +
          groupName +
          ' ? Nếu xóa sẽ không thể khôi phục lại được. Tất cả thành viên trong nhóm sẽ được chuyển tới nhóm "Thành viên"',
        layout: "centerRight",
        buttons: [
          Noty.button(
            "Xóa",
            "btn btn-danger",
            function () {
              window.location.href = href;
            },
            { id: "button1", "data-status": "ok" }
          ),

          Noty.button("Bỏ qua", "btn btn-success", function () {
            deleteNoty.close();
          }),
        ],
      });
      deleteNoty.show();
    }
  );
});

// Tạo alias cho 1 chuỗi tin tức (Trang thêm danh mục và trang sửa danh mục)
$(document).ready(function () {
  $("input.unicode").keyup(function (event) {
    var unicodeString = $(this).val();
    var prefix = $("input.alias").attr("data-alias-prefix");
    // alert(prefix); return;

    if (unicodeString) {
      $.ajax({
        url: baseUrl + "ajax/create-alias",
        type: "GET",
        data: { unicode: unicodeString },
        success: function (response) {
          alias = response.trim();
          $("input.alias").val(prefix + alias);
        },
      });
    } else {
      $("input.alias").val(prefix);
    }
  });
});

// SLIDESHOW
// Datatable Danh sách slides
$(document).ready(function () {
  //---------------------------------------------------
  if ($("#slideshow_datatable")[0]) {
    var table = $("#slideshow_datatable").DataTable({
      language: datatableLanguage,
      processing: true,
      serverSide: true,
      ajax: baseUrl + "/admin/slideshow/datatable_json",
      columnDefs: [
        { targets: 0, name: " N.id", searchable: false, orderable: false },
        { targets: 1, name: "N.name", searchable: true, orderable: true },
        { targets: 2, name: "Chức năng", searchable: false, orderable: false },
      ],
    });
  }
});

$(document).ready(function () {
  // Xóa Sldieshow
  $("table#slideshow_datatable").on(
    "click",
    ".action-buttons .delete-action",
    function (event) {
      event.preventDefault();
      var href = $(this).attr("data-href");
      var slide_name = $(this).attr("data-slideshow-name")
        ? '"' + $(this).attr("data-slideshow-name") + '"'
        : "này";
      var deleteNoty = new Noty({
        text:
          "Bạn muốn xóa Slide: " +
          slide_name +
          " ? Nếu xóa sẽ không thể khôi phục lại được.",
        layout: "centerRight",
        buttons: [
          Noty.button(
            "Xóa",
            "btn btn-danger",
            function () {
              window.location.href = href;
            },
            { id: "button1", "data-status": "ok" }
          ),

          Noty.button("Bỏ qua", "btn btn-success", function () {
            deleteNoty.close();
          }),
        ],
      });
      deleteNoty.show();
    }
  );

  // Change status
  $("table#slideshow_datatable").on("change", ".checkbox-status", function () {
    if ($(this).prop("checked") == false) {
      $(this).prop("checked", "true");
      return;
    } else {
      var slideshowID = $(this).data("id");
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
    url: baseUrl + "/ajax/admin/slideshow/select",
    data: { slideshowID: slideshowID },
  })
    .done(function (res) {
      console.log(res);
      location.reload();
    })
    .fail(function () {
      console.log("error");
    });
}

// SLIDESHOW
$(document).ready(function () {
  $(".add-more-slide").click(function (event) {
    event.preventDefault();
    var container = $(this).attr("data-container");
    // alert(container);return;
    addMoreSlide(container);
  });

  $(document).on("click", ".remove-slide-button", function (event) {
    $(this).parents(".slide-container").remove();
  });
});

/**
 * Add more slide to slideshow
 */
function addMoreSlide(container) {
  $.ajax({
    url: baseUrl + "/ajax/admin/slideshow/add-slide",
  })
    .done(function (res) {
      var slideTemplate = JSON.parse(res);
      appendToContainer(container, slideTemplate);
    })
    .fail(function () {
      console.log("error");
    });
}

function appendToContainer(container = ".slides-container", data) {
  $(container).append(data);
}

// Datatable Danh sách danh mục tin tức
$(document).ready(function () {
  //---------------------------------------------------
  if ($("#news_category_list_datatable")[0]) {
    var table = $("#news_category_list_datatable").DataTable({
      language: datatableLanguage,
      processing: true,
      serverSide: true,
      ajax: baseUrl + "/admin/news/category/datatable_json",
      columnDefs: [
        { targets: 0, name: "id", searchable: true, orderable: true },
        { targets: 1, name: "name", searchable: true, orderable: true },
        { targets: 2, name: "alias", searchable: true, orderable: true },
        { targets: 3, name: "Action", searchable: false, orderable: false },
      ],
    });
  }
});

// Xóa danh mục tin tức
$(document).ready(function () {
  $("table#news_category_list_datatable").on(
    "click",
    ".action-buttons .delete-action",
    function (event) {
      event.preventDefault();
      var href = $(this).attr("data-href");
      var categoryName = $(this).attr("data-category-name")
        ? '"' + $(this).attr("data-category-name") + '"'
        : "này";
      var deleteNoty = new Noty({
        text:
          "Bạn muốn xóa danh mục: " +
          categoryName +
          " ? Nếu xóa sẽ không thể khôi phục lại được",
        layout: "centerRight",
        buttons: [
          Noty.button(
            "Xóa",
            "btn btn-danger",
            function () {
              window.location.href = href;
            },
            { id: "button1", "data-status": "ok" }
          ),

          Noty.button("Bỏ qua", "btn btn-success", function () {
            deleteNoty.close();
          }),
        ],
      });
      deleteNoty.show();
    }
  );
});

// ======================= TIN TỨC ========================= //

// Datatable Danh sách tin tức
$(document).ready(function () {
  //---------------------------------------------------
  if ($("#news_list_datatable")[0]) {
    var table = $("#news_list_datatable").DataTable({
      language: datatableLanguage,
      processing: true,
      serverSide: true,
      ajax: baseUrl + "/admin/news/datatable_json",
      order: [[0, "asc"]],
      columnDefs: [
        { targets: 0, name: "N.id", searchable: true, orderable: true },
        { targets: 1, name: "N.name", searchable: true, orderable: true },
        { targets: 2, name: "N.alias", searchable: true, orderable: true },
        { targets: 3, name: "NC.name", searchable: true, orderable: true },
        { targets: 4, name: "NC.status", searchable: true, orderable: true },
        {
          targets: 5,
          name: "N.created_at",
          searchable: false,
          orderable: false,
        },
        { targets: 6, name: "Action", searchable: false, orderable: false },
      ],
    });
  }
});

// Xóa tin tức
$(document).ready(function () {
  $("table#news_list_datatable").on(
    "click",
    ".action-buttons .delete-action",
    function (event) {
      event.preventDefault();
      var href = $(this).attr("data-href");
      var newsName = $(this).attr("data-news-name")
        ? '"' + $(this).attr("data-news-name") + '"'
        : "này";
      var deleteNoty = new Noty({
        text:
          "Bạn muốn xóa tin tức: " +
          newsName +
          " ? Nếu xóa sẽ không thể khôi phục lại được",
        layout: "centerRight",
        buttons: [
          Noty.button(
            "Xóa",
            "btn btn-danger",
            function () {
              window.location.href = href;
            },
            { id: "button1", "data-status": "ok" }
          ),

          Noty.button("Bỏ qua", "btn btn-success", function () {
            deleteNoty.close();
          }),
        ],
      });
      deleteNoty.show();
    }
  );
});

// Datatable Danh sách bác sĩ
$(document).ready(function () {
  //---------------------------------------------------
  if ($("#doctor_list_datatable")[0]) {
    var table = $("#doctor_list_datatable").DataTable({
      language: datatableLanguage,
      processing: true,
      serverSide: true,
      ajax: baseUrl + "/admin/doctor/datatable_json",
      order: [[0, "asc"]],
      columnDefs: [
        { targets: 0, name: "id", searchable: false, orderable: true },
        { targets: 1, name: "name", searchable: true, orderable: false },
        { targets: 2, name: "title", searchable: false, orderable: false },
        { targets: 3, name: "role", searchable: false, orderable: false },
        { targets: 4, name: "Action", searchable: false, orderable: false },
      ],
    });
  }
});

// Xóa bác sĩ
$(document).ready(function () {
  $("table#doctor_list_datatable").on(
    "click",
    ".action-buttons .delete-action",
    function (event) {
      event.preventDefault();
      var href = $(this).attr("data-href");
      var doctorName = $(this).attr("data-doctor-name")
        ? '"' + $(this).attr("data-doctor-name") + '"'
        : "này";
      var deleteNoty = new Noty({
        text:
          "Bạn muốn xóa bác sĩ này: " +
          doctorName +
          " ? Nếu xóa sẽ không thể khôi phục lại được",
        layout: "centerRight",
        buttons: [
          Noty.button(
            "Xóa",
            "btn btn-danger",
            function () {
              window.location.href = href;
            },
            { id: "button1", "data-status": "ok" }
          ),

          Noty.button("Bỏ qua", "btn btn-success", function () {
            deleteNoty.close();
          }),
        ],
      });
      deleteNoty.show();
    }
  );
});

// Datatable Danh sách chính sách
$(document).ready(function () {
  //---------------------------------------------------
  if ($("#security_list_datatable")[0]) {
    var table = $("#security_list_datatable").DataTable({
      language: datatableLanguage,
      processing: true,
      serverSide: true,
      ajax: baseUrl + "/admin/security/datatable_json",
      order: [[0, "asc"]],
      columnDefs: [
        { targets: 0, name: "id", searchable: true, orderable: true },
        { targets: 1, name: "name", searchable: true, orderable: true },
        { targets: 2, name: "alias", searchable: true, orderable: true },
        {
          targets: 3,
          name: "created_at",
          searchable: false,
          orderable: false,
        },
        { targets: 4, name: "Action", searchable: false, orderable: false },
      ],
    });
  }
});
// ======================== MENU ======================== //
// Recursive MENU - table
$(document).ready(function () {
  var menu = $("table#menu_list tbody tr");
  var margin = 0;
  $(menu).each(function (index, item) {
    margin = ($(item).attr("data-lv") - 1) * 20;
    $(item).find("td.menu-name").css("padding-left", margin);
  });
});

// Recursive MENU - select option
$(document).ready(function () {
  var menu = $("select.select-menu-parent option");
  var lv = 0;
  $(menu).filter("[data-lv=1]").css("color", "#dc3545");
  $(menu).each(function (index, item) {
    lv = $(item).attr("data-lv") - 1;
    for (var i = 0; i < lv; i++) {
      $(item).prepend("&nbsp;&nbsp;&nbsp;&nbsp;");
    }
    // console.log(item);
  });
});

// Phát sinh vị trí khi chọn menu cha
$(document).ready(function () {
  var menuParentID = $("select[name=select_menu_parent]").attr("data-parent")
    ? $("select[name=select_menu_parent]").attr("data-parent")
    : 0;
  var exceptionID = $("select[name=select_menu_parent]").attr("data-exception")
    ? $("select[name=select_menu_parent]").attr("data-exception")
    : 0;
  var menuType = $("input[name=menu_type]")[0]
    ? $("input[name=menu_type]").val()
    : "";
  // alert(exceptionID); return;

  get_children(menuParentID, exceptionID, menuType);

  $("select[name=select_menu_parent]").change(function () {
    var menuParentID = $(this).val();
    get_children(menuParentID, exceptionID, menuType);
  });

  $(".js-menu-link-selection").click(function (event) {
    $("#add_menu_link_modal").modal("show");
  });
});

function get_children(menuParentID = 0, exceptionID, menuType) {
  var url =
    baseUrl +
    "ajax/get-menu-children-by-parent-id/" +
    menuParentID +
    "/" +
    exceptionID +
    "/" +
    menuType;
  $(".create-menu-form select[name=select_orders]").load(
    url,
    function (response, status, request) {
      // alert('load vi tri thanh cong');
      var orderValue = $("select[name=select_orders]").attr("data-order");
      if (orderValue) {
        $(
          ".create-menu-form select[name=select_orders] option[value=" +
            orderValue +
            "]"
        ).prop("selected", true);
      }
      console.log(response);
    }
  );
}

// Delete menu Xóa menu
$(document).ready(function () {
  $("table#menu_list").on(
    "click",
    ".action-buttons .delete-action",
    function (event) {
      event.preventDefault();
      var href = $(this).attr("data-href");
      var menuName = $(this).attr("data-menu-name")
        ? '"' + $(this).attr("data-menu-name") + '"'
        : "này";
      var deleteNoty = new Noty({
        text:
          "Bạn muốn xóa tin tức: " +
          menuName +
          " ? Nếu xóa sẽ không thể khôi phục lại được",
        layout: "centerRight",
        buttons: [
          Noty.button(
            "Xóa",
            "btn btn-danger",
            function () {
              window.location.href = href;
            },
            { id: "button1", "data-status": "ok" }
          ),

          Noty.button("Bỏ qua", "btn btn-success", function () {
            deleteNoty.close();
          }),
        ],
      });
      deleteNoty.show();
    }
  );
});

$(document).ready(function () {
  // SELECT LINK TYPES
  $("select[name=select_link_type]").change(function (event) {
    var type = $(this).val();
    var params = { link_type: type };
    get_links_for_menu(params);
  });

  // SELECT LINK
  $(".js-result-list").on("click", "li", function (event) {
    var link = $(this).data("short-link");
    $("input[name=link]").val(link);
    $("#add_menu_link_modal").modal("hide");
  });

  // SEARCH LINKS
  $(".js-search-for-link").on("keyup", "input[name=search]", function (event) {
    var keyword = $(this).val();
    var type;
    var params;
    type = $("select[name=select_link_type]").val();
    params = { link_type: type, keyword: keyword };
    get_links_for_menu(params);
  });
});

function get_links_for_menu(params = {}) {
  $.ajax({
    url: baseUrl + "ajax/get-links-for-menu",
    type: "GET",
    data: params,
  })
    .done(function (response) {
      console.log("success");
      response = JSON.parse(response);
      // console.log(params);
      // return;
      var menuLinks = response.menuLinks;
      $(".result-container").removeClass("hide");
      $(".result-list").html(menuLinks);
    })
    .fail(function () {
      console.log("error");
    });
}
