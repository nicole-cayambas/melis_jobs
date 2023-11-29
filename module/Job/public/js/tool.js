$(function () {
    $("body").on("click", "#btnAddJob", function () {
        modalUrl = '/melis/MelisCore/MelisGenericModal/emptyGenericModal';
        melisHelper.createModal(
            "id_job_tool_modal",             // zoneId,
            "job_tool_list_modal",           // melisKey,
            false,                          // hasCloseBtn,
            {},                             // parameters,
            modalUrl,                       // modalUrl,
                                            // callback,
                                            // modalBackDrop
        );
    });

    $('body').on("click", "#btnSaveJob", function () {
        const id = $(this).data('id');
        console.log($('form#jobForm'));
        submitJobForm(id, $('form#jobForm')[0]);
    })

    const submitJobForm = (id, form) => {
        const formData = new FormData(form);
        formData.append('id', id);

        $.ajax({
            type: 'POST',
            url: '/melis/Job/Properties/save',
            data: formData,
            cache: false,
            contentType: false,
            processData: false,
        }).done(function (data) {
            console.log('data', data);
            if (data.success) {
                melisHelper.melisOkNotification(data.textTitle, data.textMessage);
                $("#id_job_tool_modal_container").modal("hide");
                melisHelper.zoneReload("id_job_tool_table", "job_tool_list_table");
            } else {
                melisHelper.melisKoNotification(data?.textTitle, data?.textMessage, data?.errors);
                melisHelper.highlightMultiErrors(data.success, data.errors, "#id_job_tool_modal");
            }
        }).fail(function () {
            alert(translations.tr_meliscore_error_message);
        });
    }
});