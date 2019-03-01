import $ from 'jquery';
window.$ = window.jQuery = $;

const password = {
    toggle: function(checked) {
        if (checked) {
            password.show();
        } else {
            password.hide();
        }
    },
    show: function() {
        $('.change-password').removeClass('d-none');
        $('#old-password, #new-password, #new-password-confirm').removeAttr('disabled');
    },
    hide: function() {
        $('.change-password').addClass('d-none');
        $('#old-password, #new-password, #new-password-confirm').attr('disabled', true);
    }
}

$(function(){

    password.toggle($('#change-password').attr('checked'));

    $(document).on('click', '#change-password', function() {
        password.toggle(this.checked);
    });

});
