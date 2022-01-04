function sendto(urlparam) {
    // alert(urlparam);
    window.location = "/coin-number-" + urlparam;
}

function coinmarket(coinmarketurl) {
    window.location = coinmarketurl;
}

function coingeko(coiungekourl) {
    window.location = coiungekourl;
}

function addtowish(wishlistNo) {
    alert(wishlistNo + " => Your Wish No");
}

// thisyear

const d = new Date();
let year = d.getFullYear();
$(".thisyear").html(year);


$(document).ready(function () {
    $('[data-toggle="tooltip"]').tooltip();
});




// send to top button show hide on page scroll 
$(window).scroll(function () {
    if ($(this).scrollTop() >= 700) { // this refers to window
        $("#sendTop").addClass("opacityFull");
    } else {
        $("#sendTop").removeClass("opacityFull");
    }
});



var previewProfile1 = document.querySelector("#coinLogo");
var imgSizeChecker = document.querySelector(".imgSizeChecker");

function showProfile(event) {
    if (event.target.files.length > 0) {
        var src = URL.createObjectURL(event.target.files[0]);
        // var ImgError = document.querySelector(".ImgError");

        var size = event.target.files[0].size;
        var sizeInKb = size / 1024;
        if (sizeInKb > 5000) {
            alert("Image Size is Larger than 5000KB, use a 5000KB image...");
            // ImgError.style.display = "block";
            customProfileFileInput1.value = "";
            previewProfile1.src = "";
            previewProfile1.style.display = null;
        } else if (sizeInKb < 5000) {
            imgSizeChecker.src = src;
            // ImgError.style.display = null;
            // previewProfile1.style.display = "block";


            setTimeout(() => {

                var checkSize = document.querySelector(".imgSizeChecker");
                var realWidth = checkSize.naturalWidth;
                var realHeight = checkSize.naturalHeight;
                console.log("Original width=" + realWidth + ", " + "Original height=" + realHeight);

                if ((realWidth <= 387) && (realHeight <= 387)) {
                    previewProfile1.src = src;
                }
                else {
                    alert("Use highest 387 X 387 Image");
                    $("#addProfileImg").val('');
                }

            }, 100);

        }
    }
}








// click 
$(".cmn_chain_btn").click(function () {
    $('.cmn_chain_btn').removeClass('btn-info');
    $('.cmn_chain_btn').addClass('btn-outline-info');
    $(this).addClass('btn-info');

    $chaindataId = $('.cmn_chain_btn.btn-info').attr('data-id');
    $coindataId = $('.cmn_coin_btn.btn-light').attr('data-id');

    window.location = "/chain=" + $chaindataId + "/coin=" + $coindataId + "#particulars";
});


$(".cmn_coin_btn").click(function () {
    $('.cmn_coin_btn').removeClass('btn-light');
    $('.cmn_coin_btn').addClass('btn-outline-light');
    $(this).addClass('btn-light');

    $chaindataId = $('.cmn_chain_btn.btn-info').attr('data-id');
    $coindataId = $('.cmn_coin_btn.btn-light').attr('data-id');

    window.location = "/chain=" + $chaindataId + "/coin=" + $coindataId + "#particulars";
});



function copyDivToClipboard(elem) {
    var range = document.createRange();
    range.selectNode(document.getElementById("copyTxt"));
    window.getSelection().removeAllRanges();
    window.getSelection().addRange(range);
    document.execCommand("copy");
    window.getSelection().removeAllRanges();
    $(".showcopytxt").removeClass("d-none");
    setTimeout(() => {
        $(".showcopytxt").addClass("d-none");
    }, 2000);
}



$("#updateLaunchDate").click(function () {
    $("#updateLaunchDate").attr('type', 'date');
    $("#updateLaunchDate").removeAttr('value');
});



function reload() {
    document.location.reload();
}



function searchFunc() {

    $("#results").html("");
    let srchVal = $("#searchInput").val();

    console.log(srchVal);

    $.ajax({
        url: "/search-results-" + srchVal,
        async: false,
        success: function (result) {
            console.log(result.resp);
            $("#showSrchResults").modal("show");

            if ((result.resp) == '') {
                $("#results").html("<h1 class='text-center text-light'> No Data Found </h1>");
            } else {
                $.each(result.resp, function (key, item) {
                    $("#results").append('\
                    <div class= "result_line"> \
                    <img src="'+ (item.coin_img) + '" alt="" class="resultImg"> \
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; \
                        <a href="/coin-number-11015'+ (item.id) + '" target = "_blank" > \
                        <h4 class="yellow"> \
                            '+ (item.coin_name) + ' || <span class="red uppercase"> ' + (item.network_chain) + '</span> \
                        </h4> \
                        </a > \
                    </div> \
                        ');

                });
            }

        }
    });


}





