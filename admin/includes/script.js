$(document).ready(function(){

//========================= Create Course  ======================================================
    $("#course_create").click(function(e){
        e.preventDefault()
        var id = $("#c_id").val();
        var name = $("#c_name").val();
        var status = $("#c_status").val();
        if (name == "") {
            alert("Don't Leave any field empty");
            $("#c_name").focus();
            return false;
        }
        $.ajax({
            url: "functions/create_course.php",
            type: "POST",
            data : {
                    c_id: id,
                    c_name: name,
                    c_status: status,		
                    },
               success: function(data){
               if (data == 1) {
	            swal('New', 'Course Registered', 'success');
                  //return false;
               }
               if (data==2) {
                swal('Course ', 'is Update Registered', 'success');
                setTimeout(function(){ window.location.href="?nav=course_display" });
               }
               else{
                alert(data);
                $("#c_name").val('')
               }
            }
        });
    });


//========================= /Create Course  ======================================================

//========================= /Create Teacher  ======================================================


$("#teacher_create").click(function(e){
    e.preventDefault()
    var t_id = $("#t_id").val();
    var name = $("#name").val();
    var lname = $("#lname").val();
    var gender = $("#gender").val();
    var cnic = $("#cnic").val();
    var phone = $("#phone").val();
    var email = $("#email").val();
    var password = $("#password").val();
    var adress = $("#adress").val();
    var qua = $("#qua").val();

    // var course = $("#b_course").val();
    // var shift = $("#b_shift").val();
    // var status = $("#b_status").val();
    if (name == "") {
        alert("Don't Leave Name empty");
        $("#name").focus();
        return false;
    }
    if (lname == "") {
        alert("Don't Leave Last Name empty");
        $("#lname").focus();
        return false;
    }
    if (cnic == "") {
        alert("Don't Leave CNIC empty");
        $("#cnic").focus();
        return false;
    }
    if (email == "") {
        alert("Don't Leave Email empty");
        $("#email").focus();
        return false;
    }
    if (phone == "") {
        alert("Don't Leave Phone empty");
        $("#phone").focus();
        return false;
    }
    if (password == "") {
        alert("Don't Leave Password empty");
        $("#password").focus();
        return false;
    }
    

    $.ajax({
        url: "functions/create_teacher.php",
        type: "POST",
        data : {
                t_id : t_id,
                t_name: name,
                t_lname: lname,
                t_gender: gender,
                t_cnic : cnic,
                t_email : email,
                t_phone : phone,
                t_adress:  adress,
                t_qua:  qua,
                t_password: password		
                },
           success: function(data){
           if (data == 1) {
            swal('New', 'Teacher Registered', 'success');
           // setTimeout(function(){ window.location.href="?nav=teacher_display" });
            return false;
           }
           if (data==2) {
            swal('Teacher', 'Updated', 'success');
            setTimeout(function(){ window.location.href="?nav=teacher_display" });
           }
           else{
            alert(data);
            $("#name").val('');
            $("#lname").val('');
           }
        }
    });
});

//========================= /Create Teacher  ======================================================

//========================= Create Batch ======================================================

$("#batch_create").click(function(e){
    e.preventDefault()
    var id = $("#id").val();
    var name = $("#b_name").val();
  //  var course = $("#b_course").val();
    var status = $("#b_status").val();
  
    if (name == "") {
        alert("Don't Leave any field empty");
        $("#b_name").focus();
        return false;
    }
    

    $.ajax({
        url: "functions/create_batch.php",
        type: "POST",
        data : {
                id : id,
                b_name: name,
               // b_course:course,
                b_status: status		
                },
           success: function(data){
           if (data == 1) {
            swal('New', 'Batch Registered', 'success');
            $("#b_name").val('');
           
           //setTimeout(function(){ window.location.href="?nav=batch_display" });
            return false;
           }
           if (data==2) {
            swal('Batch', 'Updated', 'success');
            setTimeout(function(){ window.location.href="?nav=batch_display" });
           }
           else{
            alert(data);
            $("#b_name").val('');
            $("#batch_id").val('');
           }
        }
    });
});
//========================= /Create Batch  ======================================================


//========================= Assign Batch ======================================================

$("#assign_batch_create").click(function(e){
    e.preventDefault()
    var id = $("#id").val();
    var name = $("#b_name").val();
    var course = $("#b_course").val();
    var batch = $("#section").val();
    var teacher = $("#teacher_id").val();
    // alert(batch);
    // return false;

   
    if (name == "") {
        alert("Don't Leave any field empty");
        $("#b_name").focus();
        return false;
    }
    

    $.ajax({
        url: "functions/assign_batch.php",
        type: "POST",
        data : {
                id : id,
                b_name: name,
                b_course: course,	
                b_teacher: teacher,
                batch: batch
                },
           success: function(data){
           if (data == 1) {
            swal('New', 'Study Group Registered', 'success');
            $("#b_name").val('');
          //  setTimeout(function(){ window.location.href="?nav=batch_display" });
            return false;
           }
           if (data==2) {
            swal('Study Group', 'Updated', 'success');
            setTimeout(function(){ window.location.href="?nav=asign_batch" });
           }
           else{
            alert(data);
            $("#b_name").val('');
        //$("#batch_id").val('');
           }
        }
    });
});
//========================= /AssignBatch  ======================================================

//========================= /Create Student  ======================================================


$("#student_create").click(function(e){
    e.preventDefault()
    var s_id = $("#s_id").val();
    var name = $("#name").val();
    var lname = $("#lname").val();
    var fname = $("#fname").val();
    var gender = $("#gender").val();
    var course = $("#course").val();
    var batch = $("#batch").val();
    var phone = $("#phone").val();
    var email = $("#email").val();
    var password = $("#password").val();
    var fphone = $("#fphone").val();

   

    if (name == "") {
        alert("Don't Leave Name empty");
        $("#name").focus();
        return false;
    }
    if (lname == "") {
        alert("Don't Leave Last Name empty");
        $("#lname").focus();
        return false;
    }
    
    if (email == "") {
        alert("Don't Leave Email empty");
        $("#email").focus();
        return false;
    }
    if (phone == "") {
        alert("Don't Leave Phone empty");
        $("#phone").focus();
        return false;
    }
    if (password == "") {
        alert("Don't Leave Password empty");
        $("#password").focus();
        return false;
    }
    

    $.ajax({
        url: "functions/create_students.php",
        type: "POST",
        data : {
                s_id : s_id,
                name: name,
                lname: lname,
                fname: fname,
                gender: gender,
                course: course,
                batch: batch,
                phone : phone,
                email : email,
                password: password,		
                fphone:  fphone,
                
                },
           success: function(data){
           if (data == 1) {
            alert("New Student Registered");
            setTimeout(function(){ window.location.href="?nav=student_display" });
            return false;
           }
           if (data==2) {
            alert("Student Update");
            setTimeout(function(){ window.location.href="?nav=student_display" });
           }
           else{
            alert(data);
            $("#name").val('');
            $("#lname").val('');
           }
        }
    });
});


$(document).ready(function(){
    $("#filter").click(function (e){
        e.preventDefault();
        var  batch = $("#batch").val();
        var  course = $("#course").val();
        // alert (batch);
        // alert (course);
        $.ajax({
                url: "filter.php",
            type: "POST",
            data: {batch : batch,
                course:course
                },
            success: function (data){
                $("#table-data").html(data);
               // $("#filter").hide();
              //  $("#clear").show();
            }
        });
    });
});
//========================= /Create Student  ======================================================



});



