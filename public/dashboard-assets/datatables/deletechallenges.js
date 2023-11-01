function deleteitem(id,name){
    var customerId = id;
    var customerName =name;
    Swal.fire({
        text:
            "Are you sure you want to delete " +
            customerName +
            "?",
        icon: "warning",
        showCancelButton: true,
        buttonsStyling: false,
        confirmButtonText: "Yes, delete!",
        cancelButtonText: "No, cancel",
        customClass: {
            confirmButton: "btn fw-bold btn-danger",
            cancelButton:
                "btn fw-bold btn-active-light-primary",
        },
    }).then(function (result) {
        if (result.value) {
            $.ajax({
                method: "POST",
                headers: {
                    "X-CSRF-TOKEN": $(
                        'meta[name="csrf-token"]'
                    ).attr("content"),
                },
                url: route + "/" + customerId,
                data: {
                    _token: csrfToken,
                    _method: "DELETE",
                    id: customerId,
                },
            })
                .done(function (res) {
                    // Simulate delete request -- for demo purpose only
                    Swal.fire({
                        text:
                            "You have deleted " +
                            customerName +
                            "!.",
                        icon: "success",
                        buttonsStyling: false,
                        confirmButtonText: "Ok, got it!",
                        customClass: {
                            confirmButton:
                                "btn fw-bold btn-primary",
                        },
                    }).then(function () {
                        window.location.reload();
                    });
                })
                .fail(function (res) {
                    console.log(res);
                    Swal.fire({
                        text: res.responseJSON.message,
                        icon: "error",
                        buttonsStyling: false,
                        confirmButtonText: "Ok, got it!",
                        customClass: {
                            confirmButton:
                                "btn fw-bold btn-primary",
                        },
                    });
                });
        } else if (result.dismiss === "cancel") {
            Swal.fire({
                text: customerName + " was not deleted.",
                icon: "error",
                buttonsStyling: false,
                confirmButtonText: "Ok, got it!",
                customClass: {
                    confirmButton: "btn fw-bold btn-primary",
                },
            });
        }
    });
};

