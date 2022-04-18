<?php snippet('header') ?>

<article>
    <h1 class="h1"><?= $page->title()->html() ?></h1>

    <h2>Image element</h2>
    <?php foreach ($images = $page->images() as $image) : ?>
        <img
            alt="<?= $image->alt() ?>"
            class="lazyload"
            loading="lazy"
            data-src="<?= $image->resize(1280)->url() ?>"
            data-srcset="<?= $image->srcset([320, 640, 1280, 1600, 1920]) ?>"
            width="<?= $image->resize(2000)->width() ?>"
            height="<?= $image->resize(2000)->height() ?>"
        >
    <?php endforeach ?>

    <h2>Picture element</h2>
    <?php foreach ($images = $page->images() as $image) : ?>
      <picture>
          <source srcset="<?= $image->thumb(['width' => 1280, 'format' => 'avif'])->url() ?>" type="image/avif">
          <source srcset="<?= $image->thumb(['width' => 1280, 'format' => 'webp'])->url() ?>" type="image/webp">
          <img
              src="<?= $image->thumb(['width' => 1280, 'format' => 'jpg'])->url() ?>"
              width="<?= $image->width() ?>"
              height="<?= $image->height() ?>"
          >
      </picture>
    <?php endforeach ?>
</article>

<?php snippet('footer') ?>

<script>
  if ('loading' in HTMLImageElement.prototype) {
    const images = document.querySelectorAll('img[loading="lazy"]');
    images.forEach(img => {
      img.src    = img.dataset.src;
      img.srcset = img.dataset.srcset;
    });
  } else {
    // Otherwise load Lazysizes
    const script = document.createElement('script');
    script.src = "<?= url('assets/js/templates/lazysizes.js') ?>";
    document.body.appendChild(script);
  }
</script>

</body>
</html>
