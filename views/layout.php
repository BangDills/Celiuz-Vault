<?php /** @var string $appName */ ?>
<!DOCTYPE html>
<html lang="id" x-data="{ theme: localStorage.getItem('cv-theme') || 'light' }" :class="theme" x-init="$watch('theme', v => localStorage.setItem('cv-theme', v))">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= e($appName) ?></title>
    <meta name="description" content="<?= e($appName) ?> — Personal file hosting & vault">
    <style>[x-cloak]{display:none!important}</style>
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
      tailwind.config = {
        darkMode: 'class',
        theme: {
          extend: {
            colors: {
              cv: {
                // Apple/Mac palette: light gray canvas, near-black ink, blue accent.
                bg:      '#f5f5f7',
                surface: '#ffffff',
                border:  '#d2d2d7',
                text:    '#1d1d1f',
                muted:   '#86868b',
                faint:   '#aeaeb2',
                accent:  '#0071e3', accenthover: '#0077ed', accentfg: '#ffffff',
                success: '#34c759',
                sidebar: 'rgba(245,245,247,0.8)',
                sbhover: '#e8e8ed',
                sbactive: '#e8f0fe',
              },
            },
            borderRadius: { bento: '16px' },
            boxShadow: {
              soft:   '0 1px 2px 0 rgba(0,0,0,.04), 0 1px 3px 0 rgba(0,0,0,.04)',
              float:  '0 4px 16px -4px rgba(0,0,0,.10), 0 2px 6px -2px rgba(0,0,0,.06)',
              pop:    '0 12px 40px -12px rgba(0,0,0,.22)',
            },
            fontFamily: { sans: ['-apple-system','BlinkMacSystemFont','SF Pro Display','SF Pro Text','Helvetica Neue','Inter','system-ui','sans-serif'], product: ['SF Pro Display','-apple-system','BlinkMacSystemFont','Inter','system-ui','sans-serif'] },
          },
        },
      };
    </script>
    <link rel="stylesheet" href="<?= e(url('/assets/app.css')) ?>">
    <!-- app.js before Alpine so vault()/humanSize() exist when x-data initializes. -->
    <script defer src="<?= e(url('/assets/app.js')) ?>"></script>
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
</head>
<body class="min-h-screen bg-cv-bg text-cv-text font-product antialiased selection:bg-[#0071e3]/20 dark:bg-black dark:text-[#f5f5f7] dark:selection:bg-[#0a84ff]/30">
<?= $content ?? '' ?>
</body>
</html>
