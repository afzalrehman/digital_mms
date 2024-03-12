<!DOCTYPE html>
<html lang="ur">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Urdu Transliteration</title>
</head>

<body>
    <label for="urduInput">Type in English:</label>
    <input type="text" class="urduInput">
    <textarea name="" class="urduInput" id="" cols="30" rows="10"></textarea>

    <script>
        function urdu(inputElement) {
            let englishValue = inputElement.value;
            let urduValue = '';

            const urduMap = {
                // ==================== Small Characters ====================//         
                'a': 'ا', 'b': 'ب', 'c': 'چ', 'd': 'د', 'e': 'ع', 'f': 'ف', 'g': 'گ', 'h': 'ھ', 'i': 'ی',
                'j': 'ج', 'k': 'ک', 'l': 'ل', 'm': 'م', 'n': 'ن', 'o': 'ہ', 'p': 'پ', 'q': 'ق', 'r': 'ر',
                's': 'س', 't': 'ت', 'u': 'ئ', 'v': 'ط', 'w': 'و', 'x': 'ش', 'y': 'ے', 'z': 'ز',
                // ==================== Numbers (1 to 0) ====================//
                '1': '۱', '2': '۲', '3': '۳', '4': '۴', '5': '۵', '6': 'ۂ', '7': '۷', '8': '۸', '9': '۹', '0': '۰',
                // ==================== Special Characters ====================//         
                ',': '،', '.': '۔', '?': '؟', ';': '؛', ':': '؛', '!': '!',
                // ==================== Capital Characters ====================//         
                'A': 'آ', 'B': 'ٖ', 'C': 'ث', 'D': 'ڈ', 'E': 'ؑ', 'F': 'ٖ', 'G': 'غ', 'H': 'ح', 'I': 'ٰ',
                'J': 'ض', 'K': 'خ', 'L': 'ؒ', 'M': 'ؐ', 'N': 'ں', 'O': 'ۃ', 'P': 'ُ', 'Q': 'ﷺ', 'R': 'ڑ',
                'S': 'ص', 'T': 'ٹ', 'U': 'ء', 'V': 'ظ', 'W': 'ؤ', 'X': 'ژ', 'Y': 'ۓ', 'Z': 'ذ'
            };

            for (let i = 0; i < englishValue.length; i++) {
                let englishChar = englishValue[i];
                urduValue += urduMap[englishChar] || englishChar;
            }

            inputElement.value = urduValue;
        }

        // Use getElementsByClassName to get a collection, and iterate through it
        let urduInputs = document.getElementsByClassName('urduInput');

        for (let i = 0; i < urduInputs.length; i++) {
            urduInputs[i].addEventListener('input', function () {
                urdu(this); // Pass the current input element to the urdu function
            });
        }
    </script>
</body>

</html>
