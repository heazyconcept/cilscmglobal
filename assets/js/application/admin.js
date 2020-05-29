var memberName = "All";
$(document).ready(function () {
    var memberTable = $('.member-table').DataTable({
        "Destroy": true,
        "pageLength": 50,
        "processing": true,
        "serverSide": true,
        "ajax": {
            "url": endpoints.admin.viewMembership,
            "dataType": "json",
            "type": "GET",
            "data": function (d) {
                d.MemberName = memberName;
            }
        },
        "columns": [
            { "data": "MembershipId" },
            { "data": "Name" },
            { "data": "Membership" },
            { "data": "Status" },
            { "data": "EmailAddress" },
            { "data": "DOB", "width": "200px" },
            { "data": "Address" },
            { "data": "Olevel" },
            { "data": "SecSchool" },
            { "data": "ProfessionalCert" },
            { "data": "UniversityCert" },
            { "data": "OtherCert" },
            { "data": "Resume" },
            { "data": "Action" }

        ],
        "columnDefs": [
            { width: 200, targets: 5 }
        ],

    });
    
    $(".nav-link").click(function () {
        memberName = $(this).data("name");
        console.log(memberName);
        $(".nav-link").removeClass("active");
        $(this).addClass("active");
        memberTable.ajax.reload();
    })
    $(document).on("click", ".btn-approve", function () {
        var userID = $(this).data("id");
        var url = endpoints.admin.approveMember + userID;
        AjaxInit(url, "", false, true, true);

    })
    $(document).on("click", ".btn-reject", function () {
        var userID = $(this).data("id");
        var url = endpoints.admin.rejectMember + userID;
        AjaxInit(url, "", false, true, true);

    })
    var transactionTable = $('.transaction-table').DataTable({
        "Destroy": true,
        "pageLength": 50,
        "processing": true,
        "serverSide": true,
        "ajax": {
            "url": endpoints.admin.viewTransactions,
            "dataType": "json",
            "type": "GET",
        },
        "columns": [
            { "data": "TransactionRef" },
            { "data": "Amount" },
            { "data": "TransactionDate" },
            { "data": "FullName" },
            { "data": "EmailAddress" },
            { "data": "MembershipId" },
            { "data": "Certificate" }
        ],

    });
    var certificateTable = $('.certificate-table').DataTable({
        "Destroy": true,
        "pageLength": 50,
        "processing": true,
        "serverSide": true,
        "ajax": {
            "url": endpoints.admin.viewCertificate,
            "dataType": "json",
            "type": "GET",
        },
        "columns": [
            { "data": "TransactionRef" },
            { "data": "Amount" },
            { "data": "TransactionDate" },
            { "data": "FullName" },
            { "data": "EmailAddress" },
            { "data": "MembershipId" },
            { "data": "Certificate" }
        ],

    });

});