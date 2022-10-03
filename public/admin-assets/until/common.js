function actionDelete(event) {
    event.preventDefault(); //cat default reload
    let urlRequest = $(this).data('url');
    let that = $(this);

    Swal.fire({
        title: 'Are you sure?',
        text: "You won't be able to revert this!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, delete it!'
    }).then((result) => {
        if (result.isConfirmed) {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                type: 'POST',
                url: urlRequest,
                dataType: "JSON",
                success: function (data) {
                    location.reload();
                },
            });

        }
    })


    // Swal.confirm({
    //     title: 'THÔNG BÁO!',
    //     html:   '<h5>Bạn muốn xóa? </h5>' +
    //         '<span>Sau khi xóa sẽ không thể lấy lại!</span>',
    //     ok: function () {
    //         $.ajax({
    //             type: 'GET',
    //             url: urlRequest,
    //             success: function (data) {
    //             },
    //         });
    //     },
    //     cancel: function () {
    //     },
    // });

}

