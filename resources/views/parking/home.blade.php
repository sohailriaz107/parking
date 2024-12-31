<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <title>sparkify</title>
    <meta name="description" content="">
    <meta name="keywords" content="">

    <!-- Favicons -->
    <link href="assets/img/favicon1.png" rel="icon">
    <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com" rel="preconnect">
    <link href="https://fonts.gstatic.com" rel="preconnect" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Raleway:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="assets/vendor/aos/aos.css" rel="stylesheet">
    <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">
    <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{('assets/css/style.css')}}">


    <!-- Main CSS File -->

    <link rel="stylesheet" href="{{('assets/css/main.css')}}">
    <style>
        body {
            margin: 0;
            font-family: Arial, sans-serif;
            background: url('https://source.unsplash.com/1600x900/?parking,city') no-repeat center center fixed;
            background-size: cover;
            color: #333;
        }

        /* Basic styling for the form */
        #vehicleForm {
            display: none;
            /* Initially hidden */
            position: fixed;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            background-color:darkgray;
            padding: 20px;
            border: 1px solid #ccc;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
            width: 300px;
            z-index: 1001;
            /* Ensures the form appears on top */
        }

        #vehicleForm h3 {
            margin: 0 0 10px;
            position: relative;
            background-color: gray;
            text-align: center;
        }

        #vehicleForm input,
        #vehicleForm button {
            display: block;
            width: 100%;
            margin: 5px 0;
            padding: 5px;
            font-size: 14px;
        }

        /* Overlay styling */
        #overlay {
            display: none;
            /* Initially hidden */
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.5);
            z-index: 1000;
            /* Slightly lower than the form */
        }

        select {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            font-size: 14px;
            color: #333;
            background-color: #f9f9f9;
            outline: none;
            transition: border-color 0.3s, box-shadow 0.3s;
        }

        /* Focus effect for the select element */
        select:focus {
            border-color: #007BFF;
            box-shadow: 0 0 5px rgba(0, 123, 255, 0.5);
            background-color: #fff;
        }

        /* Optional: Margin for spacing */
        .dropdown-container {
            margin-bottom: 20px;
        }

        input[type="file"] {
            display: block;
            width: 100%;
            padding: 10px;
            font-size: 14px;
            color: #333;
            border: 1px solid #ccc;
            border-radius: 5px;
            background-color: #f9f9f9;
            outline: none;
            cursor: pointer;
            transition: border-color 0.3s, box-shadow 0.3s;
        }

        /* Focus effect for the file input */
        input[type="file"]:focus {
            border-color: #007BFF;
            box-shadow: 0 0 5px rgba(0, 123, 255, 0.5);
            background-color: #fff;
        }

        /* Optional: Margin for spacing */
        .file-upload-container {
            margin-bottom: 20px;
        }

       
    </style>

</head>

<body class="index-page">
    @include('layout.nav')

    <main class="main">

        <!-- Hero Section -->
        <section id="hero" class="hero section ">

            <img src="assets/img/parking.jpg" alt="" data-aos="fade-in">

            <div class="container" data-aos="zoom-out" data-aos-delay="100">
                <h2 style="color:green;">SParkify</h2>
                <p>we are providing <span class="typed" data-typed-items="parking, washing car, safety, Photographer">Sparkify</span><span class="typed-cursor typed-cursor--blink"></span></p>
            </div>

        </section><!-- /Hero Section -->
        <section class="container-sm" style="background-color: white; color:black; margin-top:20px;">
            <h2 style="color: black;">Sparkyfiy lots</h2>
            <div class="col-md-12 mb-4">
                <form action="{{ url('search') }}" method="GET" class="d-flex justify-content-center">
                    <input class="form-control me-2 w-50" type="search" name="search" placeholder="Search Your car by Vahicle Number">
                    <input type="submit" value="Search" class="btn btn-success">
                </form>
            </div>
            @if(Session::has('message'))
            <p class="alert alert-info">{{ Session::get('message') }}</p>
            @endif
            <div class="table-wrapper">
                <button style="color: black; margin: 10px; border-radius:15px" class="btn btn-info" onclick="openForm()">Park Your Vehicle</button>
                <table class="fl-table">
                    <thead>
                        <tr>
                            <th>SR</th>
                            <th>Owner Name</th>
                            <th>Vahicle Number</th>
                            <th>Slot no</th>
                            <th>Image</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody cellpading="2" cellspacing="2">
                        @foreach ($parking as $park )
                        <tr cellpading="2" cellspacing="2" >
                            <td style="border: 1px solid black;">{{ $loop->index+1 }}</td>
                            <td style="border: 1px solid black;">{{$park->name}}</td>
                            <td style="border: 1px solid black;">{{$park->vehicleNumber}}</td>
                            <td style="border: 1px solid black;">{{$park->slotNumber}}</td>
                            <td style="border: 1px solid black;">
                                <img src="images/{{$park->image}}" alt="car" height="50px" width="50px" class="rounded-circle">
                            </td>
                            <td style="border: 1px solid black;">
                                  {{$park->status}}
                              
                            </td>
                            <td style="border: 1px solid black;">
                               <a href="{{ route('update', ['id' => $park->id]) }}" class="btn btn-danger" onclick="return confirm('Are You sure ,You want to exit')">EXIT</a>
                            </td>

                        </tr>
                        @endforeach

                    <tbody>

                </table>
            </div>
        </section>
        <section>
            <div id="overlay"></div>
            <!-- Form -->
            <div id="vehicleForm" style="color: black;">
                <h3 style="color: black;">Park Your Vehicle</h3>
                <form id="parkingForm" action="{{route('parking')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <label for="ownerName">Owner Name:</label>
                    <input type="text" id="ownerName" name="name" placeholder="Enter your name" required>
                    @error('name')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror

                    <label for="vehicleNumber">Vehicle number:</label>
                    <input type="text" id="vehicleNumber" name="vehicleNumber" placeholder="Enter vehicle name" required>
                    @error('vehicleNumber')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror

                    <label for="slotNumber">Slot Number:</label>
                    <input type="text" id="slotNumber" name="slotNumber" placeholder="Enter slot number" required>
                    @error('slotNumber')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror

                  
                    @error('status')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror

                    <div class="file-upload-container">
                        <label for="image">Image:</label>
                        <input type="file" id="image" name="image" required>
                    </div>
                    @error('image')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror

                    <button type="submit" class="btn btn-success">Submit</button>
                    <button type="button" class="btn btn-danger" onclick="closeForm()">Cancel</button>
                </form>

            </div>
        </section>
    </main>
    <!-- javascript -->
    <script>
        // Open the form
        function openForm() {
            document.getElementById('vehicleForm').style.display = 'block';
            document.getElementById('overlay').style.display = 'block';
        }

        // Close the form
        function closeForm() {
            document.getElementById('vehicleForm').style.display = 'none';
            document.getElementById('overlay').style.display = 'none';
        }
    </script>
    <!-- endjas -->
    <footer id="footer" class="footer">
        <div class="container">
            <h3 class="sitename">SParkify</h3>
            <p>sohail Lorem, ipsum dolor sit amet consectetur adipisicing elit. Quibusdam facilis unde laborum labore, ex natus magnam itaque distinctio iste et quaerat rerum atque voluptatem vero. Facilis reiciendis soluta odio natus.</p>
            <div class="social-links d-flex justify-content-center">
                <a href=""><i class="bi bi-twitter-x"></i></a>
                <a href=""><i class="bi bi-facebook"></i></a>
                <a href=""><i class="bi bi-instagram"></i></a>
                <a href=""><i class="bi bi-skype"></i></a>
                <a href=""><i class="bi bi-linkedin"></i></a>
            </div>
            <div class="container">
                <div class="copyright">
                    <span>Copyright</span> <strong class="px-1 sitename">SParkify</strong> <span>All Rights Reserved</span>
                </div>
                <div class="credits">
                    <!-- All the links in the footer should remain intact. -->
                    <!-- You can delete the links only if you've purchased the pro version. -->
                    <!-- Licensing information: https://bootstrapmade.com/license/ -->
                    <!-- Purchase the pro version with working PHP/AJAX contact form: [buy-url] -->
                    Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a>
                </div>
            </div>
        </div>
    </footer>

    <!-- Scroll Top -->
    <a href="#" id="scroll-top" class="scroll-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

    <!-- Preloader -->
    <div id="preloader"></div>

    <!-- Vendor JS Files -->
    <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- <script src="assets/vendor/php-email-form/validate.js"></script> -->
    <script src="assets/vendor/aos/aos.js"></script>
    <script src="assets/vendor/typed.js/typed.umd.js"></script>
    <script src="assets/vendor/purecounter/purecounter_vanilla.js"></script>
    <script src="assets/vendor/waypoints/noframework.waypoints.js"></script>
    <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>
    <script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
    <script src="assets/vendor/imagesloaded/imagesloaded.pkgd.min.js"></script>
    <script src="assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>

    <!-- Main JS File -->
    <script src="assets/js/main.js"></script>

</body>

</html>