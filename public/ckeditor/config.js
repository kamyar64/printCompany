/**
 * @license Copyright (c) 2003-2017, CKSource - Frederico Knabben. All rights reserved.
 * For licensing, see LICENSE.md or http://ckeditor.com/license
 */

CKEDITOR.editorConfig = function( config ) {
	// Define changes to default configuration here.
	// For complete reference see:
	// http://docs.ckeditor.com/#!/api/CKEDITOR.config

	// The toolbar groups arrangement, optimized for two toolbar rows.
	

	// Remove some buttons provided by the standard plugins, which are
	// not needed in the Standard(s) toolbar.
	config.removeButtons = 'Underline,Subscript,Superscript';
	config.language = 'fa';
	config.extraPlugins = 'panelbutton';
	config.extraPlugins = 'justify';
	config.extraPlugins = 'colorbutton';
	// Set the most common block elements.
	config.format_tags = 'p;h1;h2;h3;pre';
	config.justifyClasses = [ 'AlignLeft', 'AlignCenter', 'AlignRight', 'AlignJustify' ]

	// Simplify the dialog windows.
	config.removeDialogTabs = 'image:advanced;link:advanced';
	config.filebrowserBrowseUrl = '/printCompany/public/ckeditor/kcfinder/browse.php?opener=ckeditor&type=files';

    config.filebrowserImageBrowseUrl = '/printCompany/public/ckeditor/kcfinder/browse.php?opener=ckeditor&type=images';

    config.filebrowserFlashBrowseUrl = '/printCompany/public/ckeditor/kcfinder/browse.php?opener=ckeditor&type=flash';

    config.filebrowserUploadUrl = '/printCompany/public/ckeditor/kcfinder/upload.php?opener=ckeditor&type=files';

    config.filebrowserImageUploadUrl = '/printCompany/public/ckeditor/kcfinder/upload.php?opener=ckeditor&type=images';

    config.filebrowserFlashUploadUrl = '/printCompany/public/ckeditor/kcfinder/upload.php?opener=ckeditor&type=flash';
    config.filebrowserFlashUploadUrl = '/printCompany/public/ckeditor/kcfinder/upload.php?opener=ckeditor&type=flash';
	// protect <anytag class="preserve"></anytag>
	config.removeButtons = 'Save,Templates,Flash,Smiley,SpecialChar,PageBreak,Iframe,CreateDiv,Textarea,TextField,Radio,Checkbox,Form,Select,Button,ImageButton,HiddenField,Scayt,Templates,Styles,Font,About';


};
CKEDITOR.config.protectedSource.push( /<([\S]+)[^>]*class="preserve"[^>]*>.*<\/\1>/g );
// protect <anytag class="preserve" /><
CKEDITOR.config.protectedSource.push( /<[^>]+class="preserve"[^>\/]*\/>/g );
CKEDITOR.config.height = 300;
CKEDITOR.config.toolbarCanCollapse = true;