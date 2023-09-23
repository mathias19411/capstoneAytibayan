<!DOCTYPE html>
<html>
<head>
    <title>Add Program</title>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"
    integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj"
    crossorigin="anonymous">
    <!----======== CSS ======== -->
    <link rel="stylesheet" href="{{ asset('Assets/css/itstaff.css') }}">
    <script >
    // itstaff.js

document.addEventListener("DOMContentLoaded", function () {
    const numColumnsInput = document.getElementById("num_columns");
    const generateButton = document.getElementById("generate-columns");
    const columnInputsContainer = document.getElementById("column-inputs");

    generateButton.addEventListener("click", function () {
        const numColumns = parseInt(numColumnsInput.value);
        columnInputsContainer.innerHTML = ""; // Clear previous inputs

        for (let i = 1; i <= numColumns; i++) {
            const columnGroup = document.createElement("div");
            columnGroup.classList.add("input-group"); // Add input-group class

            const columnDiv = document.createElement("div");
            columnDiv.classList.add("column-div"); // Add column-div class

            const nameLabel = document.createElement("label");
            nameLabel.textContent = `Column ${i} Name:`;
            const nameInput = document.createElement("input");
            nameInput.type = "text";
            nameInput.name = `column_name_${i}`;
            nameInput.placeholder = ``;
            nameInput.classList.add("column-input"); // Add column-input class

            const typeLabel = document.createElement("label");
            typeLabel.textContent = `Data Type:`;
            const typeSelect = document.createElement("select");
            typeSelect.name = `column_type_${i}`;
            typeSelect.classList.add("column-input"); // Add column-input class
            // Add data type options to the select dropdown
            const dataTypes = ["Text", "Int", "Date", "Boolean"];
            dataTypes.forEach(dataType => {
                const option = document.createElement("option");
                option.value = dataType.toLowerCase();
                option.textContent = dataType;
                typeSelect.appendChild(option);
            });

            columnDiv.appendChild(nameLabel);
            columnDiv.appendChild(nameInput);
            columnDiv.appendChild(typeLabel);
            columnDiv.appendChild(typeSelect);
            
            columnGroup.appendChild(columnDiv);

            columnInputsContainer.appendChild(columnGroup);
        }
    });
});

</script>

    <!----===== Iconscout CSS ===== -->
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">
   
</head>
<body >
<div class="program-form">
    <form id="myForm" action="{{ route('addprogram') }}" method="post">
        @csrf
    <h1>Program Information</h1>
    
    <div class="form-row">
        <div class="input-group">
            <label for="name">Project Coordinator:</label>
            <input type="text" id="name" placeholder="" name="project_coordinator">
        </div>
        <div class="input-group">
            <label for="program_name">Name of the Program:</label>
            <input type="text" id="program_name" placeholder="" name="program">
        </div>
        <div class="input-group">
            <label for="program_key">Program Key:</label>
            <input type="text" id="program_key" placeholder="" name="program_key">
        </div>
        <div class="input-group">
            <label for="loc">Location:</label>
            <input type="text" id="loc" placeholder="" name="location">
        </div>
    </div>
    
    <div class="form-row">
        <div class="input-group">
            <label for="email">Email Address:</label>
            <input type="email" id="email" placeholder="juandelacruz@APAO_program.com" name="email">
        </div>
        <div class="input-group">
            <label for="contact">Contact Number:</label>
            <input type="tel" id="contact" placeholder="09xxxxxxxxx" name="contact">
        </div>
        <div class="input-group">
            <label for="info">Program Information:</label>
            <textarea id="info" placeholder="" name="description"></textarea>
        </div>
        
    </div>
    
    <div class="form-row1">
        <div class="input-group">
            <label for="apply">How to Apply:</label>
            <textarea id="apply" placeholder="" name="quiry"></textarea>
        </div>
        <div class="input-group">
            <label for="reqs">Guidelines and Requirements:</label>
            <textarea id="reqs" placeholder="" name="requirements"></textarea>
        </div>
        <div class="input-group">
            <label for="image">Image:</label>
            <input type="file" id="image" accept="image/*" name="image">
        </div>
    </div>
    
    <div class="form-row">
        <div class="input-group">
            <label for="table_name">Table Name:</label>
            <input type="text" id="table_name" name="table">
        </div>
        <div class="input-group">
            <label for="num_columns">Number of Columns:</label>
            <input type="number" id="num_columns"  min="1" max="10" name="columns">
        </div>
    </div>

    <div id="generate-button" class="center">
        <button id="generate-columns" type="button">Generate Columns</button>
    </div>

    <div id="column-inputs">
        <!-- Column name and datatype inputs will be generated here -->
    </div>

    </form>
    <div class="center">
    <input type="submit" value="Save">
    </div>
</div>


</form>

</body>

</html>