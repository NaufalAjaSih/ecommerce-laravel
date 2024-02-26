$(document).ready(function () {
    $("#child-category-div").hide();

    $("#parent-category").change(function () {
        var parent_id = $(this).val();
        $.get("/categories/" + parent_id + "/children", function (data) {
            if (data.length > 0) {
                $("#child-category-div").show();
                $("#child-category").empty();
                $.each(data, function (index, child) {
                    $("#child-category").append(
                        $("<option>", {
                            value: child.name,
                            text: child.name,
                        })
                    );
                });

                $("#child-category").selectric("refresh");
            } else {
                $("#child-category-div").hide();
            }
        });
    });

    $("#parent-category, #child-category").selectric();

    $("#preview-container").click(function (event) {
        if (event.target.id === "preview-container") {
            $("#file-upload").click();
        }
    });

    $("#file-upload").change(function () {
        const files = this.files;
        const currentImageCount = $(".preview-item").length;
        const remainingSlots = 6 - currentImageCount;

        if (files.length > remainingSlots) {
            alert("Anda hanya dapat mengunggah maksimal 6 gambar.");
            return;
        }

        addImages(files);
    });

    function addImages(files) {
        for (const file of files) {
            const reader = new FileReader();

            reader.onload = function (e) {
                const previewItem = $('<div class="preview-item"></div>');

                const img = $("<img>");
                img.attr("src", e.target.result);

                const deleteBtn = $('<button class="delete-btn">X</button>');

                deleteBtn.click(function () {
                    $(this).parent().remove();
                });

                previewItem.append(img);
                previewItem.append(deleteBtn);
                $("#preview-container").append(previewItem);
            };

            reader.readAsDataURL(file);
        }

        $(".upload-btn").hide();
        $(".preview-item.empty").remove();
    }

    var variantCount = 2;

    $("button.btn-outline-secondary").click(function () {
        var newVariantForm = `
        <li>
            <div class="form-group row mb-4">
                <label class="col-form-label text-md-left font-weight-bold col-12 col-md-3 col-lg-3">Variant<br /><span class="font-weight-light">Masukkan nama variant<br /> produk anda disini</span></label>
                <div class="col-sm-12 col-md-7">
                    <input type="text" class="form-control" name="variant[${variantCount}][name]">
                </div>
            </div>
            <div class="form-group row mb-4">
                <label class="col-form-label text-md-left font-weight-bold col-12 col-md-3 col-lg-3">Harga<br /><span class="font-weight-light">Masukkan harga produk<br /> anda disini</span></label>
                <div class="col-sm-12 col-md-7">
                    <input type="number" class="form-control" name="variant[${variantCount}][price]">
                </div>
            </div>
            <div class="form-group row mb-4">
                <label class="col-form-label text-md-left font-weight-bold col-12 col-md-3 col-lg-3">Stok<br /><span class="font-weight-light">Masukkan jumlah stok produk<br /> anda disini</span></label>
                <div class="col-sm-12 col-md-7">
                    <input type="number" class="form-control" name="variant[${variantCount}][stock]">
                </div>
            </div>
        </li>
    `;

        $("#variant-form").append(newVariantForm);

        variantCount++;
    });
});
