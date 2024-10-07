<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Encrypt Image and Convert to Base64</title>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/crypto-js/4.1.1/crypto-js.min.js"></script>
</head>
<body>

  <h2>Encrypt Image and Convert to Base64</h2>

  <!-- Image Input -->
  <input type="file" id="imageInput"/>
  <br><br>

  <!-- Button to trigger encryption and conversion -->
  <button onclick="encryptAndConvert()">Encrypt and Convert</button>
  <br><br>

  <!-- Display the encrypted Base64 result -->
  <textarea id="output" rows="10" cols="50" placeholder="Encrypted Base64 will appear here"></textarea>

  <script>
    // Function to encrypt image using AES and convert it to Base64
    function encryptAndConvert() {
      const fileInput = document.getElementById('imageInput');
      const output = document.getElementById('output');

      if (fileInput.files.length === 0) {
        alert("Please select an image!");
        return;
      }

      const file = fileInput.files[0];
      const reader = new FileReader();

      reader.onload = function(event) {
        const imageData = event.target.result;

        // Key for AES encryption (This is for demonstration purposes, use a secure method in production)
        const key = CryptoJS.enc.Utf8.parse('12345678901234567890123456789012'); // 32-byte key for AES-256

        // Encrypt the image data
        const encrypted = CryptoJS.AES.encrypt(imageData, key, {
          mode: CryptoJS.mode.ECB,
          padding: CryptoJS.pad.Pkcs7
        });

        // Convert the encrypted image to Base64
        const encryptedBase64 = encrypted.toString();
        output.value = encryptedBase64;
      };

      reader.readAsDataURL(file); // Read the file as a data URL (Base64)
    }
  </script>

</body>
</html>
