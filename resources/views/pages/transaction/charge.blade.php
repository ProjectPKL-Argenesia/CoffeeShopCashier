<div class="fixed left-0 right-0 top-0 z-50 hidden h-[calc(100%-1rem)] max-h-full w-full items-center justify-center overflow-y-auto overflow-x-hidden md:inset-0"
    id="popup-modal-charge" tabindex="-1">
    <div class="relative max-h-full w-full min-w-[35%] max-w-[40%] p-4">
        <div class="relative rounded-lg bg-white shadow">
            <button
                class="absolute end-2.5 top-3 ms-auto inline-flex h-8 w-8 items-center justify-center rounded-lg bg-transparent text-sm text-gray-500 hover:bg-gray-200 hover:text-gray-900 dark:hover:bg-gray-600 dark:hover:text-white"
                data-modal-hide="popup-modal-charge" type="button">
                <svg class="h-3 w-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                    viewBox="0 0 14 14">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                </svg>
                <span class="sr-only">Close modal</span>
            </button>

            <div class="grid grid-rows-1 px-8 pb-10 pt-16">
                <div class="mb-5 flex gap-1 place-self-center text-xl font-semibold">
                    <span>Transaciton Order</span>
                    <span id="table_name"></span>
                </div>
                <div class="grid grid-cols-4">
                    <span class="justify-self-start font-semibold">Menu</span>
                    <span class="justify-self-center font-semibold">Price</span>
                    <span class="justify-self-end font-semibold">Qty</span>
                    <span class="justify-self-end font-semibold">Total Price</span>
                </div>
                <div class="mb-5 grid grid-cols-4" id="detailOrder">
                </div>
                <div class="flex justify-between">
                    <span>Sub Total</span>
                    <span id="subTotal"></span>
                </div>
                <div class="mb-2 flex justify-between">
                    <span>Tax</span>
                    <span id="pajak"></span>
                </div>
                <div class="mb-3 flex justify-between border-t border-gray-600 pt-2 text-xl font-semibold">
                    <span>Total</span>
                    <span id="total" hidden></span>
                    <span id="totalText"></span>
                </div>
                <div class="flex justify-between">
                    <span>Pays</span>
                    <div class="flex items-center">
                        <span>Rp.</span>
                        <input class="h-5 border-none focus:ring-0" id="amountPaid" type="number" placeholder="...">
                    </div>
                </div>
                <div class="flex justify-between text-xl font-semibold">
                    <span>Change/Return</span>
                    <div class="flex">
                        <span>Rp.</span>
                        <span id="change"></span>
                    </div>
                </div>
                <button class="mt-7 rounded-lg bg-red-800 py-2 text-sm text-gray-100" id="simpanButton" type="submit"
                    onclick="simpanButtonClick()" disabled>Done</button>
            </div>
        </div>
    </div>
</div>

<script>
    // Ambil elemen total dan input jumlah yang dibayarkan
    const totalElement = document.getElementById('total');
    const amountPaidInput = document.getElementById('amountPaid');
    const changeElement = document.getElementById('change');


    // Tambahkan event listener untuk memantau perubahan pada input jumlah yang dibayarkan
    amountPaidInput.addEventListener('input', calculateChange);

    // Fungsi untuk menghitung kembalian
    function calculateChange() {
        const total = parseFloat(totalElement.textContent);
        const amountPaid = parseFloat(amountPaidInput.value);
        console.log(total);

        updateButtonState(amountPaid);

        // Check if both values are valid numbers
        if (!isNaN(total) && !isNaN(amountPaid)) {
            const change = amountPaid - total;

            var changeAmount = change;

            changeElement.textContent = `${change.toFixed(2)}`;

            window.amountPaidValue = amountPaid;
            window.changeAmount = changeAmount;
        } else {
            changeElement.textContent = ''; // Set to empty if input is not valid
        }
    }

    function updateButtonState(amountPaid) {
        let hasValue = amountPaidInput.value.trim() !== '';
        simpanButton.disabled = !hasValue;
        simpanButton.classList.toggle('bg-red-800', !hasValue);
        simpanButton.classList.toggle('bg-green-500', hasValue);
    }

    // const totalElement = document.getElementById('total');


    $(document).ready(function() {
        // Mendeteksi peristiwa sebelum mencetak
        window.onbeforeprint = function() {
            // Lakukan sesuatu sebelum mencetak (jika diperlukan)
            console.log('Before printing');
        };

        // Mendeteksi peristiwa setelah mencetak
        window.onafterprint = function() {
            // Lakukan penyegaran halaman setelah mencetak
            location.reload();
        };
    });
</script>
