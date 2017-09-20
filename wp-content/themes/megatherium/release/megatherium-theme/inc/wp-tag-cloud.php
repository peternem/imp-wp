<?php if (function_exists('wp_tag_cloud')) : ?>
    <section class="container-fluid tag-cta">
        <div class="row">
            <div class="col-lg-6 align-center">
                <h2>Popular Tags</h2>
                <ul class="mp-tags">
                    <li><?php wp_tag_cloud('smallest=12&largest=22'); ?></li>
                </ul>
            </div>
        </div>
    </section>
<?php endif; ?>