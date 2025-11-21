<div id="filter" style="display: none">
<form class="filterform" method="GET" action="">

    <label for="filter_color">Color:</label>
    <select name="filter_color" id="filter_color">
        <option value="">All Colors</option>
        <?php
        $colors = get_terms(array('taxonomy' => 'pa_color', 'hide_empty' => false));
        foreach ($colors as $color) {
            echo '<option value="' . esc_attr($color->slug) . '"' . selected(isset($_GET['filter_color']) ? $_GET['filter_color'] : '', $color->slug, false) . '>' . esc_html($color->name) . '</option>';
        }
        ?>
    </select>
<br>
    <label for="filter_personalized">Engraving:</label>
    <select name="filter_personalized" id="filter_personalized">
        <option value="">All</option>
        <?php
        $personalizeds = get_terms(array('taxonomy' => 'pa_personalized', 'hide_empty' => false));
        foreach ($personalizeds as $personalized) {
            echo '<option value="' . esc_attr($personalized->slug) . '"' . selected(isset($_GET['filter_personalized']) ? $_GET['filter_personalized'] : '', $personalized->slug, false) . '>' . esc_html($personalized->name) . '</option>';
        }
        ?>
    </select>
    
    <button type="submit">Filter</button>
</form>

<style>
.filterform {display : flex ; align-items : center ; justify-content : center ; flex-direction : column}
.filterform label {display : block}
.filterform select {width : 80% ; padding : 10px ; margin : 0 10px }
.filterform button {margin : 20px 0}
</style>
</div>