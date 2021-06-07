/**
 * Manage single patient: patients.manage
 * Author: Noman
 */
var csrf;
var headershown = '';

function headerpreview(uniquekey, encounterdate, billing, payment, claimnumber, datesent,
    billedamount, codedamount, billingpaid, billingnotes, paymentnotes) {
    var xpos = document.getElementById('headerbilling' + uniquekey).getBoundingClientRect()
        .left;
    if (document.getElementById('headerbp')) {
        if (headershown == '' || headershown != uniquekey) {
            if (xpos - 130 + 300 - 208 > parseInt(document.getElementById('viewport').offsetWidth))
                document.getElementById('headerbp').style.left = (document.getElementById('viewport').offsetWidth + 238 - 355) + "px";
            else document.getElementById('headerbp').style.left = (xpos - 130) + "px";
            document.getElementById('headerbp').innerHTML =
                '<table style="border:1px solid #fefefe;" border="1" cellspacing="0" cellpadding="2" width="100%"><tr><td><u>' +
                encounterdate + '</u></td><td align="right">' +
                '<span style="float:right;"><a href="javascript:headerpreview(\'' +
                uniquekey +
                '\');"><img src="' + root + '/images/delete.png"></a></td></tr><tr><td colspan="2">&nbsp;</td></tr>' +
                '<tr><td><b>Billing</b>: </td><td>' + billing + '</td></tr>' +
                '<tr><td>Claim #: </td><td>' + claimnumber + '</td></tr>' +
                '<tr><td>Date Sent: </td><td>' + datesent + '</td></tr>' +
                '<tr><td>Billed Amount: <span style="float:right;">$</span></td><td>' +
                billedamount + '</td></tr>' +
                '<tr><td>(Coded Amount:) <span style="float:right;">$</span></td><td>' +
                codedamount + '</td></tr>' +
                '<tr><td colspan="2"><strong>Billing Notes:</strong></td></tr><tr><td colspan="2">' +
                billingnotes + '</td></tr>' +
                '<tr><td><b>Payment</b>: </td><td>' + payment + '</td></tr>' +
                '<tr><td>Insurance Payment: <span style="float:right;">$</span></td><td>' +
                billingpaid + '</td></tr>' +
                '<tr><td colspan="2"><strong>Payment Notes:</strong></td></tr><tr><td colspan="2">' +
                paymentnotes + '</td></tr></table>';
            document.getElementById('headerbp').style.display = 'block';
            headershown = uniquekey;
        } else {
            document.getElementById('headerbp').style.display = 'none';
            headershown = '';
        }
    }
}

function showphoto(i) {
    document.getElementById('photo' + i).style.display = 'block';
}

function hidephoto(i) {
    document.getElementById('photo' + i).style.display = 'none';
}

function changeinputcolor(uniquekey) {
    document.getElementById('billingamount' + uniquekey).style
        .color = 'black';
}

function selectfilterpatient(pid) {
    document.manageform.patientid.value = pid;
    document.manageform.filterpatient.value = pid;
    document.manageform.submit();
}

// Functions: Phone

var phoneshown;

function showphone(uniquekey, patient) {
    if (document.getElementById('phone' + uniquekey)) {
        if (document.getElementById('phone' + uniquekey).style
            .display == 'none') {
            document.getElementById('phone' + uniquekey).style
                .display = 'block';
            document.form.markphone.value = uniquekey;
            document.form.selectedpatients.value = patient;
        } else if (document.getElementById('phone' + uniquekey)
            .style.display == 'block') {
            document.getElementById('phone' + uniquekey).style
                .display = 'none';
            document.form.markphone.value = '';
            document.form.selectedpatients.value = '';
        }
        if (phoneshown != null && phoneshown != uniquekey) document
            .getElementById('phone' + phoneshown).style.display =
            'none';
        phoneshown = uniquekey;
    }
}

function phonesubmit() {
    if (document.form.markphone.value != '') {
        var phonearr = ['phonecalldate', 'phonecalltime',
            'phonecallnumber', 'phonecallemail',
            'phonecallnotes'
        ];
        for (var i = 0; i < phonearr.length; i++) {
            document.getElementById(phonearr[i]).value = document
                .getElementById(phonearr[i] + document.form
                    .markphone.value).value;
        }

        if (document.getElementById('phonecall' + document.form
            .markphone.value + 'yes').checked) document
                .getElementById('phonecall').value = 'yes';
        else {
            document.getElementById('phonecall').value = 'no';
        }
    }
}

function phonestatus(uniquekey, yesno) {
    if (yesno == 'yes') {
        document.getElementById('phonecall' + uniquekey + 'no')
            .checked = false;
        document.getElementById('phonecall').value = 'yes';
    }
    if (yesno == 'no') {
        document.getElementById('phonecall' + uniquekey + 'yes')
            .checked = false;
        document.getElementById('phonecall').value = 'no';
    }
}

function markphoned(uniquekey, status, patient) {
    document.form.markphone.value = uniquekey;
    document.form.markphonestatus.value = status;
    document.form.selectedpatients.value = patient;
    document.form.markonly.value = 'true';
    document.form.submit();
}
var shownphone = '';
var patienthascall = [];

function previewphoneall(patientid, onoff) {
    // if (patienthascall[patientid]) {
    if (shownphone == '') {
        if (document.getElementById('phoneall' + patientid)) {
            if (onoff == 'on') {
                document.getElementById(
                    'phoneall' + patientid)
                    .style.display =
                    'block'
            } else {
                document.getElementById('phoneall' + patientid)
                    .style.display = 'none';
            }
        }
    }
    // }
}

function showphoneall(patientid) {
    // if (patienthascall[patientid]) {
    if (document.getElementById('phoneall' + patientid).style
        .display == 'block' && shownphone == '') {
        if (shownphone != '') document.getElementById(
            'phoneall' + shownphone).style.display = 'none';
        document.getElementById('phoneall' + patientid).style
            .display = 'block';
        //document.form.starpid.value=patientid;
        shownphone = patientid;
    } else {
        document.getElementById('phoneall' + patientid).style
            .display = 'none';
        //document.form.starpid.value='';
        shownphone = '';
    }
    // }
}

//Functions: Bill and Payment


function showpayment(i) {
    document.getElementById('paymentdrop' + i).style.display =
        'block';
}

function hidepayment(i) {
    document.getElementById('paymentdrop' + i).style.display =
        'none';
}

/**
 * Change Billing of specific visit
 * @param id Encounter Id
 * @param date EncounterDate
 * @param status Billing status
 */
function changeBill(id, date, status) {
    if (status == 'complete') {
        status = 'incomplete';
    }
    else if (status == '' || status == 'incomplete') {
        status = 'ready';
    }
    else {
        status = 'complete';
    }
    if (confirm("Mark billing for visit " + date + " as " + status)) {
        $.ajax({
            type: "post",
            url: root + "/changeBill",
            data: "status=" + status + "&id=" + id,
            headers: {
                'X-CSRF-TOKEN': csrf
            },
            success: function (r) {
                $("#alertDiv").fadeIn();
                $("#billAlert").html("Visit " + date + " marked as " + status + "<br> Refresh the page to see changes");
            },
            error: function (r) {
                $("#alertDiv").fadeIn();
                $("#billAlert").html("Some thing wrong!");
            }
        });
    }

}
var bpshown, shown, shownuk;

function bpsubmit() {
    if (document.form.billorpay.value != '' && document.form
        .billpayuniquekey.value != "") {
        var billarr = ['billingclaimnumber', 'billingdatesent',
            'billingamount', 'billingnotes'
        ];
        var payarr = [ /*'billingdeductible',*/ 'billingpaid',
            'paymentnotes'
        ];
        var arr;
        if (document.form.billorpay.value == 'billing') arr =
            billarr;
        if (document.form.billorpay.value == 'payment') arr =
            payarr;
        for (var i = 0; i < arr.length; i++) {
            document.getElementById(arr[i]).value = document
                .getElementById(arr[i] + document.form
                    .billpayuniquekey.value).value;
        }
        //billingincomplete,billingready,billingcomplete,paymentwaiting,paymentpartial,paymentfull
    }
}

function filterbillpay() {
    var billingsrc, paymentsrc;
    for (var i = 0; i < allpatientids.length; i++) {
        billingsrc = document.getElementById('billingimg' +
            allpatientids[i]).src.split('/');
        paymentsrc = document.getElementById('paymentimg' +
            allpatientids[i]).src.split('/');
        billingsrc = billingsrc[billingsrc.length - 1];
        paymentsrc = paymentsrc[paymentsrc.length - 1];
        if (document.getElementById("showall").checked) {
            document.getElementById('patienttable' + allpatientids[
                i]).style.display = 'block';
            document.getElementById('encounter' + allpatientids[i])
                .style.display = 'none';
        } else if (document.getElementById("showcomplete")
            .checked && billingsrc == 'billingcomplete.png') {
            document.getElementById('patienttable' + allpatientids[
                i]).style.display = 'block';
            document.getElementById('encounter' + allpatientids[i])
                .style.display = 'block';
        } else if (document.getElementById("showincomplete")
            .checked && billingsrc == 'billingincomplete.png') {
            document.getElementById('patienttable' + allpatientids[
                i]).style.display = 'block';
            document.getElementById('encounter' + allpatientids[i])
                .style.display = 'block';
        } else if (document.getElementById("showready").checked &&
            billingsrc == 'billingready.png') {
            document.getElementById('patienttable' + allpatientids[
                i]).style.display = 'block';
            document.getElementById('encounter' + allpatientids[i])
                .style.display = 'block';
        } else if (document.getElementById("showwaiting").checked &&
            paymentsrc == 'paymentwaiting.png') {
            document.getElementById('patienttable' + allpatientids[
                i]).style.display = 'block';
            document.getElementById('encounter' + allpatientids[i])
                .style.display = 'block';
        } else if (document.getElementById("showpartial").checked &&
            paymentsrc == 'paymentpartial.png') {
            document.getElementById('patienttable' + allpatientids[
                i]).style.display = 'block';
            document.getElementById('encounter' + allpatientids[i])
                .style.display = 'block';
        } else if (document.getElementById("showfull").checked &&
            paymentsrc == 'paymentfull.png') {
            document.getElementById('patienttable' + allpatientids[
                i]).style.display = 'block';
            document.getElementById('encounter' + allpatientids[i])
                .style.display = 'block';
        } else {
            document.getElementById('patienttable' + allpatientids[
                i]).style.display = 'none';
            document.getElementById('encounter' + allpatientids[i])
                .style.display = 'none';
        }
        //if(document.getElementById("showincomplete").checked=='true')
        //if(document.getElementById("showready").checked=='true')
        //if(document.getElementById("showpartial").checked=='true')
        //if(document.getElementById("showfull").checked=='true')
        //if(document.getElementById("showwaiting").checked=='true')
    }
}

function showhideyear(pid, year) {
    if (document.getElementById('patientid' + pid + 'year' +
        year)) {
        if (document.getElementById('patientid' + pid + 'year' +
            year).style.display == 'none') {
            document.getElementById('patientid' + pid + 'year' +
                year).style.display = 'block';
            document.getElementById('patientid' + pid + 'year' +
                year + 'plus').src =
                '//images/minus.png';
        } else if (document.getElementById('patientid' + pid +
            'year' + year).style.display == 'block') {
            document.getElementById('patientid' + pid + 'year' +
                year).style.display = 'none';
            document.getElementById('patientid' + pid + 'year' +
                year + 'plus').src =
                '//images/plus.png';
        }
    }
}



