$(document).ready(function() {
    function sendLikeRequest(button, value) {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        })

        var post_id = button.val();
        var like_url = value == 1 ? 'like' : 'unlike';
        var formData = {
            like_value: value
        }
        
        $.ajax({
            type: 'POST',
            url: '/posts/' + post_id + '/' + like_url,
            data: formData,
            dataType: 'json',
            success: function (data) {
                button.parent().parent().parent().html(data);
            },
            error: function (data) {
                console.log('Error:', data);
            }
        });
    }

    $(document).on("click", ".btn-like", function (e) {
        e.preventDefault();
        sendLikeRequest($(this), 1);
    });

    $(document).on("click", ".btn-unlike", function (e) {
        e.preventDefault();
        sendLikeRequest($(this), 0);
    });
});