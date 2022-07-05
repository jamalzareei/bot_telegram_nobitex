$(() => {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    // $('ul.menu-content a').each()

    $("ul.menu-content a").each(function(index) {
        // console.log(index + ": " + $(this).text());
        if (window.location.href === $(this).attr('href')) {
            $(this).parent().addClass('active hhhh');
        }
    });

    $('.bootstrap-tagsinput input').on('keypress', function(e) {
        if (e.keyCode == 13) {
            e.keyCode = 188;
            e.preventDefault();
        };
    });

    $(document).on('click', '.icon-rotate-cw', function() {
        $(this).parents('.card').find('input').val('')
        $(this).parents('.card').find('select option[value=""]').prop('selected', true)

        var table = $('.data-list-view').DataTable();
        if (table) table.draw();

    })

    $( ".price" ).each(function( index ) {
        let value = $( this ).val();
        $( this ).prop('autocomplete', 'off');

        var newNode = document.createElement('div');
        newNode.className = 'format-element-price-'+index+' text-bold-700 text-success';

        // Get the reference node
        var referenceNode = $(document).find('.price')[index];

        // Num2persian(Number(value) / 10)

        newNode.innerHTML = "(" +(new Intl.NumberFormat().format(Number(value) / 10)) + ") تومان "
        // Insert the new node before the reference node
        referenceNode.after(newNode);
            
    });

    $(document).on('keyup', '.price', function(e) {
        let value = e.target.value;
        let index= $( ".price" ).index( this );
        
        console.log(index)
        // Create a new element
        if($('.format-element-price-'+index).length < 1){

            var newNode = document.createElement('div');
            newNode.className = 'format-element-price-'+index+' text-bold-700 text-success';
    
            // Get the reference node
            var referenceNode = $(document).find('.price')[index];
    
            newNode.innerHTML = "(" +(new Intl.NumberFormat().format(Number(value) / 10)) + ") تومان "
            // Insert the new node before the reference node
            referenceNode.after(newNode);
        }
        
        // $('.format-element-price-'+index).text(new Intl.NumberFormat().format(value) + " تومان ")
        $('.format-element-price-'+index).text("(" +(new Intl.NumberFormat().format(Number(value) / 10)) + ") تومان " )
    });

    function InnerChange(id){
        var element = document.getElementById(id);
        var value = element.value;
        document.getElementById('inner-text').innerHTML = value;
    }


    $(document).on('submit', '.ajaxForm', function(e) {
        e.preventDefault();
        let url = $(this).attr('action');
        let type = $(this).attr('method');
        let data = $(this).serialize();
        let this_ = $(this);

        $.ajax({
            url: url,
            type: type,
            url: url,
            data: data,
            beforeSend: function() {
                $('.help-block').text('');
                this_.find('button[type="submit"] i').removeClass().addClass('fa fa-spinner fa-spin');
            },
            success: function(response) {
                console.info(response);

                if (response.status == 'success'){
                    this_.find('button[type="submit"] i').removeClass().addClass('fa fa-check');
                    this_.find('button[type="submit"]').addClass('btn-success');
                }

                if (response.status == 'error'){
                    this_.find('button[type="submit"] i').removeClass().addClass('fa fa-refresh');
                    this_.find('button[type="submit"]').addClass('btn-danger');
                }

                messageToast(response.title, response.message, response.status, 5000)

                if (response.autoRedirect && response.autoRedirect !== '') {
                    window.location.href = response.autoRedirect
                }

                if (response.dataLoad && response.dataLoad !== '' && $('#load-data-ajax').length > 0) {
                    $('#load-data-ajax').html(response.dataLoad)
                }

                if (response.dataLoad2 && response.dataLoad2 !== '' && $('#load-data-2-ajax').length > 0) {
                    $('#load-data-2-ajax').html(response.dataLoad2)
                }

                if (response.fullname && response.fullname !== '' && $('.load-fullname').length > 0) {
                    $('.load-fullname').html(response.fullname)
                }

                if (response.avatar && response.avatar !== '' && $('.load-avatar').length > 0) {
                    $('.load-avatar').attr('src', response.avatar)
                }

                var item = $('#item_id');
                if (item.length) {
                    var itemid = item.val();
                }


                var dataTable = $('table.data-list-view');
                if (dataTable.length > 0 && response.rowInsert) {
                    var dt = dataTable.DataTable();
                    dt.row.add(
                        response.rowInsert
                    ).draw(false);
                }

            },
            error: function(request, status, error) {
                // this_.find('button[type="submit"]').html(' <i class="fa fa-times"></i> تلاش دوباره');
                this_.find('button[type="submit"] i').removeClass().addClass('fa fa-refresh');
                json = $.parseJSON(request.responseText);

                $.each(json.errors, function(key, value) {
                    $('.error-' + key).text(value);
                });
                messageToast('', 'خطاهای پیش آمده را رفع نمایید.', 'error', 5000)

            }

        })
    });

    $(document).on('submit', '.ajaxUpload', function(e) {
        e.preventDefault();


        var form_data = new FormData(this);

        if ($('.file-upload').length > 0) {

            var imageUrl = $('.file-upload').prop('files')[0];

            if (document.getElementsByClassName("file-upload").value != "") {
                form_data.append('imageUrl', imageUrl);
            }
        }


        let url = $(this).attr('action');
        let type = $(this).attr('method');
        let data = $(this).serialize();
        let this_ = $(this);

        $.ajax({
            type: type,
            url: url,
            data: form_data, //$(this).serialize(),
            processData: false,
            async: false,
            contentType: false,
            beforeSend: function() {
                $('.help-block').text('');
                this_.find('button[type="submit"] i').removeClass().addClass('fa fa-spinner fa-spin');
            },
            success: function(response) {
                //////
                if (response.status == 'success')
                    this_.find('button[type="submit"] i').removeClass().addClass('fa fa-check');

                if (response.status == 'error')
                    this_.find('button[type="submit"] i').removeClass().addClass('fa fa-refresh');

                messageToast(response.title, response.message, response.status, 5000)

                if (response.autoRedirect && response.autoRedirect !== '') {
                    window.location.href = response.autoRedirect
                }

                if (response.dataLoad && response.dataLoad !== '' && $('#load-data-ajax').length > 0) {
                    $('#load-data-ajax').html(response.dataLoad)
                }

                if (response.dataLoad2 && response.dataLoad2 !== '' && $('#load-data-2-ajax').length > 0) {
                    $('#load-data-2-ajax').html(response.dataLoad2)
                }

                if (response.fullname && response.fullname !== '' && $('.load-fullname').length > 0) {
                    $('.load-fullname').html(response.fullname)
                }

                if (response.avatar && response.avatar !== '' && $('.load-avatar').length > 0) {
                    $('.load-avatar').attr('src', response.avatar)
                }

                var item = $('#item_id');
                if (item.length) {
                    var itemid = item.val();
                }


                var dataTable = $('table.data-list-view');
                if (dataTable.length > 0 && response.rowInsert) {
                    var dt = dataTable.DataTable();
                    dt.row.add(
                        response.rowInsert
                    ).draw(false);
                }
            },
            error: function(request, status, error) {
                this_.find('button[type="submit"] i').removeClass().addClass('fa fa-refresh');
                json = $.parseJSON(request.responseText);

                $.each(json.errors, function(key, value) {
                    console.log(key + ": " + value);
                    $('.error-' + key).text(value);
                });

            }
        });

    });


})

if ($('.dropify').length > 0) {


    $('.dropify').dropify({
        messages: {
            'default': 'کلیک کنید یا بکشید و رها کنید ',
            'replace': 'کلیک کنید یا بکشید و رها کنید',
            'remove': 'حذف فایل',
            'error': 'اوپس، خظاهای پیش آمده را رفع نمایید.'
        },
        error: {
            'fileSize': 'The file size is too big ({{ value }} max).',
            'minWidth': 'The image width is too small ({{ value }}}px min).',
            'maxWidth': 'The image width is too big ({{ value }}}px max).',
            'minHeight': 'The image height is too small ({{ value }}}px min).',
            'maxHeight': 'The image height is too big ({{ value }}px max).',
            'imageFormat': 'The image format is not allowed ({{ value }} only).'
        },
        tpl: {
            wrap: '<div class="dropify-wrapper"></div>',
            loader: '<div class="dropify-loader"></div>',
            message: '<div class="dropify-message"><span class="file-icon" /> <p>{{ default }}</p></div>',
            preview: '<div class="dropify-preview"><span class="dropify-render"></span><div class="dropify-infos"><div class="dropify-infos-inner"><p class="dropify-infos-message">{{ replace }}</p></div></div></div>',
            filename: '<p class="dropify-filename"><span class="file-icon"></span> <span class="dropify-filename-inner"></span></p>',
            clearButton: '<button type="button" class="dropify-clear">{{ remove }}</button>',
            errorLine: '<p class="dropify-error">{{ error }}</p>',
            errorsContainer: '<div class="dropify-errors-container"><ul></ul></div>'
        }
    });
}

function messageToast(title, message, status, timeOut = 5000) {
    if (status === 'success') {
        toastr.success(message, title, { "timeOut": timeOut, "closeButton": true, positionClass: 'toast-top-left', containerId: 'toast-top-left' })
    } else if (status === 'warning') {
        toastr.warning(message, title, { "timeOut": timeOut, "closeButton": true, positionClass: 'toast-top-left', containerId: 'toast-top-left' })
    } else if (status === 'error') {
        toastr.error(message, title, { "timeOut": timeOut, "closeButton": true, positionClass: 'toast-top-left', containerId: 'toast-top-left' })
    } else if (status === 'info') {
        toastr.info(message, title, { "timeOut": timeOut, "closeButton": true, positionClass: 'toast-top-left', containerId: 'toast-top-left' })
    }
}

function deleteRow(url, id) {
    $.ajax({
        url: url,
        method: 'post',
        method: 'DELETE',
        data: { ajax: 'true', _method: 'delete' },
        success: function(response) {
            console.log(response)
            $('tr[row="' + id + '"]').remove();

            if ($('#item-row-' + id).length > 0) {
                $('#item-row-' + id).remove();
            }

            messageToast(response.title, response.message, response.status, 5000)
        },
        error: function(request, status, error) {
            console.log(request);
            // console.log(request.responseText);
        }
    })
    $(this).closest('td').parent('tr').fadeOut();
}

function changeStatus(url, this_) {
    $.ajax({
        url: url,
        method: 'post',
        method: 'post',
        data: { ajax: 'true', status: $(this_).is(':checked') },
        success: function(response) {
            console.log(response)
            messageToast(response.title, response.message, response.status, 5000)
        },
        error: function(request, status, error) {}
    })
}

function LoadCategories(url, col, name, _this_) {

    for (var i = col; i <= 5; i++) {
        $(".load-categories[col='" + i + "']").html('')
        $(".breadcrumb-categories [col='" + i + "']").text('')
    }
    if ($(_this_).is(':checked')) {

        $.ajax({
            url: url,
            method: 'get',
            data: { ajax: 'true' },
            success: function(response) {
                $(".load-categories[col='" + col + "']").html(response)
                $(".breadcrumb-categories [col='" + Number(col - 1) + "']").text(name);
            },
            error: function(request, status, error) {}
        })
    }
}