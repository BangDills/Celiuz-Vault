<?php /** @var string $appName, string $message */ ob_start(); ?>
<div class="min-h-screen flex items-center justify-center p-4">
  <div class="cv-card max-w-md w-full p-10 text-center">
    <div class="inline-flex items-center justify-center w-12 h-12 rounded-xl bg-cv-bg border border-cv-border text-cv-muted mb-4">
      <?= lucide('search', 'w-6 h-6') ?>
    </div>
    <h1 class="text-xl font-semibold tracking-tight"><?= e($message) ?></h1>
    <a href="<?= e(url('/')) ?>" class="cv-btn-primary inline-flex items-center gap-2 mt-6" style="height:44px;padding:0 22px">
      Kembali
    </a>
  </div>
</div>
<?php $content = ob_get_clean(); include __DIR__ . '/layout.php';
