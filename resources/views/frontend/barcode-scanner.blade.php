<!DOCTYPE html>
<html>
<head>
    <title>Barcode Scanner</title>
</head>
<body>
    <h1>Barcode Scanner</h1>
    
    <input type="text" id="barcode-input" placeholder="Enter Barcode">
    <button onclick="scanBarcode()">Scan</button>

    <script>
        function scanBarcode() {
            const barcode = document.getElementById('barcode-input').value;
            
            fetch('/scan-barcode', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': '{{ csrf_token() }}',
                },
                body: JSON.stringify({ barcode }),
            })
            .then(response => response.json())
            .then(data => {
                if (data.message === 'Barcode scanned successfully!') {
                    alert('Scanned Barcode: ' + data.data);
                } else {
                    alert('Invalid Barcode');
                }
            })
            .catch(error => {
                console.error('Error:', error);
                alert('An error occurred while scanning the barcode.');
            });
        }
    </script>
</body>
</html>
