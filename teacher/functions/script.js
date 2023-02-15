$(document).ready(function(){
//========================= Create Course  ======================================================
    $("#mark_attendence").click(function(e){
        e.preventDefault()
        var id = $("#id").val();
        var std_id = $("#student_id").val();
        var status = $("#att_sts").val();
        var date = $("#date").val();
        var check_in = $("#check_in").val();
        var check_out = $("#check_out").val();
            // alert(std_id);
            // return false;
            if (std_id == "") {
                alert("Don't Leave Student Id empty");
                $("#student_id").focus();
                return false;
            }

        
        $.ajax({
            url: "functions/mark_attendence.php",
            type: "POST",
            data : {
                    id: id,
                    std_id: std_id,
                    status: status,
                    date : date,
                    check_in : check_in,
                    check_out: check_out,
                   
                    },
               success: function(data){
               if (data == 1) {
                alert("Attendence Marked");
              setTimeout(function(){ window.location.href="?nav=mark_attendence" });
                return false;
               }
               if (data==2) {
                alert("Attendence Update");
                setTimeout(function(){ window.location.href="?nav=mark_attendence" });
               }
               else{
                alert(data);
                $("#c_name").val('')
               }
            }
        });
    });


//========================= /Create Course  ======================================================
//========================= Create Course  ======================================================

$("#mark_all_attendence").click(function(e){
    e.preventDefault()
    // alert ("okkk");
    //  return false;
    var std_id = $("#all_student_id").val();
    var status = $("#all_att_sts").val();
    var date = $("#all_date").val();
    var check_in = $("#all_check_in").val();
    var check_out = $("#all_check_out").val();
         alert(std_id);
        // return false;
        if (std_id == "") {
            alert("Don't Leave Student Id empty");
            $("#student_id").focus();
            return false;
        }

    
    $.ajax({
        url: "functions/mark_attendence.php",
        type: "POST",
        data : {
                id: id,
                std_id: std_id,
                status: status,
                date : date,
                check_in : check_in,
                check_out: check_out,
               
                },
           success: function(data){
           if (data == 1) {
            alert("Attendence Marked");
          setTimeout(function(){ window.location.href="?nav=mark_attendence" });
            return false;
           }
           if (data==2) {
            alert("Attendence Update");
            setTimeout(function(){ window.location.href="?nav=mark_attendence" });
           }
           else{
            alert(data);
            $("#c_name").val('')
           }
        }
    });
});


//========================= /Create Course  ======================================================

});

