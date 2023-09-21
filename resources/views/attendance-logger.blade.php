<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Attendance Logger</title>
    <!-- Include Tailwind CSS -->
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="flex flex-col min-h-screen bg-lightGray">
    <div class="flex-grow flex items-center justify-center">
        <div class="flex flex-col overflow-y-auto px-8 py-5 mb-5">
            <!-- Image (Fixed Size) -->
            <div class="max-w-full h-32 mb-4">
                <img class="w-full h-full object-contain" src="{{asset('img/pnc_header.png')}}" alt="">
            </div>
            
            <!-- Content (Smaller Size) -->
            <div class="bg-white rounded-lg shadow-lg p-4 sm:p-6">
                <p class="text-xl font-semibold text-center">Tap your ID</p>
                <input type="text" id="idInput" class="border border-gray-300 rounded-md w-full p-2 mt-4" placeholder="Enter your ID">
            </div>

            <!-- Example Information (Initially Hidden) -->
            <div id="exampleInfo" class="hidden mt-8 bg-blue-100 border border-blue-400 text-blue-700 px-4 py-2 rounded-lg">
                <p class="text-xl font-semibold text-center">Example Information</p>
                <img class="mt-4 max-w-full" src="{{asset('img/example_image.png')}}" alt="">
                <p class="mt-4">This is an example of the information that appears when you enter the correct ID.</p>
            </div>
        </div>
    </div>
    {{-- Footer --}}
    @include('layouts.footer')

    <script>
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
            setTimeout(hideExampleInfo, 10000); // Hide after 5 seconds
        }

        // Function to hide the example information
        function hideExampleInfo() {
            exampleInfo.classList.add("hidden");
        }

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
</html>
