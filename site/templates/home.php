<?php snippet('header') ?>
<article>
    <?php snippet('intro') ?>

    <h2>Image element</h2>
    <?php foreach ($images = $page->images() as $image) : ?>
        <img
            alt="<?= $image->alt() ?>"
            class="lazyload"
            src="<?= $image->resize(1280)->url() ?>"
            srcset="<?= $image->srcset([320, 640, 1280, 1600, 1920]) ?>"
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

</body>
</html>

