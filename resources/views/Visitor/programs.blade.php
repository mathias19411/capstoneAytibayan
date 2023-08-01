
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
                <button onclick="showCategory('binhi-ng-pagasa')">Select</button>
            </div>
        </div>
        <div class="box" id="agripinay">
            <div class="content">
                <img src="\images\Logo_AgriPinay.png" alt="Image 2">
                <h3>agripinay</h3>
                <button onclick="showCategory('agripinay')">Select</button>
            </div>
        </div>
        <div class="box" id="akbay">
            <div class="content">
                <img src="\images\Logo_Akbay.png" alt="Image 3">
                <h3>akbay</h3>
                <button onclick="showCategory('akbay')">Select</button>
            </div>
        </div>
        <div class="box" id="abaka-mo-piso-mo">
            <div class="content">
                <img src="\images\Logo_AbacaMoPisoMo.png" alt="Image 4">
                <h3>abaka mo, piso mo</h3>
                <button onclick="showCategory('abaka-mo-piso-mo')">Select</button>
            </div>
        </div>
        <div class="box" id="lead">
            <div class="content">
                <img src="\images\Logo_Lead.png" alt="Image 5">
                <h3>LEAD</h3>
                <button onclick="showCategory('lead')">Select</button>
            </div>
        </div>
    </div>

    <script>
    function showCategory(category) {
        // Construct the URL for the category page with the selected category as a query parameter
        const url = "{{ route('Visitor.category.page', ['category' => ':category']) }}";
        const finalUrl = url.replace(':category', category);

        // Redirect the current window to the category page URL
        window.location.href = finalUrl;
    }
</script>


   </body>

</html>