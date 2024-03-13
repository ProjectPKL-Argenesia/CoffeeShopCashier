<div id="popup-modal-charge" tabindex="-1"
    class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
    <div class="relative p-4 w-full max-w-[40%] min-w-[35%] max-h-full">
        <div class="relative bg-white rounded-lg shadow">
            <button type="button"
                class="absolute top-3 end-2.5 text-gray-500 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
                data-modal-hide="popup-modal-charge">
                <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                    viewBox="0 0 14 14">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                </svg>
                <span class="sr-only">Close modal</span>
            </button>

            <div class="grid grid-rows-1 px-8 pt-16 pb-10">
                <div class="place-self-center flex gap-1 font-semibold text-xl mb-5">
                    <span>Transaciton Order</span>
                    <span id="table_name"></span>
                </div>
                <div class="grid grid-cols-4">
                    <span class="font-semibold justify-self-start">Menu</span>
                    <span class="font-semibold justify-self-center">Price</span>
                    <span class="font-semibold justify-self-end">Qty</span>
                    <span class="font-semibold justify-self-end">Total Price</span>
                </div>
                <div id="detailOrder" class="grid grid-cols-4 mb-5">
                </div>
                <div class="flex justify-between">
                    <span>Sub Total</span>
                    <span id="subTotal"></span>
                </div>
                <div class="flex justify-between mb-2">
                    <span>Tax</span>
                    <span id="pajak"></span>
                </div>
                <div class="flex justify-between pt-2 mb-3 text-xl font-semibold border-t border-gray-600">
                    <span>Total</span>
                    <span id="total" hidden></span>
                    <span id="totalText"></span>
                </div>
                <div class="flex justify-between">
                    <span>Pays</span>
                    <div class="flex items-center">
                        <span>Rp.</span>
                        <input type="number" id="amountPaid" class="border-none h-5 focus:ring-0" placeholder="...">
                    </div>
                </div>
                <div class="flex justify-between font-semibold text-xl">
                    <span>Change/Return</span>
                    <div class="flex">
                        <span>Rp.</span>
                        <span id="change"></span>
                    </div>
                </div>
                <button id="simpanButton" onclick="simpanButtonClick()" type="submit" disabled
                    class="mt-7 py-2 text-sm text-gray-100 bg-red-800 rounded-lg">Done</button>
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