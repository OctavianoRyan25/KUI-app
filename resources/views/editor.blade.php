<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CKEditor in Laravel</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100">
    <div class="container mx-auto p-4">
        <h1 class="text-2xl font-bold mb-4">Content Editor</h1>
        
        <!-- Textarea for CKEditor -->
        <textarea id="editor" name="content" rows="10" cols="80">
        </textarea>
        
        <button id="save-button" class="mt-4 px-4 py-2 bg-blue-500 text-white rounded">Save Content</button>
    </div>

    <!-- CKEditor Script from CDN -->
    <script src="https://cdn.ckeditor.com/4.22.1/standard/ckeditor.js"></script>
    <script>
        // Initialize CKEditor
        CKEDITOR.replace('editor');

        // Save content button
        document.getElementById('save-button').addEventListener('click', function() {
            const content = CKEDITOR.instances.editor.getData();
            console.log('Editor content:', content);
            // Send `content` to your server if needed
        });
    </script>
</body>
</html>
