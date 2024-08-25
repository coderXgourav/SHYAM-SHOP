// POPUP FUNCTION
function popup(msg) {
    Toastify({
        text: msg,
        duration: 3000,
        newWindow: true,
        close: true,
        gravity: "top", // `top` or `bottom`
        position: "center", // `left`, `center` or `right`
        stopOnFocus: true, // Prevents dismissing of toast on hover
        style: {
            background: "rgb(0 140 255)",
        },
    }).showToast();
}

// POPUP FUNCTION

$("#formSubmit").validate({
    rules: {},
    messages: {},
    submitHandler: function (form, event) {
        event.preventDefault();
        let url = $("#url").val();
        let dataType = $("#dataType").val();
        $.ajax({
            url: url,
            method: dataType,
            data: new FormData(form),
            dataType: "JSON",
            contentType: false,
            processData: false,
            beforeSend: function () {
                $("#submitBtn").hide();
                $("#loadingBtn").show();
            },
            success: function (data) {
                $("#submitBtn").show();
                $("#loadingBtn").hide();

                Command: toastr[data.icon](data.desc, data.title);

                if (data.status) {
                    window.location = "/seller/dashboard";
                }
            },
            error: function () {
                $("#submitBtn").show();
                $("#loadingBtn").hide();
               Command: toastr["error"]("Something wrong , please try again later", "Error");
            },
        });
    },
});
