// alert("form sunmit toastr file called");


$("#formSubmit").validate({
    rules: {
        confirmPassword:{
            equalTo:"#password",
            minlength:4,
        }
    },
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
            enctype: "maltipart/form-data",
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
                    $("#formSubmit").trigger("reset");
                }
            },
            error: function () {
                $("#submitBtn").show();
                $("#loadingBtn").hide();
                Command: toastr[data.icon](data.desc, data.title);
            },
        });
    },
});
