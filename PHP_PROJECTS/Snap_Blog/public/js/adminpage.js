$(document).ready(function () {
  $("#filterdatabtn").click(function () {
    let startrange = document.getElementById("startrange").value;
    let endrange = document.getElementById("endrange").value;

    if (startrange != "" && endrange != "") {
      $.ajax({
        type: "GET",
        url: "getStoryDataByDate.php",
        data: { start_date: startrange, end_date: endrange },
        success: function (response) {
          getStoryDataByDate(JSON.parse(response));
        },
      });

      // $.get("getStoryDataByDate.php?start_date=" + startrange + "&end_date=" + endrange , function(data , status){
      //   if(status == 'success'){
      //     getStoryDataByDate(JSON.parse(data));
      //   }
      // })
      $.ajax({
        type: "POST",
        url: "getdataInRange.php",
        data: { startrange: startrange, endrange: endrange },
        success: function (response) {
          data = JSON.parse(response);
          $("#totalstorycount").text("Total Story: " + data["story_count"]);
          $("#totalusercount").text("Total User: " + data["user_count"]);
          $("#totallikecount").text("Likes: " + data["like_count"]);
          $("#totalcommentcount").text("Comments: " + data["comment_count"]);
        },
      });

      // $.get("getdataInRange.php?startrange=" + startrange + "&endrange=" + endrange , function(data , status){
      //   if(status == 'success'){
      //     data  = JSON.parse(data);
      //     $("#totalstorycount").text("Total Story: " + data['story_count']);
      //     $("#totalusercount").text("Total User: " + data['user_count']);
      //     $("#totallikecount").text("Likes: " + data['like_count']);
      //     $("#totalcommentcount").text("Comments: " + data['comment_count']);
      //   }
      // })
    }
  });
});

function getStoryDataByDate(storyDataArray) {
  containerdiv = $("<div>", {
    id: "storydivhide",
    class: "container",
    style: "display:grid ; grid-template-columns:25% 25% 25% 25%",
  });

  $("#storydivhide").replaceWith(containerdiv);

  for (let i = 0; i < storyDataArray.length; i++) {
    innerdiv = $("<div>", {
      class: "m-3 card shadow-lg bg-white",
      style: "",
    });

    imagediv = $("<div>", {
      class: "box-shadow",
    });

    imgtag = $("<img>", {
      class: "card-img-top",
      style: "height:10rem ; object-fit:fill",
      src: "../../upload/" + storyDataArray[i]["image"][0]["image"],
    });

    $(imagediv).append(imgtag);

    textdiv = $("<div>", {
      class: "m-2 text-center",
    });

    innertextdiv = $("<div>", {
      class: "card-body",
      style: "min-height:6rem ; text-align:justify",
    });

    htag1 = $("<h6>", {
      style: "font-size:12px",
      text: "Title : " + storyDataArray[i]["story_title"],
    });

    htag2 = $("<h6>", {
      style: "font-size:12px",
      text: "Category : " + storyDataArray[i]["category_title"],
    });

    $(innertextdiv).append(htag1);
    $(innertextdiv).append(htag2);
    $(textdiv).append(innertextdiv);

    btndiv = $("<div>", {
      class: "btn-group mb-2 ",
    });
    atag1 = $("<a>", {
      class: "btn btn-sm btn-outline-primary",
      text: "view",
      href: "adminstoryview.php?story_id=" + storyDataArray[i]["story_id"],
    });
    atag2 = $("<a>", {
      class: "btn btn-sm btn-outline-secondary",
      text: "update",
      href: "updateStoryForm.php?story_id=" + storyDataArray[i]["story_id"],
    });
    atag3 = $("<a>", {
      class: "btn btn-sm btn-outline-danger",
      text: "delete",
      href: "deleteStory.php?story_id=" + storyDataArray[i]["story_id"],
    });
    $(btndiv).append(atag1);
    $(btndiv).append(atag2);
    $(btndiv).append(atag3);
    $(textdiv).append(btndiv);

    $(innerdiv).append(imagediv);
    $(innerdiv).append(textdiv);

    $(containerdiv).append(innerdiv);
  }
}
