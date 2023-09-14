<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Project Coordinator</title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Modal -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <!-- Table -->
    <link href="https://cdn.datatables.net/1.13.6/css/dataTables.bootstrap5.min.css">
    <!-- CSS link -->
    <link rel="stylesheet" href="{{ asset('Assets/css/coordinator.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.0/css/all.min.css">
    <script src="https://kit.fontawesome.com/6297197d39.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">
</head>
<body class="projcoordinator">

        @yield('content')
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"></script>
    <!-- Table -->
    <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>    
    <script src="https://cdn.datatables.net/1.13.6/js/dataTables.bootstrap5.min.js"></script>    
    <script src="{{ asset('Assets/js/coordinator.js') }}"></script>
    <script> 
        new DataTable('#coordinator_table');
        
        //location
        $(document).ready(function () {
        $("#locationFilter").change(function () {
            var selectedLocation = $(this).val();

            $("#coordinator_table tbody tr").each(function () {
                var rowLocation = $(this).find("td:nth-child(3)").text().trim(); 
                if (selectedLocation === "All" || rowLocation.includes(selectedLocation)) {
                    $(this).show();
                } else {
                    $(this).hide();
                }
            });
        });
    });
    //DROP IMAGE
    const dropImg = document.getElementById("drop-img");
const inputFile = document.getElementById("input-file");
const imgView = document.getElementById("img-view");

inputFile.addEventListener("change", uploadImage);

function uploadImage(){
    let imgLink = URL.createObjectURL(inputFile.files[0]);
    imgView.style.backgroundImage = `url(${imgLink})`;
    imgView.textContent ="";
}

dropImg.addEventListener("dragover", function(e){
    e.preventDefault();
});
dropImg.addEventListener("drop", function(e){
    e.preventDefault();
    inputFile.files = e.dataTransfer.files;
    uploadImage();
});
    
    </script>

</body>
</html>