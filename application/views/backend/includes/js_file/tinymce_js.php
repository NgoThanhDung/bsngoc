<script>
	$(document).ready(function() {
		if ($(".tinymce_content").length > 0) {
			tinymce.init({

				selector: "textarea.tinymce_content",
				theme: "modern",
				height: 200,
				fontsize_formats: "8pt 10pt 12pt 14pt 18pt 24pt 36pt",
				plugins: [
					"advlist autolink link image lists charmap print preview hr anchor pagebreak spellchecker",
					"searchreplace wordcount visualblocks visualchars code fullscreen insertdatetime media nonbreaking",
					"save table contextmenu directionality emoticons template paste textcolor ",
					"responsivefilemanager"
				],
				toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image | print preview media fullpage | forecolor backcolor| responsivefilemanager | sizeselect | fontsizeselect",
				// fontselect
				formats: {
					// Changes the default format for h1 to have a class of heading
					h1: {
						block: 'h1',
						classes: 'heading'
					},
					h2: {
						block: 'h2',
						classes: 'heading'
					},
					h3: {
						block: 'h3',
						classes: 'heading'
					},
					h4: {
						block: 'h4',
						classes: 'heading'
					},
					h5: {
						block: 'h5',
						classes: 'heading'
					}
				},
				style_formats: [{
						title: 'H1',
						format: 'h1'
					},
					{
						title: 'H2',
						format: 'h2'
					},
					{
						title: 'H3',
						format: 'h3'
					},
					{
						title: 'H4',
						format: 'h4'
					},
					{
						title: 'H5',
						format: 'h5'
					},
				],

				relative_urls: false,
				filemanager_title: "Angel Media - File Manager",
				external_filemanager_path: baseUrl + "public/plugins/filemanager/",
				external_plugins: {
					"filemanager": baseUrl + "public/plugins/filemanager/plugin.min.js"
				}
			});
		}
	});
</script>