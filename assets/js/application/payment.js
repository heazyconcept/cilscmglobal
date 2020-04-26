$(document).ready(function () {
   GetPaymentKey();
    $('.btn-pay').click(function () { 
        var email = $(this).data("email");
        var userId = $(this).data("id");
        var code = $(this).data("code");
        var transactionRef = $(this).data("ref");
        var amount = $(this).data("amount");
          var handler = PaystackPop.setup({
             key: paystackKey,
             email: email,
             amount: amount * 100,
             ref: transactionRef,
             callback: function (response) {
                 console.log(response);
                 var formData = new FormData();
                 formData.append("UserId", userId);
                 formData.append("PaymentCode", code);
                 formData.append("TransactionResponse", JSON.stringify(response));
                 formData.append("TransactionStatus", "Success");
                 formData.append("Amount", amount);
                 formData.append("TransactionRef", transactionRef);
                 AjaxInit(endpoints.makePayment, formData, true, false,true);
               
             },
             onClose: function () {
                 alert('window closed');
             }
         });
         handler.openIframe();
      })
});