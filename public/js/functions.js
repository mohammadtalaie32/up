// Common functions

// Stars functions
var shownstar = '';
var root = '/~prodeveloper';


function bpstatus(uniquekey, billpay, status, patient) {
    if (billpay == 'billing' && status == 'incomplete') {
        document.getElementById('billingready' + uniquekey)
            .checked = false;
        document.getElementById('billingcomplete' + uniquekey)
            .checked = false;
    }
    if (billpay == 'billing' && status == 'complete') {
        document.getElementById('billingready' + uniquekey)
            .checked = false;
        document.getElementById('billingincomplete' + uniquekey)
            .checked = false;
    }
    if (billpay == 'billing' && status == 'ready') {
        document.getElementById('billingcomplete' + uniquekey)
            .checked = false;
        document.getElementById('billingincomplete' + uniquekey)
            .checked = false;
    }
    if (billpay == 'payment' && status == 'waiting') {
        document.getElementById('paymentpartial' + uniquekey)
            .checked = false;
        document.getElementById('paymentfull' + uniquekey).checked =
            false;
    }
    if (billpay == 'payment' && status == 'partial') {
        document.getElementById('paymentwaiting' + uniquekey)
            .checked = false;
        document.getElementById('paymentfull' + uniquekey).checked =
            false;
    }
    if (billpay == 'payment' && status == 'full') {
        document.getElementById('paymentpartial' + uniquekey)
            .checked = false;
        document.getElementById('paymentwaiting' + uniquekey)
            .checked = false;
    }
    document.form.billpayuniquekey.value = uniquekey;
    document.form.billorpay.value = billpay;
    document.form.billpaystatus.value = status;
    document.form.selectedpatients.value = patient;
    //document.form.submit();
}

function showbp(uniquekey, billorpay, status, patient) {
    if (shown != null && shown != billorpay + uniquekey) {
        document.getElementById(shown).style.display = 'none';
        if (shownuk != uniquekey) {
            document.getElementById('encounterlink' + shownuk).style
                .color = 'blue';
            document.getElementById('encounterlink' + shownuk).style
                .textDecoration = 'underline';
        }
    }
    if (document.getElementById(billorpay + uniquekey).style
        .display == 'none' || shown == null) {
        document.getElementById(billorpay + uniquekey).style
            .display = 'block';
        document.form.billpayuniquekey.value = uniquekey;
        document.form.billorpay.value = billorpay;
        document.form.billpaystatus.value = status;
        document.getElementById('encounterlink' + uniquekey).style
            .color = 'black';
        document.getElementById('encounterlink' + uniquekey).style
            .textDecoration = 'none';
        document.form.selectedpatients.value = patient;
        shown = billorpay + uniquekey;
        shownuk = uniquekey;
    } else if (document.getElementById(billorpay + uniquekey).style
        .display == 'block' && shown != null) {
        document.getElementById(billorpay + uniquekey).style
            .display = 'none';
        document.form.billpayuniquekey.value = '';
        document.form.billorpay.value = '';
        document.form.billpaystatus.value = '';
        document.getElementById('encounterlink' + uniquekey).style
            .color = 'blue';
        document.getElementById('encounterlink' + uniquekey).style
            .textDecoration = 'underline';
        var arr = [ /*'billing','payment',*/ 'billingclaimnumber',
            'billingdatesent', 'billingamount', 'billingnotes',
            'billingdeductible', 'billingpaid', 'paymentnotes'
        ];
        for (var i = 0; i < arr.length; i++) {
            document.getElementById(arr[i]).value = '';
        }
        document.form.selectedpatients.value = '';
        shown = null;
        shownuk = null;
    }
}

function previewbp(uniquekey, billorpay, onoff) {
    if (shown == null) {
        if (onoff == 'on') {
            document.getElementById(billorpay + uniquekey).style
                .display = 'block';
            document.getElementById('encounterlink' + uniquekey)
                .style.color = 'black';
            document.getElementById('encounterlink' + uniquekey)
                .style.textDecoration = 'none';
        }
        if (onoff == 'off') {
            document.getElementById(billorpay + uniquekey).style
                .display = 'none';
            document.getElementById('encounterlink' + uniquekey)
                .style.color = 'blue';
            document.getElementById('encounterlink' + uniquekey)
                .style.textDecoration = 'underline';
        }
    }
}

function previewstar(pid, onoff) {
    if (shownstar == '') {
        if (onoff == 'on') {
            document.getElementById('stardiv' + pid).style.display =
                'block';
        }
        if (onoff == 'off') {
            document.getElementById('stardiv' + pid).style.display =
                'none';
        }
    }
}

function showstar(pid) {
    if (document.getElementById('stardiv' + pid).style.display ==
        'none' || shownstar == '') {
        // if (shownstar != '') document.getElementById('stardiv' + shownstar).style.display = 'none';
        document.getElementById('stardiv' + pid).style.display =
            'block';
        document.form.starpid.value = pid;
        shownstar = pid;
    } else {
        document.getElementById('stardiv' + pid).style.display =
            'none';
        document.form.starpid.value = '';
        shownstar = '';
    }
}

function star(id, priority = '') {

}

function starchange(pid, priority) {
    document.getElementById('starbilling' + pid).src = root + "/nlimages/manageicons/starbillinginactive.png";
    document.getElementById('starlow' + pid).src = root + "/nlimages/manageicons/starlowinactive.png";
    document.getElementById('starmedium' + pid).src = root + "/nlimages/manageicons/starmediuminactive.png";
    document.getElementById('starhigh' + pid).src = root + "/nlimages/manageicons/starhighinactive.png";
    document.getElementById('star' + priority + pid).src = root + "/nlimages/manageicons/star" + priority + "active.png";
    document.getElementById('starpriority' + pid).value = priority;
}

function submitStar(id, priority = false) {
    let starPriority,
        starNotes = $("#starnotes" + id).val(),
        starred = priority == 'off' ? 'no' : 'yes';
    if (priority && priority !== "off") {
        starPriority = priority;
    } else {
        starPriority = $("#starpriority" + id).val();
    }
    $.ajax({
        type: "post",
        url: root + "/starSubmit/" + id,
        data: "starred=" + starred + "&starpriority=" + starPriority + "&starnotes=" + starNotes,
        dataType: "dataType",
        headers: {
            'X-CSRF-TOKEN': csrf
        },
        success: function (r) {
            $("#alertDiv").fadeIn();
            $("#billAlert").html("Error! Something wrong");
        },
        error: function (r) {
            $("#alertDiv").fadeIn();
            $("#billAlert").html("Success! Reload the page to see changes");
        }
    });

}

/**
 * Delete Patient
 * @param {Int} id Patient Id
 * @param {String} firstname First name to show in message
 * @param {String} lastname Last name to show in message
 * @param {String} backURL URL to go after delete Patient
 */
function deletePatient(id, firstname, lastname, backURL = false) {
    if (window.confirm('Are you sure you want to delete all data for ' + firstname + ' ' + lastname + '?')) {
        if (window.confirm('Please confirm: this will delete all visits and associated data for ' + firstname + ' ' + lastname + '!')) {
            $.ajax({
                type: "post",
                url: "deletePatient/" + id,
                headers: {
                    'X-CSRF-TOKEN': csrf
                },
                success: function (response) {
                    if (backURL) {
                        document.location = backURL;
                    } else {
                        $("#patientRow" + id).fadeOut();
                        $("#alertDiv").fadeIn();
                        $("#billAlert").html("Patient " + firstname + ' ' + lastname + ' deleted!');
                    }

                },
                error: function (response) {
                    $("#alertDiv").fadeIn();
                    $("#billAlert").html("Error! Something wrong");
                }
            });
        }
    }
}

/**
 * Delete Visit
 * @param {Int} vId Visit id to be deleted
 * @param {String} encounterdate Visit encounter date
 */
function deleteVisit(vId, encounterdate) {
    if (window.confirm('Are you sure you want to delete all data for the visit on ' + encounterdate + '?')) {
        $.ajax({
            type: "post",
            url: root + "/deleteVisit/" + vId,
            headers: {
                'X-CSRF-TOKEN': csrf
            },
            success: function (response) {
                $("#visitRow" + vId).fadeOut();
                $("#alertDiv").fadeIn();
                $("#billAlert").html("Visit on " + encounterdate + " deleted!");
            },
            error: function (response) {
                $("#alertDiv").fadeIn();
                $("#billAlert").html("Error! Something wrong");
            }
        });
    }
}

/**
 * Update visit billing
 * @param {Integer} id Visit Id
 */
function submitBilling(id) {
    let notes = $("#billingnotes" + id).val();
    let amount = $("#billingamount" + id).val();
    let dateSent = $("#billingdatesent" + id).val();
    let claimNumber = $("#billingclaimnumber" + id).val();
    let billing = $("input[name='billingStatus"+id+"']:checked").val();

    $.ajax({
        type: "post",
        url: root + "/updateBilling/" + id,
        data: "billing=" + billing + "&billingclaimnumber=" + claimNumber
            + "&billingdatesent=" + dateSent + "&billingamount=" + amount + "&billingnotes=" + notes,
        headers: {
            'X-CSRF-TOKEN': csrf
        }, success: function (r) {
            $("#alertDiv").fadeIn();
            $("#billAlert").html("Billing Updated Successfully! <br> Reload page to see results");
        },
        error: function (r) {
            $("#alertDiv").fadeIn();
            $("#billAlert").html("Some thing wrong!");
        }
    });
}

/**
 * Update visit payment
 * @param {Integer} id Visit Id
 */
function paymentSumbit(id) {
    let notes = $("#paymentnotes" + id).val();
    let amount = $("#billingpaid" + id).val();
    let payment = $("input[name='paymentStatus" + id +"']:checked").val();

    $.ajax({
        type: "post",
        url: root + "/updatePayment/" + id,
        data: "billingpaid=" + amount + "&payment=" + payment + "&paymentnotes=" + notes,
        headers: {
            'X-CSRF-TOKEN': csrf
        }, success: function (r) {
            $("#alertDiv").fadeIn();
            $("#billAlert").html("Payment Updated Successfully! <br> Reload page to see results");
        },
        error: function (r) {
            $("#alertDiv").fadeIn();
            $("#billAlert").html("Some thing wrong!");
        }
    });
}
