import $ from 'jquery';
window.$ = window.jQuery = $;
import slugify from 'slugify';

$(function(){

    $(document).on('keydown', 'input[name=name]', function(e) {
        let slug = slugify($(this).val(), {
            replacement: '-',    // replace spaces with replacement
            remove: null,        // regex to remove characters
            lower: true          // result in lower case
        });
        $('input[name=slug]').val(slug);
    });

});
