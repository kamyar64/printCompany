/**
 * @license Copyright (c) 2003-2016, CKSource - Frederico Knabben. All rights reserved.
 * For licensing, see LICENSE.md or http://ckeditor.com/license
 */


CKEDITOR.editorConfig = function( config ) {
	config.language = 'fa';
	//config.uiColor = '#71b6f9 ';
	config.toolbarGroups = [
		{ name: 'document', groups: [ 'mode', 'document', 'doctools' ] },
		{ name: 'clipboard', groups: [ 'clipboard', 'undo' ] },
		{ name: 'editing', groups: [ 'find', 'selection', 'spellchecker', 'editing' ] },
		{ name: 'basicstyles', groups: [ 'basicstyles', 'cleanup' ] },
		{ name: 'paragraph', groups: [ 'list', 'indent', 'blocks', 'align', 'bidi', 'paragraph' ] },
		{ name: 'links', groups: [ 'links' ] },
		{ name: 'insert', groups: [ 'insert' ] },
		{ name: 'styles', groups: [ 'styles' ] },
		{ name: 'colors', groups: [ 'colors' ] },
		{ name: 'tools', groups: [ 'tools' ] },
		{ name: 'others', groups: [ 'others' ] },
	];

	config.removeButtons = 'Save,Templates,Paste,PasteFromWord,Image,Flash,Smiley,SpecialChar,PageBreak,Iframe,CreateDiv,Textarea,TextField,Radio,Checkbox,Form,Select,Button,ImageButton,HiddenField,Scayt,Templates,Styles,Font,About';
/*    config.fontSize_defaultLabel = '20';
    CKEDITOR.on( 'instanceReady', function( ev ) {
        ev.editor.setData('<span style="font-size: 20px; text-align: justify">&shy;</span>');
    });
    config.extraPlugins = 'justify';*/
};