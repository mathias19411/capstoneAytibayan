<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="{{ asset('infos.css') }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
     <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.4/dist/jquery.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
</head>
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<body class="infos">

    <!-- About Section -->
    <div id="about-section">
        <div id="logo">
            <img src="\images\logo.png" alt="Logo">
            <img src="\images\Logo_BinhiNgPagasa.png" alt="Logo">
        </div>
        <h2 id="about-heading"></h2>
        <div id="program-name"> Binhi ng Pag-Asa</div>
        <div id="program-location">Cabangan, Camalig, Albay</div>
        <div id="program-email">albayagri@gmail.com</div>
        <img id="about-image" src="\images\binhi.jpg" alt="Category Image">

        

        <div id="about-program" class="about-content">
            <h3>About</h3>
            <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum</p>
             
        </div>
    </div>

    
</body>
</html>
    <div id="main-container">
   
        <div id="left-container">
            <div class="box">
                <h1>Number of Beneficiaries</h1>
                <p>360</pathinfo>
            </div>
            <div class="box">
                 <img src="\images\graph.png" alt="graph">
            </div>
            <div class="box1">
                <h1>How To Apply</h1>
                <h2>1</h2>
                <p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout.</p>
                <h2>2</h2>
                <p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout.</p>
                <h2>3</h2>
                <p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout.</p>
                <h2>4</h2>
                <p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout.</p>
            </div>
            <div class="box1">
            <h1>Guidelines & Requirements</h1>
                <h2>1</h2>
                <p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout.</p>
                <h2>2</h2>
                <p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout.</p>
                <h2>3</h2>
                <p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout.</p>
                <h2>4</h2>
                <p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout.</p>
            </div>
        </div>
        <div id="right-container">
              <!-- Content for the right section -->
              <div class="title" >
                 <h3>Projects</h3>
        </div>
            <div class="project">
                <img src="\images\binhi.jpg" alt="Picture 1">
                <h2>Lorem epsum It is a long established fact that a reader will</h2>
                <p>Date 1</p>
            </div>
            <div class="project">
                <img src="\images\binhi.jpg" alt="Picture 2">
                <h2>Lorem Epsum It is a long established fact that a reader will</h2>
                <p>Date 2</p>
            </div>
            <div class="project">
                <img src="\images\binhi.jpg" alt="Picture 3">
                <h2>Lorem Epsum It is a long established fact that a reader will</h2>
                <p>Date 3</p>
            </div>
            <div class="project">
                <img src="\images\binhi.jpg" alt="Picture 3">
                <h2>Lorem Epsum It is a long established fact that a reader will</h2>
                <p>Date 4</p>
            </div>
            <div class="col" id="inquiry">
				<h5 id="inquiry_">Inquiry</h5>
				<form method="post">
					<div class="col">
						<div class="row">
							<div class="col-6">
								<label id="label_">Full Name:</label>
								<input class="form-control" type="text" id="textbox">
							</div>
							<div class="col-6">
								<label id="label_">Email:</label>
								<input class="form-control" type="text" name="email" id="textbox">
							</div>
						</div>
					</div>
					<div class="col">
						<div class="row">
							<div class="col-6">
								<label id="label_">Contact Number:</label>
								<input class="form-control" type="text" name="contact" id="textbox">
							</div>
							<div class="col-6">
								<label id="label_">To:</label>
								<select class="form-control" type="text" name="to" id="textbox">
								</select>
							</div>
						</div>
					</div>
					<div>
					<div class="col-12" style="margin: 5px;">
						<label id="label_">Message:</label>
						<input class="form-control" type="text" name="message" id="textbox_m">
					</div>
					<div class="col" id="button_">
						<input type="submit" class="btn" value="Send" id="send_">
					</div>
					</div>
			   	</form>
			</div>
        </div>

  </div>

    <script>
        function showInfo(category) {
            const aboutHeading = document.getElementById('about-heading');
            const aboutImage = document.getElementById('about-image');
            const beneficiaries = document.getElementById('beneficiaries');
            const sampleGraph = document.getElementById('sample-graph');
            const applicationGuidelines = document.getElementById('application-guidelines');
            const requirements = document.getElementById('requirements');
            const projectsTableBody = document.getElementById('projects-table-body');

            const categoryInfo = {
                // Same category information as in the previous code
            };

            if (category in categoryInfo) {
                aboutHeading.textContent = categoryInfo[category].heading;
                aboutImage.src = categoryInfo[category].imageSrc;
                beneficiaries.textContent = categoryInfo[category].beneficiaries;
                sampleGraph.innerHTML = categoryInfo[category].sampleGraph;
                applicationGuidelines.textContent = categoryInfo[category].applicationGuidelines;
                requirements.textContent = categoryInfo[category].requirements;

                // Render projects table
                const projects = categoryInfo[category].projects;
                projectsTableBody.innerHTML = '';
                for (const project of projects) {
                    const row = document.createElement('tr');
                    const nameCell = document.createElement('td');
                    const descriptionCell = document.createElement('td');
                    const dateCell = document.createElement('td');

                    nameCell.textContent = project.name;
                    descriptionCell.textContent = project.description;
                    dateCell.textContent = project.date;

                    row.appendChild(nameCell);
                    row.appendChild(descriptionCell);
                    row.appendChild(dateCell);
                    projectsTableBody.appendChild(row);
                }
            }
        }

        // Get the category from the URL query string and show the information
        const urlParams = new URLSearchParams(window.location.search);
        const categoryToShow = urlParams.get('category');
        if (categoryToShow) {
            showInfo(categoryToShow);
        }
    </script>
</body>
</html>
