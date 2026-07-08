<?php /** @var string $appName, ?string $error */ ob_start(); ?>
<div class="min-h-screen flex items-center justify-center p-4">
  <div class="w-full max-w-sm">
    <div class="text-center mb-8">
      <div class="inline-flex items-center justify-center w-14 h-14 rounded-bento bg-cv-surface border border-cv-border shadow-soft mb-4 text-cv-accent">
        <?= lucide('cloud', 'w-7 h-7') ?>
      </div>
      <h1 class="text-[22px] font-semibold tracking-tight"><?= e($appName) ?></h1>
      <p class="text-sm text-cv-muted mt-1">File hosting pribadi</p>
    </div>

    <form method="post" action="<?= e(url('/login')) ?>" class="cv-card p-6">
      <input type="hidden" name="csrf" value="<?= e(csrf_token()) ?>">
      <label class="block text-sm font-medium mb-2">Password</label>
      <input type="password" name="password" autofocus required
             class="cv-input w-full">
      <?php if ($error): ?>
        <p class="text-sm text-[#ff3b30] dark:text-[#ff453a] mt-3"><?= e($error) ?></p>
      <?php endif; ?>
      <button type="submit" class="cv-btn-primary w-full mt-4" style="height:44px">
        Masuk
      </button>
    </form>
  </div>
</div>
<?php $content = ob_get_clean(); include __DIR__ . '/layout.php';
