$(document).ready(function() {
    $("input:required, select:required, textarea:required").prev().append('<span class="required"> *</span>');
    $(".dropify:required").parent().prev().append('<span class="required"> *</span>');
    $("select.select2").select2();

    // Auto Selected
    if ($("[data-selected]").length) {
        $('[data-selected]').each(function(i, obj) {
            $(this).val($(this).data('selected')).trigger('change');
        })
    }

    //Ajax Non Modal Submit
    $(".ajax-submit2").each(function() {
        $(this).validate({
            ignore: [],
            submitHandler: function(form) {
                var link = $(form).attr("action");
                $.ajax({
                    method: "POST",
                    url: link,
                    data: new FormData(form),
                    mimeType: "multipart/form-data",
                    contentType: false,
                    cache: false,
                    processData: false,
                    beforeSend: function() {
                        $("#preloader").css("display", "block");
                    },
                    success: function(data) {
                        $("#preloader").css("display", "none");
                        var json = JSON.parse(data);
                        if (json['result'] == "success") {
                            if (typeof json['redirect'] != 'undefined' && json['redirect'] != '') {
                                setTimeout(function() {
                                    window.location.replace(json['redirect']);
                                }, 1000);
                            }
                            // toast('success', json['message']);
                        } else {
                            jQuery.each(json['message'], function(i, val) {
                                // toast('error', val);
                            });
                        }
                    }
                });
                return false;
            },
            invalidHandler: function(form, validator) {},
            errorPlacement: function(error, element) {}
        });
    });


    // delete confirmation
    $(document).on('click', '.btn-remove', function(e) {
        e.preventDefault();
        Swal.fire({
            title: 'Are you sure?',
            text: "You won't be able to revert this!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#1bcfb4',
            cancelButtonColor: '#fe7c96',
            confirmButtonText: 'Yes, delete it!',
        }).then((result) => {
            if (result.value) {
                var link = $(this).attr('href');
                if (typeof link !== 'undefined' && link !== '') {
                    window.location.href = link;
                } else {
                    $(this).closest('form').submit();
                }
            }
        })
    });
    //Ajax Delete
    $(document).on("submit", ".ajax-delete", function() {
        var dis = this;
        var link = $(dis).attr("action");
        $.ajax({
            method: "POST",
            url: link,
            data: new FormData(dis),
            mimeType: "multipart/form-data",
            contentType: false,
            cache: false,
            processData: false,
            beforeSend: function() {
                $("#preloader").css("display", "block");
            },
            success: function(data) {
                $("#preloader").css("display", "none");
                var json = JSON.parse(data);
                if (json['result'] == 'success') {
                    if ($('#data-table').length) {
                        $('#data-table').DataTable().ajax.reload(null, false);
                    } else {
                        $(dis).closest('tr').remove();
                    }
                    Toast.fire({
                        icon: 'success',
                        title: json['message'],
                        background: '#28A745',
                    })
                } else {
                    toast('error', json['message']);
                }
            }
        });
        return false;
    });

    // active
    $('.sidenav-item-link').ready(function() {
        $(this).parent().addClass('active');

    });

});
