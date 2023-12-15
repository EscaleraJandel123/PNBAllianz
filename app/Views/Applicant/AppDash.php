<!doctype html>
<html lang="en">
    
<?= view('Applicant/chop/head'); ?>
    <body>
    <?= view('Applicant/chop/header'); ?>

        <div class="container-fluid">
            <div class="row">
            <nav id="sidebarMenu" class="col-md-3 col-lg-3 d-md-block sidebar collapse">
                    <div class="position-sticky py-4 px-3 sidebar-sticky">
                        <ul class="nav flex-column h-100">
                            
                            <li class="nav-item">
                                <a class="nav-link active" aria-current="page" href="/AppDash">
                                    <i class="bi-house-fill me-2"></i>
                                    Overview
                                </a>
                            </li>
                            <!-- <li class="nav-item">
                                <a class="nav-link" href="#" data-bs-toggle="collapse" data-bs-target="#manageDropdown" aria-expanded="false">
                                    <i class="bi-book me-2"></i>
                                    Forms
                                </a>
                                <div class="collapse" id="manageDropdown">
                                    <ul class="nav">
                                        <li class="nav-item">
                                            <span><a class="nav-link" href="/AppForm1">
                                                <i class="bi-pen me-2"></i>
                                                <span class="align-middle">LIFE CHANGER</span>
                                            </a></span><br>
                                            <a class="nav-link" href="/AppForm2">
                                                <i class="bi-pen me-2"></i>
                                                <span class="align-middle">AIAL</span>
                                            </a><br>
                                            <a class="nav-link" href="/AppForm3">
                                                <i class="bi-pen me-2"></i>
                                                <span class="align-middle">GROUP LIFE INSURANCE</span>
                                            </a><br>
                                            <a class="nav-link" href="/AppForm4">
                                                <i class="bi-pen me-2"></i>
                                                <span class="align-middle">AFFIDAVIT OF NON-FILING</span>
                                            </a><br>
                                            <a class="nav-link" href="/AppForm5">
                                                <i class="bi-pen me-2"></i>
                                                <span class="align-middle">STATEMENT OF UNDERTAKING</span>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </li> -->
                            <li class="nav-item">
                                <a class="nav-link" href="/AppForm1">
                                <i class="bi-book me-2"></i>
                                   Applicantion Form
                                </a>
                            </li>

                            <li class="nav-item">
                                <a class="nav-link" href="/AppProfile">
                                    <i class="bi-person me-2"></i>
                                    Profile
                                </a>
                            </li>

                            <li class="nav-item">
                                <a class="nav-link" href="/AppSetting">
                                    <i class="bi-gear me-2"></i>
                                    Settings
                                </a>
                            </li>

                            <li class="nav-item">
                                <a class="nav-link" href="/AppHelp">
                                    <i class="bi-question-circle me-2"></i>
                                    Help Center
                                </a>
                            </li>

                            <li class="nav-item border-top mt-auto pt-2">
                                <a class="nav-link" href="/logout">
                                    <i class="bi-box-arrow-left me-2"></i>
                                    Logout
                                </a>
                            </li>
                        </ul>
                    </div>
                </nav>

                <main class="main-wrapper col-md-9 ms-sm-auto py-4 col-lg-9 px-md-4 border-start">
                    <div class="title-group mb-3">
                        <h1 class="h2 mb-0">Overview</h1>

                        <small class="text-muted">Hello  <a href="#"><?= $user['username'] ?></a>, welcome back!</small>
                    </div>

                    <div class="row my-4">
                    <div class="col-lg-7 col-12">
                        <!-- Chart for Pending Applicants -->
                        <div class="custom-block bg-white">
                            <div id="pendingApplicantChart"></div>
                        </div>
                    </div>
                        <div class="col-lg-5 col-12">
                            <div class="custom-block custom-block-profile-front custom-block-profile text-center bg-white">
                                <div class="custom-block-profile-image-wrap mb-4">
                                    <img src="<?= isset($applicant['profile']) ? base_url('/uploads/' . $applicant['profile']) : 'default_path_here' ?>" class="custom-block-profile-image img-fluid" alt="">

                                    <a href="/AppSetting" class="bi-pencil-square custom-block-edit-icon"></a>
                                </div>

                                <p class="d-flex flex-wrap mb-2">
                                    <strong>Name:</strong>

                                    <a href="#">
                                    <?= $user['username'] ?>
                                    </a>
                                </p>

                                <p class="d-flex flex-wrap mb-2">
                                    <strong>Email:</strong>
                                    
                                    <a href="#">
                                    <?= $user['email'] ?>
                                    </a>
                                </p>

                                <p class="d-flex flex-wrap mb-0">
                                    <strong>Phone:</strong>

                                    <a href="#">
                                    <?= $applicant['number'] ?>
                                    </a>
                                </p>
                            </div>


                            <div class="custom-block custom-block-profile bg-white">
                            <h6 class="mb-4">Applicant Status</h6>

                            <p class="d-flex flex-wrap mb-2">
                                <strong>Status:</strong>

                                <span>
                                    <?= $user['status'] ?>
                                </span>
                            </p>

                            <p class="d-flex flex-wrap mb-2">
                                <strong>Role:</strong>

                                <span>
                                    <?= $user['role'] ?>
                                </span>
                            </p>

                            <p class="d-flex flex-wrap mb-2">
                                <strong>Created:</strong>

                                <span>
                                    <?= date('M j, Y', strtotime($user['created_at'])); ?>
                                </span>
                            </p>

                            <!-- <p class="d-flex flex-wrap mb-2">
                                    <strong>Valid Date:</strong>

                                    <span>July 18, 2032</span>
                                </p> -->
                        </div>
                        </div>

                   
                    <footer class="site-footer">
                        <div class="container">
                            <div class="row">
                                
                            </div>
                        </div>
                    </footer>
                </main>

            </div>
        </div>

        <!-- JAVASCRIPT FILES -->
        <?= view('Applicant/chop/js'); ?>
        <script type="text/javascript">
    // Function to create a chart
    function createChart(chartId, data, title) {
        var options = {
            series: [{
                name: title,
                data: data.map(entry => entry.agent_count || entry.applicant_count)
            }],
            chart: {
                type: 'bar',
                height: 350
            },
            plotOptions: {
                bar: {
                    horizontal: false,
                    columnWidth: '55%',
                    endingShape: 'rounded'
                },
            },
            dataLabels: {
                enabled: false
            },
            stroke: {
                show: true,
                width: 2,
                colors: ['transparent']
            },
            xaxis: {
                categories: data.map(entry => entry.month),
            },
            yaxis: {
                title: {
                    text: title
                }
            },
            fill: {
                opacity: 1
            },
            tooltip: {
                y: {
                    formatter: function (val) {
                        return val + " " + title.toLowerCase();
                    }
                }
            }
        };

        // Create and render the chart
        var chart = new ApexCharts(document.querySelector(`#${chartId}`), options);
        chart.render();
    }

    // Fetch dynamic data from the server for agents
    fetch('/monthlyAgentCount')
        .then(response => response.json())
        .then(data => {
            createChart('agentChart', data, 'Agents');
        })
        .catch(error => console.error('Error fetching data for agents:', error));

    // Fetch dynamic data from the server for pending applicants
    fetch('/monthlyPendingApplicantCount')
        .then(response => response.json())
        .then(data => {
            createChart('pendingApplicantChart', data, 'Applicants');
        })
        .catch(error => console.error('Error fetching data for pending applicants:', error));
</script>

    </body>
</html>