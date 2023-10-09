<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <title>Attendance Logger</title>    
        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])

        @livewireStyles
    </head>
    <body class="flex flex-col min-h-screen bg-lightGray">
        <div class="flex-grow flex items-center justify-center">
            
            <!-- Back Button from component -->
            {{-- Back Button --}}
            <x-button btnType="secondary" element="a" :href="route('dashboard')" class="back-button rounded-md">
                <i class="fa-solid fa-arrow-left"></i>
            </x-button>

            <div class="container">
                <!-- Left Column - "live Population Count" Content -->
                <div class="left-column">
                    <div>
                        <div class="max-w-full h-32 mb-4">
                            <img class="w-full h-full object-contain" src="{{asset('img/pnc_header.png')}}" alt="">
                        </div>
                        <div class="bg-white rounded-lg shadow-lg p-4 sm:p-6">
                            <p class="text-5xl font-bold text-center">Population Count</p>
                            <!-- Display live population count here -->
                            <div>
                                <div id="livePopulationCount" class="mt-4 text-xl font-semibold text-center p-4 sm:p-6">
                                    <!-- Population Count -->
                                </div>
                            </div>

                            <!-- Testing Insert -->
                            <input type="text" id="idInput" class="border border-gray-300 rounded-md w-full p-2 mt-4" placeholder="Tap your ID">
                        </div>
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
            // POPULATION COUNT FUNCTIONS
            // Function to simulate a live population count update
            function updateLivePopulationCount() {
                // Replace this with your actual data retrieval logic
                const populationCount = Math.floor(Math.random() * 1000000); // Simulated count
                const livePopulationCountElement = document.getElementById("livePopulationCount");
                
                // Format the population count with commas
                const formattedCount = populationCount.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
                
                // Set the formatted count as the content
                livePopulationCountElement.textContent = formattedCount;
                
                // Make the text larger
                livePopulationCountElement.style.fontSize = "5rem"; // You can adjust the size as needed
            }

            // Update the live population count every 1 second (1000 milliseconds)
            setInterval(updateLivePopulationCount, 1000);

            
            // RFID READER FUNCTIONS
            // Define the correct ID here
            const correctID = "123"; // Replace "123" with your correct ID

            // Get the example information element
            const exampleInfo = document.getElementById("exampleInfo");

            // Function to show the example information
            function showExampleInfo() {
                exampleInfo.classList.remove("hidden");
                setTimeout(hideExampleInfo, 10000); // Hide after 10 seconds
            }

            // Function to hide the example information
            function hideExampleInfo() {
                exampleInfo.classList.add("hidden");
            }

            // Initially hide the example information
            hideExampleInfo();

            // Function to simulate ID detection (replace this with your actual RFID detection logic)
            function detectID(id) {
                // Simulate RFID detection logic here
                return id === correctID;
            }

            let inputTimer; // Variable to store the timer

            function resetInputField() {
                idInput.value = ""; // Clear the input field
            }

            // Listen for input changes (simulated RFID detection)
            document.addEventListener("keydown", function (event) {
                const allowedKeys = /^[0-9a-zA-Z]$/; // Regular expression to match letters and numbers

                // Check if the pressed key is allowed (letters or numbers)
                if (!event.key.match(allowedKeys)) {
                    event.preventDefault(); // Prevent the default behavior of the key press
                    return;
                }

                const typedCharacter = event.key;
                const currentInput = idInput.value + typedCharacter;

                // Check if the entered ID matches the correct ID
                if (detectID(currentInput)) {
                    // If it matches, show the example information
                    showExampleInfo();
                    // Clear the input field
                    resetInputField();
                } else {
                    // If it doesn't match, continue typing
                    idInput.value = currentInput;

                    // Clear the timer and restart it
                    clearTimeout(inputTimer);
                    inputTimer = setTimeout(resetInputField, 1000); // Reset after 1 second of inactivity
                }
            });
        </script>
    </body>
    {{-- Footer --}}
    @include('layouts.footer')
</html>
