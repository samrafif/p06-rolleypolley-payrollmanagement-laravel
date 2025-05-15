<div class="flex flex-col justify-center items-center h-screen">
    <div class="p-8 rounded-lg outline-[0.5px] shadow-md flex space-x-8">

        <div class="flex flex-col space-y-4">
            <div class="p-4 rounded-md outline-[0.5px] shadow-md w-64">
                <h1 id="clock" class="text-4xl font-semibold mb-2"></h1>
                <p class="text-lg" style="color:{{ str_contains($type, 'in') ? 'lime' : 'red' }}">{{ strtoupper($type) }}</p>
            </div>

            <div class="grid grid-cols-2 gap-4">
                <button x-on:click="$wire.set('type','check-in')" class="bg-green-200 hover:bg-green-300 text-green-700 font-semibold py-2 px-4 rounded">
                    Check In
                </button>
                <button x-on:click="$wire.set('type','check-out')" class="bg-red-200 hover:bg-red-300 text-red-700 font-semibold py-5 px-4 rounded">
                    Check Out
                </button>
                <button x-on:click="$wire.set('type','overtime-check-in')" class="bg-green-300 hover:bg-green-400 text-green-700 font-semibold py-2 px-4 rounded">
                    Check In </br> <i class="font-regular">Overtime</i>
                </button>
                <button x-on:click="$wire.set('type','overtime-check-out')" class="bg-red-300 hover:bg-red-400 text-red-700 font-semibold py-2 px-4 rounded">
                    Check Out </br> <i class="font-regular">Overtime</i>
                </button>
            </div>
            {{-- <flux:button x-on:click="$wire.clockInOut('EBC3C630')">DUMMY ATTENDANCE</flux:button> --}}
        </div>

        <div id="thing" class="p-8 rounded-md flex flex-col shadow-md outline-[0.5px] items-center justify-center w-64">
            <p class="text-center text-lg font-semibold mb-4">Tap your card on the scanner below</p>
            <div class="text-blue-500 text-2xl animate-bounce">
                <svg class="w-8 h-8 inline-block" width="24" height="24" xmlns="http://www.w3.org/2000/svg" fill="currentColor" fill-rule="evenodd" clip-rule="evenodd"><path d="M11 21.883l-6.235-7.527-.765.644 7.521 9 7.479-9-.764-.645-6.236 7.529v-21.884h-1v21.883z"/></svg>

                <svg class="w-8 h-8 inline-block" width="24" height="24" xmlns="http://www.w3.org/2000/svg" fill="currentColor" fill-rule="evenodd" clip-rule="evenodd"><path d="M11 21.883l-6.235-7.527-.765.644 7.521 9 7.479-9-.764-.645-6.236 7.529v-21.884h-1v21.883z"/></svg>

                <svg class="w-8 h-8 inline-block" width="24" height="24" xmlns="http://www.w3.org/2000/svg" fill="currentColor" fill-rule="evenodd" clip-rule="evenodd"><path d="M11 21.883l-6.235-7.527-.765.644 7.521 9 7.479-9-.764-.645-6.236 7.529v-21.884h-1v21.883z"/></svg>
            </div>
        </div>

    </div>

    <script>
        document.querySelector('#thing').addEventListener('click', async () => {
            // Prompt user to select any serial port.
            const port = await navigator.serial.requestPort();

            // Wait for the serial port to open.
            //await port.close();
            document.querySelector('#important').innerText = "✅✅ READY, Click the button to start ✅✅";
            await port.open({ baudRate: 9600 });
            await start(port);
            await port.close();
        });

        async function start(port) {
            const textDecoder = new TextDecoderStream();
            const readableStreamClosed = port.readable.pipeTo(textDecoder.writable);
            const reader = textDecoder.readable.getReader();

            // Start the clock            

            // Listen to data coming from the serial device.
            while (true) {
                const { value, done } = await reader.read();
                if (done) {
                    // Allow the serial port to be closed later.
                    reader.releaseLock();
                    break;
                }
                
                // value is a string.
                console.log(value);
                
                try {
                    let uid = (/UID: (.*)/.exec(value))[1];
                    //document.getElementsByTagName("h1")[0].innerText = uid;
                    console.log(uid);
                    Livewire.dispatch('clock-fire', [uid,]);
                    document.getElementById('clock').innerHTML = "SUCCESS";
                } catch (error) {
                    //document.getElementsByTagName("h1")[0].innerText = value;
                    console.log("An koont error occurred:", error.message);
                }
            }
        }

        function startTime() {
                const today = new Date();
                let h = today.getHours();
                let m = today.getMinutes();
                let s = today.getSeconds();
                m = checkTime(m);
                s = checkTime(s);
                document.getElementById('clock').innerHTML =  h + ":" + m + ":" + s;
                setTimeout(startTime, 1000); // Call startTime() every 1 second
            }

            function checkTime(i) {
                if (i < 10) {i = "0" + i};  // add zero in front of numbers < 10
                return i;
            }

        startTime();
        console.log("Serial port API is supported in this browser.");
    </script>

    <p class="my-4" id="important">⚠️⚠️ NOT READY, Call an Admin to rectify this ⚠️⚠️</p>
</div>