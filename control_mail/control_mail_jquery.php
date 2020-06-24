
function scJQGeneralAdd() {
  scLoadScInput('input:text.sc-js-input');
  scLoadScInput('input:password.sc-js-input');
  scLoadScInput('input:checkbox.sc-js-input');
  scLoadScInput('input:radio.sc-js-input');
  scLoadScInput('select.sc-js-input');
  scLoadScInput('textarea.sc-js-input');

} // scJQGeneralAdd

function scFocusField(sField) {
  var $oField = $('#id_sc_field_' + sField);

  if (0 == $oField.length) {
    $oField = $('input[name=' + sField + ']');
  }

  if (0 == $oField.length && document.F1.elements[sField]) {
    $oField = $(document.F1.elements[sField]);
  }

  if ($("#id_ac_" + sField).length > 0) {
    if ($oField.hasClass("select2-hidden-accessible")) {
      if (false == scSetFocusOnField($oField)) {
        setTimeout(function() { scSetFocusOnField($oField); }, 500);
      }
    }
    else {
      if (false == scSetFocusOnField($oField)) {
        if (false == scSetFocusOnField($("#id_ac_" + sField))) {
          setTimeout(function() { scSetFocusOnField($("#id_ac_" + sField)); }, 500);
        }
      }
      else {
        setTimeout(function() { scSetFocusOnField($oField); }, 500);
      }
    }
  }
  else {
    setTimeout(function() { scSetFocusOnField($oField); }, 500);
  }
} // scFocusField

function scSetFocusOnField($oField) {
  if ($oField.length > 0 && $oField[0].offsetHeight > 0 && $oField[0].offsetWidth > 0 && !$oField[0].disabled) {
    $oField[0].focus();
    return true;
  }
  return false;
} // scSetFocusOnField

function scEventControl_init(iSeqRow) {
  scEventControl_data["destinatario" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["correo" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["asunto" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
}

function scEventControl_active(iSeqRow) {
  if (scEventControl_data["destinatario" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["destinatario" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["correo" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["correo" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["asunto" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["asunto" + iSeqRow]["change"]) {
    return true;
  }
  return false;
} // scEventControl_active

function scEventControl_onFocus(oField, iSeq) {
  var fieldId, fieldName;
  fieldId = $(oField).attr("id");
  fieldName = fieldId.substr(12);
  scEventControl_data[fieldName]["blur"] = true;
  scEventControl_data[fieldName]["change"] = false;
} // scEventControl_onFocus

function scEventControl_onBlur(sFieldName) {
  scEventControl_data[sFieldName]["blur"] = false;
  if (scEventControl_data[sFieldName]["change"]) {
        if (scEventControl_data[sFieldName]["original"] == $("#id_sc_field_" + sFieldName).val() || scEventControl_data[sFieldName]["calculated"] == $("#id_sc_field_" + sFieldName).val()) {
          scEventControl_data[sFieldName]["change"] = false;
        }
  }
} // scEventControl_onBlur

function scEventControl_onChange(sFieldName) {
  scEventControl_data[sFieldName]["change"] = false;
} // scEventControl_onChange

function scEventControl_onAutocomp(sFieldName) {
  scEventControl_data[sFieldName]["autocomp"] = false;
} // scEventControl_onChange

var scEventControl_data = {};

function scJQEventsAdd(iSeqRow) {
  $('#id_sc_field_destinatario' + iSeqRow).bind('blur', function() { sc_control_mail_destinatario_onblur(this, iSeqRow) })
                                          .bind('focus', function() { sc_control_mail_destinatario_onfocus(this, iSeqRow) });
  $('#id_sc_field_correo' + iSeqRow).bind('blur', function() { sc_control_mail_correo_onblur(this, iSeqRow) })
                                    .bind('focus', function() { sc_control_mail_correo_onfocus(this, iSeqRow) });
  $('#id_sc_field_asunto' + iSeqRow).bind('blur', function() { sc_control_mail_asunto_onblur(this, iSeqRow) })
                                    .bind('focus', function() { sc_control_mail_asunto_onfocus(this, iSeqRow) });
} // scJQEventsAdd

function sc_control_mail_destinatario_onblur(oThis, iSeqRow) {
  do_ajax_control_mail_validate_destinatario();
  scCssBlur(oThis);
}

function sc_control_mail_destinatario_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_control_mail_correo_onblur(oThis, iSeqRow) {
  do_ajax_control_mail_validate_correo();
  scCssBlur(oThis);
}

function sc_control_mail_correo_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_control_mail_asunto_onblur(oThis, iSeqRow) {
  do_ajax_control_mail_validate_asunto();
  scCssBlur(oThis);
}

function sc_control_mail_asunto_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function displayChange_block(block, status) {
	if ("0" == block) {
		displayChange_block_0(status);
	}
}

function displayChange_block_0(status) {
	displayChange_field("destinatario", "", status);
	displayChange_field("correo", "", status);
	displayChange_field("asunto", "", status);
}

function displayChange_row(row, status) {
	displayChange_field_destinatario(row, status);
	displayChange_field_correo(row, status);
	displayChange_field_asunto(row, status);
}

function displayChange_field(field, row, status) {
	if ("destinatario" == field) {
		displayChange_field_destinatario(row, status);
	}
	if ("correo" == field) {
		displayChange_field_correo(row, status);
	}
	if ("asunto" == field) {
		displayChange_field_asunto(row, status);
	}
}

function displayChange_field_destinatario(row, status) {
}

function displayChange_field_correo(row, status) {
}

function displayChange_field_asunto(row, status) {
}

function scRecreateSelect2() {
}
function scResetPagesDisplay() {
	$(".sc-form-page").show();
}

function scHidePage(pageNo) {
	$("#id_control_mail_form" + pageNo).hide();
}

function scCheckNoPageSelected() {
	if (!$(".sc-form-page").filter(".scTabActive").filter(":visible").length) {
		var inactiveTabs = $(".sc-form-page").filter(".scTabInactive").filter(":visible");
		if (inactiveTabs.length) {
			var tabNo = $(inactiveTabs[0]).attr("id").substr(20);
		}
	}
}
function scJQUploadAdd(iSeqRow) {
} // scJQUploadAdd


function scJQElementsAdd(iLine) {
  scJQEventsAdd(iLine);
  scEventControl_init(iLine);
  scJQUploadAdd(iLine);
} // scJQElementsAdd

