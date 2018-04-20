$('body').on('click', 'a[href*="/product/buy"]', function(e) {
    e.preventDefault();

    var productId = $(this).data('id');
    var gamename = $('#product_'+productId).text();

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    var userName = '';
    var userEmail = '';

    $.ajax({
        url: '/user/info',
        type: 'POST',
        dataType: 'json',
        data: {}
    }).done(function (data) {
        userName = data.name;
        userEmail = data.email;
    }).then( result => {
        swal({
            title: "Заказ игры",
            showCancelButton: true,
            confirmButtonColor: '#619c34',
            confirmButtonText: 'Заказать',
            cancelButtonText: 'Отмена',
            html:
            '<h2 style="margin-top: 0; margin-bottom: 20px; color: #F44336;">' + gamename + '</h2>' +
            '<label>Ваше имя: <input id="swal-input-name" class="swal2-input" placeholder="Ваше имя" required></label>' +
            '<label>Ваш e-mail: <input id="swal-input-email" class="swal2-input" placeholder="Ваше e-mail" required></label>',
            preConfirm: function () {
                return new Promise(function (resolve) {
                    resolve([
                        $('#swal-input-name').val(),
                        $('#swal-input-email').val()
                    ])
                })
            },
            onOpen: function () {
                $('#swal-input-name').val(userName).focus();
                $('#swal-input-email').val(userEmail);
            }
        }).then(
            result => {
                if (result.value) {
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
                                });
                            }
                        })
                        .fail(function () {
                            swal({
                                type: 'error',
                                title: 'Упс...',
                                text: 'Что-то пошло не так'
                            });
                        });
                }
            })
    })
});
