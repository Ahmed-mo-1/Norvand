<?php
get_header();
?>
<div class="p20">


<div id="primary" class="content-area">
    <main id="main" class="site-main" role="main">
        <?php if ( have_posts() ) : ?>
            <div class="post-grid">
                <?php while ( have_posts() ) : the_post(); ?>
                    <div class="post-card">
                        <div class="post-header">
                            <h2 class="post-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
                            <div class="post-meta">
                                <span class="post-category"><?php the_category(', '); ?></span>
                                <span class="post-date"><?php echo get_the_date(); ?></span>
                            </div>
                        </div>
                        <div class="post-content">
                            <?php //the_excerpt(); ?> <!-- Display excerpt instead of full content -->
							        <?php
										the_content();
									?>
                        </div>
                        <!--<div class="post-footer">
                            <a href="<?php //the_permalink(); ?>" class="read-more">Read More</a>
                        </div>-->
                    </div>
                <?php endwhile; ?>
            </div>
        <?php endif; ?>
    </main><!-- .site-main -->
</div><!-- .content-area -->


</div>
<style>

.post-grid {
    display: flex;
    flex-wrap: wrap;
    gap: 20px;
    justify-content: center;
}

.post-card {
    background-color: #ffffff;
    border: 1px solid #dddddd;
    border-radius: 8px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    overflow: hidden;
    transition: transform 0.2s, box-shadow 0.2s;
    width: 600px;
    max-width: 600px;
    margin-bottom: 20px;
    padding: 20px;
    text-align: left;
}

post-card:hover {
    transform: translateY(-5px);
    box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2);
}

.post-title {
    font-size: 1.5em;
    color: #333;
    margin-bottom: 10px;
    text-align: center;
}

.post-title a {
    text-decoration: none;
    color: inherit;
    transition: color 0.2s;
}

.post-title a:hover {
    color: #0073aa;
}

.post-meta {
    display: flex;
    justify-content: center;
    gap: 10px;
    font-size: 0.9em;
    color: #777;
    margin-bottom: 15px;
}

post-category::before {
    content: "📂 ";
}

post-date::before {
    content: "📅 ";
}

.post-content {
    font-size: 1em;
    color: #666;
    margin-bottom: 20px;
}


.post-footer {
    text-align: center;
}

.read-more {
    display: inline-block;
    padding: 10px 20px;
    background-color: #0073aa;
    color: #ffffff;
    text-decoration: none;
    border-radius: 4px;
    transition: background-color 0.2s;
}

.read-more:hover {
    background-color: #005b88;
}

/* Responsive Design */
@media (min-width: 900px) {
    .post-card {
        width: calc(90% - 20px);
    }
}

@media (min-width: 600px) {
    .post-card {
        width: calc(90% - 20px);
    }
}

@media (max-width: 599px) {
    .post-card {
        width: 100%;
    }
}


</style>

<?php get_footer(); ?>