function commentData(post_id) {
    globalPostId = post_id;
    $.ajax({
        url: '{{ route('comments.index') }}',
        type: "GET",
        data: {
            post_id: post_id,
        },
        success: function(data) {
            if (data != "[]") {
                data = JSON.parse(data);
                data.forEach(function(comment) {
                    $(".modal-body").append(
                        "<div class='card-header' style='word-wrap: break-word; ' >" +
                        "<p class='my-0' style='font-size:13px' >" +
                        comment["user"]["first_name"] + " " + comment["user"]["last_name"] +
                        "</p>" +
                        "<p class='' >" + comment['body'] + "</p>" +
                        "</div>"
                    );
                });
            } else {
                $(".modal-body").html("No Comments Yet");
            }
        }
    });
}

$(".close").click(function() {
    $(".modal-body").html("");
    $("#commentErr").html("");
});

$("#createComment").click(function() {
    let body = $("#body").val();
    if (body == "")
        $("#commentErr").removeClass().addClass("text-danger").html("required");
    else {
        $.ajax({
            url: "{{ route('comments.store') }}",
            type: "POST",
            data: {
                _token: "{{ csrf_token() }}",
                body: body,
                post_id: globalPostId,
            },
            success: function(data) {
                if (data) {
                    $(".modal-body").html("");
                    commentData(globalPostId);
                    $("#commentErr").removeClass().addClass("text-success").html("success");
                    $("#body").val("");
                    $("#comment" + globalPostId).text(parseInt($("#comment" + globalPostId)
                        .text()) + 1);
                }
            }
        });
    }
});