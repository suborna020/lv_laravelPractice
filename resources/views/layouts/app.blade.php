<!DOCTYPE html>
<html lang="en">
<head>
    <title>Bootstrap 4 Website Example</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

   <!-- md bootstrap link   -->
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css">
    <!-- Google Fonts -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap">
    {{-- for sweetalert2   --}}
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js" integrity="sha512-AA1Bzp5Q0K1KanKKmvN/4d3IRKVlv9PYgwFPvm32nPO6QS8yH1HO7LbgB1pgiOxPtfeg5zEn2ba64MUcqJx6CA==" crossorigin="anonymous"></script>
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <style>

    </style>
</head>
<body style="background: aliceblue;">
    <nav class="navbar navbar-expand-sm bg-dark navbar-dark">
        <a class="navbar-brand" href="#">MyNavbar</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
            <span class="navbar-toggler-icon"></span>
        </button>

    </nav>
    @yield('content')
<script>
        $('#addTitle').show();
        $('#addButton').show();
        $('#updateTitle').hide();
        $('#updateButton').hide();
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }

        })

        function allData() {
            $.ajax({
                type: "GET"
                , DataType: 'json'
                , url: "/alldata"
                , success: function(allData) {
                    var getHtml = ""
                    $.each(allData, function(key, allDatavalue) {
                        // console.log(allDatavalue);
                        getHtml += `<tr>
                                <td>${allDatavalue.id}</td>
                                <td>${allDatavalue.name}</td>
                                <td>${allDatavalue.title}</td>
                                <td>${allDatavalue.institute}</td>
                                <td>
                                <button class="btn btn-sm btn-primary mr-2" onclick='editData(${allDatavalue.id})'>Edit</button>
                                <button class="btn btn-sm btn-danger mr-2" onclick='deleteData(${allDatavalue.id})'>Delete</button>
                                </td>
                                </tr>`
                    })
                    $('#tbodyId').html(getHtml);

                }
            })
        }
        allData();
        // clear input data
        function clearData() {
            $('#name').val('');
            $('#title').val('');
            $('#institute').val('');
            $('#nameError').text('');
            $('#titleError').text('');
            $('#instituteError').text('');
        }
        // add data by submitting card
        function addData() {
            //getting input box value by id calling
            var name = $('#name').val();
            var title = $('#title').val();
            var institute_variable = $('#institute').val();
            // console.log("name on addData funtion", name);
            $.ajax({
                type: "POST"
                , DataType: 'json'
                    // card values storing in (data) property
                , data: {
                    name: name
                    , title: title
                    , institute_property: institute_variable
                }
                , url: "/teacherDataStore"
                , success: function(data) {
                    // clear input fields data function
                    clearData();
                    // allData() function again reload on submit sucssec for viewing the data on table without load
                    allData();
                    console.log('successfully data added');
                    const Msg = Swal.mixin({
                        toast: true
                        , position: 'top-end'
                        , icon: 'success'
                        , showConfirmButton: false
                        , timer: 1500
                    })
                    Msg.fire({
                        type: 'success'
                        , title: 'Data added success'
                    })
                }
                , error: function(error) {
                    console.log('check the error path error->resposeJson.errors');
                    console.log("add funtion error", error);
                    $('#nameError').text(error.responseJSON.errors.name);
                    $('#titleError').text(error.responseJSON.errors.title);
                    $('#instituteError').text(error.responseJSON.errors.institute_property);
                }
            })
        }

        function editData(id) {
            // id is passed by onclick function
            console.log('clicked id', id);
            $.ajax({
                type: "GET"
                , DataType: 'json'
                , url: "/editData/" + id
                , success: function(data) {
                    $('#addTitle').hide();
                    $('#addButton').hide();
                    $('#updateTitle').show();
                    $('#updateButton').show();
                    console.log("editData vules", data);
                    $('#id').val(data.id);
                    $('#name').val(data.name);
                    $('#title').val(data.title);
                    $('#institute').val(data.institute);
                }
            })
        }

        function updateData() {
            //getting input box value by id calling
            var id = $('#id').val();
            var name = $('#name').val();
            var title = $('#title').val();
            var institute_variable = $('#institute').val();
            console.log('update id ', id);
            $.ajax({
                type: "POST"
                , DataType: 'json'
                    // card values storing in (data) property
                , data: {
                    name: name
                    , title: title
                    , institute_property: institute_variable
                }
                , url: "/teacherDataUpdate/" + id
                , success: function(data) {
                    // clear input fields data function
                    clearData();
                    // allData() function again reload on submit sucssec for viewing the data on table without load
                    allData();
                    console.log("Data updated");
                    $('#addTitle').show();
                    $('#addButton').show();
                    $('#updateTitle').hide();
                    $('#updateButton').hide();
                    // for alert
                    const Msg = Swal.mixin({
                        toast: true
                        , position: 'top-end'
                        , icon: 'success'
                        , showConfirmButton: false
                        , timer: 1500
                    })
                    Msg.fire({
                        type: 'success'
                        , title: 'Data update success'
                    })

                }
                , error: function(error) {
                    console.log('check the error path error->resposeJson.errors');
                    console.log(error);
                    alert('Unable to update');
                    $('#nameError').text(error.responseJSON.errors.name);
                    $('#titleError').text(error.responseJSON.errors.title);
                    $('#instituteError').text(error.responseJSON.errors.institute_property);
                }
            })
        }

        function deleteData(id) {
            // id is passed by onclick function
            swal({
                title: 'Are you sure you want to delete?'
                , text: "You won't be able to revert this!"
                , icon: 'warning'
                , buttons: true
                , dangerMode: true,
            }).then((willDelete) => {
                if (willDelete) {
                    $.ajax({
                        type: "GET"
                        , DataType: 'json'
                        , url: "/destroyData/" + id
                        , success: function(data) {
                            allData();
                            console.log('deleted');
                        }
                    })
                } else{

                    // swal("Canceled");

                }
            });
            console.log('clicked id', id);

        }

    </script>
</body>
</html>
