jQuery(document).ready(function ($) {

    $(".contact-us__form").submit(function () {
        var str = $(this).serialize();

        $.ajax({
            type: "POST",
            url: "vendor/action/contact.php",
            data: str,
            success: function (msg) {
                if (msg == 'OK') {
                    result = '<p>Ваше сообщение отправлено!</p>';
                    $(".contact-us__fields").hide();
                } else {
                    result = msg;
                }
                $('.contact-us__note').html(result);
            }
        });
        return false;
    });
});