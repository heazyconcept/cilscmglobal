<script>
    var endpoints = {
        register : "<?php echo base_url('accountApi/Register') ?>",
        paymentKey: "<?php echo base_url('generalApi/GetPaymentKey'); ?>",
        transactionRef: "<?php echo base_url('generalApi/GetTransactionRef'); ?>",
        validatePackage:  "<?php echo base_url('accountApi/ValidatePackage'); ?>"
    }
</script>