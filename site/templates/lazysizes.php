<?php snippet('header') ?>

<article>
    <?php snippet('intro') ?>

    <h2>Image element</h2>
    <?php foreach ($page->images() as $image) : ?>
        <img
            alt="<?= $image->alt() ?>"
            class="lazyload"
            height="<?= $image->resize(2000)->height() ?>"
            data-src="<?= $image->resize(1280)->url() ?>"
            data-srcset="<?= $image->srcset([320, 640, 1280, 1600, 1920]) ?>"
            width="<?= $image->resize(2000)->width() ?>">
    <?php endforeach ?>

    <h2>Picture element</h2>
    <?php foreach ($page->images() as $image) : ?>
        <picture>
            <source data-srcset="<?= $image->thumb(['width' => 1280, 'format' => 'avif'])->url() ?>" type="image/avif">
            <source data-srcset="<?= $image->thumb(['width' => 1280, 'format' => 'webp'])->url() ?>" type="image/webp">
            <img
                alt="<?= $image->alt() ?>"
                class="lazyload"
                data-src="<?= $image->thumb(['width' => 1280, 'format' => 'jpg', 'quality' => 80])->url() ?>"
                height="<?= $image->height() ?>"
                width="<?= $image->width() ?>"
                src="data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw=="
            >
        </picture>
    <?php endforeach ?>
</article>

<?php snippet('footer') ?>

</body>
</html>
