<?php
/* Template Name: Full Width Template */
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

/* Container for the grid of posts */
.post-grid {
    display: flex;
    flex-wrap: wrap;
    gap: 20px; /* Space between cards */
    justify-content: center;
}

/* Individual post card */
.post-card {
    background-color: #ffffff; /* Card background color */
    border: 1px solid #dddddd; /* Card border */
    border-radius: 8px; /* Rounded corners */
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); /* Soft shadow */
    overflow: hidden;
    transition: transform 0.2s, box-shadow 0.2s; /* Smooth hover effect */
    width: calc(33% - 20px); /* Three cards per row, adjust as needed */
    max-width: 300px; /* Maximum width of each card */
    margin-bottom: 20px; /* Space below cards */
    padding: 20px; /* Padding inside cards */
    text-align: left; /* Align text to the left */
}

/* Hover effect for the card */
post-card:hover {
    transform: translateY(-5px); /* Lift card slightly on hover */
    box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2); /* Stronger shadow */
}

/* Title styling */
.post-title {
    font-size: 1.5em; /* Larger font size */
    color: #333; /* Dark color */
    margin-bottom: 10px; /* Space below the title */
    text-align: center; /* Center title text */
}

.post-title a {
    text-decoration: none; /* Remove underline */
    color: inherit; /* Inherit color from parent */
    transition: color 0.2s; /* Smooth color transition */
}

.post-title a:hover {
    color: #0073aa; /* Change color on hover */
}

/* Meta information styling */
.post-meta {
    display: flex;
    justify-content: center;
    gap: 10px; /* Space between category and date */
    font-size: 0.9em; /* Smaller font size for meta info */
    color: #777; /* Grey color for meta info */
    margin-bottom: 15px; /* Space below meta info */
}

post-category::before {
    content: "📂 "; /* Folder icon before category */
}

post-date::before {
    content: "📅 "; /* Calendar icon before date */
}

/* Content styling */
.post-content {
    font-size: 1em; /* Normal font size */
    color: #666; /* Lighter color for content */
    margin-bottom: 20px; /* Space below content */
}

/* Footer styling */
.post-footer {
    text-align: center; /* Center the Read More link */
}

.read-more {
    display: inline-block; /* Make link a block-level element */
    padding: 10px 20px; /* Padding around the link */
    background-color: #0073aa; /* Button background color */
    color: #ffffff; /* Button text color */
    text-decoration: none; /* Remove underline */
    border-radius: 4px; /* Rounded corners for button */
    transition: background-color 0.2s; /* Smooth transition for background color */
}

.read-more:hover {
    background-color: #005b88; /* Darker color on hover */
}

/* Responsive Design */
@media (min-width: 900px) {
    .post-card {
        width: calc(33% - 20px);
    }
}

@media (min-width: 600px) {
    .post-card {
        width: calc(50% - 20px);
    }
}

@media (max-width: 599px) {
    .post-card {
        width: 100%;
    }
}


</style>

<?php get_footer(); ?>