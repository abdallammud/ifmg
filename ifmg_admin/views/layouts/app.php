<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>
        <?php echo $page_title ?? 'IFMG Admin'; ?>
    </title>
    <!-- Tailwind CSS CDN -->
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        navy: {
                            800: '#113355',
                            900: '#0B2E4F',
                            950: '#071B2F',
                        },
                        teal: {
                            500: '#0F6E8C',
                            600: '#0C5A73',
                        },
                        gold: {
                            100: '#FEF9C3',
                            200: '#FEF08A',
                            500: '#C9A227',
                            600: '#D4B23A',
                        }
                    },
                    fontFamily: {
                        sans: ['Inter', 'sans-serif'],
                        poppins: ['Poppins', 'sans-serif'],
                    }
                }
            }
        }
    </script>
    <!-- Google Fonts -->
    <link
        href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600&family=Poppins:wght@600;700&display=swap"
        rel="stylesheet">
    <!-- jQuery CDN -->
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <!-- Custom Admin Styles -->
    <link rel="stylesheet" href="<?php echo asset('css/admin.css'); ?>">
    <!-- Quill WYSIWYG Editor -->
    <link href="https://cdn.quilljs.com/1.3.7/quill.snow.css" rel="stylesheet">
    <style>
        body {
            font-family: 'Inter', sans-serif;
        }

        h1,
        h2,
        h3,
        h4 {
            font-family: 'Poppins', sans-serif;
        }
    </style>
</head>

<body class="bg-[#F5F7FA] text-[#0B2E4F]">
    <div class="min-h-screen flex">
        <!-- Sidebar -->
        <?php include VIEW_PATH . 'partials/sidebar.php'; ?>

        <!-- Main Content -->
        <div class="flex-1 flex flex-col">
            <!-- Topbar -->
            <?php include VIEW_PATH . 'partials/topbar.php'; ?>

            <!-- Content Area -->
            <main class="p-8 flex-1">
                <?php include VIEW_PATH . 'partials/alerts.php'; ?>
                <?php include $viewFile; ?>
            </main>
        </div>
    </div>
    <script src="<?php echo asset('js/admin.js'); ?>"></script>
    <!-- Quill WYSIWYG Editor -->
    <script src="https://cdn.quilljs.com/1.3.7/quill.min.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            document.querySelectorAll('.wysiwyg-editor').forEach(function (container) {
                const textarea = container.previousElementSibling;
                if (!textarea || textarea.tagName !== 'TEXTAREA') return;

                textarea.style.display = 'none';

                const quill = new Quill(container, {
                    theme: 'snow',
                    modules: {
                        toolbar: [
                            [{ 'header': [1, 2, 3, false] }],
                            ['bold', 'italic', 'underline'],
                            [{ 'list': 'ordered' }, { 'list': 'bullet' }],
                            ['link'],
                            ['clean']
                        ]
                    }
                });

                quill.root.innerHTML = textarea.value;

                const form = textarea.closest('form');
                if (form) {
                    form.addEventListener('submit', function () {
                        textarea.value = quill.root.innerHTML;
                    });
                }

                quill.on('text-change', function () {
                    textarea.value = quill.root.innerHTML;
                });
            });
        });
    </script>
</body>

</html>