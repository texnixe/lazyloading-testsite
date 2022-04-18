<?php snippet('header') ?>

<article>
    <?php snippet('intro') ?>

    <h2>Image element</h2>
    <?php foreach($page->images() as $image): ?>
        <img
            alt="<?= $image->alt() ?>"
            class="lozad"
            loading="lazy"
            data-src="<?= $image->resize(1280)->url() ?>"
            data-srcset="<?= $image->srcset([320, 640, 1280, 1600, 1920])?>"
            width="<?= $image->width() ?>"
            height="<?= $image->height() ?>"
        >
    <?php endforeach ?>

    <h2>Picture element</h2>
    <?php foreach ($images = $page->images() as $image) : ?>
        <picture class="lozad" style="--aspect-ratio: <?= $image->width()/$image->height() ?>">
            <source
                srcset="<?= $image->thumb(['width' => 1280, 'format' => 'avif'])->url() ?>"
                type="image/avif">
            <source
                srcset="<?= $image->thumb(['width' => 1280, 'format' => 'webp'])->url() ?>"
                type="image/webp">
            <source
                srcset="<?= $image->thumb(['width' => 1280])->url() ?>"
                type="image/jpg">
        </picture>
    <?php endforeach ?>
</article>

<?php snippet('footer') ?>

<script>
    const observer = lozad();
    observer.observe();
</script>

</body>
</html>
