let confirmfunction = (id, url) => {
    Swal.fire({
        title: "Are you sure?",
        text: "You won't be able to revert this!",
        icon: "warning",
        showCancelButton: true,
        confirmButtonColor: "#3085d6",
        cancelButtonColor: "#d33",
        confirmButtonText: "Yes, delete it!",
    }).then((result) => {
        if (result.isConfirmed) {
            $.ajax({
                url: url,
                method: "GET",
                data: { id: id },
                dataType: "JSON",
                success: function (data) {
                    Swal.fire({
                        title: data.title,
                        text: data.desc,
                        icon: data.icon,
                    });
                    if (data.status) {
                        $("#" + id).hide();
                    }
                },
                error: function () {
                    Swal.fire({
                        title: "Technical Issue !",
                        text: "Something wrong , please try again later",
                        icon: "error",
                    });
                },
            });
        }
    });
};
