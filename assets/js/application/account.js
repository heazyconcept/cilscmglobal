var paystackKey;
var transactionRef
$(document).ready(function () {
    $.post(endpoints.paymentKey)
        .done(data => {
            console.log(data);
            try {
                response = JSON.parse(data);
                if (response.StatusCode == "00") {
                    paystackKey = response.StatusMessage;
                }
            } catch (error) {
                console.log(error);
                fatalMessage();
            }
        })
        .fail(err =>{
            console.log(err);
            fatalMessage();
        })
    $.post(endpoints.transactionRef)
    .done(data => {
        console.log(data);
        try {
            response = JSON.parse(data);
            if (response.StatusCode == "00") {
                transactionRef = response.StatusMessage;
            }
        } catch (error) {
            console.log(error);
            fatalMessage();
        }
    })
    .fail(err =>{
        console.log(err);
        fatalMessage();
    })
    var userDetails = {
        regState: "step-one",
        State: "",
        PackageName: "",
        PackageAmount: 0,
        email: ""
    }
    $(".btn-package").click(function () {
        var presentState = userDetails.regState;
        if ($("#state").val() == null || $("#state").val() == undefined || $("#state").val() == '') {
            errorMessage("you need to select state");
            return;
        };
        userDetails.State = $("#state").val();
        userDetails.PackageName = $(this).data('member').toUpperCase();
        userDetails.PackageAmount = $(this).data('price');
        userDetails.regState = "step-two";
        sessionStorage.setItem("userDetails", JSON.stringify(userDetails));
        $(`.${presentState}`).removeClass('current').addClass('done');
        $(`.${userDetails.regState}`).addClass('current');
        $(`.${presentState}-wrapper`).hide('fast');
        $(`.${userDetails.regState}-wrapper`).show("fast");
        $(`.next-previous`).show("fast");


    });
    $('.btn-next').click(function () {
        var sessionData = JSON.parse(sessionStorage.getItem('userDetails'));
        var initialStage = sessionData.regState;
        var reqlength = $(`.${initialStage}-field`).length;
        console.log(reqlength);
        var value = $(`.${initialStage}-field`).filter(function () {
            return this.value != '';
        });

        if (value.length >= 0 && (value.length !== reqlength)) {
            errorMessage('Please fill out all required fields.');
            return;
        }
        switch (initialStage) {
            case "step-two":
                sessionData.email = $('#EmailAddress').val();
                sessionData.regState = "step-three";
                break;
            case "step-three":
                sessionData.regState = "step-four";
                $('.next-previous').hide("fast");
                break;
            default:
                break;
        }
        sessionStorage.setItem("userDetails", JSON.stringify(sessionData));
        $(`.${initialStage}`).removeClass('current').addClass('done');
        $(`.${sessionData.regState}`).addClass('current');
        $(`.${initialStage}-wrapper`).hide('fast');
        $(`.${sessionData.regState}-wrapper`).show("fast");

    })
    $('.btn-pay').click(function () { 
       var sessionData = JSON.parse(sessionStorage.getItem("userDetails"));
         var handler = PaystackPop.setup({
            key: paystackKey,
            email: sessionData.email,
            amount: sessionData.PackageAmount * 100,
            ref: transactionRef,
            callback: function (response) {
                console.log(response);
                
                var formData = new FormData($('form#regForm')[0]);
                formData.append("Membership", sessionData.PackageName);
                formData.append("TransactionRef", transactionRef);
                formData.append("TransactionResponse", JSON.stringify(response));
                formData.append("TransactionStatus", "Success");
                formData.append("Amount", sessionData.PackageAmount);
               $.ajax({
                    url: endpoints.register,
                    type: 'POST',
                    data: formData,
                    async: false,
                    success: function (data) {
                        console.log(data);
                        try {
                            resp = JSON.parse(data);
                            if (resp.StatusCode == '00') {
                                succesMessage(resp.StatusMessage);
                                setTimeout(() => {
                                    location.reload();
                                }, 2000);
                            } else {
                                errorMessage(resp.StatusMessage);
                            }

                        } catch (error) {
                            console.log(error);
                            fatalMessage();
                        }

                    },
                    error: function (err) {
                        console.log(err);
                        fatalMessage();

                    },
                    cache: false,
                    contentType: false,
                    processData: false
                });

            },
            onClose: function () {
                alert('window closed');
            }
        });
        handler.openIframe();
     })

    // var $elem = $(this).closest('div.body').next().find('div.calculationContainer') 
});
function CheckState() {


}