<script>
    var endpoints = {
        register : "<?php echo base_url('accountApi/Register') ?>",
        paymentKey: "<?php echo base_url('generalApi/GetPaymentKey'); ?>",
        transactionRef: "<?php echo base_url('generalApi/GetTransactionRef'); ?>",
        validatePackage:  "<?php echo base_url('accountApi/ValidatePackage'); ?>",
        login:  "<?php echo base_url('accountApi/Login'); ?>",
        adminLogin:  "<?php echo base_url('accountApi/AdminLogin'); ?>",
        admin:{
            viewMembership:  "<?php echo base_url('adminApi/ViewMembership'); ?>",
            approveMember: "<?php echo base_url('adminApi/ApproveMember/'); ?>",
            rejectMember: "<?php echo base_url('adminApi/RejectMember/'); ?>",
            viewTransactions: "<?php echo base_url('adminApi/ViewTransactions'); ?>"
        } ,
    }
</script>