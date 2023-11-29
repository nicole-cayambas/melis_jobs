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
});