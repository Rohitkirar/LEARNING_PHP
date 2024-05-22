function like(post_id) {

    let like_id = $("#" + post_id).val();

    if (like_id == "") like_id = null;

    $.ajax({
        url: "{{ route('likes.store') }}",
        type: "POST",
        data: {
            _token: "{{ csrf_token() }}",
            like_id: like_id,
            post_id: post_id,
        },
        success: function(data) {

            if (data['res']) {
                $("#" + post_id).children('i').removeClass("bi bi-heart fs-2").addClass(
                    "bi-heart-fill fs-2 text-danger");
                $("#" + post_id).val(data['like_id']);
                $("#like" + post_id).text(parseInt($("#like" + post_id).text()) + 1);
            } else {
                $("#" + post_id).children('i').removeClass("bi-heart-fill fs-2 text-danger").addClass(
                    "bi bi-heart fs-2");
                $("#like" + post_id).text(parseInt($("#like" + post_id).text()) - 1);
            }
        }
    });
}
