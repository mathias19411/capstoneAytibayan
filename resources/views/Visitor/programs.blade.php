
<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="{{ asset('programs.css') }}">
    <script src="{{ asset('programs.js') }}"></script>
</head>
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<body class="programs">
    <div class="logo">
        <img src="\images\logo.png" alt="Logo">
    </div>
    <div class="container">
        <div class="box" id="binhi-ng-pagasa">
            <div class="content">
                <img src="\images\Logo_BinhiNgPagasa.png" alt="Image 1">
                <h3>binhi ng pag-asa</h3>
                <button onclick="selectProgram('binhi-ng-pagasa')">Select</button>
            </div>
        </div>
        <div class="box" id="agripinay">
            <div class="content">
                <img src="\images\Logo_AgriPinay.png" alt="Image 2">
                <h3>agripinay</h3>
                <button onclick="selectProgram('agripinay')">Select</button>
            </div>
        </div>
        <div class="box" id="akbay">
            <div class="content">
                <img src="\images\Logo_Akbay.png" alt="Image 3">
                <h3>akbay</h3>
                <button onclick="selectProgram('akbay')">Select</button>
            </div>
        </div>
        <div class="box" id="abaka-mo-piso-mo">
            <div class="content">
                <img src="\images\Logo_AbacaMoPisoMo.png" alt="Image 4">
                <h3>abaka mo, piso mo</h3>
                <button onclick="selectProgram('abaka-mo-piso-mo')">Select</button>
            </div>
        </div>
        <div class="box" id="lead">
            <div class="content">
                <img src="\images\Logo_Lead.png" alt="Image 5">
                <h3>LEAD</h3>
                <button onclick="selectProgram('lead')">Select</button>
            </div>
        </div>
    </div>
    <div id="keyInput" style="display:none;">
        <label for="key">Enter your key:</label>
        <input type="text" id="key" name="key">
        <button onclick="submitKey()">Done</button>
        <!-- Add a back button to go back to the selection page -->
        <button class="back-button" onclick="goBackToSelectionPage()">Back</button>
    </div>



   </body>

</html>