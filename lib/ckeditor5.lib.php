<?php
if (!defined('_GNUBOARD_')) exit;

/**
 * CKEditor 5 Library for Gnuboard 4
 * 
 * DESIGN PHILOSOPHY:
 * 1. PHP 5.6 Compatible (using traditional function syntax).
 * 2. PHP 8.4 Ready (avoiding deprecated features like dynamic properties or undefined variable usage).
 * 3. Easy to Upgrade: Legacy PHP 5.6 patterns are marked with [LEGACY:PHP5.6] comments.
 */

/**
 * Loads the CKEditor 5 script from CDN.
 * 
 * @return string HTML script tag
 */
function ckeditor5_load() {
    // Current Stable Classic Build
    return '<script src="https://cdn.ckeditor.com/ckeditor5/44.1.0/classic/ckeditor.js"></script>';
}

/**
 * Renders the CKEditor 5 instance.
 * 
 * @param string $id The ID/Name of the textarea
 * @param string $content Initial content
 * @param string $width CSS width (e.g., 100%)
 * @param string $height CSS height (e.g., 300px)
 * @return string HTML/JS for the editor
 */
function ckeditor5_render($id, $content = '', $width = '100%', $height = '300px') {
    // [LEGACY:PHP5.6] Using standard htmlspecialchars. In PHP 8.1+, default is ENT_QUOTES | ENT_SUBSTITUTE | ENT_HTML401.
    $escaped_content = htmlspecialchars((string)$content, ENT_QUOTES);
    
    $html = '<div class="ck-editor-wrapper" style="width:'.$width.';">';
    $html .= '<textarea name="'.$id.'" id="'.$id.'" style="display:none;">'.$escaped_content.'</textarea>';
    $html .= '</div>';
    
    // Inline script to initialize the editor
    $html .= "
    <script type='text/javascript'>
    (function() {
        const editorElement = document.querySelector('#{$id}');
        if (!editorElement) return;

        ClassicEditor
            .create(editorElement, {
                language: 'ko',
                toolbar: [
                    'heading', '|', 'bold', 'italic', 'link', 'bulletedList', 'numberedList', 
                    '|', 'outdent', 'indent', '|', 'uploadImage', 'blockQuote', 'insertTable', 'mediaEmbed', 
                    'undo', 'redo'
                ],
                simpleUpload: {
                    // The URL that the images will be uploaded to.
                    uploadUrl: '{$g4[url]}/home/ckeditor5_upload.php'
                }
            })
            .then(editor => {
                // Attach to window object for global access (syncing etc.)
                window['editor_' + '{$id}'] = editor;
                
                // Set height via view change
                editor.editing.view.change(writer => {
                    writer.setStyle('min-height', '{$height}', editor.editing.view.document.getRoot());
                });
            })
            .catch(error => {
                console.error('CKEditor 5 Error:', error);
            });
    })();
    </script>";
    
    return $html;
}

/**
 * Sync function for Gnuboard form validation.
 * In legacy Gnuboard, many forms rely on manual sync before submit.
 * 
 * @param string $id The editor ID to sync
 * @return string JS code snippet
 */
function ckeditor5_sync($id) {
    return "if (window['editor_' + '{$id}']) { document.querySelector('#{$id}').value = window['editor_' + '{$id}'].getData(); }";
}

// [LEGACY:PHP5.6] Support for global paths if needed, though CDN is preferred.
// If local install is ever needed, $g4['editor_path'] can be used here.
?>
