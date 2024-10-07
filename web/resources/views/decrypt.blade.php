<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Decrypt Base64 to Image</title>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/crypto-js/4.1.1/crypto-js.min.js"></script>
</head>
<body>

  <h2>Decrypt Base64 and Download Image</h2>

  <!-- Textarea for encrypted Base64 input -->
  <textarea id="encryptedInput" rows="10" cols="50" placeholder="Paste the encrypted Base64 string here"></textarea>
  <br><br>

  <!-- Button to trigger decryption and image download -->
  <button onclick="decryptAndDownload()">Decrypt and Download Image</button>
  <br><br>

  <!-- Link for downloading the image -->
  <a id="downloadLink" style="display:none;">Download Image</a>

  <script>
    // Function to decrypt AES Base64 string and download as an image
    function decryptAndDownload() {
      const encryptedBase64 = document.getElementById('encryptedInput').value;
      const downloadLink = document.getElementById('downloadLink');

      if (!encryptedBase64) {
        alert("Please enter the encrypted Base64 string!");
        return;
      }

      // Key for AES decryption (same as the one used for encryption)
      const key = CryptoJS.enc.Utf8.parse('12345678901234567890123456789012'); // 32-byte key for AES-256

      try {
        // Decrypt the AES-encrypted Base64 string
        const decrypted = CryptoJS.AES.decrypt(encryptedBase64, key, {
          mode: CryptoJS.mode.ECB,
          padding: CryptoJS.pad.Pkcs7
        });

        // Convert decrypted data back to a Base64 string
        const decryptedBase64 = decrypted.toString(CryptoJS.enc.Utf8);

        // Set the download link to the decrypted Base64 string
        downloadLink.href = decryptedBase64;
        downloadLink.download = 'decrypted_image.png'; // Set the desired file name
        downloadLink.style.display = 'inline'; // Show the download link
        downloadLink.textContent = 'Download Image'; // Update link text
      } catch (error) {
        alert("Failed to decrypt. Please check the input or key.");
        downloadLink.style.display = 'none'; // Hide the download link on failure
      }
    }
  </script>

</body>
</html>
