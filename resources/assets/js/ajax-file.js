$(document).ready(function () {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $('#add-category').click(function () {
        $('#save-category').val("add");
        $('#modalFormData').trigger("reset");
        $('#modalEditCategory').modal('show');
    });

    $('body').on('click', '.btn-edit-category', function () {
        var categoryId = $(this).val();
        $.get('category/' + categoryId, function (data) {
            $('#category-id').val(data.id);
            $('#category-name').val(data.name);
            $('#category-description').val(data.description);
            $('#save-category').val("update");
            $('#modalEditCategory').modal('show');
        })
    });

    $("#save-category").click(function (e) {
        e.preventDefault();
        let formData = {
            name: $('#category-name').val(),
            description: $('#category-description').val(),
        };
        let state = $(this).val();
        let type = "POST";
        let categoryId = $('#category-id').val();
        let ajaxurl = 'category';
        if (state == "update") {
            type = "PUT";
            ajaxurl = 'category/' + categoryId;
        }
        $.ajax({
            type: type,
            url: ajaxurl,
            data: formData,
            dataType: 'json',
            success: function (data) {
                var category = '<tr id="category' + data.id + '"><td>' + data.name + '</td><td>' + data.description + '</td>';
                category += '<td><button class="btn-edit-category" title="Sửa" value="' + data.id + '"><i class="fa fa-edit"></i></button>';
                category += '<button class="btn-delete-category" title="Xóa" value="' + data.id + '"><i class="fa fa-train"></i></button></td></tr>';
                if (state == "add") {
                    $('#categories-list').append(category);
                } else {
                    $("#category" + categoryId).replaceWith(category);
                }
                $('#modalFormData').trigger("reset");
                $('#modalEditCategory').modal('hide')
            },
            error: function (data) {
                console.log('Error:', data);
            }
        });
    });

    ////----- DELETE a link and remove from the page -----////
    $('.btn-delete-category').click(function () {
        if (confirm('Bạn chắc chắn muốn xóa?')) {
            let categoryId = $(this).val();
            $.ajax({
                type: "DELETE",
                url: 'category/' + categoryId,
                success: function (data) {
                    console.log(data);
                    $("#category" + categoryId).remove();
                },
                error: function (data) {
                    console.log('Error:', data);
                }
            });
        }
    });
});
