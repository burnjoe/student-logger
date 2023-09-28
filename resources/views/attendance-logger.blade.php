<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Attendance Logger</title>    
    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <!-- @livewireStyles -->
    <style>
        /* Define CSS for the two-column layout */
        .container {
            display: flex;
            flex-direction: row;
        }

        .left-column {
            flex: 1;
            padding-right: 20px;
        }

        .right-column {
            flex: 1;
            padding-left: 20px;
        }
    </style>
</head>
<body class="flex flex-col min-h-screen bg-lightGray">
    <div class="flex-grow flex items-center justify-center">
        <div class="container">
            <!-- Left Column - "live Population Count" Content -->
            <div class="left-column">
                <div class="max-w-full h-32 mb-4">
                    <img class="w-full h-full object-contain" src="{{asset('img/pnc_header.png')}}" alt="">
                </div>
                            
                <div class="bg-white rounded-lg shadow-lg p-4 sm:p-6">
                    <p class="text-5xl font-bold text-center">Population Count</p>
                    <!-- Display live population count here -->
                    <div>
                        <div id="livePopulationCount" class="mt-4 text-xl font-semibold text-center p-4 sm:p-6">
                            <!-- Numbers -->
                        </div>
                    </div>

                    <!-- Testing Insert -->
                    <input type="text" id="idInput" class="border border-gray-300 rounded-md w-full p-2 mt-4" placeholder="Tap your ID">

                </div>
            </div>

            <!-- Right Column - "Example Information" -->
            <div class="right-column">
                <div id="exampleInfo" class="bg-white rounded-lg shadow-lg p-4 sm:p-6">
                    <img class="mt-4 mx-auto" src="{{asset('img/id_picture.png')}}" alt="" style="width: 300px; height: 300px;">
                    <p class="mt-4 text-3xl font-semibold text-center">FERRERAS, VINCE AUSTIN</p>
                    <p class="mt-4 text-2xl font-semibold text-center">BSCS</p>
                </div>
            </div>
        </div>
    </div>

    <script>
        // Function to simulate a live population count update
        function updateLivePopulationCount() {
            // Replace this with your actual data retrieval logic
            const populationCount = Math.floor(Math.random() * 10000); // Simulated count
            const livePopulationCountElement = document.getElementById("livePopulationCount");
            
            // Format the population count with commas
            const formattedCount = populationCount.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
            
            // Set the formatted count as the content
            livePopulationCountElement.textContent = formattedCount;
            
            // Make the text larger
            livePopulationCountElement.style.fontSize = "5rem"; // You can adjust the size as needed
        }

        // Update the live population count every 5 seconds (5000 milliseconds)
        setInterval(updateLivePopulationCount, 1000);

        // Define the correct ID here
        const correctID = "123";

        // Get the input element
        const idInput = document.getElementById("idInput");

        // Get the example information element
        const exampleInfo = document.getElementById("exampleInfo");

        // Function to show the example information
        function showExampleInfo() {
            exampleInfo.classList.remove("hidden");
            idInput.value = ""; // Clear the text in the input field
            setTimeout(hideExampleInfo, 10000); // Hide after 10 seconds
        }

        // Function to hide the example information
        function hideExampleInfo() {
            exampleInfo.classList.add("hidden");
        }

        // Initially hide the example information
        hideExampleInfo();

        // Listen for input changes
        idInput.addEventListener("input", function() {
            // Check if the entered ID matches the correct ID
            if (idInput.value === correctID) {
                // If it matches, show the example information
                showExampleInfo();
            } else {
                // If it doesn't match, hide the example information
                hideExampleInfo();
            }
        });
    </script>
</body>
<footer class="flex flex-col justify-center items-center bg-lightGray px-8 pt-5 pb-5 lg:items-start lg:flex-row lg:justify-between">
    <div class="w-40 lg:w-48">
        <img class="w-full mt-2" src="{{asset('img/ist_logo.png')}}" alt="">
    </div>

    <div class="flex flex-col w-64 mt-10 justify-center items-center lg:items-end lg:mt-0">
        <img class="w-full" src="{{asset('img/pnc_header.png')}}" alt="">
        <span class="text-sm text-green font-bold">Student Centralized Logging System</span>
    </div>
</footer>
</html>
