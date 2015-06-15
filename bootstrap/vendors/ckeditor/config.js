/**
 * @license Copyright (c) 2003-2013, CKSource - Frederico Knabben. All rights reserved.
 * For licensing, see LICENSE.html or http://ckeditor.com/license
 */

CKEDITOR.editorConfig = function( config ) {
	// Define changes to default configuration here. For example:
	// config.language = 'fr';
	// config.uiColor = '#AADC6E';
    // config.filebrowserBrowseUrl = '/browser/browse.php';
    // config.filebrowserImageBrowseUrl = '/browser/browse.php?type=Images';
    // config.filebrowserUploadUrl = '/uploader/upload.php';
    // config.filebrowserImageUploadUrl = '/uploader/upload.php?type=Images';
    // config.filebrowserBrowseUrl = "http://localhost/template_web/backend/Bootstrap-Admin-Theme-master/vendors/ckeditor/plugins/kfm"

    config.filebrowserBrowseUrl = 'http://localhost/geosolution/bootstrap/vendors/ckeditor/plugins/ckfinder/ckfinder.html';
    config.filebrowserImageBrowseUrl = 'http://localhost/geosolution/bootstrap/vendors/ckeditor/plugins/ckfinder/ckfinder.html?Type=Images';
    config.filebrowserFlashBrowseUrl = 'http://localhost/geosolution/bootstrap/vendors/ckeditor/ckeditor/plugins/ckfinder/ckfinder.html?Type=Flash';
    config.filebrowserUploadUrl = 'http://localhost/geosolution/bootstrap/vendors/ckeditor/plugins/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files';
    config.filebrowserImageUploadUrl = 'http://localhost/geosolution/bootstrap/vendors/ckeditor/plugins/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images';
    config.filebrowserFlashUploadUrl = 'http://localhost/geosolution/bootstrap/vendors/ckeditor/plugins/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Flash';
    config.extraPlugins = 'youtube';
    config.youtube_width = '640';
    config.youtube_height = '480';

    config.allowedContent = true;
};
