$('body').on('click', 'a[href*="/product/buy"]', function(e) {
    e.preventDefault();

    var productId = $(this).data('id');
    var gamename = $('#product_'+productId).text();

    swal({
        title: "Заказ игры<br>"+gamename,
        showCancelButton: true,
        confirmButtonColor: '#619c34',
        confirmButtonText: 'Заказать',
        cancelButtonText: 'Отмена',
        html:
        '<input id="swal-input-name" class="swal2-input" required>' +
        '<input id="swal-input-email" class="swal2-input" required>',
        preConfirm: function () {
            return new Promise(function (resolve) {
                resolve([
                    $('#swal-input-name').val(),
                    $('#swal-input-email').val()
                ])
            })
        },
        onOpen: function () {
            $('#swal-input-name').val("").focus();
            $('#swal-input-email').val("");
        }
    }).then(
        result => {
        if (result.value) {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            url: '/orders/new',
            type: 'POST',
            dataType: 'json',
            data: {
                product_id: productId,
                buyer_name: result.value[0],
                buyer_email: result.value[1],
            }
        })
            .done(function (data) {
                if (data.result == 'success') {
                    swal({
                        title: 'Спасибо за заказ!',
                        text: 'Мы свяжемся с Вами по e-mail',
                        type: 'success',
                        confirmButtonColor: '#619c34',
                        confirmButtonText: 'OK'
                    });
                } else {
                    swal({
                        type: 'error',
                        title: 'Произошла ошибка',
                        text: data.errorMessage
                    }).then((result) => {
                        window.location.reload();
                })
                }
            })
            .fail(function () {
                // Здесь просто сообщение об ошибке
                swal({
                    type: 'error',
                    title: 'Упс...',
                    text: 'Что-то пошло не так'
                }).then((result) => {
                    window.location.reload();
            })
            });
        }
    });
});
