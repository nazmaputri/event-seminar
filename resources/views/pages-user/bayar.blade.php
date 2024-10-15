@section('content')
<div class="container mx-auto my-6 p-6 bg-white rounded-lg shadow-lg">
    <h1 class="text-2xl font-bold mb-4">Pembayaran untuk Event: {{ $event->judul_event }}</h1>

    <p class="text-lg">Total Biaya: Rp{{ number_format($event->harga, 0, ',', '.') }}</p>

    <button id="payButton" class="bg-green-500 text-white px-4 py-2 rounded">Bayar Sekarang</button>

    <div id="popup" class="hidden fixed top-0 left-0 w-full h-full flex items-center justify-center bg-gray-800 bg-opacity-50">
        <div id="popupContent" class="bg-white p-4 rounded">
            <div id="popupMessage" class="text-center"></div>
        </div>
    </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const payButton = document.getElementById('payButton');
    const popup = document.getElementById('popup');
    const popupMessage = document.getElementById('popupMessage');

    payButton.addEventListener('click', function() {
        console.log('Pay button clicked');

        fetch(`/bayar-event/{{ $event->id }}`, {
            method: 'POST',
            headers: {
                'X-CSRF-TOKEN': '{{ csrf_token() }}',
                'Content-Type': 'application/json'
            }
        })
        .then(response => {
            console.log('Response status:', response.status);
            if (!response.ok) {
                throw new Error('Network response was not ok ' + response.statusText);
            }
            return response.json();
        })
        .then(data => {
            console.log('Data received:', data);

            if (data.token) {
                snap.pay(data.token, {
                    onSuccess: function(result) {
                        console.log('Payment success:', result);
                        popupMessage.innerText = 'Pembayaran berhasil!';
                        popup.classList.remove('hidden');
                        setTimeout(() => {
                            window.location.href = '/event-seminar';
                        }, 2000);
                    },
                    onPending: function(result) {
                        console.log('Payment pending:', result);
                        popupMessage.innerText = 'Pembayaran tertunda. Harap selesaikan pembayaran.';
                        popup.classList.remove('hidden');
                    },
                    onError: function(result) {
                        console.log('Payment error:', result);
                        popupMessage.innerText = 'Terjadi kesalahan saat memproses pembayaran.';
                        popup.classList.remove('hidden');
                    },
                    onClose: function() {
                        console.log('Payment closed');
                        popupMessage.innerText = 'Anda menutup pembayaran tanpa menyelesaikannya.';
                        popup.classList.remove('hidden');
                    }
                });
            } else {
                popupMessage.innerText = 'Terjadi kesalahan saat memproses pembayaran.';
                popup.classList.remove('hidden');
            }
        })
        .catch(error => {
            console.error('Error:', error);
            popupMessage.innerText = 'Gagal memproses pembayaran. Coba lagi nanti.';
            popup.classList.remove('hidden');
        });
    });

    popup.addEventListener('click', function() {
        popup.classList.add('hidden');
    });
});
</script>
@endsection
