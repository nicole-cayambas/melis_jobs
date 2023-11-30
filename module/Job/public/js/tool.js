$(function () {
  $("body").on("click", "#btnAddJob", function () {
    modalUrl = "/melis/MelisCore/MelisGenericModal/emptyGenericModal";
    melisHelper.createModal(
      "id_job_tool_modal", // zoneId,
      "job_tool_list_modal", // melisKey,
      false, // hasCloseBtn,
      {}, // parameters,
      modalUrl // modalUrl,
      // callback,
      // modalBackDrop
    );
  });

  $("body").on("click", "#btnEditJob", function () {
    const id = $(this).parents("tr").attr("id");
    modalUrl = "/melis/MelisCore/MelisGenericModal/emptyGenericModal";
    melisHelper.createModal(
      "id_job_tool_modal", // zoneId,
      "job_tool_list_modal", // melisKey,
      false, // hasCloseBtn,
      { id: id }, // parameters,
      modalUrl // modalUrl,
      // callback,
      // modalBackDrop
    );
  });

  $("body").on("click", "#btnDeleteJob", function () {
    const id = $(this).parents("tr").attr("id");
    melisCoreTool.confirm(
      translations.tr_job_common_button_yes, // textOk
      translations.tr_job_common_button_no, // textNo
      translations.tr_job_delete_title, // title
      translations.tr_job_delete_confirm_msg, // msg
      // callBackOnYes
      // callBackOnNo
      function (data) {
        $.ajax({
          type: "GET",
          url: "/melis/Job/List/deleteItem?id=" + id,
          dataType: "json",
          encode: true,
          success: function (data) {
            // refresh the table after deleting an item
            melisHelper.zoneReload("id_job_tool_table", "job_tool_list_table");

            // Notifications
            melisHelper.melisOkNotification(data.textTitle, data.textMessage);
          },
        });
      }
    );
  });

  $("body").on("click", "#btnSaveJob", function () {
    const id = $(this).data("id");
    submitJobForm(id, $("form#jobForm")[0]);
  });

  const submitJobForm = (id, form) => {
    const formData = new FormData(form);
    formData.append("id", id);

    $.ajax({
      type: "POST",
      url: "/melis/Job/Properties/save",
      data: formData,
      cache: false,
      contentType: false,
      processData: false,
    })
      .done(function (data) {
        if (data.success) {
          melisHelper.melisOkNotification(data.textTitle, data.textMessage);
          $("#id_job_tool_modal_container").modal("hide");
          melisHelper.zoneReload("id_job_tool_table", "job_tool_list_table");
        } else {
          melisHelper.melisKoNotification(
            data?.textTitle,
            data?.textMessage,
            data?.errors
          );
          melisHelper.highlightMultiErrors(
            data.success,
            data.errors,
            "#id_job_tool_modal"
          );
        }
      })
      .fail(function () {
        alert(translations.tr_meliscore_error_message);
      });
  };

  $("body").on("click", ".tableStatus", function () {
    const id = $(this).data("id");
    melisCoreTool.confirm(
      translations.tr_job_common_button_yes, // textOk
      translations.tr_job_common_button_no, // textNo
      $(this).html() == 'Yes' ? translations.tr_job_unpost_title : translations.tr_job_post_title, // title
      $(this).html() == 'Yes' ? translations.tr_job_unpost_confirm_msg : translations.tr_job_post_confirm_msg, // msg
      // callBackOnYes
      // callBackOnNo
      function (data) {
        togglePostItem(id);
      }
    );
  });

  const togglePostItem = (id) => {
    $.ajax({
      type: "GET",
      url: "/melis/Job/List/togglePostItem?id=" + id,
      dataType: "json",
      encode: true,
      success: function (data) {
        // refresh the table after deleting an item
        melisHelper.zoneReload("id_job_tool_table", "job_tool_list_table");

        // Notifications
        melisHelper.melisOkNotification(data.textTitle, data.textMessage);
      },
    });
  };
});
